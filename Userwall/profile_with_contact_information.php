<?php
require_once '../ContactUs_Vedanshi/database.php';
require_once '../Admin/models/UserWall.php';

if (isset($_POST['postdata'])) {
  var_dump($_POST);
  $date = date("Y-m-d");
  $content = $_POST['userwall'];
  //$subject = $_POST['subject'];
  $subject = 'Knight_club Post';
  //$user_id = $_SESSION['userid'];
  $user_id = 1;

    $db = Database::getDb();
    $p = new PostData();
    $con = $p->addPostData($user_id, $subject, $content, $date, $db);
    if ($con) {
      header('Location:  profile_with_contact_information.php');
    } else {
      echo "Error!!";
    }
}
$dbcon = Database::getDb();
$p = new PostData();
//$uid= $_SESSION['user_id'];
$uid=1;
$data = $p->getAllPostDataforProfile( $uid, $dbcon);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with contact information - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/phk6ief1j9wyyt254p32j41op0z1tstak9t3iimk5uqtee9l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
          selector: '#userwall',  // change this value according to your HTML
          plugins: 'image media',
          toolbar: 'undo redo | image media',
          menubar: false,
          file_picker_types: 'file image media',
          image_dimensions: false,
          automatic_uploads: true,
          media_live_embeds: true,
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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container">
<div class="page-inner no-page-title">
    <!-- start page main wrapper -->
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-5 col-xl-3">
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">User Profile</h4>
                    </div>
                    <div class="card-body user-profile-card mb-3">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="user-profile-image rounded-circle" alt="" />
                        <h4 class="text-center h6 mt-2">Lois Anderson</h4>
                        <p class="text-center small">UI/UX Designer</p>
                        <button class="btn btn-theme btn-sm">Follow</button>
                        <button class="btn btn-theme btn-sm">Message</button>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">User Profile</h4>
                    </div>
                    <div class="card-body mb-3">
                        <a href="#" class="label label-success mb-2">HTML</a>
                        <a href="#" class="label label-success mb-2">CSS</a>
                        <a href="#" class="label label-success mb-2">Sass</a>
                        <a href="#" class="label label-success mb-2">Bootstrap</a>
                        <a href="#" class="label label-success mb-2">Javascript</a>
                        <a href="#" class="label label-success mb-2">Photoshop</a>
                        <a href="#" class="label label-success">UI</a>
                        <a href="#" class="label label-success">UX</a>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">About</h4>
                    </div>
                    <div class="card-body mb-3">
                        <p class="mb-0">Lorem ipsum dolor sitelt amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt utitily labore et dolore magna aliqua metavta.</p>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">Contact Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                    <tr>
                                        <th scope="row">Email:</th>
                                        <td>addyour@emailhere</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone:</th>
                                        <td>(+44) 123 456 789</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address:</th>
                                        <td>74 Guild Street 542B, Great North Town MT.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-6">
                <div class="card card-white grid-margin">
                  <form enctype="multipart/form-data" method="POST">
                    <div class="card-body">
                        <div class="post">
                            <textarea id="userwall" name="userwall" class="form-control" placeholder="Post" rows="4"></textarea>
                            <div class="post-options">

                                <button type="submit" name="postdata" class="btn btn-outline-primary float-right">Post</button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
                <div class="profile-timeline">
                    <ul class="list-unstyled">
                      <?php foreach ($data as $postdata) { ?>
                        <li class="timeline-item">
                            <div class="card card-white grid-margin">
                                <div class="card-body">
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>Vikash smith <span>posted a status</span></p>
                                        <small><?php echo $postdata->date; ?></small>
                                    </div>
                                    <div class="timeline-item-post">
                                        <p class="postedimg"><?php echo $postdata->content; ?></p>
                                        <div class="timeline-options">
                                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                                            <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                                            <a href="#"><i class="fa fa-share"></i> Share (6)</a>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Jamara Karle <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Xullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Lois Anderson <small>3 hours ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Coluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>

                      <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 col-xl-3">
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Suggestions</h4>
                    </div>
                    <div class="card-body">
                        <div class="team">
                            <div class="team-member">
                                <div class="online on"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                            <div class="team-member">
                                <div class="online on"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                            <div class="team-member">
                                <div class="online off"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Some Info</h4>
                    </div>
                    <div class="card-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis architecto.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- end page main wrapper -->
    <div class="page-footer">
        <p>Copyright © 2020 Evince All rights reserved.</p>
    </div>
</div>
</div>


<style type="text/css">
body {
    background:#eee;
    margin-top: 20px;
}
.page-inner.no-page-title {
    padding-top: 30px;
}
.page-inner {
    position: relative;
    min-height: calc(100% - 56px);
    padding: 20px 30px 40px 30px;
    background: #f3f4f7;
}
.card.card-white {
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0.05rem 0.01rem rgba(75, 75, 90, 0.075);
    padding: 25px;
}
.grid-margin {
    margin-bottom: 2rem;
}
.profile-timeline ul li .timeline-item-header {
    width: 100%;
    overflow: hidden;
}
.profile-timeline ul li .timeline-item-header img {
    width: 40px;
    height: 40px;
    float: left;
    margin-right: 10px;
    border-radius: 50%;
}
.profile-timeline ul li .timeline-item-header p {
    margin: 0;
    color: #000;
    font-weight: 500;
}
.profile-timeline ul li .timeline-item-header p span {
    margin: 0;
    color: #8e8e8e;
    font-weight: normal;
}
.profile-timeline ul li .timeline-item-header small {
    margin: 0;
    color: #8e8e8e;
}
.profile-timeline ul li .timeline-item-post {
    padding: 20px 0 0 0;
    position: relative;
}
.profile-timeline ul li .timeline-item-post > img {
    width: 100%;
}
.timeline-options {
    overflow: hidden;
    margin-top: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f1f1f1;
    padding: 10px 0 10px 0;
}
.timeline-options a {
    display: block;
    margin-right: 20px;
    float: left;
    color: #2b2b2b;
    text-decoration: none;
}
.timeline-options a i {
    margin-right: 3px;
}
.timeline-options a:hover {
    color: #5369f8;
}
.timeline-comment {
    overflow: hidden;
    margin-bottom: 10px;
    width: 100%;
    border-bottom: 1px solid #f1f1f1;
    padding-bottom: 5px;
}
.timeline-comment .timeline-comment-header {
    overflow: hidden;
}
.timeline-comment .timeline-comment-header img {
    width: 30px;
    border-radius: 50%;
    float: left;
    margin-right: 10px;
}
.timeline-comment .timeline-comment-header p {
    color: #000;
    float: left;
    margin: 0;
    font-weight: 500;
}
.timeline-comment .timeline-comment-header small {
    font-weight: normal;
    color: #8e8e8e;
}
.timeline-comment p.timeline-comment-text {
    display: block;
    color: #2b2b2b;
    font-size: 14px;
    padding-left: 40px;
}
.post-options {
    overflow: hidden;
    margin-top: 15px;
    margin-left: 15px;
}
.post-options a {
    display: block;
    margin-top: 5px;
    margin-right: 20px;
    float: left;
    color: #2b2b2b;
    text-decoration: none;
    font-size: 16px !important;
}
.post-options a:hover {
    color: #5369f8;
}
.online {
    position: absolute;
    top: 2px;
    right: 2px;
    display: block;
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #ccc;
}
.online.on {
    background: #2ec5d3;
}
.online.off {
    background: #ec5e69;
}
#cd-timeline::before {
    border: 0;
    background: #f1f1f1;
}
.cd-timeline-content p,
.cd-timeline-content .cd-read-more,
.cd-timeline-content .cd-date {
    font-size: 14px;
}
.cd-timeline-img.cd-success {
    background: #2ec5d3;
}
.cd-timeline-img.cd-danger {
    background: #ec5e69;
}
.cd-timeline-img.cd-info {
    background: #5893df;
}
.cd-timeline-img.cd-warning {
    background: #f1c205;
}
.cd-timeline-img.cd-primary {
    background: #9f7ce1;
}
.page-inner.full-page {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.user-profile-card {
    text-align: center;
}
.user-profile-image {
    width: 100px;
    height: 100px;
    margin-bottom: 10px;
}
.team .team-member {
    display: block;
    overflow: hidden;
    margin-bottom: 10px;
    float: left;
    position: relative;
}
.team .team-member .online {
    top: 5px;
    right: 5px;
}
.team .team-member img {
    width: 40px;
    float: left;
    border-radius: 50%;
    margin: 0 5px 0 5px;
}
.label.label-success {
    background: #43d39e;
}
.label {
    font-weight: 400;
    padding: 4px 8px;
    font-size: 11px;
    display: inline-block;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>