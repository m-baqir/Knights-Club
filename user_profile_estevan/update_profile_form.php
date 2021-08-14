<?php 
use Webappdev\Knightsclub\models\{Database, User};
require_once '../vendor/autoload.php';

$firstname = "";
$lastname = "";
$country = "";
$bio = "";
$email = "";
$facebook = "";
$twitter = "";
$phone_number = "";
$education = "";
$workplace = "";

$firstError = '';
$lastError = '';
$countryError = '';
$bioError = '';
$emailError = '';
$faceError = '';
$twitError = '';
$phoneError = '';
$educError = '';
$workError = '';

if(isset($_POST['updateProfile'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $u = new User();
    $user = $u->getUserById($id, $db);

    $firstname = $user->first_name;
    $lastname = $user->last_name;
    $country = $user->country;
    $bio = $user->bio;
    $email = $user->email;
    $facebook = $user->link_to_facebook;
    $twitter = $user->link_to_twitter;
    $phone_number = $user->phone_number;
    $education = $user->education;
    $workplace = $user->workplace;
}

if(isset($_POST['updProfile'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $phone_number = $_POST['phone'];
    $education = $_POST['education'];
    $workplace = $_POST['workplace'];

    if($firstname == ""){
        $firstError = "Please enter your first name.";
    }

    if($lastname == ""){
        $lastError = "Please enter your last name.";
    }

    if($country == ""){
        $countryError = "Please enter the Country where you are.";
    }

    if($bio == ""){
        $bioError = "Please enter a short introducution of yourself.";
    }

    if($email == ""){
        $emailError = "Please enter an email.";
    }

    if($facebook == ""){
        $faceError = "If you an account please enter your facebook name. If not please enter 'NONE' ";
    }

    if($twitter == ""){
        $twitError = "If you an account please enter your twitter name. If not please enter 'NONE' ";
    }

    if($phone_number == ""){
        $phoneError = "Please a contact number";
    }

    if($education == ""){
        $educError = "Please enter your current education level.";
    }

    if($workplace == ""){
        $workError = "Please enter your current workplace level.";
    }

    if($firstError == '' && $lastError == '' && $countryError == '' && $bioError == '' && $emailError == '' && $faceError == '' && $twitError == '' && $phoneError == '' && $educError == '' && $workError == ''){
        $db = Database::getDb();
        $u = new User();
        $count = $u->updateUserContent($id, $firstname, $lastname, $country, $bio, $email, $facebook, $twitter, $phone_number, $education, $workplace, $db);

        if($count){
            header('Location: login_user.php');
        } else {
            echo "There was a problem with updating!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Style Sheet that it links too-->
    <link rel="stylesheet" href="./css/update_profile.css" /> 
    <!--Additional CSS for header and footer-->
    <link rel="stylesheet" href="../css/style_template.css" />
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<div class="container bootstrap snippets bootdeys">
<div class="row">
  <div class="col-xs-12 col-sm-9">
    <form class="form-horizontal" action="#" method="post">
    <input type="hidden" name="id" value="<?= $id ?>" />
        <!-- This is where the user profile image will be placed
        <div class="panel panel-default">
          <div class="panel-body text-center">
           <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
          </div>
        </div>
        -->
      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">User info</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">First name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?= $firstname ?>">
              <span><?= isset($firstError) ? $firstError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Last name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?= $lastname ?>" >
              <span><?= isset($lastError) ? $lastError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Country" name="country" value="<?= $country ?>" >
              <span><?= isset($countryError) ? $countryError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Biography</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Biography" name="bio" value="<?= $bio ?>">
              <span><?= isset($bioError) ? $bioError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $email ?>">
              <span><?= isset($emailError) ? $emailError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Facebook Link</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Facebook Link" name="facebook" value="<?= $facebook ?>">
              <span><?= isset($faceError) ? $faceError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Twitter Link</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Twitter Link" name="twitter" value="<?= $twitter ?>">
              <span><?= isset($twitError) ? $twitError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?= $phone_number ?>">
              <span><?= isset($phoneError) ? $phoneError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Current Education</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Current Education" name="education" value="<?= $education ?>">
              <span><?= isset($educError) ? $educError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Current Workplace</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Current Workplace" name="workplace" value="<?= $workplace ?>">
              <span><?= isset($workError) ? $workError : ''; ?></span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" name="updProfile" class="btn btn-primary">Update Profile</button>
              <button type="submit" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>