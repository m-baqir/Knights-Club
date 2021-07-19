<?php


namespace Webappdev\Knightsclub\models;
use PDO;

class User
{
    public function getUserIdByUserName($userName,$db){
        $selectedQuery = "SELECT id FROM user WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
}