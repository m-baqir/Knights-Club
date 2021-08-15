<?php
use Webappdev\Knightsclub\models\{Database,FAQ};
require_once '../vendor/autoload.php';
//Just manually set values for session variables till login nd registration pages get ready
$_SESSION['user_id'] = 1;
$_SESSION['is_Admin'] = true;
if(isset($_SESSION['user_id']) && $_SESSION["is_Admin"] == true ){
if (isset($_POST['submit'])) {
  $answer = $_POST['answer'];
  $question = $_POST['question'];
  $category = $_POST['category'];
  if ($answer == "" || $question == "" || category == "") {
    if ($answer == "") {
      $answererr = "please enter answer";
    } else {
      $answererr = "Valid answer";
    }
    if ($question == "") {
      $questionerr = "please enter your question";
    } else {
      $questionerr = "Valid question";
    }
    if ($category == "") {
      $categoryerr = "please enter user ID";
    } else {
      $categoryerr = "Valid user ID";
    }
  } else {
    $db = Database::getDb();
    $f = new FAQ();
    $con = $f->addFAQ($question, $answer, $category, $db);
    if ($con) {
      header('Location:  ListFAQ.php');
    } else {
      echo "Error!!";
    }

  }

}
}else{
  header('Location:  ../ahmed-login/login.php');
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
          <strong>FAQ</strong>
        </div>
        <div class="card-body card-block">
          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="row form-group">
              <div class="col col-md-3">
                <label for="question" class=" form-control-label">Question</label>
              </div>
              <div class="col-12 col-md-9">
                <input type="text" id="question" name="question" placeholder="question"
                       value="<?= isset($question) ? $question : ''; ?>" class="form-control">
                <small class="form-text text-muted"><?= isset($questionerr) ? $questionerr : ''; ?></small>
              </div>
            </div>


            <div class="row form-group">
              <div class="col col-md-3">
                <label for="answer" class=" form-control-label">Answer</label>
              </div>
              <div class="col-12 col-md-9">
                <textarea name="answer" id="answer" rows="9" placeholder="answer" class="form-control"></textarea>
                <small class="form-text text-muted"><?= isset($answererr) ? $answererr : ''; ?></small>
              </div>
            </div>

            <div class="row form-group">
              <div class="col col-md-3">
                <label for="category" class=" form-control-label">Category</label>
              </div>
              <div class="col-12 col-md-9" >
                <select id="category" name="category" class="form-control">
                  <option value="<?= isset($category) ? $category : ''; ?>"><?= isset($category) ? print $category : ''; ?></option>
                  <option value="Privacy and Settings">Privacy and Settings</option>
                  <option value="Account Setting">Account Setting</option>
                  <option value="General">General</option>
                </select>

                <small class="form-text text-muted"><?= isset($categoryerr) ? $categoryerr : ''; ?></small>
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