<?php
use Webappdev\Knightsclub\models\{Database,Form};
require_once '../vendor/autoload.php';

$dbcon = Database::getDb();
$f = new Form();
$forms = $f->getAllFormsforIndex(Database::getDb());


require_once 'header.php';
?>

  <!-- MAIN CONTENT-->
  <div class="main-content">
  <div class="section__content section__content--p30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
          <div class="au-card-title" style="background-image:url('../images/bg-title-02.jpg'');">
            <div class="bg-overlay bg-overlay--blue"></div>
            <h3>
              <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
            <button class="au-btn-plus">
              <i class="zmdi zmdi-plus"></i>
            </button>
          </div>

          <div class="au-message-list">
            <div class="au-message__item">
              <?php foreach ($forms as $form) { ?>
                <div class="au-message__item-inner">
                  <div class="au-message__item-text">
                    <div class="text">
                      <h5 class="name"><?= $form->username; ?></h5>
                      <p><?= $form->content; ?></p>
                    </div>
                  </div>
                  <div class="au-message__item-time">
                    <span><?= $form->date; ?></span>
                    <span>
                      <form action="Email.php" method="post">
                        <input type="hidden" name="id" value="<?= $form->id; ?>"/>
                        <button class="item" name="replyEmail" data-toggle="tooltip" data-placement="top"
                                title="Edit">
                          <i class="zmdi zmdi-edit"></i>
                        </button>
                      </form>

                    </span>
                    <span>
                          <form action="DeleteContactUs.php" method="post">
                    <input type="hidden" name="id" value="<?= $form->id; ?>"/>
                    <button class="item" name="deleteForm" data-toggle="tooltip" data-placement="top"
                            title="Delete">
                      <i class="zmdi zmdi-delete"></i>
                    </button>
                  </form>
                        </span>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="au-message__footer">
            <button class="au-btn au-btn-load js-load-btn">load more</button>
          </div>

        </div>
      </div>
    </div>
  </div>


<?php require_once 'footer.php' ?>