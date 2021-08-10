<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login-register.css" />
    <title>Login | Knights Club</title>
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<main>
<div class="form">
    <h1>Login</h1>
    <form method="POST">
        <div class="input-group">
            <input type="text" name="user" placeholder="Username">
        </div>
        <div class="input-group">
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="submitBtn" name="login" >Login</button>
    </form>
    <div>
    <p class="form-link">If you do not have an account, <a href="register.php">register here</a>.</p>
    </div>
    <br>
    <br>
</div>
</main>
<?php require_once('../home_page/footer.php'); ?>
</body>
</html>