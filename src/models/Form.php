<?php
namespace Webappdev\Knightsclub\models;

use PDO;
class Form
{
  public function getFormById($id, $db)
  {
    $sql = "SELECT * FROM feedback where id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    return $pst->fetch(PDO::FETCH_OBJ);
  }

  public function getUserById($uid, $db)
  {
    $sql = "SELECT f.*, u.username, u.email FROM feedback as f join user as u on f.user_id = u.id where u.id = $uid";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $uid);
    $pst->execute();
    return $pst->fetch(PDO::FETCH_OBJ);
  }

  public function getAllForms($dbcon)
  {
    $sql = "SELECT * FROM feedback";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $feedbacks = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $feedbacks;
  }
  public function getAllUsers($dbcon)
  {
    $sql = "SELECT * FROM user";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $users = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $users;
  }

  public function getAllFormsforIndex($dbcon)
  {
    $sql = "SELECT f.*, u.username, u.email FROM feedback as f join user as u on f.user_id = u.id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $feedbacks = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $feedbacks;
  }

  public function addForm($user_id, $subject, $content, $date, $db)
  {
    $sql = "INSERT INTO feedback (user_id, subject, content, date) 
              VALUES ( :user_id, :subject, :content, :date) ";
    $pst = $db->prepare($sql);
    $pst->bindParam(':user_id', $user_id);
    $pst->bindParam(':subject', $subject);
    $pst->bindParam(':content', $content);
    $pst->bindParam(':date', $date);
    $count = $pst->execute();
    return $count;
  }

  public function deleteForm($id, $db)
  {
    $sql = "DELETE FROM feedback WHERE id = :id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    return $count;

  }

  public function updateForm($id, $user_id, $subject, $content, $date, $db)
  {
    $sql = "Update feedback
                set user_id = :user_id,
                subject = :subject,
                content = :content,
                date = :date                    
                WHERE id = :id
        
        ";

    $pst = $db->prepare($sql);

    $pst->bindParam(':user_id', $user_id);
    $pst->bindParam(':subject', $subject);
    $pst->bindParam(':content', $content);
    $pst->bindParam(':date', $date);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    return $count;
  }
}


