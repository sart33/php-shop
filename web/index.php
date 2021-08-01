<?php


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');
define('VG_ACCESS', true);

use core\classes\Routing;


header('Content-Type:text/html;charset=utf8');
require_once  dirname(__DIR__) . '/core/settings/internal_settings.php';
if (session_id() == '') {
    session_start();
}

try {
    spl_autoload_register(function ($className) {
        include dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';

    });

    Routing::parse();

//    throw new \Exception('Отсутствуют маршруты в базовых настройках');

}

catch(\Exception $e) {
    exit($e->getMessage());
}