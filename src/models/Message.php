<?php
//namespace models;
namespace Webappdev\Knightsclub\models;

use PDO;
class Message{
    //Another problems: receivers and sender have the same record in inbox table.
    // if one of them move the message to trash, another users relating to that message can only see it in trash.
    //TODO: Fix it later.
    //Current solution in my mind: when sending a message, multiple records would be inserted into inbox table based on how many number of receivers there are.
    //Get all messages from a logged-in user
    //But sign-up feature is not implemented yet, so I will do the hard-code to test my feature.
    //In this case I will let current user's id be 2.
    public function getMessages($db,$controlType = 1){
        /*$selectQuery = "SELECT *,u2.username as senderName FROM inbox
                        JOIN user u1  ON inbox.receiver_id  = u1.id AND u1.id = 2
                        JOIN user u2  ON inbox.sender_id  = u2.id";*/
        /*$selectQuery = "SELECT u2.username as senderName, i.message, i.subject, i.id , i.is_read, i.date
                        FROM inbox i 
                        JOIN user u1 
                            ON i.receiver_id = u1.id AND u1.id = 2 
                        JOIN user u2 
                            ON i.sender_id = u2.id
                        WHERE i.trash = 0";*/
        $selectQuery = "";
        //Reference: https://stackoverflow.com/questions/11420520/php-variables-in-anonymous-functions#:~:text=1%20Answer&text=Yes%2C%20use%20a%20closure%3A,referenced%20in%20the%20closure%20using%20%26%20.
        //$selectQuery = function() use($controlType){
            //$finalQuery = "";
            //For inbox
            if ($controlType === 1){//INBOX
                //Set receiver_id to 3 for testing the confirmation of friend request in message-content.php
                $selectQuery .= "SELECT senderName, id, message_subject, message_content, message_date, is_read_receiver 
                                    FROM message_sender_receiver_view 
                                    WHERE receiver_id = 3 AND in_receiver_trash = 0";
            }
            else if ($controlType === 2){//SENT
                $selectQuery .= "SELECT receiverName, id, message_subject, message_content, message_date 
                                    FROM message_sender_receiver_view 
                                    WHERE sender_id = 1   AND in_sender_trash = 0";
            }
            else if($controlType === 3){//TRASH
                $selectQuery .= "SELECT senderName, id, message_subject, message_content, message_date 
                                    FROM message_sender_receiver_view 
                                    WHERE (sender_id = 2   AND in_sender_trash = 1  ) OR (receiver_id = 2 AND in_receiver_trash = 1)";
            }
            //return $finalQuery;
        //};

        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();

        $messages = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $messages;
    }

    public function getMessageById($id, $db){
        $selectQuery = "SELECT sender_id,senderName, receiver_id, receiverName, id, message_subject, message_content, message_date 
                            FROM message_sender_receiver_view 
                            WHERE (sender_id = 2 OR receiver_id = 2) AND id = :id";
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedMessage = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $selectedMessage;
    }

    public function sendMessage($senderId, $receiverId, $subject, $message,$db){
        $insertProcedureCall = "CALL send_message(?,?,?,?)";
        $pdostmt = $db->prepare($insertProcedureCall);
        $pdostmt->bindParam(1,$subject);
        $pdostmt->bindParam(2, $message);
        $pdostmt->bindParam(3, $senderId);
        $pdostmt->bindParam(4, $receiverId);

        return $pdostmt->execute();
    }

    public function markMessageAsRead($msgId, $db){
        $updateQuery = "UPDATE message_receivers SET is_read = 1 WHERE message_id=:id";
        $pdostmt = $db->prepare($updateQuery);
        $pdostmt->bindParam(":id",$msgId);
        return $pdostmt->execute();
    }

    public function moveMessagesToTrash($ids,$controlType, $db){
        $updateTable = "";
        if (1 === intval($controlType)){//Type casting to make sure comparison work
            //update for receiver
            $updateTable .= "message_receivers";
        }
        else if(2 === intval($controlType)){
            //update for sender
            $updateTable .= "message_senders";
        }

        $updateQuery = "UPDATE ".$updateTable." SET in_trash = 1 WHERE message_id IN (".$ids.")";
        $file = fopen("get-message.txt","a+");

fwrite($file,"message.php:154 updateQuery = ".$updateQuery."\n");
         //fwrite($file,"move-messages-to-trash.php:17 POST = ".$_POST."\n");
fclose($file);
        $pdostmt = $db->prepare($updateQuery);
        return $pdostmt->execute();
    }
}