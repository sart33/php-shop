<?php


namespace core\classes;
use core\models\DatabaseConnection;
use mysql_xdevapi\BaseResult;
use XMLReader;

class ParsingController extends AbstractController
{

    public string $templateName =  __DIR__ . '/views/layouts/device.tpl.php';

    public array $page = [];


    public function indexAction() {


//        $str = file_get_contents('https://garda.com.ua/product-category/dresses/');
//
////        echo $str;
//
////        var_dump($str);
//      if(preg_match_all('#<title>(.+?)</title>#su', $str, $matches) !== null  && !empty($matches[1])) {
//          $page['title'] = $matches[1][0];
//      } else {
//          return false;
//      }
//
//
//
/*        if(preg_match_all('#<div\s+?id\s*?=\s*?(["\'])page\1[^>]*?>(.+?)<div\s+?class\s*?=\s*?(["\'])our-features-box#su', $str, $matches) !== null  && !empty($matches[1])) {*/
//            $page['page'] = $matches[2][0];
//        } else {
//            return false;
//        }
//
//        /*** Задачи на парсинг */
//
//        $strLessonOne = file_get_contents('http://old.code.mu/exercises/advanced/php/parsing/parsing-sajtov-regulyarnymi-vyrazeniyami-php/1/1.php');
//
//        $pageLessonOne = [];
//
/*        if(preg_match_all('#<head[^>]*?>(.+?)</head>#su', $strLessonOne, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonOne['head'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<title[^>]*?>(.+?)</title>#su', $strLessonOne, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonOne['title'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<body[^>]*?>(.+?)</body>#su', $strLessonOne, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonOne['body'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<a\s*?.*?\s*?href\s*?=[\\\]*?\s*?["\'](.+?)[\\\]*?["\'][^>]*?>#su', $strLessonOne, $matches) !== null  && !empty($matches)) {*/
//            $pageLessonOne['link'] = $matches;
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<a\s*?.*?\s*?href\s*?=[\\\]*?\s*?["\'].+?[\\\]*?["\'][^>]*?>(.+?)</a>#su', $strLessonOne, $matches) !== null  && !empty($matches)) {*/
//            $pageLessonOne['link_text'] = $matches;
//        } else {
//            return false;
//        }



//        $strLessonTwo = file_get_contents('http://old.code.mu/exercises/advanced/php/parsing/parsing-sajtov-regulyarnymi-vyrazeniyami-php/2/1.php');
//
//        $pageLessonTwo = [];
//
/*        if(preg_match_all('#<body[^>]*?>(.+?)</body>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['body'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<meta\s*?charset\s*?=\s*?"(.+?)"\s*?>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['charset'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
//
//        if(preg_match_all('#http-equiv="Content-Type".+?charset=(.+?)">#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {
//            $pageLessonTwo['charset-old'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<div[^>]+?id="content"\s+?>(.+?)</div>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['content'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
/*        if(preg_match_all('#<a\s*?.*?\s*?href\s*?=[\\\]*?\s*?["\'](.+?)[\\\]*?["\'][^>]*?>#su', $pageLessonTwo['content'], $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['link'] = $matches[1];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<p.*?>(.+?)</p>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['paragraph'] = $matches[1];
//        } else {
//            return false;
//        }
//
//
//
/*        if(preg_match_all('#<p.*?>(.+?)</p>#su', $pageLessonTwo['content'], $matches) !== null && !empty($matches[1][0])) {
//            $pageLessonTwo['content']['paragraph'] = $matches[1];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<p\s*?class\s*?=\s*?[\\\]*?\s*?["\']www[\\\]*?["\'][^>]*?>(.+?)</p>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['www-paragraph'] = $matches[1];
//        } else {
//            return false;
//        }
//
//
/*        if(preg_match_all('#<a\s*?href\s*?=[\\\]*?\s*?["\'](\S+?)[\\\]*?["\']\s*?class\s*?=\s*?"www"\s*?>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['www-link'] = $matches[1];
//        } else {
//            return false;
//        }
/*        if(preg_match_all('#<a\s*?class\s*?=\s*?"www"\s*?href\s*?=[\\\]*?\s*?["\'](\S+?)[\\\]*?["\']\s*?>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['www-link'][] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
//
/*        if(preg_match_all('#<a\s*?href\s*?=[\\\]*?\s*?["\']\S+?[\\\]*?["\']\s*?class\s*?=\s*?"www"\s*?>(.+?)</a>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['www-anchor'] = $matches[1];
//        } else {
//            return false;
//        }
/*        if(preg_match_all('#<a\s*?class\s*?=\s*?"www"\s*?href\s*?=[\\\]*?\s*?["\']\S+?[\\\]*?["\']\s*?>(.+?)</a>#su', $strLessonTwo, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonTwo['www-anchor'][] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
//        $strLessonThree = file_get_contents('http://old.code.mu/exercises/advanced/php/parsing/parsing-sajtov-regulyarnymi-vyrazeniyami-php/3/1.php');
//
//        $pageLessonThree = [];
//
/*        if(preg_match_all('#<li><a\s*?href\s*?=[\\\]*?\s*?["\'](\S+?)[\\\]*?["\']\s*?.*?>#su', $strLessonThree, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonThree['menu-link'] = $matches[1];
//        } else {
//            return false;
//        }
//
/*        if(preg_match_all('#<img\s+?\S*?\s*?src\s*?=\s*?[\\\]*?\s*?["\'](\S+?)[\\\]*?["\']\s*?.*?>#su', $strLessonThree, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonThree['img'] = $matches[1];
//        } else {
//            return false;
//        }
//
////        var_dump($strLessonThree);
//
/*        if(preg_match_all('#<div\s+?id="content"\s*?>(.+?)\+?<div\s+?id="footer"#su', $strLessonThree, $matches) !== null && !empty($matches[1][0])) {*/
//            $pageLessonThree['content'] = $matches[1][0];
//        } else {
//            return false;
//        }
//
//
/*        $contentTemp = preg_replace('#<script[^>]*?>.*?</script>#','', $pageLessonThree['content'], '-1', $count);*/
//        $pageLessonThree['content-res'] = preg_replace('#<script>(\s*?.*?){1,}</script>#','', $contentTemp, '-1', $count);

//        var_dump($pageLessonThree['content-res']);

//        $jsonClient = file_get_contents('/var/www/my-project/core/log/restapi_log');

//      $res =  $this->getPage('https://grda.com.ua/product-category/dresses/');

      /*** LessonN2 (curl) parsing */
//        $arrPars = [
//                'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-curl-v-php/1/1.php',
//                'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-curl-v-php/1/2.php',
//                'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-curl-v-php/1/3.php',
//                'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-curl-v-php/1/4.php',
//                'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-curl-v-php/1/5.php'
//            ];
//
//        $pages = [];
//        foreach ($arrPars as $page) {
//
//            $res =  $this->getPage($page);
//
//            if(preg_match_all('#<title>(.+?)</title>#su', $res, $matches) !== null  && !empty($matches[1])) {
//                $pages['title'][] = $matches[1][0];
//            } else {
//                $pages['title'][] = '';
//            }
//
//
//            if(preg_match_all('#<h1>(.+?)</h1>#su', $res, $matches) !== null  && !empty($matches[1])) {
//                $pages['h1'][] = $matches[1][0];
//            } else {
//                $pages['h1'][] = '';
//            }
//
//
//
/*            if(preg_match_all('#<div\s+?id\s*?=\s*?["\']main["\']\s*?>(.+?)</div>#su', $res, $matches) !== null  && !empty($matches[1])) {*/
//
//                $content = trim($matches[1][0]);
//                $content = (preg_replace('#<h1>\d</h1>\n+?\t*?<p>#su', '<p>', $content));
/*                $content = (preg_replace('#<b>(.*?)</b>(.*?)<span[^>]*?>(.*?)</span>#su', '$1$2$3', $content));*/
/*                $content = (preg_replace('#<span[^>]*?>(.*?)</span>#su', '$1', $content));*/
/*                $content = (preg_replace('#<p[^>]*?>#su', '<p>', $content));*/
//
//
//                $pages['content'][] = $content;
//            } else {
//                $pages['content'][] = '';
//            }
//
//
//
//
//
//
//        }

        $res =  $this->getPage('http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/1/index.php');
        $resultOne = [];
        $resultTwo = [];
        $pages = [];


        $domDocument = new \DOMDocument();
        @$domDocument->loadHTML($res);

        $xPath = new \DOMXPath($domDocument);

        $resOne = $xPath->query('//div[@id="menu"]/ul/li/a/text()');
        if($resOne->length > 0) {
            foreach ($resOne as $item) {

                $resultOne[] = $item->nodeValue;

            }

        }


                $resTwo = $xPath->query('//div[@id="menu"]/ul/li/a/@href');
                if($resTwo->length > 0) {
                    foreach ($resTwo as $item) {
                        $resultTwo = $item->nodeValue;
                        $url = 'http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/1/' . $resultTwo;
                        $html =  $this->getPage($url);
                        $pages['url'][] = $url;
                        preg_match_all('#<title>(.+?)</title>#su', $html, $matches);
                        $pages['title'][] = $matches[1][0];
                        if(preg_match_all('#<div\s+?id\s*?=\s*?["\']content["\']\s*?>(.+?)</div>#su', $html, $matches) !== null  && !empty($matches[1])) {

                            $content = trim($matches[1][0]);
                            $content = (preg_replace('#(<h1>.+?</h1>)\n#su', '', $content));
                            $content = (preg_replace('#<b>(.*?)</b>(.*?)<span[^>]*?>(.*?)</span>#su', '$1$2$3', $content));
                            $content = (preg_replace('#<span[^>]*?>(.*?)</span>#su', '$1', $content));
                            $content = (preg_replace('#<p[^>]*?>#su', '<p>', $content));
                            $content = (trim($content));


                            $pages['content'][] = $content;
                        } else {
                            $pages['content'][] = '';
                        }


                    }

                }











        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/parsing/index.tpl.php');

    }

    public function parseAction()
    {
        if (!empty($_SESSION['auth'])) {
        $reader = new \XMLReader();

        $finalArr = [];
        $n = 0;
        $res =  $reader->open('https://jadone.biz/index.php?route=feed/chtoto_yml');
         if(!empty($res)) {
             while($reader->read()) {

                 if($reader->nodeType === XMLReader::ELEMENT && $reader->name === 'offer') {
                     $n++;
                     $xmlArr = [];
                     $valuesArr = [];
                     $db_field = [];

                     //  simplexml_import_dom Получает объект класса SimpleXMLElement из узла DOM
                     $simpleXmlObj = simplexml_load_string($reader->readOuterXml());


                    $xmlString = $reader->readOuterXml();
                     preg_match_all('#<([A-Za-z]+?)>(.+?)</([A-Za-z]+?)>#su', $xmlString, $matches);
                     preg_match_all('#<param name="(.+?)">(.+?)</param>#su', $xmlString, $matchesTwo);

                     foreach ($matches[2] as $match) {
                         $valuesArr[] = html_entity_decode($match);
                  }
                  $keyArr = $matches[1];
                    $count = 1 ;


                    $keyArrTwo = [];
                     foreach ($keyArr as $key) {

                         if($key === 'picture') {
                             $keyArrTwo[] = $key . '_' . $count;
                             $count++;
                         } else {
                             $keyArrTwo[] = $key;
                         }

                    }

                   $elementsArr = array_combine($keyArrTwo, $valuesArr);
                     $insertedArr = [];

                     foreach ($elementsArr as $key => $item) {

                         if (preg_match('/[A-Z]/', $key) !== 0) {
                             $tabNameAr = preg_split('/(?=[A-Z])/', $key, -1, PREG_SPLIT_NO_EMPTY);
                             $tableName = lcfirst(array_shift($tabNameAr));
                             if (!empty($tabNameAr[0])) {
                                 foreach ($tabNameAr as $v) {
                                     $elementsArr[$tableName .= '_' . lcfirst($v)] = $item;
                                 }
                             }
                         } else {
//                             if($key === 'picture_3') {
//                                 if(!isset($elementsArr['picture_4'])) {
//                                     $insertedArr['picture_4'] = null;
//                                     $insertedArr['picture_5'] = null;
//                                 }
//                                 $elementsArr = array_merge(
//                                     array_slice($elementsArr, 0, 9),
//                                     $insertedArr,
//                                     array_slice($elementsArr, 9)
//                                 );
//                             }
                             $elementsArr[$key] =  $item;

                         }
                     }



//                     foreach ($sqlFieldsArr as $key => $item) {
//                         if(isset($simpleXmlObj->$key)) $xmlArr[$item] = $simpleXmlObj->$key;
//
//                     }
                     $elementsArr['brand'] = $matchesTwo[2][0];
                     $elementsArr['size'] = $matchesTwo[2][1];


                     $data = $simpleXmlObj->attributes();



                     $jsonTwo = json_encode($data);
                     $xml_attribute = json_decode($jsonTwo, true);

                     $attribute = $xml_attribute['@attributes'];
                     unset($elementsArr['currencyId'], $elementsArr['categoryId']);
                     $arrAll = array_merge($attribute, $elementsArr);
                     unset($arrAll['selling_type'], $arrAll['type']);

                     foreach ($arrAll as $key => $item) {

                             if($key === 'size') {

                                 $sizesArr = explode( ',', $item);

                                 $sizesC = count($sizesArr);
                                 for ($i=1; $i<= $sizesC; $i++) {
                                     $arrAll[$key . '_' . $i] = $sizesArr[($i - 1)];
                                 }
                             }



                     }



//                    $arrAll['description'] = preg_replace('#"#su','\\"', $arrAll['description'], -1);

                     $db_field['id'] = isset($arrAll['id']) ? $n : $n;
                     $db_field['sku'] = isset($arrAll['id']) ? $arrAll['id'] : $n;
                     $db_field['name'] = isset($arrAll['name']) ? $arrAll['name'] : null;
                     $db_field['model'] = isset($arrAll['model']) ? $arrAll['model'] : null;
                     $db_field['description'] = isset($arrAll['description']) ? $arrAll['description'] : null;
                     $db_field['price'] = isset($arrAll['price']) ? $arrAll['price'] : null;
                     $db_field['currency_id'] = isset($arrAll['currency_id']) ? $arrAll['currency_id'] : null;
                     $db_field['available'] = isset($arrAll['available']) ? $arrAll['available'] : null;
                     $db_field['main_picture'] = isset($arrAll['mainpicture']) ? $arrAll['mainpicture'] : null;
                     $db_field['picture_1'] = isset($arrAll['picture_1']) ? $arrAll['picture_1'] : null;
                     $db_field['picture_2'] = isset($arrAll['picture_2']) ? $arrAll['picture_2'] : null;
                     $db_field['picture_3'] = isset($arrAll['picture_3']) ? $arrAll['picture_3'] : null;
                     $db_field['picture_4'] = isset($arrAll['picture_4']) ? $arrAll['picture_4'] : null;
                     $db_field['picture_5'] = isset($arrAll['picture_5']) ? $arrAll['picture_5'] : null;
                     $db_field['picture_6'] = isset($arrAll['picture_6']) ? $arrAll['picture_6'] : null;
                     $db_field['color'] = isset($arrAll['color']) ? $arrAll['color'] : null;
                     $db_field['category_id'] = isset($arrAll['category_id']) ? $arrAll['category_id'] : null;
                     $db_field['brand'] = isset($arrAll['brand']) ? $arrAll['brand'] : null;
                     $db_field['delivery'] = isset($arrAll['delivery']) ? $arrAll['delivery'] : null;
                     $db_field['size_1'] = isset($arrAll['size_1']) ? $arrAll['size_1'] : null;
                     $db_field['size_2'] = isset($arrAll['size_2']) ? $arrAll['size_2'] : null;
                     $db_field['size_3'] = isset($arrAll['size_3']) ? $arrAll['size_3'] : null;
                     $db_field['size_4'] = isset($arrAll['size_4']) ? $arrAll['size_4'] : null;
                     $db_field['size_5'] = isset($arrAll['size_5']) ? $arrAll['size_5'] : null;
                     $db_field['size_6'] = isset($arrAll['size_6']) ? $arrAll['size_6'] : null;



//  'hit',
//  'new',
//  'sale',";




                     unset($arrAll['size']);
                     $finalArr[$db_field['id']] = $db_field;
//                     file_put_contents('/var/www/my-project/core/log/parsing-res-json.log',json_encode($result), FILE_APPEND);
                     unset($data, $simpleXmlObj, $sizesArr, $xmlArr, $xml_array, $data, $json, $count, $i, $sizesC, $result, $attribute, $count, $data, $elementsArr, $i, $jsonTwo, $keyArr, $keyArrTwo, $arrAll);

                     $db_field = [];
//                     $resTwo = file_get_contents('/var/www/my-project/core/log/parsing-res-json.log');
//                     file_put_contents('/var/www/my-project/core/log/parsing-res-json.log', '');
//                     $array = json_decode($resTwo, true);

                    }
                 }
             }
             $reader->close();
         $dbName = DB_NAME;

        $fields = '(';

         $value = '(';

         $keyFirst = array_key_first($finalArr);

            foreach ($finalArr[$keyFirst] as $key => $row) {

                    $fields .= $key . ',';

//                if(is_int($row)) {
//
//                    $value .= $row . ',';
//
//                } elseif ($row == 'null') {
//                    $value .= "NULL" . ',';
//                } else {
//                    $value .= "'" . $row . "',";
//                }
            }

        $fields = rtrim($fields, ',') . ')';
     $ii = 0;
        foreach ($finalArr as $item) {


//            $value .= '(';



            foreach ($item as $key => $row) {

                if (is_int($row)) {

                    $value .= $row . ',';

                } elseif ($row == 'null') {
                    $value .= "NULL" . ',';
                } else {
                    $value .= "'" . $row . "',";
                }
            }
            $value = rtrim($value, ',') . '), (';

//            $ii++;
//            if($ii === 100) {
//                $value = rtrim($value, ', (' ) . ';';
//            }
//            break 1;
        }






        $value = rtrim($value, ', (' ) . ';';



        $sql = "INSERT INTO $dbName.product  $fields VALUES $value";
        file_put_contents('/var/www/my-project/core/log/parsing-sql-query.log', $sql);
//        $insertUpdate = DatabaseConnection::query("$sql");


        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/parsing/parsing.tpl.php');

        } else {
            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }


    public function getPage(string $url): ?string {

        $curl = curl_init();
        // true для возврата результата передачи в качестве строки из curl_exec()
        // вместо прямого вывода в браузер.
        curl_setopt($curl, CURLOPT_URL, $url);

//        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Возвращать ли заголовки, - Да.
        curl_setopt($curl, CURLOPT_HEADER, true);
        // Следовать ли curl-у за редиректами, тоже - Да.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $status = curl_exec($curl);
        if(!empty($tatus) && $status === false) {

            $error = curl_errno($curl);
            $message = curl_error($curl);
            $header = curl_getinfo($curl);

            $log = 'Error loading '.
                $header['url'] . ' 
                http code: ' . $header['http_code'] .
                ' error: ' . $error .
                'message: ' . $message;

            $this->writeLog($log, 'parsing_log.txt');


        }

        curl_close($curl);
        return $status;
    }

    public function getPages(array $urls): ?string {

        foreach ($urls as $url) {


            $curl = curl_init();
            // true для возврата результата передачи в качестве строки из curl_exec()
            // вместо прямого вывода в браузер.
            curl_setopt($curl, CURLOPT_URL, $url);

//        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // Возвращать ли заголовки, - Да.
            curl_setopt($curl, CURLOPT_HEADER, true);
            // Следовать ли curl-у за редиректами, тоже - Да.
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

            $status = curl_exec($curl);
            if (!empty($tatus) && $status === false) {

                $error = curl_errno($curl);
                $message = curl_error($curl);
                $header = curl_getinfo($curl);

                $log = 'Error loading ' .
                    $header['url'] . ' 
                http code: ' . $header['http_code'] .
                    ' error: ' . $error .
                    'message: ' . $message;

                $this->writeLog($log, 'parsing_log.txt');


            }

            curl_close($curl);
        }
        return $status;
    }


}