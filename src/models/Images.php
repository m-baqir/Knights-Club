<?php
//namespace
namespace Webappdev\Knightsclub\models;

use PDO;
class Images{
    //Getting a list of images of a particular user using their id
    public function getImagesById($id,$db){
        $selectQuery = "SELECT u.username, g.image_name, g.picextension, g.main_image
                        FROM gallery g
                        JOIN user u
                            ON g.user_id =  u.id
                        WHERE g.user_id = :id";
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedUser = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $selectedUser;
    }

    public function getUserNameById($id,$db){
        $selectQuery = "SELECT username
                        FROM user
                        WHERE id = :id";
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->bindParam(':id',$id);
        $pdostmt->execute();

        $selectedUser = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $selectedUser;
    }
    //Not sure if need to implement a method to fetch all the image in the database, will consider this later
    
    //Might need to implement a method to get the profile image only

}