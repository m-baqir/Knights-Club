<?php

namespace Webappdev\Knightsclub\models;

use PDO;
class Notification{
    //This function will fetch the information of an user inbox
    public function getUserInbox($id,$db){
        $selectQuery = "SELECT u.username, mr.is_read
                        FROM message_receivers mr
                        JOIN messages m
                            ON mr.message_id = m.id
                        JOIN message_senders ms
                            ON ms.message_id = m.id
                        JOIN user u
                            ON u.id = ms.sender_id
                        WHERE receiver_id = :id";
        
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedUsers = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $selectedUsers;
    }

/*     //This function intake the id of an user and then output the online status of that user
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
    } */
}