<?php

use Webappdev\Knightsclub\models\{Database, Search};

require "../vendor/autoload.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Seach | Knights Club</title>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
    <h1>Search</h1>
    <form method="POST" action="">
          <div>
            <input type="text" name="param" placeholder="Who are you looking for?" />
            <button type="submit" name="search" >Search</button>
          </div>
    </form>
    <div id="search-results">
      <?php 
         if(isset($_POST['search'])){
          $u = new Search();
          $db = Database::getDb();
          $param = $_GET['param'];

          $results = $u->FindUser($param, $db);

          foreach($results as $r) { ?>
              <table>
                <tr>
                <td><?php $r['first_name']?></td>
                <td><?php $r['last_name'] ?></td>
                <td><?php $r['username'] ?></td>
              </tr>
            </table>
            <?php
          };
        } ?>
    </div>
</main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>
