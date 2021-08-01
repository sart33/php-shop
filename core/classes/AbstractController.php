<?php


namespace core\classes;

use core\models\User;
use  DateTime;

abstract class AbstractController

{
    protected function render($layout, $file, $vars = 0) {

        $layout = str_replace('/classes/', '/', $layout);

        if(!empty($vars) && $vars !== 0) {
            echo  (new View())->renderView($layout, $file, $vars);

        } else {
            echo  (new View())->renderView($layout, $file);
        }

    }

    public function redirectTo($routeName, $routeParams = []) {

        $redirect = Routing::generateUrl($routeName, $routeParams);
        header("Location: $redirect");



    }

    protected function writeLog($message, $file = 'log.txt', $event = 'Fault') : void {

        $datetime = new DateTime();

        $str = $event . ': ' . $datetime->format('d-m-Y G:i:s') . ' - ' . $message . "\r\n";
        // Пишем данные в файл. Конкретно - дописываем в конец файла.

        file_put_contents('log/' . $file, $str, FILE_APPEND);

    }


}