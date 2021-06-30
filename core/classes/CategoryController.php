<?php


namespace core\classes;


use core\models\Category;
use core\models\DatabaseConnection;
use core\models\Repository;

class CategoryController extends AbstractController
{
    public $templateName =  __DIR__ . '/views/layouts/category.tpl.php';

    public function indexAction() {

        $params = [
            'table_name' => 'category',
              [
                    'parent_id' => '2',
//                    'name' => 'Платья',
                    'img' => 'null',
                    'menu' => '1',
                    'value' => '999',
                    'model' => 'Model'
              ]  ,
            'limit' => '10',
            'offset' => '5'


        ];
      $param = Category::findBy($params);

//      $param = Category::save();
//        $param = Category::remove(3976);


        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/category/index.tpl.php', $param);

    }

    public function viewAction($id) {


//        echo 'Param: ' . $param;

    return  Parent::render($this->templateName,dirname(__DIR__) . '/views/category/views.tpl.php', $id);




    }

}

