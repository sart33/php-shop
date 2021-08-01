<?php


namespace core\classes;


 class LanguageController extends AbstractController
{
    static public function getLang()
    {
        if (!empty(file_get_contents('/var/www/my-project/core/language/lang.txt'))) {

            return file_get_contents('/var/www/my-project/core/language/lang.txt');

        }
    }

 static public function getLanguage()
    {
        if (!empty(file_get_contents('/var/www/my-project/core/language/lang.txt'))) {

            $lang = Configurations::languageTable()[file_get_contents('/var/www/my-project/core/language/lang.txt')];
            $lang[3] = file_get_contents('/var/www/my-project/core/language/lang.txt');

            return $lang;

        }
    }
}