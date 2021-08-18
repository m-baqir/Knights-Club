<?php
use Webappdev\Knightsclub\models\Message;
use Webappdev\Knightsclub\models\Database;

require_once '../vendor/autoload.php';
/**
 * Load the list of messages from database
 * @param $controlType 1 is inbox, 2 is sent, and 3 is trash.
 * @return mixed
 */
function loadMessagesFromDb($userId, $controlType){
    $dbConnection = Database::getDb();
    $message = new Message();
    return $message->getMessages($dbConnection, $userId, $controlType);
}

