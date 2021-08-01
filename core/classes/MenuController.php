<?php


namespace core\classes;


class MenuController extends AbstractController
{
    static public function adminMenu(): array {

        $adminMenu = [];

       $links = Configurations::routeTable();


        foreach ($links as $link) {
            if(!empty($link[4])) {

                $adminMenu[$link[4]] = $link[0];
            }

       }

        return $adminMenu;
    }

}