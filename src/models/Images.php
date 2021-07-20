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

}