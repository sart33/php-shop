<?php


namespace core\classes;


class SiteController
{
    public function indexAction($param = false) {

    }

    public function viewAction($param) {

        echo 'viewAction!<br>';
        echo 'Param: ' . $param;

    }
}