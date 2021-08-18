<?php
session_start();
//$uid= $_SESSION['user_id'];

use Webappdev\Knightsclub\models\{Database,Form};
require_once '../vendor/autoload.php';
//$uid=1;
if(isset($_SESSION['id']) && $_SESSION["isadmin"] == 1 ) {
	$d = Database::getDb();
	$fr = new Form();
	$fo = $fr->getUserById($_SESSION['id'], $d);
	$uname = $fo->username;
	$email = $fo->email;
}else{
  header('Location:  ../ahmed-login/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Knights Club">
  <meta name="author" content="Knights Club">
  <meta name="keywords" content="Knights Club">

  <!-- Title Page-->
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
  <!-- HEADER MOBILE-->
  <header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
      <div class="container-fluid">
        <div class="header-mobile-inner">
          <a class="logo" href="index.php">
            <img src="../images/logo.png" alt="Knights Club"/>
          </a>
          <button class="hamburger hamburger--slider" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
    <nav class="navbar-mobile">
      <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
          <li class="has-sub">
            <a class="js-arrow" href="#">
              <i class="fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
          <li>
            <a href="ContactUsAdmin.php">
              <i class="far fa-check-square"></i>Feedback Forms</a>
          </li>
          <li>
            <a href="ListFAQ.php">
              <i class="far fa-check-square"></i>FAQ</a>
          </li>
          <li>
            <a href="login.php">
              <i class=""></i>Login</a>
          </li>
      </div>
    </nav>
  </header>
  <!-- END HEADER MOBILE-->

  <!-- MENU SIDEBAR-->
  <aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
      <a href="index.php">
        <img src="../images/php-knights-logo.png" alt="Knights Club"/>
      </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
      <nav class="navbar-sidebar">
        <ul class="list-unstyled navbar__list">
          <li class="active has-sub">
            <a class="js-arrow" href="index.php">
              <i class="fas fa-tachometer-alt"></i>Dashboard</a>

          <li>
            <a href="ContactUsAdmin.php">
              <i class="far fa-check-square"></i>Feedback/ContactUs Forms</a>
          </li>
          <li>
            <a href="ListFAQ.php">
              <i class="far fa-check-square"></i>FAQ</a>
          </li>

          <li>
            <a href="login.php">
              <i class=""></i>Login</a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <!-- END MENU SIDEBAR-->

  <!-- PAGE CONTAINER-->
  <div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
      <div class="section__content section__content--p30">
        <div class="container-fluid">
          <div class="header-wrap">
            <form class="form-header" action="" method="POST">

            </form>
            <div class="header-button">
              <div class="account-wrap">
                <div class="account-item clearfix js-item-menu">

                  <div class="content">
                    <a class="js-acc-btn" href="#"><?php echo $uname; ?></a>
                  </div>
                  <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                      <div class="content">
                        <h5 class="name">
                          <a href="#"><?php echo $uname; ?></a>
                        </h5>
                        <span class="email"><?php echo $email; ?></span>
                      </div>
                    </div>
                    <div class="account-dropdown__body">
                      <div class="account-dropdown__item">
                        <a href="#">
                          <i class="zmdi zmdi-account"></i>Account</a>
                      </div>
                      <div class="account-dropdown__item">
                        <a href="#">
                          <i class="zmdi zmdi-settings"></i>Setting</a>
                      </div>
                    </div>
                    <div class="account-dropdown__footer">
                      <a href="logout.php">
                        <i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
