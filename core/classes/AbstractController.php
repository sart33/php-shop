<?php


namespace core\classes;


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

}