<?php


namespace Webappdev\Knightsclub\models;
use PDO;

class User
{
    /**
     * Get user id by user name
     * @param string $userName a particular user name
     * @param Database $db database connection
     * @return mixed false if user name does not exist in database. Otherwise, it will return user id.
     */
    public function getUserIdByUserName($userName, $db){
        $selectedQuery = "SELECT id FROM user WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }

    public function userorder5($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 1 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
    public function userorder10($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 2 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }
    public function userorder15($userName, $db){
        $selectedQuery = "UPDATE user SET subscription_type = 3 WHERE username=:username";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':username',$userName);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get user name by user id
     * @param string $id user id
     * @param Database $db database connection
     * @return mixed false if user id does not exist in database. Otherwise, user name is returned successfully.
     */
    public function getUserNameById($id, $db){
        $selectedQuery = "SELECT username FROM user WHERE id=:id";
        $pdoStmt = $db->prepare($selectedQuery);
        $pdoStmt->bindParam(':id',$id);
        $pdoStmt->execute();

        return $pdoStmt->fetch(PDO::FETCH_OBJ);
    }

    // Adding Just update and add Functions for user profile
    // As soon as the user login store the id the session variable called userid and check for varauble in every page.
    // user profile check userid 
    // go to database and get the user detail base on sessionid / userid 
    // select everything from user id is = to session user id
    // instead fetch all is just fetch
    // similar to getCarByID

    // Add User Content for the user profile already made
    public function addUserContent($facebook, $twitter, $phone_number, $education, $workplace, $db){
        $sql = "INSERT INTO user (link_to_facebook, link_to_twitter, phone_number, education, workplace)
                VALUES (:facebook, :twitter, :phone_number, :education, :workplace)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':facebook', $facebook);
        $pst->bindParam(':twitter', $twitter);
        $pst->bindParam(':phone_number', $phone_number);
        $pst->bindParam(':education', $education);
        $pst->bindParam(':workplace', $workplace);

        $pst->execute();

    }

    // Update User Content for the user profile
    // Error Message that number of bound vars does not match to the method here
    public function updateUserContent($id, $firstname, $lastname, $country, $bio, $email, $facebook, $twitter, $phone_number, $education, $workplace, $db){
        $sql = "UPDATE user 
                SET first_name = :firstname,
                last_name = :lastname,
                country = :country,
                bio = :bio,
                email = :email,
                link_to_facebook = :facebook,
                link_to_twitter = :twitter,
                phone_number = :phone_number,
                education = :education,
                workplace = :workplace
                WHERE id = :id
                ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':country', $country);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':facebook', $facebook);
        $pst->bindParam(':twitter', $twitter);
        $pst->bindParam(':phone_number', $phone_number);
        $pst->bindParam(':education', $education);
        $pst->bindParam(':workplace', $workplace);

        $count = $pst->execute();
        return $count;

    }

    // Get the user id
    public function getUserById($id, $db){
        $sql = "SELECT * FROM user WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
}
