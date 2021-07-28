<?php

use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Images;
require_once '../vendor/autoload.php';

  $gallery = new Images();

  $db = Database::getDb();

  $users = $gallery->getImagesById(2,$db); //for now user ID will be hardcoded
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
    <div class="d-flex justify-content-between">
      
      <h1 ><a href="../user_profile_estevan/login_user.php" class="text-muted text-decoration-none"><?=$users[0]->username; ?>'s Profile</a></h1>
      <?php require_once '../Suong-User-Status/userStatus.php' ?>
    </div>
    
    <div id="carouselExampleIndicators" class="carousel slide container pt-2 pb-3" data-ride="carousel">     
      <ol class="carousel-indicators">
        <?php
          $count = 0;
          foreach ($users as $user){ 
            $isActive = "";
            if($user->main_image == "1"){
              $isActive = "class='active'";
            } ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count ?>" <?= $isActive?> ></li>
          <?php 
            $count++;
          } ?>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
      </ol>
      <div class="carousel-inner">
      <?php 
      
      foreach ($users as $user){ 
        $active = "";
        if($user->main_image == "1"){
          $active = "active";
        }?>
          <div class="carousel-item <?= $active ?>">
            <img class="d-block w-100" src="./images/<?= $user->image_name ?>.<?= $user->picextension ?>"  alt="Image of user <?= $user->username; ?>">
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
    <div class="container pb-3">
      <button type="button" class="btn btn-outline-primary">Update your picture</button>
      <button type="button" class="btn btn-outline-primary float-right">Add new picture</button>
    </div>
    </main>
    <?php require_once('../home_page/footer.php'); ?>
</body>

</html>