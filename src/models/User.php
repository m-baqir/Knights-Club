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

    public function userorder5($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 1 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
    public function userorder10($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 2 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
    public function userorder15($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 3 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
}
