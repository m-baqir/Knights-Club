<?php
use Webappdev\Knightsclub\models\Message;
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\User;
require_once '../vendor/autoload.php';
$_POST = json_decode(file_get_contents('php://input'),true);

if (isset($_POST['senderId']) && isset($_POST['receiverId'])){
    $message = new Message();
    $user = new User();
    $dbConnection = Database::getDb();
    $file = fopen("friendRequestLog.txt","w+");
    $senderId = $_POST['senderId'];
    $receiverId = $_POST['receiverId'];
    fwrite($file,"friend-request.php:15 senderId: ".$senderId."\n");
    fwrite($file,"friend-request.php:16 receiverId: ".$receiverId."\n");

    $senderUsername = '';
    $receiverUsername = '';
    try {
        $senderUsername = $user->getUserNameById($senderId,$dbConnection)->username;
        $receiverUsername = $user->getUserNameById($receiverId,$dbConnection)->username;
    }
    catch (Exception $e){
        fwrite($file,$e->getMessage());
        fclose($file);
    }
    $messageSubject = 'Friend request from '. $senderUsername;
    $messageContent = 'Hi '.$receiverUsername.",\nPlease accept my friend request. Thanks and have a nice day!";
    $messageContent .= '<input type="submit" class="btn btn-primary" onclick="confirmFriendRequest('.$senderId.','.$receiverId.')" value="Confirm request">';

    fclose($file);
    echo $message->sendMessage($senderId,$receiverId,$messageSubject,$messageContent,$dbConnection);
}