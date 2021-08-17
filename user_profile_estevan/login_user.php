<?php
session_start();
use Webappdev\Knightsclub\models\{Database,rss,UserWall};
$simpleresult = '';
require_once '../vendor/autoload.php';
//Just manually set values for session variables till login nd registration pages get ready
var_dump($_SESSION);
$user_id = 0;
if(isset($_SESSION['id']) ){
    //Only set $user_id if $_SESSION['id'] exists that means a particular user logged in.
    $user_id = $_SESSION['id'];
  $dbcon = Database::getDb();
  $p = new UserWall();
  $data = $p->getAllPostDataforProfile( $user_id, $dbcon);
  if (isset($_POST['postdata'])) {
    $date = date("Y-m-d h:i:s");
    $content = $_POST['userwall'];
    $subject = 'Knight_club Post';

    $db = Database::getDb();
    $p = new UserWall();
    $con = $p->addPostData($user_id, $subject, $content, $date, $db);
    if ($con) {
      header('Location:  login_user.php');
    } else {
      echo "<script>alert('Something went wrong!!');</script>";
    }
  }
  if (isset($_POST['delPost'])) {
    $pid= $_POST['id'];
    //var_dump($_POST);
    $db = Database::getDb();
    $pd = new UserWall();
    $cn = $pd->deletePostData($pid, $db);
    if ($cn) {
      echo "<script>alert('Post Deleted!!');</script>";
    } else {
      echo "<script>alert('Something went wrong!!');</script>";
    }
  }
}else{
  header('Location:  ../ahmed-login/login.php');
}
//include './getsub.php';
$options='';
$db = Database::getDb();
$b = new rss();
//using example id for now
$allrss = $b->getallrss($user_id,$db);
//var_dump($allrss);
foreach ($allrss as $r){
    $options .= '<option value="'.$r->title.'">'.$r->title.'</option>';
}
//var_dump($simpleresult);
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
  <script src="https://cdn.tiny.cloud/1/phk6ief1j9wyyt254p32j41op0z1tstak9t3iimk5uqtee9l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
      tinymce.init({
          selector: '#userwall',
          plugins: 'image media',
          toolbar: 'undo redo | image media',
          menubar: false,
          file_picker_types: 'file image media',
          image_dimensions: false,
          automatic_uploads: true,
          media_live_embeds: true,
          width: "600",
          height: "200",
          editor_selector: "test",
          // without images_upload_url set, Upload tab won't show up
          images_upload_url: 'upload.php',

          file_picker_callback: function (cb, value, meta) {
              var input = document.createElement('input');
              input.setAttribute('type', 'file');
              input.setAttribute('name', 'usrfile');
              input.setAttribute('id', 'usrfile');
              input.setAttribute('accept', 'image/* audio/* video/*');
              console.log(input);
              /*
                Note: In modern browsers input[type="file"] is functional without
                even adding it to the DOM, but that might not be the case in some older
                or quirky browsers like IE, so you might want to add it to the DOM
                just in case, and visually hide it. And do not forget do remove it
                once you do not need it anymore.
              */

              input.onchange = function () {

                  var file = this.files[0];
                  //this.file["size"] = 30;
                  console.log(file);
                  console.log(file["name"]);
                  console.log(file["size"]);
                  var reader = new FileReader();
                  console.log(reader);
                  reader.onload = function () {
                      /*
                        Note: Now we need to register the blob in TinyMCEs image blob
                        registry. In the next release this part hopefully won't be
                        necessary, as we are looking to handle it internally.
                      */
                      var id = 'blobid' + (new Date()).getTime();
                      var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                      console.log(blobCache);
                      var base64 = reader.result.split(',')[1];
                      //console.log(base64);
                      var blobInfo = blobCache.create(id, file, base64);
                      console.log(blobInfo);
                      blobCache.add(blobInfo);

                      /* call the callback and populate the Title field with the file name */
                      cb(blobInfo.blobUri(), { title: file.name });
                  };
                  reader.readAsDataURL(file);
              };

              input.click();
          },

          // override default upload handler to simulate successful upload
          images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;

              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', 'upload.php');

              xhr.onload = function() {
                  var json;

                  if (xhr.status != 200) {
                      failure('HTTP Error: ' + xhr.status);
                      return;
                  }

                  json = JSON.parse(xhr.responseText);

                  if (!json || typeof json.location != 'string') {
                      failure('Invalid JSON: ' + xhr.responseText);
                      return;
                  }

                  success(json.location);
              };

              formData = new FormData();
              formData.append('file', blobInfo.blob(), blobInfo.filename());

              xhr.send(formData);
          },

          content_style: 'img {max-width: 50%;}'
      });
  </script>
  <style>
      p img{
          width: 100% !important;
          height: 50% !important;
      }
  </style>
</head>
<body>
  <?php require_once('../home_page/header.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                  <img src="images/estevan.jpg" alt="profile" class="img-lg rounded-circle mb-3">
                  <div class="mb-3">
                    <h3>Estevan Cordero</h3>
                    <div class="d-flex align-items-center justify-content-center">
                      <h5 class="mb-0 mr-2 text-muted">Canada</h5>
                      <div class="br-wrapper br-theme-css-stars"><select id="profile-rating" name="rating"
                          autocomplete="off" style="display: none;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1"
                            class="br-selected br-current"></a><a href="#" data-rating-value="2"
                            data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a
                            href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5"
                            data-rating-text="5"></a></div>
                      </div>
                    </div>
                  </div>
                  <p class="w-75 mx-auto mb-3">Single, and sad owner of more then hundreds of videos games </p>
                </div>
                <div class="border-bottom py-4">
                  <p>Hobbies and Interest</p>
                  <div>
                    <label class="badge badge-outline-dark">Video Games</label>
                    <label class="badge badge-outline-dark">Coding</label>
                    <label class="badge badge-outline-dark">Working on this f**king profile</label>
                  </div>
                </div>
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      Status
                    </span>
                    <span class="float-right text-muted">
                      Active
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Phone
                    </span>
                    <span class="float-right text-muted">
                      006 3435 22
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Mail
                    </span>
                    <span class="float-right text-muted">
                      estevan@testmail.com
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Facebook
                    </span>
                    <span class="float-right text-muted">
                      <a href="#" class="facebook-link">Estevan Cordero</a>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Twitter
                    </span>
                    <span class="float-right text-muted">
                      <a href="#" class="twitter-link">@estevancordero</a>
                    </span>
                    <span class="float-left">
                      <!--!unable to find.a service to host rss feed for it to go live as it seems rss have become outdated and not many websites are supporting it-->
                      <!--TODO: find a service to host rss.xml, I am leaving the rss button link as is for now Signed:MB-->
                        <script>
                        //document.getElementById("rssimg").onclick = function(){showsubs()};
                        function showsubs(str){
                            console.log('this is working');
                            if (str=="") {
                                document.getElementById("displaybox").innerHTML="";
                                return;
                            }
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function() {
                                if (this.readyState===4 && this.status===200) {
                                    document.getElementById("displaybox").innerHTML=this.responseText;
                                }
                            }
                            xmlhttp.open("GET","getsub.php?q="+str,true);
                            xmlhttp.send();
                        }
                    </script>
                    <div id="rssbox">
                        <img id="rssimg" alt="Subscribe to What's New" src="https://i.imgur.com/fZIDSoj.png" width="50" height="50">
                        <form>
                            <select name="subs" onchange="showsubs(this.value)">
                                <option value="">Select your subscription</option>
                                <?php print $options; ?>
                            </select>
                        </form>
                        <div id="displaybox">

                        </div>
                    </div>
                    </span>
                  </p>
                </div>
              </div>
              <div class="col-lg-8">
                <p class="loginNotice">Signed in as: Estevan Cordero</p>
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
                  </ul>
                </div>
                <div class="profile-feed">
                  <div class="d-flex align-items-start profile-feed-item">
                    <div class="ml-4">
                      <h6>
                        <label for="profile-message">What's on your mind?</label>
                      </h6>
                      <p>
                      <form enctype="multipart/form-data" method="POST">


                        <textarea id="userwall" name="userwall" class="test" cols="40" rows="20" placeholder="Post" rows="4" style="width: 100%;"></textarea>
                        <div class="post-options">
                          <button type="submit" name="postdata" class="btn btn-outline-secondary float-right" style="margin-top: 20px;">Post</button>
                        </div>
                      </form>
                      </p>


                    </div>
                  </div>
                  <?php foreach ($data as $postdata) { ?>
                  <div class="d-flex align-items-start profile-feed-item">
                    <img src="images/estevan.jpg" alt="profile" class="img-sm rounded-circle">
                    <div class="ml-4">
                      <h6>
                        <?php echo $postdata->username; ?>
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i><?php echo $postdata->date; ?></small>
                        <span class="float-right">
                             <form method="POST">
                                <input type="hidden" name="id" value="<?= $postdata->id; ?>"/>
                                <button type="submit" class="item" name="delPost" style="border: none; background: none;"
                                        title="Delete">
                                  <i class="fa fa-trash-o"></i>
                                </button>
                             </form>
                        </span>
                      </h6>
                      <p>
                        <?php echo $postdata->content; ?>
                      </p>

                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
