<?php

class FAQ
{
  public function getFAQById($id, $db)
  {
    $sql = "SELECT * FROM faq where id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    return $pst->fetch(PDO::FETCH_OBJ);
  }

  public function getAllFAQs($dbcon)
  {
    $sql = "SELECT * FROM faq";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $faqs = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $faqs;
  }
  public function addFAQ($question, $answer, $category, $db)
  {
    $sql = "INSERT INTO faq (question, answer, category) 
              VALUES (:question, :answer, :category) ";
    $pst = $db->prepare($sql);
    $pst->bindParam(':question', $question);
    $pst->bindParam(':answer', $answer);
    $pst->bindParam(':category', $category);
    $count = $pst->execute();
    return $count;
  }

  public function deleteFAQ($id, $db)
  {
    $sql = "DELETE FROM faq WHERE id = :id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    return $count;

  }

  public function updateFAQ($id, $question, $answer, $category, $db)
  {
    $sql = "Update faq set
      question = :question,
                answer = :answer,
                category = :category                    
                WHERE id = :id
        
        ";

    $pst = $db->prepare($sql);
    $pst->bindParam(':question', $question);
    $pst->bindParam(':answer', $answer);
    $pst->bindParam(':category', $category);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    return $count;
  }
}