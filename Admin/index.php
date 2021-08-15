<?php
use Webappdev\Knightsclub\models\{Database,Form};
require_once '../vendor/autoload.php';
//Just manually set values for session variables till login nd registration pages get ready
$_SESSION['user_id'] = 1;
$_SESSION['is_Admin'] = true;
if(isset($_SESSION['user_id']) && $_SESSION["is_Admin"] == true ){
$dbcon = Database::getDb();
$f = new Form();
$forms = $f->getAllFormsforIndex(Database::getDb());
$users = $f->getAllUsers(Database::getDb());
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
          <div class="overview-wrap">
            <h2 class="title-1">overview</h2>
          </div>
        </div>
      </div>
      <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c1">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-account-o"></i>
                </div>
                <div class="text">
                  <h2>1</h2>
                  <span>Members</span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart1"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c3">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-calendar-note"></i>
                </div>
                <div class="text">
                  <h2>4</h2>
                  <span>Joined</span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart3"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c4">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="text">
                  <h2><?php echo count($users); ?></h2>
                  <span>Total Users</span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart4"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--<div class="row">
        <div class="col-lg-9">
          <h2 class="title-1 m-b-25">Users</h2>
          <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
              <thead>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th class="text-right">Email</th>
                <th class="text-right">Phone</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2021-09-29 05:57</td>
                <td>John</td>
                <td class="text-right">john@gmail.com</td>
                <td class="text-right">4885583382</td>
              </tr>

              <tr>
                <td>2021-09-22 00:43</td>
                <td>Jez</td>
                <td class="text-right">jez@gmail.com</td>
                <td class="text-right">8493992293</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>-->

      <div class="col-lg-12">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
          <div class="au-card-title" style="background-image:url('../images/bg-title-02.jpg');">
            <div class="bg-overlay bg-overlay--blue"></div>
            <h3>
              <i class="zmdi zmdi-comment-text"></i>Feedbacks</h3>
            <a class="au-btn-plus" href="AddContactUs.php">
              <i class="zmdi zmdi-plus"></i>
            </a>
          </div>
          <div class="au-inbox-wrap js-inbox-wrap">
            <div class="au-message js-list-load">
              <div class="au-message-list">
                <?php foreach ($forms as $form) { ?>

                  <div class="au-message__item-inner">
                    <div class="au-message__item-text">

                      <div class="text-left">
                        <h5 class="name"><?= $form->username; ?></h5>
                        <p><?= $form->content; ?></p>
                      </div>
                    </div>
                    <div class="au-message__item-time">
                      <span><?= $form->date; ?></span>
                    </div>
                  </div>

                <?php } ?>
              </div>
              <div class="au-message__footer">
                <button class="au-btn au-btn-load js-load-btn">load more</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require_once 'footer.php' ?>