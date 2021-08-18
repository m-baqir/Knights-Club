<?php

namespace Webappdev\Knightsclub\models;

use PDO;

class Login{

    public function LogUser($user, $pass, $db)
    {
        $sql = "SELECT * FROM user WHERE (username = :user OR email = :user) AND password = :pass";
        $pdostmt = $db->prepare($sql);

        $pdostmt->bindParam(":user",  $user);
        $pdostmt->bindParam(":pass",  $pass);

        $pdostmt->execute();

        $login = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $login;
    }

    public function VerifyUser($user, $db)
    {
        $sql = "SELECT * FROM user WHERE username = :user";
        $pdostmt = $db->prepare($sql);

        $pdostmt->bindParam(":user",  $user);
        
        $pdostmt->execute();

        $login = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $login;
    }

    public function RegisterUser($firstname, $lastname, $user, $pass, $email, $age, $db)
    {
        $sql = "INSERT INTO user (first_name, last_name, username, password, email, age, date_of_signup) VALUES (:first, :last, :user, :pass, :email, :age, NOW())";
        $pdostmt = $db->prepare($sql);

        $pdostmt->bindParam(":first",  $firstname);
        $pdostmt->bindParam(":last",  $lastname);
        $pdostmt->bindParam(":user",  $user);
        $pdostmt->bindParam(":pass",  $pass);
        $pdostmt->bindParam(":email",  $email);
        $pdostmt->bindParam(":age",  $age);

        return $pdostmt->execute();

    }

    

}