<?php

namespace Webappdev\Knightsclub\models;
use PDO;
class Status{
    //This function will get the status of every user
    //Currently have no use but might get useful in one of the other members' feature
    public function getAllUserStatus($db){
        $selectQuery = "SELECT username, user_status
                        FROM user";
        
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();

        $selectedUsers = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $selectedUsers;
    }

    //This function intake the id of an user and then output the online status of that user
    public function getUserStatus($id,$db){
        $selectQuery = "SELECT username, user_status
                        FROM user
                        WHERE id = :id";
        
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedUser = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $selectedUser;
    }

    //This function change the status of an user into corresponding status
    public function updateStatus($id,$status,$db){
        $selectQuery = "UPDATE user
                        SET user_status = :status
                        WHERE id = :id";

        $pdostmt = $db->prepare($selectQuery);

        $pdostmt->bindParam(':id',$id);
        $pdostmt->bindParam(':status',$status);

        $count = $pdostmt->execute();

        return $count;
    }
}