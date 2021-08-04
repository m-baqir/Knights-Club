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
    <form method="GET" action="">
          <div>
          <h1>Search</h1>
            <input placeholder="Who are you looking for?" type="text" name="param" 
            value="<?php if (isset($_GET['param'])) echo $_GET['param']; ?>" />
            <button type="submit" name="search" >Search</button>
          </div>
    </form>
    <div id="search-results">
      <?php 
         if(isset($_GET['search'])){
          $u = new Search();
          $db = Database::getDb();

          $param = $_GET['param'];

          if($param == ""){
            header("Location: ../ahmed-search/results.php");

          } else{
            $results = $u->FindUser($param, $db);

            printResults($results);
          }
        }

        function printResults($results){
          foreach($results as $r) {
            print '<table>
              <tr>
              <td>'. $r->first_name .'</td>
              <td>'. $r->last_name .'</td>
              <td>'. $r->username .'</td>
            </tr>
          </table>';
          }
        }
        ?>
    </div>
</main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>
