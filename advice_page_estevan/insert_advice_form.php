<?php
//use Model\{Database, Advice};
//require_once 'vendor/autoload.php';
use Webappdev\Knightsclub\models\{Database, Advice};
require_once '../vendor/autoload.php';

$subjectError = '';
$dateError = '';
$contentError = '';

    if(isset($_POST['submitAdvice'])){
        $subject = filter_input(INPUT_POST, 'subject');
        $date = filter_input(INPUT_POST, 'date');
        $content = filter_input(INPUT_POST, 'content');

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
            $db = Database::getDB();
            $a = new Advice();
            $a = $a->addAdvice($subject, $date, $content, $db);
            if($a){
                echo "Added Post Successfully";
            } else {
                echo "Failed in adding a Post";
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
    <title>Create Advice Page</title>
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

                    <div class="form-group">
                        <label class="control-label" for="subject">Subject</label>
                        <div class="controls">
                            <input id="contact-name" name="subject" placeholder="Subject" class="form-control requiredField Highlighted-label" type="text"value="<?= isset($subject) ? $subject : ''; ?>">
                            <span><?= isset($subjectError) ? $subjectError : ''; ?></span>
                            <!--<i class="fa fa-user"></i>-->
                        </div>
                    </div><!-- End subject input -->

                    <div class="form-group">
                        <label class="control-label" for="date">Date</label>
                        <div class=" controls">
                            <input id="contact-mail" name="date" max="<?= date('Y-m-d'); ?>" class="form-control requiredField Highlighted-label" type="date" value="<?= isset($date) ? $date : ''; ?>">
                            <span><?= isset($dateError) ? $dateError : ''; ?></span>
                            <!--<i class="fa fa-envelope"></i>-->
                        </div>
                    </div><!-- End date input -->
                    <div class="form-group">
                        <label class="control-label" for="content">Content</label>
                        <div class="controls">
                            <textarea id="contact-message" name="content" placeholder="Enter your advice" class="form-control requiredField Highlighted-label" rows="6"><?= isset($content) ? $content : ''; ?></textarea>
                            <span><?= isset($contentError) ? $contentError : ''; ?></span>
                            <!--<i class="fa fa-comment"></i>-->
                        </div>
                    </div><!-- End textarea -->
                    <p><button name="submitAdvice" type="submit" class="btn btn-info btn-block" data-error-message="Error!" data-sending-message="Submitting..." data-ok-message="Submitted Sent"><i class="fa fa-location-arrow"></i>Submit Advice</button></p>
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