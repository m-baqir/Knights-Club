<?php
namespace Webappdev\Knightsclub\models;
use PDO;
class rss{
    public function getallrss($id , $db){

            $selectedQuery = "SELECT * FROM rss WHERE user_id = :id";
            $pdoStmt = $db->prepare($selectedQuery);
            $pdoStmt->bindParam(':id',$id);
            $pdoStmt->execute();

            return $pdoStmt->fetchAll(PDO::FETCH_OBJ);

    }
}

