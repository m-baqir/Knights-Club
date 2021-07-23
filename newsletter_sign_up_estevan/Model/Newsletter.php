<?php
namespace Model;
class Newsletter
{
    public function addNewsletter($firstname, $lastname, $email, $consent, $db){
        $sql = "INSERT INTO newsletter (firstname, lastname, email, consent)
                VALUE (:firstname, :lastname, :email, :consent)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':firstname', $firstname);
        $pst->bindParam(':lastname', $lastname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':consent', $consent);

        $count = $pst->execute();
        return $count;
    }
}