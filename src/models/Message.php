<?php
//namespace models;
namespace Webappdev\Knightsclub\models;

use PDO;
class Message{
    //Get all messages from a logged-in user
    //But sign-up feature is not implemented yet, so I will do the hard-code to test my feature.
    //In this case I will let current user's id be 2.
    public function getMessages($db){
        /*$selectQuery = "SELECT *,u2.username as senderName FROM inbox
                        JOIN user u1  ON inbox.receiver_id  = u1.id AND u1.id = 2
                        JOIN user u2  ON inbox.sender_id  = u2.id";*/
        $selectQuery = "SELECT u2.username as senderName, i.message, i.subject, i.id , i.is_read, i.date
                        FROM inbox i 
                        JOIN user u1 
                            ON i.receiver_id = u1.id AND u1.id = 2 
                        JOIN user u2 
                            ON i.sender_id = u2.id
                        WHERE i.trash = 0";

        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();

        $messages = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $messages;
    }

    public function getMessageById($id, $db){
        $selectQuery = "SELECT u2.username as senderName, i.message, i.subject, i.id 
                        FROM inbox i 
                        JOIN user u1 
                            ON i.receiver_id = u1.id AND u1.id = 2 
                        JOIN user u2 
                            ON i.sender_id = u2.id
                        WHERE i.id = :id";
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedMessage = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $selectedMessage;
    }

    public function sendMessage($senderId, $receiverId, $subject, $message,$db){
        $insertQuery = "INSERT INTO inbox(sender_id, receiver_id, subject, message) 
                        VALUES(:senderId, :receiverId, :subject, :message)";
        $pdostmt = $db->prepare($insertQuery);
        $pdostmt->bindParam(":senderId",$senderId);
        $pdostmt->bindParam(":receiverId", $receiverId);
        $pdostmt->bindParam(":subject", $subject);
        $pdostmt->bindParam(":message", $message);

        return $pdostmt->execute();
    }

    public function markMessageAsRead($msgId, $db){
        $updateQuery = "UPDATE inbox SET is_read = 1 WHERE id=:id";
        $pdostmt = $db->prepare($updateQuery);
        $pdostmt->bindParam(":id",$msgId);
        return $pdostmt->execute();
    }

    public function moveMessagesToTrash($ids, $db){
        $updateQuery = "UPDATE inbox SET trash = 1 WHERE id IN (".$ids.")";
        $pdostmt = $db->prepare($updateQuery);
        return $pdostmt->execute();
    }
}