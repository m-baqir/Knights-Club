<?php
// link to the user table and read off all information
// it reads off one user profile
// once a user logins use a session vars and catch session id and compare that to the user table 
// using session_start();
// session_start();
//session_start();
//$user_id= $_SESSION[user_id];
//session_start();
session_start();
use Webappdev\Knightsclub\models\{Database,rss, User};
require_once '../vendor/autoload.php';
//as an example using userid 1
$userid = $_SESSION["userid"] = 13;
//rss code below
$db = Database::getDb();
$r = new rss();
$allrss = $r->getallrss($userid,$db);
$title= $allrss->title;
// as of now the user id is set to 2 which is estevans user information
$id = 2;

$db = Database::getDb();
$u = new User();
$user = $u->getUserById($id, $db);

// checks if the session id matches to a user id in the user table
//if($_SESSION["id"] == $user->id ){
if($user->id == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Knight's Club</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/42ed6d485e.js" crossorigin="anonymous"></script>
  <!--Style Sheet that it links too-->
  <link rel="stylesheet" href="./css/user_profile.css" />
  <link rel="stylesheet" href="../css/style_template.css" />
  <link rel="alternate" type="application/rss+xml" title="Subscribe to What's New" href="./rss.xml" />
</head>
<body>
  <?php require_once('../home_page/header.php'); ?>
  <div class="container">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                  <img src="images/estevan.jpg" alt="profile" class="img-lg rounded-circle mb-3">
                  <div class="mb-3">
                    <h3><?= $user->first_name; ?> <?=$user->last_name; ?></h3>
                    <div class="d-flex align-items-center justify-content-center">
                      <h5 class="mb-0 mr-2 text-muted"><?= $user->country; ?></h5>
                    </div>
                  </div>
                  <p class="w-75 mx-auto mb-3"><?= $user->bio; ?></p>
                </div>
                <div class="border-bottom py-4">
                  <p>Hobbies and Interest</p>
                  <div>
                    <label class="badge badge-outline-dark">Video Games</label>
                    <label class="badge badge-outline-dark">Coding</label>
                    <label class="badge badge-outline-dark">Working on this f**king profile</label>
                  </div>
                </div>
                <div class="border-bottom py-4">
                  <p><h6>Member Since:</h6>  <?= $user->date_of_signup; ?></p>
                  <p><h6>Age:</h6>  <?= $user->age; ?></p>
                  <p><h6>Education:</h6>  <?= $user->education; ?></p>
                  <p><h6>Workplace:</h6>  <?= $user->workplace; ?></p>
                  <p><h6>Subscription:</h6>  <?php if($user->subscription_type == null) { print 'None'; } else { $user->subscription_type; } ?></p>
                </div>
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      Status
                    </span>
                    <span class="float-right text-muted">
                      <?= $user->user_status; ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Phone
                    </span>
                    <span class="float-right text-muted">
                      <?= $user->phone_number; ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Mail
                    </span>
                    <span class="float-right text-muted">
                      <?= $user->email; ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Facebook
                    </span>
                    <span class="float-right text-muted">
                      <a href="#" class="facebook-link">
                        <?php if($user->link_to_facebook == null) {
                            print '<p>'. 'No Account' . '</p>';
                          } else {
                          $user->link_to_facebook; 
                        }?>
                      </a>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Twitter
                    </span>
                    <span class="float-right text-muted">
                      <a href="#" class="twitter-link">
                        <?php if($user->link_to_twitter == null) {
                          print '<p>'. 'No Account' . '</p>';
                        } else {
                        $user->link_to_twitter;
                        }?>
                      </a>
                    </span>
                    <span class="float-left">
                      <!--!unable to find.a service to host rss feed for it to go live as it seems rss have become outdated and not many websites are supporting it-->
                      <!--TODO: find a service to host rss.xml, I am leaving the rss button link as is for now Signed:MB-->
                      <button id="rssimg"> <img alt="Subscribe to What's New"
                          src="https://i.imgur.com/fZIDSoj.png" width="50" height="50"></button>
                    <div id="xmldisplay">
                        <form>
                            <select name="subs" onchange="rssoutput(this.value)">
                                <option value=""></option>
                                <option value="1"><?=$title?></option>
                            </select>
                        </form>
                    </div>
                    </span>
                  </p>
                    <!--<script>
                        document.getElementById("rssimg").onclick = function(){rssoutput()};
                        function rssoutput(){
                            var xml =new XMLHttpRequest();
                            xml.onload = function () {
                                console.log(xml.responseXML.documentElement.nodeName);
                            }
                            xml.onerror = function (){
                                console.log('error while getting xml');
                            }
                            xml.open("GET","rss.xml");
                            xml.responseType="document";
                            xml.send();

                        }
                    </script>-->
                </div>
              </div>
              <div class="col-lg-8">
                <p class="loginNotice">Signed in as: <?= $user->first_name; ?> <?= $user->last_name ?></p>
                <button class="buttonLook">LOG OUT</button>
                <div class="mt-4 py-2 border-top border-bottom">
                  <ul class="nav profile-navbar">
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class="mdi mdi-account-outline"></i>
                        Info
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <i class="mdi mdi-newspaper"></i>
                        Post
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class="mdi mdi-calendar"></i>
                        Gallery
                      </a>
                    </li>
                    <!--Form to redirect to update profile -->
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <i class="mdi mdi-calendar"></i>
                        <form action="./update_profile_form.php" method="post">
                                <input type="hidden" name="id" value="<?= $user->id; ?>" />
                                <input type="submit" name="updateProfile" value="Update Profile" />
                        </form>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="profile-feed">
                  <div class="d-flex align-items-start profile-feed-item">
                    <div class="ml-4">
                      <h6>
                        <label for="profile-message">What's on your mind?</label>
                      </h6>
                      <p>
                        <textarea class="profile-input" name="profile-input">
                          </textarea>
                      </p>
                      <button class="buttonLook">Upload an Image</button>
                    </div>
                  </div>
                  <div class="d-flex align-items-start profile-feed-item">
                    <img src="images/estevan.jpg" alt="profile" class="img-sm rounded-circle">
                    <div class="ml-4">
                      <h6>
                        Estevan Cordero
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                      </h6>
                      <p>
                        Why was I given this job. Oh boy, I hope my team like this.
                        Btw should we inlcuded images with text post, or would that be to much work.
                      </p>
                      <p class="small text-muted mt-2 mb-0">
                        <span>
                          <i class="mdi mdi-star mr-1"></i>4
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-comment mr-1"></i>11
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-reply"></i>
                        </span>
                      </p>
                    </div>
                  </div>
                  <div class="d-flex align-items-start profile-feed-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile"
                      class="img-sm rounded-circle">
                    <div class="ml-4">
                      <h6>
                        Willie Stanley
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                      </h6>
                      <img src="images/estevan.jpg" alt="sample" class="rounded mw-100">
                      <p class="small text-muted mt-2 mb-0">
                        <span>
                          <i class="mdi mdi-star mr-1"></i>4
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-comment mr-1"></i>11
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-reply"></i>
                        </span>
                      </p>
                    </div>
                  </div>
                  <div class="d-flex align-items-start profile-feed-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="profile"
                      class="img-sm rounded-circle">
                    <div class="ml-4">
                      <h6>
                        Dylan Silva
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                      </h6>
                      <p>
                        This guy is the best of the field, and works great with any one hire him now.
                      </p>
                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="sample" class="rounded mw-100">
                      <p class="small text-muted mt-2 mb-0">
                        <span>
                          <i class="mdi mdi-star mr-1"></i>4
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-comment mr-1"></i>11
                        </span>
                        <span class="ml-2">
                          <i class="mdi mdi-reply"></i>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
  <?php require_once('../home_page/footer.php'); ?>
  <!--<footer id="copyRight">
    *need to figure out what we are going to include in the footer
    <a href="#">Sitemap |</a>
    <a href="#">Policy</a>
    <p class="copyRightLogo"><i class="far fa-copyright"></i> this is the footer</p>
  </footer>-->
</body>

</html>
