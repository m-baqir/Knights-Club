<?php
require_once 'load-messages-from-db.php';
require_once 'merge_messages_to_html_text.php';
session_start();
$controlType = 1;
$userId = 0;
if(isset($_GET['controlType'])){
    //REMEMBER: type of $_GET['controlType'] is string, not number. Hence, using intval converts from string to int.
    $controlType = intval($_GET['controlType']);
}
//Write file to debug
/*$file = fopen("get-message.txt","w+");
fwrite($file,$selectQuery."\n");*/
if (isset($_SESSION['id'])){
    $userId = $_SESSION['id'];

}
$messages = loadMessagesFromDb($userId,$controlType);
//var_dump($messages);//for Debug

echo mergeMessagesToHTMLText($messages,$controlType);
/*fwrite($file,$finalText);
fclose($file);*/