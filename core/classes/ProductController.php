<?php


namespace core\classes;


class ProductController extends AbstractController
{
    public $templateName =  __DIR__ . '/views/layouts/product.tpl.php';


    public function indexAction() {

        $param = '';

        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/product/index.tpl.php', $param);

    }

    public function viewAction($id) {

        $param = '';


        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/product/views.tpl.php', $id);

    }
}