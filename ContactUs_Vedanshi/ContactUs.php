<?php
//session_start();
//$user_id= $_SESSION[user_id];
$user_id=1;
require_once 'database.php';

if(isset($_POST['submit'])){
    if(isset($_POST['message']) && isset($_POST['subject'])) {
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        $date = date("Y-m-d");
        //$yearRel = $_POST['yearRel'];
        $db = Database::getDb();
        //$c = new Car();
        //$con = $c->addCar($make, $model, $yearRel, $db);
        $sql = "INSERT INTO feedback (user_id, subject, content, date) 
              VALUES ( :user_id, :subject, :message, :date) ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':subject', $subject);
        $pst->bindParam(':message', $message);
        $pst->bindParam(':date', $date);
        $pst->execute();
        echo"<script>alert('Submitted');</script>";
    }
    else {
        echo "Error!!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/style_template.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="../css/ContactUsStyle.css">
</head>
<body>
<?php
require_once ("../home_page/header.php");
?>
<div class="container-contact100">
  <div class="wrap-contact100">
    <form method="post" class="contact100-form validate-form" id="contactusform">
				<span class="contact100-form-title">
					Get in Touch
				</span>

        <div class="wrap-input100 validate-input" data-validate = "Subject is required">
            <input class="input100" id="subject" type="text" name="subject" placeholder="Subject">
            <label class="label-input100" for="subject">

            </label>
        </div>
      <div class="wrap-input100 validate-input" data-validate = "Message is required">
        <textarea class="input100" name="message" placeholder="Your message..."></textarea>
      </div>

      <div class="contact100-form-checkbox">
        <input class="input-checkbox100" id="ckb1" type="checkbox" name="copy-mail">
        <label class="label-checkbox100" for="ckb1">
          Send copy to my-email
        </label>
      </div>

      <div class="container-contact100-form-btn">
        <div class="wrap-contact100-form-btn">
          <div class="contact100-form-bgbtn"></div>
          <button class="contact100-form-btn" name="submit" id="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<?php
require_once ("../home_page/footer.php");
?>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/Contactus.js"></script>
</body>
</html>
