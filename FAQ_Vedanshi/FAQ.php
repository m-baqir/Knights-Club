<?php
use Webappdev\Knightsclub\models\{Database,FAQ};
require_once '../vendor/autoload.php';

$dbcon = Database::getDb();
$f = new FAQ();
$FAQs = $f->getAllFAQs(Database::getDb());

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style_template.css" />
    <link rel="stylesheet" href="../css/FAQstyle.css">

    <title>FAQ</title>
</head>
<body>
</body>
<?php
    require_once ("../home_page/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">

            <!-- Tips Widget -->
            <!--===================================================-->
            <div class="mar-btm">
                <h4 class="text-thin"><i class="fa fa-lightbulb-o fa-lg fa-fw text-warning"></i> Common Topics</h4>
                <!-- <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>-->
                <div class="list-group bg-trans">
                    <a class="list-group-item" href="#"><span class="badge badge-purple badge-icon badge-fw pull-left"></span> General</a>
                    <a class="list-group-item" href="#"><span class="badge badge-info badge-icon badge-fw pull-left"></span> Account Setting</a>
                    <a class="list-group-item" href="#"><span class="badge badge-pink badge-icon badge-fw pull-left"></span> Privacy and Settings</a>
                </div>
            </div>
            <!--===================================================-->

            <hr>

            <!-- Contact us widget -->
            <!--===================================================-->
            <div class="mar-btm">
                <h4 class="text-thin"><i class="fa fa-question-circle fa-lg fa-fw text-primary"></i> Can't find the answer? </h4>

                <a href="../ContactUs_Vedanshi/ContactUs.php" class="btn btn-primary">Contact us</a>
            </div>
            <!--===================================================-->

        </div>
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-body">

                    <!-- Login and Password -->

                    <h3 class="pad-all bord-btm text-thin">General</h3>
                    <div id="demo-gen-faq" class="panel-group accordion">
                      <?php $c=1; foreach ($FAQs as $FAQ) {
                      if($FAQ->category == "General"){?>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-gen-faq<?= print $c; ?>" data-toggle="collapse" data-parent="#demo-gen-faq"><?= $FAQ->question; ?></a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-gen-faq<?= print $c; ?>" class="collapse in">
                                <div class="pad-all">
                                  <?= $FAQ->answer; ?>
                                </div>
                            </div>
                        </div>
                      <?php $c++; }}?>

                    </div>

                    <hr class="bord-no pad-all">

                  <h3 class="pad-all bord-btm text-thin">Account Setting</h3>
                  <div id="demo-acc-faq" class="panel-group accordion">
                    <?php $c=1; foreach ($FAQs as $FAQ) {
                      if($FAQ->category == "Account Setting"){?>
                        <div class="bord-no pad-top">

                          <!-- Question -->
                          <div class="text-semibold pad-hor text-lg">
                            <a href="#demo-acc-faq<?= print $c; ?>" data-toggle="collapse" data-parent="#demo-acc-faq"><?= $FAQ->question; ?></a>
                          </div>

                          <!-- Answer -->
                          <div id="demo-acc-faq<?= print $c; ?>" class="collapse in">
                            <div class="pad-all">
                              <?= $FAQ->answer; ?>
                            </div>
                          </div>
                        </div>
                        <?php $c++; }}?>

                  </div>

                  <hr class="bord-no pad-all">

                  <h3 class="pad-all bord-btm text-thin">Privacy and Settings</h3>
                  <div id="demo-pym-faq" class="panel-group accordion">
                    <?php $c=1; foreach ($FAQs as $FAQ) {
                      if($FAQ->category == "Privacy and Settings"){?>
                        <div class="bord-no pad-top">

                          <!-- Question -->
                          <div class="text-semibold pad-hor text-lg">
                            <a href="#demo-pym-faq<?= print $c; ?>" data-toggle="collapse" data-parent="#demo-pym-faq"><?= $FAQ->question; ?></a>
                          </div>

                          <!-- Answer -->
                          <div id="demo-pym-faq<?= print $c; ?>" class="collapse in">
                            <div class="pad-all">
                              <?= $FAQ->answer; ?>
                            </div>
                          </div>
                        </div>
                        <?php $c++; }}?>

                  </div>




                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once ("../home_page/footer.php");
?>
</body>
</html>