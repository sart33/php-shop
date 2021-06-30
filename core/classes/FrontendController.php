<?php

namespace core\classes;

class FrontendController
{


    public function parseRouting()
    {
        $urlTwo = '';
        $param = false;
        $url = $_SERVER['REQUEST_URI'];
        $url = ltrim($url, '/') ;
        if (!empty($url)) {
            if (strpos($url, '?') !== false) {

                $urlArr = explode('?', $url);
                $urlOne = array_shift($urlArr);
                if (!empty($urlArr)) {
                    $urlNext = array_shift($urlArr);
                    if (strpos($urlNext, '=') !== false) {
                        $urlArrTwo = explode('=', $urlNext);
                        $urlTwo = array_shift($urlArrTwo);
                        if (!empty($urlArrTwo)) {
                            $urlThree = array_shift($urlArrTwo);
                            if(is_numeric($urlThree)) {$param = $urlThree; }
                            else { $urlOne = $urlTwo = $urlThree;

                            }
                        }
                    } else {
                        $urlTwo = $urlNext;
                    }
                }
            }
        }
        if(!isset($urlOne)) $urlOne = $url;
        $key = $urlOne . '/' .  $urlTwo;
        $key = rtrim($key, '/');
        if(isset(Configurations::routeTable()[$key])) {
            $routeWay = Configurations::routeTable()[$key];
        }


       if (isset($routeWay)) {
           $ways = explode('/', $routeWay);
           $className = ucfirst(array_shift($ways)) . 'Controller';
           $classWay = __NAMESPACE__ . '\\'. $className;

           $req = new Request();

           $paramPost = [];
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $paramPost = $_POST;
               $req->setPostParameters($paramPost);
           }


           $req->setGetParameters($param);


           $method = array_shift($ways). 'Action';

           $Obj2 = new $classWay();

           $Obj2->$method($req);
       }

    }











}

