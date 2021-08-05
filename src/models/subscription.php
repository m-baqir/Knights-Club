<?php
namespace Webappdev\Knightsclub\models;
use PDO;

class subscription{
    public function GetSubscriptionInfo ($id, $db){
        $selectedQuery = "SELECT * FROM subscription WHERE id = :id";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':id',$id);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }

}
