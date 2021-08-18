<?php

use Webappdev\Knightsclub\models\{Database, Sitemap};

require "../vendor/autoload.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Map | Knights Club</title>
    <style>
        #site-list {
            list-style-type: none;
        }
        #site-list a{
            color: black;
            
        }
        #site-list a:hover{
            color: red;
        }
    </style>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
    <div>
        <h1>Site Map</h1>
        <p>Explore the Knights Club from any of these pages below</p>
    </div>
    <div>
    <?php

    $sm = new Sitemap();
    $db = Database::getDb();
    $sitemap = $sm->PublicSiteMap($db);
    printSiteMap($sitemap);
    
    function printSiteMap($sitemap){
        foreach($sitemap as $s){
            print "<ul><li id='site-list'><a href='../". $s->PageURL ."'>". $s->PageName ."</a>
            </li></ul>";
        }       
    }

    ?>
    </div>
</main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>