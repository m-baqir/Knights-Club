<?php
use Webappdev\Knightsclub\models\{Database,FAQ};
require_once '../vendor/autoload.php';
$question = $answer = $category = "";
//Just manually set values for session variables till login nd registration pages get ready
//$_SESSION['user_id'] = 1;
//$_SESSION['is_Admin'] = true;
if(isset($_SESSION['id']) && $_SESSION["isadmin"] == 1 ){
if (isset($_POST['updateFAQ'])) {
  $id = $_POST['id'];
  $db = Database::getDb();

  $f = new FAQ();
  $FAQ = $f->getFAQById($id, $db);

  $question = $FAQ->question;
  $answer = $FAQ->answer;
  $category = $FAQ->category;

}
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $answer = $_POST['answer'];
  $question = $_POST['question'];

  $category = $_POST['category'];

  $db = Database::getDb();
  $f = new FAQ();
  $con = $f->updateFAQ($id, $question, $answer, $category, $db);


  if ($con) {
    header('Location:  ListFAQ.php');
  } else {
    echo "Error in updating!!";
  }
}
}else{
  header('Location:  ../ahmed-login/login.php');
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
          <strong>FAQ</strong>
        </div>
        <div class="card-body card-block">
          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
              <div class="col col-md-3">
                <input type="hidden" name="id" value="<?= $id; ?>"/>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <label for="question" class=" form-control-label">Question</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="question" name="question" placeholder="Question" value="<?= $question; ?>"
                       class="form-control">
                <small class="form-text text-muted">Print Error</small>
              </div>
            </div>


            <div class="row form-group">
              <div class="col col-md-3">
                <label for="answer" class=" form-control-label">Answer</label>
              </div>
              <div class="col-12 col-md-9">
                        <textarea name="answer" id="answer" rows="9" placeholder="answer"
                                  class="form-control"><?= $answer; ?></textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                <label for="category" class=" form-control-label">category</label>
              </div>
              <div class="col-12 col-md-9">
                <select id="category" name="category" class="form-control">
                  <option value="<?= $category; ?>"><?= $category; ?></option>
                  <option value="Privacy and Settings">Privacy and Settings</option>
                  <option value="Account Setting">Account Setting</option>
                  <option value="General">General</option>
                </select>
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