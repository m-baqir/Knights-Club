<?php
use Webappdev\Knightsclub\models\{Database,FAQ};
require_once '../vendor/autoload.php';
//Just manually set values for session variables till login nd registration pages get ready
$_SESSION['user_id'] = 1;
$_SESSION['is_Admin'] = true;
if(isset($_SESSION['user_id']) && $_SESSION["is_Admin"] == true ){
$dbcon = Database::getDb();
$f = new FAQ();
$FAQs = $f->getAllFAQs(Database::getDb());
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
    <div class="col-md-12">
      <!-- DATA TABLE -->
      <h3 class="title-5 m-b-35">FAQ</h3>
      <div class="table-data__tool">
        <div class="table-data__tool-left">

        </div>
        <div class="table-data__tool-right">
          <a href="AddFAQ.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>add New</a>
        </div>
      </div>
      <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
          <thead>
          <tr>
            <th>
              <label class="au-checkbox">
                <input type="checkbox">
                <span class="au-checkmark"></span>
              </label>
            </th>
            <th>id</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Category</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($FAQs as $FAQ) { ?>
            <tr class="tr-shadow">
              <td>
                <label class="au-checkbox">
                  <input type="checkbox">
                  <span class="au-checkmark"></span>
                </label>
              </td>
              <td><?= $FAQ->id; ?></td>
              <td><?= $FAQ->question; ?></td>
              <td class="desc"><?= $FAQ->answer; ?></td>
              <td><?= $FAQ->category; ?></td>

              <td>
                <div class="table-data-feature">
                  <form action="UpdateFAQ.php" method="post">
                    <input type="hidden" name="id" value="<?= $FAQ->id; ?>"/>
                    <button class="item" name="updateFAQ" data-toggle="tooltip" data-placement="top"
                            title="Edit">
                      <i class="zmdi zmdi-edit"></i>
                    </button>
                  </form>
                  <form action="DeleteFAQ.php" method="post">
                    <input type="hidden" name="id" value="<?= $FAQ->id; ?>"/>
                    <button class="item" name="deleteFAQ" data-toggle="tooltip" data-placement="top"
                            title="Delete">
                      <i class="zmdi zmdi-delete"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            <tr class="spacer"></tr>

          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- END DATA TABLE -->
    </div>
  </div>


<?php require_once 'footer.php' ?>