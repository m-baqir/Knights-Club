<?php
use Webappdev\Knightsclub\models\Message;
use Webappdev\Knightsclub\models\Database;

require_once '../vendor/autoload.php';
function loadMessagesFromDb($controlType){
    $dbConnection = Database::getDb();
    $message = new Message();
    return $message->getMessages($dbConnection,$controlType);
}

