<?php
session_start();

use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Images;

require_once '../vendor/autoload.php';

$id = $_SESSION['id'];
$main_img_status = "1";
$not_main_status = "0";

$gallery = new Images();

$db = Database::getDb();

$userImgs = $gallery->getImagesById($id, $db);

$userName = $gallery->getUserNameById($id, $db);

if (count($userImgs) == 1 && $userImgs[0]->main_image == $not_main_status) {
  $gallery->changeImageStatus($userImgs[0]->image_id, $main_img_status, $db);
  header("Location: ./image_gallery.php");
}

$max_file_size = 10000000;
if (isset($_FILES['upload'])) {
  $file_temp = $_FILES['upload']['tmp_name'];
  $file_name = $_FILES['upload']['name'];
  $file_size = $_FILES['upload']['size'];
  $file_type = $_FILES['upload']['type'];
  $file_error = $_FILES['upload']['error'];


  if ($file_error > 0) {
    switch ($file_error) {
      case 1:
        alert_message("File exceeded upload_max_filesize.");
        header("Location: ./image_gallery.php");
        break;
      case 2:
        alert_message("File exceeded " . $max_file_size . " .");
        header("Location: ./image_gallery.php");
        break;
      case 3:
        alert_message("File only partially uploaded.");
        header("Location: ./image_gallery.php");
        break;
      case 4:
        alert_message("No file uploaded.");
        header("Location: ./image_gallery.php");
        break;
    }
    exit;
  }

  if ($file_size > $max_file_size) {
    alert_message("File size too big");
  } else {
    $target_path = "images/";
    $target_path = $target_path .  $_FILES['upload']['name'];

    if (move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {

      $count = $gallery->uploadImage($id, $_FILES['upload']['name'], $db);

      if ($count) {
        header("Location: ./image_gallery.php");
      } else {
        alert_message("There was an error uploading the file, please try again!");
        header("Location: ./image_gallery.php");
      }
    } else {
      alert_message("There was an error uploading the file, please try again!");
    }
  }
}

function alert_message($msg)
{
  echo "<script type='text/javascript'>
          confirm('$msg');
        </script>";
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

    <h1><a href="../user_profile_estevan/login_user.php" class="text-muted text-decoration-none"><?= $userName->username; ?>'s Profile</a></h1>

    <div id="carouselExampleIndicators" class="carousel slide container pt-2 pb-3" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
        $count = 0;
        foreach ($userImgs as $user) {
          $isActive = "";
          if ($user->main_image == $main_img_status) {
            $isActive = "class='active'";
          } ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count ?>" <?= $isActive ?>></li>
        <?php
          $count++;
        } ?>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
      </ol>
      <div class="carousel-inner">
        <?php
        if (count($userImgs) == 0) { ?>
          <div class="carousel-item active">
            <img class="d-block w-100" src="./images/default.png" alt="No image">
          </div>
        <?php };
        foreach ($userImgs as $user) {
          $active = "";
          if ($user->main_image == $main_img_status) {
            $active = "active";
          } ?>
          <div class="carousel-item <?= $active ?>">
            <img class="d-block w-100" src="./images/<?= $user->image_name ?>" alt="Image of user <?= $user->username; ?>">
          </div>
        <?php } ?>
      </div>
      <a class="carousel-control-prev w-25" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next w-25" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="d-flex justify-content-around pb-2">
      <a class="btn btn-outline-primary" href="image_update.php" role="button">Update Gallery</a>
      <form action="image_gallery.php" enctype="multipart/form-data" method="POST" onsubmit="return confirm('Upload this picture?');">

        <input type="hidden" name="MAX_FILE_SIZE" value=<?= $max_file_size ?>>
        <input type="file" name="upload" id="upload">
        <input type="submit" value="Upload" class="btn btn-outline-primary">

      </form>
    </div>
  </main>
  <?php require_once('../home_page/footer.php'); ?>
  <script>
    function alertMessage(message) {
      confirm(message);
    }
  </script>
</body>

</html>