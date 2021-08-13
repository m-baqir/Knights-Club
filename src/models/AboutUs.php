<?php

namespace Webappdev\Knightsclub\models;

Use PDO;
class AboutUs
{
    public function GetAboutUs($db,$id = 0){
        $selectQuery = "SELECT * FROM aboutus";
        if ($id != 0){
            $selectQuery .= " WHERE id=".$id;
        }
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();
        return $pdostmt->fetch(PDO::FETCH_OBJ);
    }

    public function CreateOrUpdateAboutUs($db, $content, $id = 0){
        $query = '';
        if ($id != 0){
            $query .= 'UPDATE aboutus SET aboutus_content = :content WHERE id='.$id;
        }else{
            $query .= 'INSERT INTO aboutus (aboutus_content) VALUES (:content)';
        }
        $pdostmt = $db->prepare($query);
        $pdostmt->bindParam(':content',$content);
        $pdostmt->execute();
        return $pdostmt->fetch(PDO::FETCH_OBJ);
    }
}