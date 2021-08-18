<?php
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\AboutUs;

require_once '../vendor/autoload.php';
session_start();
$isAdmin = false;
if (isset($_SESSION['isadmin']))
{
    $isAdmin = $_SESSION['isadmin'];
}

//Loading about us content
$aboutus = new AboutUs();
$dbConnection = Database::getDb();
$result = $aboutus->GetAboutUs($dbConnection);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>About us</title>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
    <div class="container">
        <?php
        if ($isAdmin){
            $buttonShowUp = '<div class="row">
            <a href="edit-create-aboutus.php';
            if ($result != false){
                $buttonShowUp .='?id='.$result->id;
            }
            $buttonShowUp.='" class="btn btn-primary">Edit/Create</a>
        </div>';
          echo $buttonShowUp;
    }
        ?>

        <div class="row justify-content-center">
            <h1>Meet our team</h1>
            <p>
                <?php
                if($result != false){
                    echo $result->aboutus_content;
                }
                ?>
            </p>
        </div>
    </div>

</main>
<?php require_once('../home_page/footer.php'); ?>

</body>
</html>
