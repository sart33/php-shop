<?php


namespace core\models;
use core\classes\Configurations;
use \PDO;

 class DatabaseConnection
{



     static private $_instance;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    static public function getInstance() {

        if(self::$_instance instanceof DatabaseConnection) {


        } else {


            self::$_instance = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


        }
        return self::$_instance;

    }

    static public function query($query, $one = NULL) {
        $res = false;
        if($one === true) {
            $sth = self::getInstance()->query($query);
            if(!empty($sth)) {
                $res = $sth->fetchObject();
            }
        } elseif($one === false) {
            $sth = self::getInstance()->query($query);
            if(!empty($sth)) {
                $res = $sth->fetchAll(PDO::FETCH_CLASS);
            }
        } else {
            $sth = self::getInstance()->query($query,PDO::FETCH_ASSOC);
            if(!empty($sth)) {
                $res = $sth->fetchAll();
            }
        }

       return $res;

    }
}