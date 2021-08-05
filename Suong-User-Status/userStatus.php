<?php

use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Status;

require_once '../vendor/autoload.php';

$user = new Status();

$db = Database::getDb();

$id = 2; //ID will be hardcoded for now
$status = $user->getUserStatus($id, $db);
if (isset($_GET['status'])) {
    $uStatus = $_GET['status'];
    $count = $user->updateStatus($id, $uStatus, $db);
    if ($count) {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        $uri =  'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
        header("Location:" . $uri);
    } else {
        echo "Problem updating status";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../css/style_template.css" /> -->
    <meta name="viewport" content="width=device-width">
    <title>Knight's Club</title>
</head>

<body>
    <?php
    $userStatus = $status->user_status;
    $buttonClass =  "";
    if ($userStatus == "online") {
        $buttonClass = "btn-info";
    } else if ($userStatus == "busy") {
        $buttonClass = "btn-danger";
    } else {
        $buttonClass = "btn-warning";
        $userStatus = "offline";
    }
    ?>
    <div class="dropdown">
        <button class="btn <?= $buttonClass ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= ucfirst($userStatus) ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?= $_SERVER['REQUEST_URI'] ?>?status=online">Online</a>
            <a class="dropdown-item" href="<?= $_SERVER['REQUEST_URI'] ?>?status=hidden">Hidden</a>
            <a class="dropdown-item" href="<?= $_SERVER['REQUEST_URI'] ?>?status=busy">Busy</a>
        </div>
    </div>

    <?php require_once "../js/Suong-bootstrap.php" ?>
</body>

</html>