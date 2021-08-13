<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../ContactUs_Vedanshi/database.php';
require_once 'models/Form.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
$date = "";
$content = "";
$uname = "";
$email = "";
$dbcon = Database::getDb();
$f = new Form();
$forms = $f->getAllFormsforIndex(Database::getDb());

if (isset($_POST['send'])) {

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
  $msg = $_POST['message'];
  $e = $_POST['email'];
  $u = $_POST['uname'];

//Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);


  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'patelvedu15@gmail.com';                     //SMTP username
    $mail->Password = 'ltcwhcayfouodyjs';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('patelvedu15@gmail.com', 'Knight_Club');

    $mail->addAddress($e, $u);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('patelvedu15@gmail.com');
    //$mail->addBCC('patelvedu15@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Knight-Club';
    $mail->Body = '<div>' . $msg . '</div>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<script>alert('Message has been sent');window.location.href = 'ContactUsAdmin.php';</script>";

    //echo 'Message has been sent';
  } catch (Exception $e) {

    echo "<script>alert('Message could not be sent. Please try again');window.location.href = 'ContactUsAdmin.php';</script>";
  }


//    $mail->SMTPOptions = array(
//        'ssl' => array(
//            'verify_peer' => false,
//            'verify_peer_name' => false,
//            'allow_self_signed' => true
//        )
//    );

}

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
              <i class="zmdi zmdi-comment-text"></i>Replay</h3>

          </div>
          <div class="au-inbox-wrap">

            <div class="au-chat">
              <div class="au-chat__title">
                <div class="au-chat-info">
                <span class="nick">
                  <a href="#"><?php foreach ($forms

                    as $form) {
                    //var_dump($form->username);
                    if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    if ($form->id == $id) {
                    $email = $form->email;
                    $uname = $form->username;

                    echo $form->username; ?></a>
                </span>
                </div>

              </div>
              <div class="au-chat__content">
                <div class="recei-mess-wrap">
                  <span class="mess-time"><?php echo $form->date; ?></span>
                  <div class="recei-mess__inner">

                    <div class="recei-mess-list">
                      <div class="recei-mess"><?php echo $form->content;
                        ?></div>

                    </div>
                  </div>
                </div>
                <div class="send-mess-wrap">
                  <span class="mess-time">30 Sec ago</span>
                  <div class="send-mess__inner">
                    <div class="send-mess-list">
                      <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="au-chat-textfield">
                <form class="au-form-icon" method="POST">
                  <input class="au-input au-input--full au-input--h65" type="text" name="message"
                         placeholder="Type a message">
                  <input type="hidden" name="email" value="<?php echo $form->email; ?>">
                  <input type="hidden" name="uname" value="<?php echo $form->username;
                  }

                  }
                  } ?>">
                  <button name="send" class="au-input-icon">
                    <i class="zmdi zmdi-mail-send"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php require_once 'footer.php' ?>