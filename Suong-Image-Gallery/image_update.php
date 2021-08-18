<?php
session_start();

use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Images;

require_once '../vendor/autoload.php';

$id = $_SESSION['id'];
$main_img_status = "main";
$not_main_status = "";
//limit to maximun of 6 pictures per user
$gallery_limit = 6;
//this work as n+1, so 1 will means that there will be
// 2 picture in a row
$limit_per_row = 1; 


$gallery = new Images();

$db = Database::getDb();

$userImgs = $gallery->getImagesById($id, $db);

$userName = $gallery->getUserNameById($id, $db);

if (isset($_POST['delete_img'])) {
  $imgStatus = $gallery->getImageStatus($_POST['id'], $db);
  //echo $imgStatus->main_image . " " . $main_img_status;
  //problem: forgot that getImageStatus returns an arry
  //This caused the if clause below to always failed
  if ($imgStatus->main_image == $main_img_status) {
    //echo "1";
    $status = $main_img_status;
    //Loop thru the array to search for and change the status of the first image that is not the main image
    foreach ($userImgs as $img) {
      //echo "2";
      if ($img->main_image != $main_img_status && $status != $not_main_status) {
        $count = $gallery->changeImageStatus($img->image_id, $main_img_status, $db);
        $status = $not_main_status;
        echo $count;
        if ($count) {
          //echo "3";
          $delete = $gallery->deleteImage($_POST['id'], $db);
          if ($delete) {
            header("Location: ./image_update.php");
          } else {
            echo "Error";
          }
        }
      }
    }
  } else {
    echo "Hi hi";
    $delete = $gallery->deleteImage($_POST['id'], $db);
    if ($delete) {
      header("Location: ./image_update.php");
    } else {
      echo "Error";
    }
  }
}

//change status of a picture
if (isset($_POST['make_main'])) {

  foreach ($userImgs as $img) {
    $gallery->changeImageStatus($img->image_id, $not_main_status, $db);
  }
  $main = $gallery->changeImageStatus($_POST['id'], $main_img_status, $db);
  if ($main) {
    header("Location: ./image_update.php");
  } else {
    echo "Error";
  }
}

//max file change be adjust accordingly
$max_file_size = 10000000;
if (isset($_FILES['upload'])) {
  $file_temp = $_FILES['upload']['tmp_name'];
  $file_name = $_FILES['upload']['name'];
  $file_size = $_FILES['upload']['size'];
  $file_type = $_FILES['upload']['type'];
  $file_error = $_FILES['upload']['error'];

  //currenyly unable to make alert_message to work before refreshing the page
  if ($file_error > 0) {
    switch ($file_error) {
      case 1:
        //alert_message("File exceeded upload_max_filesize.");
        header("Location: ./image_update.php");
        break;
      case 2:
        //alert_message("File exceeded " . $max_file_size . " .");
        header("Location: ./image_update.php");
        break;
      case 3:
        //alert_message("File only partially uploaded.");
        header("Location: ./image_update.php");
        break;
      case 4:
        //alert_message("No file uploaded.");
        header("Location: ./image_update.php");
        break;
    }
    exit;
  }

  if ($file_size > $max_file_size) {
    //alert_message("File size too big");
  } else {
    $target_path = "images/";
    $target_path = $target_path .  $_FILES['upload']['name'];

    if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {

      $count = $gallery->uploadImage($id, $_FILES['upload']['name'], $db);

      if ($count) {
        header("Location: ./image_update.php");
      } else {
        //alert_message("There was an error uploading the file, please try again!");
        header("Location: ./image_update.php");
      }
    } else {
      //alert_message("There was an error uploading the file, please try again!");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript" async defer src="../js/sidenav.js"></script>
  <link rel="stylesheet" href="../css/style_template.css" />
  <meta name="viewport" content="width=device-width">
  <title>Knight's Club</title>
</head>

<body>
  <?php require_once('../home_page/header.php'); ?>
  <main>
    <div class="d-flex justify-content-end pt-2">
      <?php require_once '../Suong-Notification/userNotification.php' ?>
      <span class="px-1"></span>
      <?php require_once '../Suong-User-Status/userStatus.php' ?>
    </div>

    <h1><a href="image_gallery.php" class="text-muted text-decoration-none">Back to Gallery</a></h1>

    <div class="d-flex justify-content-center pb-2">
      <?php
      $alert = "";
      //Different type of [form] according to the amount of picture the user currently have inside the system
      if (count($userImgs) < $gallery_limit) {
        $alert = 'action="image_update.php" enctype="multipart/form-data" method="POST" onsubmit="return confirm(\'Upload this picture?\');"';
      } else {
        $alert = 'onsubmit="alert(\'Reach picture limit!\'); return false"';
      }
      ?>
      <form <?= $alert ?>>

        <input type="hidden" name="MAX_FILE_SIZE" value=<?= $max_file_size ?>>
        <input type="file" name="upload" id="upload">
        <input type="submit" value="Upload" class="btn btn-outline-primary">

      </form>
    </div>
    <div class="d-flex pb-2">
      <?php
      $counting = 0;
      if (count($userImgs) == 0) {
      ?>
        <div class="d-flex justify-content-center">
          <img class="d-block w-50" src="./images/default.png" alt="No image">
        </div>
        <?php } else {
        foreach ($userImgs as $img) {
          //this let the main image to always be to first picture showing up
          if ($img->main_image == $main_img_status) {
            $counting++; ?>
            <div class="col-md-6">
              <img src="./images/<?= $img->image_name ?>" alt="Image of user <?= $img->username; ?>" class="img-thumbnail rounded img-responsive">
              <div class='d-flex justify-content-around'>
                <form action="image_update.php" method="POST" onsubmit="return confirm('Make this your profile picture?');">
                  <input type="hidden" name="id" value=<?= $img->image_id ?>>
                  <input type="submit" value="Main image" class="btn btn-outline-primary" name="make_main">
                </form>
                <p><span class="badge badge-pill badge-info">Main image</span></p>
                <form action="image_update.php" method="POST" onsubmit="return confirm('Do you really want to delete this picture?');">
                  <input type="hidden" name="id" value=<?= $img->image_id ?>>
                  <input type="submit" value="Delete" class="btn btn-outline-warning" name="delete_img">
                </form>
              </div>
            </div>
          <?php }
        }
        foreach ($userImgs as $img) {
          //$mark = "";
          if ($img->main_image == $not_main_status) {
            //$mark = "Main Image";
            //}
          ?>
            <div class="col-md-6">
              <img src="./images/<?= $img->image_name ?>" alt="Image of user <?= $img->username; ?>" class="img-thumbnail rounded img-responsive">
              <div class='d-flex justify-content-around'>
                <form action="image_update.php" method="POST" onsubmit="return confirm('Make this your profile picture?');">
                  <input type="hidden" name="id" value=<?= $img->image_id ?>>
                  <input type="submit" value="Main image" class="btn btn-outline-primary" name="make_main">
                </form>
                <!-- <p><span class="badge badge-pill badge-info">< $mark ?></span></p> -->
                <form action="image_update.php" method="POST" onsubmit="return confirm('Do you really want to delete this picture?');">
                  <input type="hidden" name="id" value=<?= $img->image_id ?>>
                  <input type="submit" value="Delete" class="btn btn-outline-warning" name="delete_img">
                </form>
              </div>
            </div>
      <?php
            if ($counting == $limit_per_row) {
              echo "</div>";
              echo '<div class="d-flex pb-2">';
              $counting = 0;
            } else {
              $counting++;
            }
          }
        }
        if($counting == 0){
          echo "</div>";
        }
      }
      ?>

  </main>
  <?php require_once('../home_page/footer.php'); ?>
  <script>
  </script>
</body>

</html>