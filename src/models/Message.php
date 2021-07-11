<?php
//namespace models;
namespace Webappdev\Knightsclub\models;

use PDO;
class Message{
    //Get all messages from a logged-in user
    //But sign-up feature is not implemented yet, so I will do the hard-code to test my feature.
    //In this case I will let current user's id be 2.
    public function getMessages($db){
        $selectQuery = "SELECT *,u2.username as senderName FROM inbox 
                        JOIN user u1  ON inbox.receiver_id  = u1.id AND u1.id = 2
                        JOIN user u2  ON inbox.sender_id  = u2.id";
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();

        $messages = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $messages;
    }

    public function getMessageById($id, $db){

    }
}