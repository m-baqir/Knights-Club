<?php
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Message;

require_once '../vendor/autoload.php';
$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST['ids'])){
    $ids = $_POST['ids'];
    $conditionClause = implode(', ',$ids);//implode returns a string that includes elements of array separated by comma.
    $message = new Message();
    $dbConnection = Database::getDb();
    echo $message->moveMessagesToTrash($conditionClause,$dbConnection);
}

