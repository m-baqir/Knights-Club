<?php
use Webappdev\Knightsclub\models\Database;
require_once '../vendor/autoload.php';
session_start();
$searchingText = '';
if (isset($_GET['peopleSearch'])){
    $searchingText = $_GET['peopleSearch'];
}
$dbConnection = Database::getDb();
$currentUserId = 0;//hard coding
if (isset($_SESSION['id'])){
    $currentUserId = $_SESSION['id'];
}
else{
    header('Location:  ../ahmed-login/login.php');
}
//var_dump($_SESSION);
$selectQuery = "SELECT u.username, u.id, f.friend_id FROM user u 
JOIN friends f
ON u.id = f.friend_id
WHERE u.username LIKE '%$searchingText%' AND f.user_id = $currentUserId";
//SELECT * FROM user WHERE username LIKE '%$searchingText%' AND id != $currentUserId";
$pdostmt = $dbConnection->prepare($selectQuery);
$pdostmt->execute();
$users = $pdostmt->fetchAll(PDO::FETCH_OBJ);
$i = 0;
$usersInHTML = '';
//var_dump($selectQuery);
//var_dump($users);
for ($i = 0; $i < count($users); $i++){
    if ($i % 3 === 0)$usersInHTML .= '<div class="row g-4">';
    $usersInHTML .= '<div class="col-sm-4"><div class="card">
                <img src="PaulScholes.jpg" class="card-img-top img-thumbnail img-size" alt="...">
                <div class="card-body">';
    $usersInHTML.= '<h5 class="card-title">';
    $usersInHTML.= $users[$i]->username;
    $usersInHTML.= '</h5>';
    $usersInHTML .= '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>';
    if ($users[$i]->friend_id === null){
        $usersInHTML .= '<input type="submit" id="'.$users[$i]->id.'" value="Add friend" class="btn btn-primary" onclick="sendFriendRequest('.$currentUserId.','.$users[$i]->id.')">';
    }
    else{
        $usersInHTML .= '<p>Friend</p>';
    }

    $usersInHTML .='</div></div></div>';


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--    <meta name="viewport" content="width=device-width initial-scale=1">-->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/d77bd3435b.js" crossorigin="anonymous"></script>
    <!--        <link rel="stylesheet" href="../css/style_template.css"/>-->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <script src="js/friend-handler.js"></script>
    <title>search page</title>
</head>
<body>
<?php require_once('..\home_page\header.php') ?>
<main class="d-flex flex-column">
    <div class="d-none d-sm-block">
        <a href="../user_profile_estevan/login_user.php" style="color: #007bff !important;">Profile</a> > <a href="#" style="color: #007bff !important;">Friends</a>
    </div>
    <h1 class="text-center">My friends</h1>
    <form action="" method="get" class="form-group d-flex flex-row justify-content-center">
        <label for="search" class="text-hide">
            search
        </label>
        <input id="search" name="search" class="form-control bd-highlight flex-shrink-0 m-1">
        <button name="peopleSearch" class="btn btn-primary bd-highlight form-control m-1">Search</button>
    </form>
    <div class="justify-content-center container">
        <?php
        echo $usersInHTML;
        ?>
    </div>
</main>

<?php require_once('..\home_page\footer.php') ?>

</body>
</html>