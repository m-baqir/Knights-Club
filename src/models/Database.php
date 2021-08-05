<?php

//namespace models;
namespace Webappdev\Knightsclub\models;
Use PDO;

class Database
{

    private static $user = 'EOnWHD3cJq';
    private static $password = 'MuYuJkNWiB';
    private static $dsn='mysql:host=remotemysql.com;port=3306;dbname=EOnWHD3cJq';
    private static $dbconn;

    /*private static $user = 'root';
    private static $password = '';
    private static $dsn = 'mysql:host=localhost;dbname=knightsclub';
    private static $dbconn;*/

    private function __construct()
    {
    }

    public static function getDb(){
        if(!isset(self::$dbconn)){
            try{
                self::$dbconn = new \PDO(self::$dsn,self::$user,self::$password);
                self::$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            }catch (\PDOException $exception){
                $msg = $exception->getMessage();
                exit();
            }
        }
        return self::$dbconn;
    }
}
