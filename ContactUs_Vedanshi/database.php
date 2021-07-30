<?php

class Database
{

  private static $user = 'root';
  private static $password = 'root';
  private static $dsn = "mysql:host=localhost:3307;dbname=knights-club";
  private static $dbcon;

  private function __construct()
  {
  }

  public static function getDb()
  {
    if (!isset(self::$dbcon)) {
      try {
        self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
        self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      } catch (PDOException $e) {
        $msg = $e->getMessage();
        //include '../error.php';
        exit();
      }
    }

    return self::$dbcon;
  }
}