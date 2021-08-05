<?php
use Webappdev\Knightsclub\models\Database;

require_once '../vendor/autoload.php';
$_POST=json_decode(file_get_contents('php://input'),true);
if(isset($_POST['senderId']) && isset($_POST['receiverId'])){
    $senderId = $_POST['senderId'];
    $receiverId = $_POST['receiverId'];
    $dbConnection = Database::getDb();
    $friendInsertQuery = "INSERT INTO friends (user_id, friend_id) 
                            VALUES ($senderId,$receiverId),($receiverId,$senderId)";
    $pdostmt = $dbConnection->prepare($friendInsertQuery);
    echo $pdostmt->execute();

}