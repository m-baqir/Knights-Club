<?php

class PostData
{
  public function getPostDataById($id, $db)
  {
    $sql = "SELECT * FROM userwall where id = :id";
    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();
    return $pst->fetch(PDO::FETCH_OBJ);
  }

  public function getAllPostData($dbcon)
  {
    $sql = "SELECT * FROM userwall";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->execute();
    $userwalls = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $userwalls;
  }

  public function getAllPostDataforProfile( $user_id, $dbcon)
  {
    $sql = "SELECT * FROM userwall where user_id = :user_id";
    $pdostm = $dbcon->prepare($sql);
    $pdostm->bindParam(':user_id', $user_id);
    $pdostm->execute();
    $userwalls = $pdostm->fetchAll(PDO::FETCH_OBJ);
    return $userwalls;
  }

  public function addPostData($user_id, $subject, $content, $date, $db)
  {
    $sql = "INSERT INTO userwall (subject, content, date, user_id) 
              VALUES ( :subject, :content, :date, :user_id) ";
    $pst = $db->prepare($sql);
    $pst->bindParam(':user_id', $user_id);
    $pst->bindParam(':subject', $subject);
    $pst->bindParam(':content', $content);
    $pst->bindParam(':date', $date);
    $count = $pst->execute();
    return $count;
  }

  public function deletePostData($id, $db)
  {
    $sql = "DELETE FROM userwall WHERE id = :id";

    $pst = $db->prepare($sql);
    $pst->bindParam(':id', $id);
    $count = $pst->execute();
    return $count;

  }

  public function updatePostData($id, $user_id, $subject, $content, $date, $db)
  {
    $sql = "Update userwall
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


