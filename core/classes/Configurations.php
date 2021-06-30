<?php


namespace core\classes;


class Configurations
{

    public static function routeTable() {

        return [

            'category/id'  => 'category/view',
            'category' => 'category/index',
            'product/id' => 'product/view',
            'product' => 'product/index'
        ];
    }

    public static function databaseParams() {
         return [
             'DB_TYPE' => 'mysql',
             'DB_HOST' => 'localhost',
             'DB_NAME' => 'voyts_4_com',
             'DB_USER' => 'root',
             'DB_PASS' => 'ClaymoreN6'
         ];
    }
}