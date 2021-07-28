<?php
require_once '../ContactUs_Vedanshi/database.php';
require_once 'models/Form.php';

if (isset($_POST['submit'])) {
  $content = $_POST['message'];
  $subject = $_POST['subject'];
  $user_id = $_POST['userid'];
  if ($content == "" || $subject == "" || $user_id == "") {
    if ($content == "") {
      $messageerr = "please enter message";
    } else {
      $messageerr = "Valid Message";
    }
    if ($subject == "") {
      $subjecterr = "please enter your Subject";
    } else {
      $subjecterr = "Valid Subject";
    }
    if ($user_id == "") {
      $user_iderr = "please enter user ID";
    } else {
      $user_iderr = "Valid user ID";
    }
  } else {
    $date = date("Y-m-d");
    $db = Database::getDb();
    $f = new Form();
    $con = $f->addForm($user_id, $subject, $content, $date, $db);
    if ($con) {
      header('Location:  AdminContactUs.php');
    } else {
      echo "Error!!";
    }

  }

}
require_once 'header.php';
?>


  <!-- MAIN CONTENT-->
  <div class="main-content">
  <div class="section__content section__content--p30">
  <div class="container-fluid">

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong>Contact Us</strong>
        </div>
        <div class="card-body card-block">
          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
              <!-- I'll check user_id is exist or not ltr-->
              <div class="col col-md-3">
                <label for="userid" class=" form-control-label">User Id</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="userid" name="userid" value="<?= isset($user_id) ? $user_id : ''; ?>"
                       placeholder="User Id" class="form-control">
                <small class="form-text text-muted"><?= isset($user_iderr) ? $user_iderr : ''; ?></small>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="subject" class=" form-control-label">Subject</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="subject" name="subject" placeholder="Subject"
                       value="<?= isset($subject) ? $subject : ''; ?>" class="form-control">
                <small class="form-text text-muted"><?= isset($subjecterr) ? $subjecterr : ''; ?></small>
              </div>
            </div>


            <div class="row form-group">
              <div class="col col-md-3">
                <label for="message" class=" form-control-label">Message</label>
              </div>
              <div class="col-12 col-md-9">
                <textarea name="message" id="message" rows="9" placeholder="Message" class="form-control"></textarea>
                <small class="form-text text-muted"><?= isset($messageerr) ? $messageerr : ''; ?></small>
              </div>
            </div>


            <div class="card-footer">
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
              </button>
              <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
              </button>
            </div>
        </div>

      </div>
    </div>

  </div>
<?php require_once 'footer.php' ?>