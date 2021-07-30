<?php
require_once '../ContactUs_Vedanshi/database.php';
require_once 'models/Form.php';
$user_id = $subject = $content = $date = "";

if (isset($_POST['updateForm'])) {
  $id = $_POST['id'];
  $db = Database::getDb();

  $f = new Form();
  $form = $f->getFormById($id, $db);

  $user_id = $form->user_id;
  $subject = $form->subject;
  $content = $form->content;
  $date = $form->date;

}
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $content = $_POST['message'];
  $subject = $_POST['subject'];
  $user_id = $_POST['userid'];
  $date = $_POST['date'];

  $db = Database::getDb();
  $f = new Form();
  $con = $f->updateForm($id, $user_id, $subject, $content, $date, $db);


  if ($con) {
    header('Location:  AdminContactUs.php');
  } else {
    echo "Error in updating!!";
  }
}

require_once 'header.php'
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
                <input type="hidden" name="id" value="<?= $id; ?>"/>
                <label for="userid" class=" form-control-label">User Id</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="userid" name="userid" placeholder="User Id" value="<?= $user_id; ?>"
                       class="form-control">
                <small class="form-text text-muted">Print Error</small>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="subject" class=" form-control-label">Subject</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="subject" name="subject" placeholder="Subject" value="<?= $subject; ?>"
                       class="form-control">
                <small class="form-text text-muted">Print Error</small>
              </div>
            </div>


            <div class="row form-group">
              <div class="col col-md-3">
                <label for="message" class=" form-control-label">Message</label>
              </div>
              <div class="col-12 col-md-9">
                        <textarea name="message" id="message" rows="9" placeholder="Message"
                                  class="form-control"><?= $content; ?></textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                <label for="date" class=" form-control-label">Date</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="date" name="date" value="<?= $date; ?>" placeholder="Date"
                       class="form-control">
                <small class="form-text text-muted">Print Error</small>
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