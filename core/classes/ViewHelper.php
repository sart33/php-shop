<?php


namespace core\classes;

use core\classes\ViewHelper as vh;
class ViewHelper
{

    public static function url($routeName, $routeParams = []) {

        return Routing::generateUrl($routeName, $routeParams);
    }

}
//class_alias('ViewHelper', 'vh', true);