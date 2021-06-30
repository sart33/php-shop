<?php


namespace core\models;


class Category extends Repository
{
    protected $tableName = 'category';

    private $id;
    private $parentId;
    private $name;
    private $img;
    private $menu;
    private $sort;
    private $status;
    private $keywords;
    private $description;
    private $openGraph;
    private $twitter;

//public function test()
//{
//    return Repository::find($this->tableName);
//}

}