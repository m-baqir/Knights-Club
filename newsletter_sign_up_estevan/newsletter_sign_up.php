<?php
use Model\{Database, Newsletter};
require_once('Model/EmailHandler.php');
require_once 'vendor/autoload.php';
session_start();
$user_id = 0;
if(isset($_SESSION['id']) ){
    $user_id = $_SESSION['id'];
}

$firstnameError = '';
$lastnameError = '';
$emailError = '';
$consentError = '';

    if(isset($_POST['addNewsletter'])){

        //$firstname = $_POST['firstname'];
        $firstname = filter_input(INPUT_POST, 'firstname');
        //$lastname = $_POST['lastname'];
        $lastname = filter_input(INPUT_POST, 'lastname');
        $email = $_POST['email'];
        $consent = isset($_POST['consent']) ? $_POST['consent'] : "";


        if($firstname == ""){
            $firstnameError = "Please enter your first name";
        }

        if($lastname == ""){
            $lastnameError = "Please enter your last name";
        }

        if(empty($email)) {
            $emailError = "Please enter a valid email";
        } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            $emailError = "Please enter a valid email";
        }

        if($consent == ""){
            $consentError = "Please check the box before submitting your application";
        }

        // Problem here can't connect and insert into db when no error is found
        if($firstnameError == '' && $lastnameError == '' && $emailError == '' && $consentError == ''){

              $db = Database::getDb();
              $su = new Newsletter();
              $su = $su->addNewsletter($firstname, $lastname, $email, $consent, $db);
              

              //$su = $su->getAllEmails($db);
              // When no problems are found send the email along with inserting into the table
            $firstname = trim(filter_input(INPUT_POST, 'firstname'));
            $lastname = trim(filter_input(INPUT_POST, 'lastname'));
            $email = trim(filter_input(INPUT_POST, 'email'));

            $to_address = $email;
            $to_name = $firstname . ' ' . $lastname;
            $from_address = 'estevancord.1993@gmail.com';
            $from_name = 'Knights Club';
            $subject = 'Knights Club - Newsletter Registration Complete';
            $body = '<p>Thanks for registering with our site.</p>' .
                '<p>Sincerely,</p>' .
                '<p>Knights Club</p>';
            $is_body_html = true;

            try {
                send_email($to_address, $to_name,
                    $from_address, $from_name,
                    $subject, $body, $is_body_html);
                echo 'Thank you for Signing Up';
				// if successful do i put 
				// header('location:', confirmation.php)
				// to redirect the user to a successful sign up.
            } catch (Exception $ex) {
                $error = $ex->getMessage();
                echo 'Error when sending the email';
				// same for error message as well
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Newsletter Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<!--<link rel="icon" type="image/png" href="images/img-01.png"/>
    THIS INCLUDES AN IMAGE TO THE TAB COMMENT OUT SINCE IT DOESN'T MATCH OTHER PAGES
    -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://kit.fontawesome.com/42ed6d485e.js" crossorigin="anonymous"></script> <!--Adds the logo in the footer-->
<!--===============================================================================================-->
<!--Additional CSS for header and footer-->
<link rel="stylesheet" href="../css/style_template.css" />
</head>
<body>
	<?php require_once('../home_page/header.php'); ?>
	
	<!--DELETE THE DIV SECTION IF THERE IS NO LOGIN USER
	<div id="loginLocation">
		<p class="loginNotice">Signed in as: Estevan Cordero</p>
		<button class="generalButton">LOG OUT</button>
	</div>-->

	<div class="container-contact100">
		<div class="wrap-contact100">	
			<form action="" method="post" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Sign Up For Our Newsletter
				</span>

				<label class="label-input100" for="firstname">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="firstname" placeholder="First name" value="<?= isset($firstname) ? $firstname : ''; ?>">
                     <span> <?= isset($firstnameError) ? $firstnameError : ''; ?></span>
				</div>


				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="lastname" placeholder="Last name" value="<?= isset($lastname) ? $lastname : ''; ?>">
					<span><?= isset($lastnameError) ? $lastnameError : ''; ?></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com" value="<?= isset($email) ? $email : ''; ?>">
                    <span><?= isset($emailError) ? $emailError : ''; ?></span>
				</div>

				<label class="label-input100" for="consent">By clicking on the checkbox you have consented in allow us to send email to you.</label>
				<div class="wrap-input100">
					<input id="checkbox" class="input100" type="checkbox" name="consent">
				</div>
                <span><?= isset($consentError) ? $consentError : ''; ?></span>
				<div class="container-contact100-form-btn">
					<button type="submit" name="addNewsletter" class="contact100-form-btn">
						CONFIRM SIGN UP
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/img-01.png');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Benefits
						</span>

						<span class="txt2">
							Joing our Newsletter will allow you to keep up with current news of are site,
							and any future plans we have in store!
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Contact Us
						</span>

						<span class="txt3">
							<a href="#" class="contactLink">Click Here</a>
						</span>
					</div>
				</div>
				<!--IF YOU WANT TO ADD MORE TO THE SIDE IMAGE-->
				<!--<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							contact@example.com
						</span>
					</div>
				</div>-->
			</div>
		</div>
	</div>
	<?php require_once('../home_page/footer.php'); ?>
	
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
