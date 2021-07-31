<?php

namespace Webappdev\Knightsclub\models;

use PDO;

class Search{

    public function FindUser($param, $db)
    {
        $sql = "SELECT * FROM user WHERE first_name LIKE %:param% OR last_name LIKE %:param% OR username LIKE %:param%";
        $pdostmt = $db->prepare($sql);

        $pdostmt->bindParam(':param', $param);
        $pdostmt->execute();

        $results = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

}