<?php


namespace core\classes;


class Configurations
{

    public static function routeTable() {

        return [
            'index.index' => ['/index', 'site', 'index', [] , 'Главная'],
            'login.index' => ['/login', 'site', 'login', [] , 'Залогиниться'],
            'logout.index' => ['/logout', 'site', 'logout', [] , 'Разлогиниться'],
            'signup.index' => ['/signup', 'site', 'register', [] , 'Регистрация'],
            'verification.index' => ['/verification', 'site', 'verification', ['token/email'] , ''],
            'category.view' => ['/category', 'category', 'view', ['id'] ],
            'category.index' => ['/category', 'category', 'index', []  , 'Категории'],
            'product.view' => ['/product', 'product', 'view', ['id'] ],
            'product.index' => ['/product', 'product', 'index', []  , 'Товары'],
            'device.index' => ['/device', 'device', 'index', []  , ''],
            'client.index' => ['/client', 'client', 'index', []  , 'Клиент Интерфейс'],
            'parsing.index' => ['/parsing', 'parsing', 'index', []  , 'Парсинг задачи'],
            'parsing.parse' => ['/parsing/parse', 'parsing', 'parse', []  , 'XML парсинг'],
            'client.cost' => ['/client/cost', 'client', 'cost', [], ''],
            'client.result' => ['/client/result', 'client', 'result', []  , ''],
            'client.insert' => ['/client/insert', 'client', 'insert', []  , '']



        ];
    }

//    public static function databaseParams() {
//         return [
//             'DB_TYPE' => 'mysql',
//             'DB_HOST' => 'localhost',
//             'DB_NAME' => 'voyts_4_com',
//             'DB_USER' => 'root',
//             'DB_PASS' => 'ClaymoreN6'
//         ];
//    }

    public static function languageTable() {
        return [
            'ru' => ['Russian', 'Русский', 'ру'],
            'ua' => ['Ukrainian', 'Українська', 'укр'],
            'en' => ['English', 'English', 'en'],
            'de' => ['German', 'Deutsch', 'de'],
        ];
        "CREATE TABLE `voyts_4_com`.`language` ( `id` SMALLINT(4) NOT NULL AUTO_INCREMENT , `language` INT(255) NOT NULL , `default` FLOAT NOT NULL DEFAULT '0' , `abbreviation` INT(4) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    }
}