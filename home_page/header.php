<head>
  <meta charset="utf-8">
  <script type="text/javascript" async defer src="../js/sidenav.js"></script>
  <link rel="stylesheet" href="../css/style_template.css" />
  <meta name="viewport" content="width=device-width">
</head>

<header>
    <a href="../KnightsClub.html"><img id="header-logo" src="../images/php-knights-logo.png" alt="site logo made of a knights helmet" width="200" /></a>
    
    <span id="navBtn" onclick="openNav()">&#9776; MENU</span>
    <div id="sideNav" class="sidenav">
      <a id="closeBtn" onclick="closeNav()">&times;</a>
      <a>
        <form method="GET" action="search.php">
          <div>
            <input type="text" id="searchBar" placeholder="Search.." />
            <button type="submit" id="searchBtn">Search</button>
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
