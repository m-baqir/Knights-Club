<?php
use Webappdev\Knightsclub\models\{Database,FAQ};
require_once '../vendor/autoload.php';

$dbcon = Database::getDb();
$f = new FAQ();
$FAQs = $f->getAllFAQs(Database::getDb());

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
          <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
              <option selected="selected">All Properties</option>
              <option value="">Option 1</option>
              <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
          </div>
          <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
              <option selected="selected">Today</option>
              <option value="">3 Days</option>
              <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
          </div>
          <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters
          </button>
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
                  <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                    <i class="zmdi zmdi-more"></i>
                  </button>
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