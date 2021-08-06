<?php
use Model\{Database, Advice};
require_once 'vendor/autoload.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $a = new Advice();
    $count = $a->deleteAdvice($id, $db);
    if($count){
        header('Location: admin_advice_page.php');
    }else{
        echo "There was a problem with deleting!";
    }
}