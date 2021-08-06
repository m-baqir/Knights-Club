<?php
use Model\{Database, Advice};
require_once 'vendor/autoload.php';
// here we can list through the advice store in the db
$dbcon = Database::getDb();
$a = new Advice();
$advice = $a->getAllAdvice(Database::getDb());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Knights Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/42ed6d485e.js" crossorigin="anonymous"></script>
    <!--Style Sheet that it links too-->
    <link rel="stylesheet" href="./css/advice_page.css" />
    <!--Additional CSS for header and footer-->
    <link rel="stylesheet" href="../css/style_template.css" />
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<?php require_once('../home_page/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 left-side-sidebar">
            <div id="loginLocation">
                <p class="loginNotice">Signed in as: Estevan Cordero</p>
                <button class="generalButton">LOG OUT</button>
            </div>
            <div class="row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Having Some Problems? Need Some Advice?</h3>
                    <p class="body-text-3x">Check out the posts below!</p>
                    <div class="small-search-wrap">
                        <div class="search-form">
                            <form action="./insert_advice_form.php" method="post">
                                <div class="form-group">
                                    <input type="text" value="Search Bar" placeholder="Search something here" maxlength="100" class="form-control" name="name" id="name">
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="invisible small">
                </div>
                <div class="col-md-12">
                    <div class="v-heading-v2">
                        <h4 class="v-search-result-count">*Please note these are regular people not doctors*</h4>
                    </div>
                </div>
            </div>

            <div class="clearfix mt-40">
                <ul class="xsearch-items">
                    <?php foreach ($advice as $advice) { ?>
                    <li class="search-item">
                        <!--<div class="search-item-img">
                            Here is the image for the profile
                            <a href="#">
                                <img src="images/estevan.jpg" width="70" height="70">
                            </a>
                        </div>-->
                        <div class="search-item-content">
                            <!--Subject Line-->
                            <h3 class="search-item-caption"><?= $advice->subject; ?></a></h3>

                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <!--Date Line -->
                                    <li class="time"><?= $advice->date; ?></li>
                                </ul>
                            </div>
                            <!--Content of the post -->
                            <div class="content"><!--Made a class if you want to edit the messages. *Note its not in use*-->
                                <?= $advice->content; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </li>
                    <!--This is where it ends-->
                </ul>
            </div>
        </div>
    </div>
</div>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>