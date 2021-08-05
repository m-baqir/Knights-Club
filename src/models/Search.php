<?php

namespace Webappdev\Knightsclub\models;

use PDO;

class Search{

    public function FindUser($param, $db)
    {
        $sql = "SELECT * FROM user WHERE first_name LIKE CONCAT('%', :s, '%') OR last_name LIKE CONCAT('%', :s, '%') OR username LIKE CONCAT('%', :s, '%')";
        $pdostmt = $db->prepare($sql);

        $pdostmt->bindParam(":s",  $param);
        $pdostmt->execute();

        $results = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function getUsers($db){
        $sql = "SELECT * FROM user";

        $stmt = $db->prepare($sql);
        $stmt-> execute();
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }
    

}