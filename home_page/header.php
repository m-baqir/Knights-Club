<?php

if(isset($_GET['nav-search'])){
  $param = $_GET['param'];

  header("Location: ../ahmed-search/results.php?param=".$param."&search=");
}

?>

<head>
  <meta charset="utf-8">
  <script type="text/javascript" async defer src="../js/sidenav.js"></script>
  <link rel="stylesheet" href="../css/style_template.css" />
  <meta name="viewport" content="width=device-width">
</head>

<header>
    <a href="../KnightsClub.html"><img id="header-logo" src="../images/php-knights-logo.png" alt="site logo made of a knights helmet" width="200" /></a>
    
    <span id="navBtn">&#9776; MENU</span>
    <div id="sideNav" class="sidenav">
      <a id="closeBtn">&times;</a>
      <a>
        <form method="GET" action="">
          <div>
            <input type="text" name="param" id="searchBar" placeholder="Search.." />
            <button type="submit" name="nav-search" id="searchBtn">Search</button>
          </div>
        </form>
      </a>
      <a href="#">Profile</a>
      <a href="#">Subscribe</a>
      <a href="#">Newsletter</a>
      <a href="#">About Us</a>
      <a href="../ContactUs_Vedanshi/ContactUs.php">Contact</a>
    </div>
  </header>
