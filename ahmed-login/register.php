<?php

use Webappdev\Knightsclub\models\{Database, Login};

require "../vendor/autoload.php";

if(isset($_POST['register'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];

    $u = new Login();
    $db = Database::getDb();

    $validate = $u->VerifyUser($user, $db);
    //$validate is an object not username
    if(strcmp($user ,$validate->username) !== 0){
        $register = $u->RegisterUser($firstname, $lastname, $user, $pass,  $email, $age, $db);
        //check the return of calling RegisterUser successfully
        if ($register === true){
            session_start();

            $_SESSION['id'] = $u->VerifyUser($user,$db)->id;
            //header("Location: ../user_profile_estevan/login_user.php/".$_SESSION['username']);
            header("Location: ../user_profile_estevan/login_user.php");
        }
    } else if ($user == $validate){
        echo "You already have an account, please use login with your existing account";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login-register.css" />
    <title>Register | Knights Club</title>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
    <div class="form">
        <h1>Register</h1>
        <p id="error-msg"></p>
        <form method="POST" name="register" action="">
            <div class="input-group">
                <input type="text" id="first" name="first" placeholder="First Name">
                <input type="text" id="last" name="last" placeholder="Last Name">
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email">                <input type="number" id="age" name="age" placeholder="Age">
            </div>
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Username">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <button class="submitBtn" name="register">Register</button>
        </form>
        <div>
            <p class="form-link">If you have an account, <a href="login.php">login here</a>.</p>
        </div>
    </div>
</main>
<?php require_once('../home_page/footer.php'); ?>
<script type="text/javascript" async defer src="client-validate.js"></script>
</body>
</html>