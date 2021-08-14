<?php
//use Model\{Database, Advice};
//require_once 'vendor/autoload.php';
use Webappdev\Knightsclub\models\{Database, Advice};
require_once '../vendor/autoload.php';

$subject = "";
$date = "";
$content = "";

$subjectError = '';
$dateError = '';
$contentError = '';

if(isset($_POST['updateAdvice'])){
    $id = $_POST['id'];
    $db = Database::getDb();
    
    $a = new Advice();
    $advice = $a->getAdviceById($id, $db);

    $subject = $advice->subject;
    $date = $advice->date;
    $content = $advice->content;
}

if(isset($_POST['updAdvice'])){
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $content = $_POST['content'];

    if($subject == ""){
        $subjectError = "Please enter your Subject.";
    }

    if($date == ""){
        $dateError = "Please enter a date.";
    }

    // This does not appear with the other error messages
    if($content == ""){
        $contentError == "Empty Text";
    }

    if($subjectError == '' && $dateError == '' && $contentError == '') {
        $db = Database::getDb();
        $a = new Advice();
        $count = $a->updateAdvice($id, $subject, $date, $content, $db);

        if ($count) {
            header('Location: admin_advice_page.php');
        } else {
            echo "There was a problem with updating!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Update Advice Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <script type="text/javascript"> </script>
    <link rel="stylesheet" href="../css/style_template.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_advice_page.css">
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<div class="container bootstrap snippets bootdey">
    <section id="contact" class="gray-bg padding-top-bottom">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <form id="Highlighted-form" class="col-sm-6 col-sm-offset-3" action="#" method="post" novalidate="">
                <input type="hidden" name="id" value="<?= $id ?>" />
                    <div class="form-group">
                        <label class="control-label" for="subject">Subject</label>
                        <div class="controls">
                            <input id="contact-name" name="subject" placeholder="Subject" class="form-control requiredField Highlighted-label" type="text"value="<?= $subject; ?>">
                            <span><?= isset($subjectError) ? $subjectError : ''; ?></span>
                            <!--<i class="fa fa-user"></i>-->
                        </div>
                    </div><!-- End subject input -->

                    <div class="form-group">
                        <label class="control-label" for="date">Date</label>
                        <div class=" controls">
                            <input id="contact-mail" name="date" max="<?= date('Y-m-d'); ?>" class="form-control requiredField Highlighted-label" type="date" value="<?= $date ?>">
                            <span><?= isset($dateError) ? $dateError : ''; ?></span>
                            <!--<i class="fa fa-envelope"></i>-->
                        </div>
                    </div><!-- End date input -->
                    <div class="form-group">
                        <label class="control-label" for="content">Content</label>
                        <div class="controls">
                            <textarea id="contact-message" name="content" placeholder="Enter your advice" class="form-control requiredField Highlighted-label" rows="6"><?= $content ?></textarea>
                            <span><?= isset($contentError) ? $contentError : ''; ?></span>
                            <!--<i class="fa fa-comment"></i>-->
                        </div>
                    </div><!-- End textarea -->
                    <p><button name="updAdvice" type="submit" class="btn btn-info btn-block"><i class="fa fa-location-arrow"></i>Update Advice</button></p>
                    <!--<input type="hidden" name="submitted" id="submitted" value="true">-->
                </form><!-- End Highlighted-form -->
                <form id="Highlighted-form" class="col-sm-6 col-sm-offset-3" action="admin_advice_page.php" method="post" novalidate="">
                    <p><button name="cancel" type="submit" class="btn btn-info btn-block" ><i class="fa fa-location-arrow"></i>Cancel</button></p>
                </form>
            </div>
        </div>
    </section>
</div>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>

