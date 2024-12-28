<?php

class DB 
{


    private static $db_host = 'localhost';
    private static $db_dbname = 'test_db';

    private static $db_user = 'root';

    private static $db_pass = '';


    public static function connect(): PDO
    {
        $db_host = self::$db_host;
        $db_dbname = self::$db_dbname;
        $db_user = self::$db_user;
        $db_pass = self::$db_pass;


        try {
            $pdo = new PDO("mysql:host=$db_host; dbname=$db_dbname", $db_user, $db_pass,array(
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
            ));
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}