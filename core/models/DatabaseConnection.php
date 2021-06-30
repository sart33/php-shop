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

        if(!empty(self::$_instance)) {
//            echo 'ok! <br>';
            return self::$_instance;


        } else {

            $dbParams = Configurations::databaseParams();

            self::$_instance = new PDO($dbParams['DB_TYPE'] . ':host=' . $dbParams['DB_HOST'] . ';dbname=' . $dbParams['DB_NAME'] . ';charset=utf8mb4',
                $dbParams['DB_USER'], $dbParams['DB_PASS'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
//            echo 'no(( <br>';

        }
        return self::$_instance;

    }

    static public function query($query, $one = NULL) {
        if($one === true) {
            $sth = self::getInstance()->query($query);
            $res = $sth->fetchObject();
        } elseif($one === false) {
            $sth = self::getInstance()->query($query);
            $res = $sth->fetchAll(PDO::FETCH_CLASS);
        } else {
            $sth = self::getInstance()->query($query,PDO::FETCH_ASSOC);
            $res = $sth->fetchAll();
        }

       return $res;

    }
}