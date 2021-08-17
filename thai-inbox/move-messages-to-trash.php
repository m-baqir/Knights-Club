<?php
use Webappdev\Knightsclub\models\Database;
use Webappdev\Knightsclub\models\Message;

require_once '../vendor/autoload.php';
session_start();
$_POST = json_decode(file_get_contents('php://input'), true);
file_put_contents("get-message.txt",$_POST['controlType']);
if (isset($_POST['ids']) && isset($_SESSION['id'])){
    $ids = $_POST['ids'];
    $controlType = 1;
    if (isset($_POST['controlType'])){
        $controlType = $_POST['controlType'];
    }
    echo "move-messages-to-trash.php:13 controlType = ".$controlType;
    //$file = fopen("get-message.txt","w+");

//fwrite($file,"move-messages-to-trash.php:16 controlType = ".$controlType."\n");
  //  fwrite($file,"move-messages-to-trash.php:17 POST = ".$_POST."\n");
//fclose($file);
    $conditionClause = implode(', ',$ids);//implode returns a string that includes elements of array separated by comma.
    $message = new Message();
    $dbConnection = Database::getDb();
    echo $message->moveMessagesToTrash($conditionClause,$controlType,$dbConnection);
}

