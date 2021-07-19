<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
    <div class="container">
      
      <h1 ><a href="../user_profile_estevan/login_user.php" class="text-muted text-decoration-none">Profile</a></h1>
    </div>
    
    <div id="carouselExampleIndicators" class="carousel slide container pt-2 pb-3" data-ride="carousel">     
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./images/mateo-avila-chinchilla-x_8oJhYU31k-unsplash.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./images/eddy-lackmann-lLdGG3ESoiI-unsplash.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./images/ben-sweet-2LowviVHZ-E-unsplash.jpg" alt="Third slide">
        </div>
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
    <footer>
      <div id="footer-menu">
        <div>
          <img id="footer-logo" src="./images/php-knights-logo.png" alt="site logo made of a knights helmet" />
        </div>
        <div class="footer-col">
            <h3><a href="#">Home</a></h3>
        </div>
        <div class="footer-col">
            <h3><a href="#">Search</a></h3>
        </div>
        <div class="footer-col">
            <h3><a href="#">Profile</a></h3>
            <ul>
                <li><a href="#">Subscribe</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3><a href="#">About Us</a></h3>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Newsletter</a></li>
                <li><a href="">Advice</a></li>
                <li><a href="">Contact/Feedback</a></li>
                <li><a href="">Site Map</a></li>
            </ul>
        </div>
    </div>
    <div id="copyright">
        <p>&copy; 2021, PHP Knights</p>
    </div>
    </footer>
</body>

</html>