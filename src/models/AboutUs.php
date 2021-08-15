<?php

namespace Webappdev\Knightsclub\models;

Use PDO;
class AboutUs
{
    /**
     * Load an aboutus object based on its id
     * @param Database $db Database connection
     * @param int $id A particular message id
     * @return mixed False if failure happens. Otherwise, returning an AboutUs object.
     */
    public function GetAboutUs($db,$id = 0){
        $selectQuery = "SELECT * FROM aboutus";
        if ($id != 0){
            $selectQuery .= " WHERE id=".$id;
        }
        $pdostmt = $db->prepare($selectQuery);
        $pdostmt->execute();
        return $pdostmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Creates a new AboutUs if it does not exist, and it updates it if it exists.
     * @param Database $db Database connection.
     * @param string $content AboutUs content.
     * @param int $id Non-zero id if the content of about us section is created.
     * @return mixed
     */
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