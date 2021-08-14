<?php
//namespace
namespace Webappdev\Knightsclub\models;

use PDO;

class Advice
{
    // Not Used
    public function getAdviceById($id, $db){
        $sql = "SELECT * FROM advice WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }

    public function addAdvice($subject, $date, $content, $db){
        $sql = "INSERT INTO advice (subject, date, content)
                VALUES (:subject, :date, :content)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':subject', $subject);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':content', $content);

        $count = $pst->execute();
        return $count;
    }

    public function getAllAdvice($dbcon){
        $sql = "SELECT * FROM advice";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $advices = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $advices;
    }

    public function deleteAdvice($id, $db){
        $sql = "DELETE FROM advice WHERE id = :id";

        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    public function updateAdvice($id, $subject, $date, $content, $db){
        $sql = "UPDATE advice
                SET subject = :subject,
                date = :date,
                content = :content
                WHERE id = :id
                ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':subject', $subject);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':content', $content);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function FindSubject($param, $db)
    {
        $sql = "SELECT * FROM advice WHERE subject LIKE CONCAT('%', :s, '%')";
        $pdostm = $db->prepare($sql);

        $pdostm->bindParam(":s", $param);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;

    }
}