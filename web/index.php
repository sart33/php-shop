<?php


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use core\classes\FrontendController;


header('Content-Type:text/html;charset=utf8');
session_start();
try {
    spl_autoload_register(function ($className) {
        include dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';

    });
    $obj1 = new FrontendController();

    $obj1->parseRouting();

    throw new \Exception('Отсутствуют маршруты в базовых настройках');

}

catch(\Exception $e) {
    exit($e->getMessage());
}