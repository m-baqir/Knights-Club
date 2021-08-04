<?php

use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Notification;

require_once '../vendor/autoload.php';

$user = new Notification();
$db = Database::getDb();

$id = 2; //ID will be hardcoded for now until login is implemented

$count = 0;
$rows = '';
$userInboxes = $user->getUserInbox($id, $db);
foreach ($userInboxes as $userInbox) {
     if ($userInbox->is_read == "0") {
        $count += 1;
        $rows .= '<a class="dropdown-item" href="#">' . $userInbox->username . ": " . $userInbox->subject . ".</a>";
        //$count = $user->hasRead($userInbox->id,$db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width">
    <title>Knight's Club</title>
</head>

<body>

    <div class="dropdown">
        <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notification <?= $count ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- <a class="dropdown-item" href="<= $_SERVER['REQUEST_URI'] ?>?status=online">Online</a>
        <a class="dropdown-item" href="<= $_SERVER['REQUEST_URI'] ?>?status=hidden">Hidden</a>
        <a class="dropdown-item" href="<= $_SERVER['REQUEST_URI'] ?>?status=busy">Busy</a> -->
            <?php print $rows ?>
        </div>
    </div>

    <?php require_once "../js/Suong-bootstrap.php" ?>
</body>



</html>