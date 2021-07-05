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
                    <a class="list-group-item" href="#"><span class="badge badge-purple badge-icon badge-fw pull-left"></span> Login and Password</a>
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
                    <!--===================================================-->
                    <h3 class="pad-all bord-btm text-thin">Login and Password</h3>
                    <div id="demo-gen-faq" class="panel-group accordion">
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-gen-faq1" data-toggle="collapse" data-parent="#demo-gen-faq">How do I change or reset my password?</a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-gen-faq1" class="collapse in">
                                <div class="pad-all">
                                    To change your password if you're already logged in:
                                    <li>Select Settings & Privacy, then click Settings.</li>
                                    <li>Click Security and Login.</li>
                                    <li>Click Edit next to Change password.</li>
                                    <li>Enter your current password and new password.</li>
                                    <li>Click Save Changes.</li>
                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-gen-faq2" data-toggle="collapse" data-parent="#demo-gen-faq"></a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-gen-faq2" class="collapse in">
                                <div class="pad-all">
                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-gen-faq3" data-toggle="collapse" data-parent="#demo-gen-faq"></a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-gen-faq3" class="collapse">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-gen-faq4" data-toggle="collapse" data-parent="#demo-gen-faq"></a>
                            </div>


                            <!-- Answer -->
                            <div id="demo-gen-faq4" class="collapse">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->

                    <hr class="bord-no pad-all">

                    <!-- ACCOUNT SETTING -->
                    <!--===================================================-->
                    <h3 class="pad-all bord-btm text-thin">Account Setting</h3>
                    <div id="demo-acc-faq" class="panel-group accordion">
                        <div class="panel panel-trans pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-acc-faq1" data-toggle="collapse" data-parent="#demo-acc-faq">What should I do if I don’t want search engines to link to my profile?</a>
                            </div>


                            <!-- Answer -->
                            <div id="demo-acc-faq1" class="collapse in">
                                <div class="pad-all">
                                    If you don’t want search engines outside of this website to link directly to your profile, you can adjust this setting from your privacy settings.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-trans pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-acc-faq2" data-toggle="collapse" data-parent="#demo-acc-faq">How can I adjust my privacy settings?</a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-acc-faq2" class="collapse">
                                <div class="pad-all">
                                    You can view and adjust your privacy settings at any time. To view and adjust your privacy settings:
                                    <li>Click drop-down in the top right of the setting page.</li>
                                    <li>Select Settings & Privacy, then click Settings.</li>
                                    <li>Click Privacy in the left column.</li>

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-trans pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-acc-faq3" data-toggle="collapse" data-parent="#demo-acc-faq"></a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-acc-faq3" class="collapse">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->

                    <hr class="bord-no pad-all">

                    <!-- Privacy and Settings -->
                    <!--===================================================-->
                    <h3 class="pad-all bord-btm text-thin">Privacy and Settings</h3>
                    <div id="demo-pym-faq" class="panel-group accordion">
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-pym-faq1" data-toggle="collapse" data-parent="#demo-pym-faq">How can I adjust my privacy settings?</a>
                            </div>


                            <!-- Answer -->
                            <div id="demo-pym-faq1" class="collapse in">
                                <div class="pad-all">
                                    You can view and adjust your privacy settings at any time. To view and adjust your privacy settings:
                                    <li>Click account in the top right.</li>
                                    <li>Select Settings & Privacy, then click Settings.</li>
                                    <li>Click Privacy in the left column.</li>
                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-pym-faq2" data-toggle="collapse" data-parent="#demo-pym-faq"></a>
                            </div>

                            <!-- Answer -->
                            <div id="demo-pym-faq2" class="collapse in">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-pym-faq3" data-toggle="collapse" data-parent="#demo-pym-faq"></a>
                            </div>


                            <!-- Answer -->
                            <div id="demo-pym-faq3" class="collapse in">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
                        <div class="bord-no pad-top">

                            <!-- Question -->
                            <div class="text-semibold pad-hor text-lg">
                                <a href="#demo-pym-faq4" data-toggle="collapse" data-parent="#demo-pym-faq"></a>
                            </div>


                            <!-- Answer -->
                            <div id="demo-pym-faq4" class="collapse in">
                                <div class="pad-all">

                                </div>
                            </div>
                        </div>
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