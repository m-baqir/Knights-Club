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
        <form method="POST" action="">
        <div class="input-group">
            <input type="text" name="first" placeholder="First Name">
        </div>
        <div class="input-group">
            <input type="text" name="last" placeholder="Last Name">
        </div>
        <div class="input-group">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="submitBtn" name="register">Register</button>
        </form>
        <div>
            <p class="form-link">If you have an account, <a href="login.php">login here</a>.</p>
        </div>
    </div>
</main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>