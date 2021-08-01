<?php

namespace core\classes;

use core\classes\Configurations;
use core\classes\Request;

class Routing
{
    public static function parse()
    {
        $urlTwo = '';
        if(!empty(file_get_contents('/var/www/my-project/core/language/lang.txt') && isset(Configurations::languageTable()[file_get_contents('/var/www/my-project/core/language/lang.txt')]))) {
            $language = file_get_contents('/var/www/my-project/core/language/lang.txt');
        } else {$language = false; }

        $param = false;

        $url = $_SERVER['REQUEST_URI'];
        $url = ltrim($url, '/') ;
        $url = rtrim($url, '/') ;

        if (!empty($url)) {

//            foreach (Configurations::languageTable() as $key => $item) {
//
//                if (strpos($url, $key) !== false) {
//                    $language = $key;
//                }
//            }


            if (strpos($url, '?') !== false) {

                $urlArr = explode('?', $url);
                $urlOne = array_shift($urlArr);
                if (!empty($urlArr)) {
                    $urlNext = array_shift($urlArr);
                    preg_match('#(lang=)([a-z]+)#', $urlNext, $matches);
                    if(!empty($matches)) {

                        if(isset(Configurations::languageTable()[$matches[2]])) {
                            $language = $matches[2];
                            file_put_contents('/var/www/my-project/core/language/lang.txt', $language);
                            $url = preg_replace('#(\?lang=)([a-z]+)([&|/]*)#', '', $url);
                            $urlOne = preg_replace('#(lang=)([a-z]+)([&|/]*)#', '', $urlNext);
                           $urlNext = '';
                            if (!empty($urlArr)) {
                                $urlNext = array_shift($urlArr);
                            }
                        }
                    }
                    if (strpos($urlNext, '=') !== false) {
                        $urlArrTwo = explode('=', $urlNext);

                        $urlTwo = array_shift($urlArrTwo);
                        if($urlTwo === 'ver') {
                            $urlTwo = 'index';
                            $urlThree = array_shift($urlArrTwo);

                        $token = preg_replace('#(&mail)$#', '', $urlThree);
                        }
                        if (!empty($urlArrTwo)) {
                            $urlThree = array_shift($urlArrTwo);
                            if(is_numeric($urlThree)) {$param = $urlThree;}
                            elseif (!empty($token)) {
                                $param = $token . '/' . $urlThree;
                            }
                            else { $urlOne = $urlTwo = $urlThree;

                            }
                        }
                    } else {
                        $urlTwo = $urlNext;
                    }
                }
            } elseif (strpos($url, '/') !== false) {
                $urlArr = explode('/', $url);
                $urlOne = array_shift($urlArr);
                if(isset(Configurations::languageTable()[$urlOne])) {
                    $language = $urlOne;
                    file_put_contents('/var/www/my-project/core/language/lang.txt', $language);
                    $urlOne = array_shift($urlArr);
                }
                    if (!empty($urlArr)) {
                    $urlTwo = array_shift($urlArr);
                }
                if (!empty($urlArr)) {
                    $urlThree = array_shift($urlArr);
                    if(is_numeric($urlThree)) {$param = $urlThree; }
                }
            } else {
                if(isset(Configurations::languageTable()[$url])) {
                    $language = $url;
                    file_put_contents('/var/www/my-project/core/language/lang.txt', $language);
                    $url = "";
                }
            }
        }
        if($urlTwo === 'id') {
            $urlTwo = 'view';
        } elseif (empty($urlTwo)) {
            $urlTwo = 'index';
        }
        if(empty($urlOne)) {
            if(!empty($url)) $urlOne = $url;
            else $urlOne = 'index';
        }
        $key = $urlOne . '.' .  $urlTwo;

        $key = rtrim($key, '/');
        if(isset(Configurations::routeTable()[$key])) {
            $routeWay = Configurations::routeTable()[$key];
        }


        if (isset($routeWay)) {
//            $ways = explode('/', $routeWay);
            $className = ucfirst($routeWay[1]) . 'Controller';
            $classWay = __NAMESPACE__ . '\\'. $className;

            $req = new Request();

            $paramPost = [];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $paramPost = $_POST;
                $req->setPostParameters($paramPost);
            }

            $req->setGetParameters($param);

            $method = $routeWay[2] . 'Action';

            $Obj2 = new $classWay();

            return  $Obj2->$method($req);
        }
        return false;
    }

    public static function generateUrl($routeName, $routeParams = []) {

        $url = '';

        if(!empty(Configurations::routeTable()[$routeName])) {
            $genUrl = Configurations::routeTable()[$routeName];

                if(!empty($routeParams)) {

                    $nameParams = $genUrl[3][0];

                   if(!empty($routeParams[$nameParams])) {
                    $url = $genUrl[0] . '?' . $nameParams . '=' . $routeParams[$nameParams];
                   }


                } else {
                    $url = $genUrl[0];
                }


        }

        return $url;
    }

}