<?php


namespace core\models;

use core\models\DatabaseConnection;
use \ReflectionClass;
use \ReflectionProperty;
use \Exception;
 class Repository
 {



     private $isNew;

     private static $removed = false;

     protected function __construct($isNew = true)
     {

         $this->isNew = $isNew;

     }

     public static function find($id)
     {
         $className = get_called_class();
//
         $tableObj = new $className(false);
//        $this->isNew = false;

         $tableArr = DatabaseConnection::query("SELECT * FROM $tableObj->tableName WHERE id=$id");

         if (isset($tableArr)) {

             foreach ($tableArr[0] as $key => $item) {

                 if (strpos($key, '_') === false) {
                     $tableObj->$key = $item;
                 } else {
                     $keyArr = explode('_', $key);
                     $key = array_shift($keyArr);
                     if (!empty($keyArr[0])) {
                         foreach ($keyArr as $val) {
                             $key .= ucfirst($val);

                         }
                     }
                     $tableObj->$key = $item;
                 }

             }

//             $tableArr;
             return $tableObj;
         } else {
             return null;
         }


     }

     static public function tester()
     {

         return [
             'id' => ' 223 ',
             'parent_id' => '  197',
             'name' => '   Самые крассивы Платья!',
             'img' => ' null  ',
             'menu' => '1  ',
             'sort' => '0  ',
             'status' => ' 0',
             'keywords' => '   Хелоуин',
             'description' => '     Хелоуин Страшный!!! праздник',
             'open_graph' => '',
             'twitter' => 'twitter',
             'index' => 'Index333',
             'surname' => 'Ivanova',
             'function' => 'ERROR!!!',



         ];

     }

     static public function save($method = false)
     {

         $className = get_called_class();

         $dbRows = self::refMethodInfo();

         $sqlWrUpQuery = '';

         $tableNameArr = explode('\\',$className);

         $tableName = '';
         foreach ($tableNameArr as $item) {

           if(preg_match('/^[A-Z]/', $item) !== 0) {
               $tabNameAr = preg_split('/(?=[A-Z])/', $item, -1, PREG_SPLIT_NO_EMPTY);
               $tableName = lcfirst(array_shift($tabNameAr));
               if (!empty($tabNameAr[0])) {
                   foreach ($tabNameAr as $v) {
                       $tableName .= '_' . lcfirst($v);
                   }
               }
            }
         }

         $columnsInfoArr = self::showColumns($tableName);
         $tableKey = $columnsInfoArr['id_row'];
         $tableFields = '';
         $tableValueArr = [];

     foreach (self::tester() as $key => $item) {

        if (in_array($key, $dbRows) === true) {

            $item = trim($item);
            $tableValueArr[] = $item ;

            }

        }

         $keyPosition = array_search($tableKey, $dbRows);

         if(is_int($keyPosition)) {
             $keyValue = ($tableValueArr[$keyPosition]);
             unset($dbRows[$keyPosition]);
             unset($tableValueArr[$keyPosition]);

         }
         
         $updateMethodArr = array_combine($dbRows, $tableValueArr);

            if ($method === true) {
                $sqlWrUpQuery = "UPDATE $tableName SET ";

                foreach ($updateMethodArr as $key => $item) {

                    $sqlWrUpQuery .= $key . ' = ';

                    if (is_int($item)) {
                        $sqlWrUpQuery .= $item . ', ';

                    } elseif ($item == 'null') {

                        $sqlWrUpQuery .= "NULL" . ', ';

                    } else {
                        $sqlWrUpQuery .= "'" . $item . "', ";
                    }
                }

                $sqlWrUpQuery = rtrim(rtrim($sqlWrUpQuery), ',') . "WHERE $tableName.$tableKey = $keyValue";

            } else {

                unset($key);
                unset($item);

                $sqlInsKey = ' (';
                $sqlInsValue = ' (';

                foreach ($updateMethodArr as $key => $item) {
                    $sqlInsKey .= $key . ', ';

                if (is_int($item)) {
                    $sqlInsValue .= $item . ', ';

                } elseif ($item == 'null') {

                    $sqlInsValue .= "NULL" . ', ';

                } else {
                    $sqlInsValue .= "'" . $item . "', ";
                }
         }
                $sqlInsKey = rtrim(rtrim($sqlInsKey), ',') . ') ';
                $sqlInsValue = rtrim(rtrim($sqlInsValue), ',') . ') ';
                $sqlWrUpQuery = "INSERT INTO $tableName  $sqlInsKey VALUES $sqlInsValue";

            }

         $insertUpdate = DatabaseConnection::query($sqlWrUpQuery);


         return $insertUpdate;
     }

        // SELECT методы
     static public function findOneBy($params) {

         if(!empty($params) && is_array($params)) {

             if(isset($params['table_name'])) {
                 $tableName = $params['table_name'];
                 unset($params['table_name']);
             };

             if(isset($params['limit'])) {
                 $limit = $params['limit'];
                 unset($params['limit']);
             };

             if(isset($params['offset']))  {
                 $offset = $params['offset'];
                 unset($params['offset']);
             };

             if(isset($params['fields']))  {
                 $fields = $params['fields'];
                 unset($params['fields']);
             };



             if(!empty($params) && is_array($params)) {

                 $selectParams = $params;

             } elseif (!empty($fields) && is_array($fields)) {

                 $selectParams = $fields;
             } else {

             }

             $wherePart = self::selectAch($selectParams);

             $wherePart = rtrim(rtrim($wherePart, 'AND'));

             $selectOne = "SELECT * FROM $tableName $wherePart";

             $selectObj = DatabaseConnection::query($selectOne, $one = true);

             return $selectObj;
         } else {
             return false;
         }
     }




     static public function findBy($params) {

         if(!empty($params) && is_array($params)) {

             if(isset($params['table_name'])) {
                 $tableName = $params['table_name'];
                 unset($params['table_name']);
             };

             if(isset($params['limit'])) {
                 $limit = $params['limit'];
                 unset($params['limit']);
             };

             if(isset($params['offset']))  {
                 $offset = $params['offset'];
                 unset($params['offset']);
             };

             if(isset($params['fields']))  {
                 $fields = $params['fields'];
                 unset($params['fields']);
             };



             if(!empty($params) && is_array($params)) {

                 $selectParams = $params;

             } elseif (!empty($fields) && is_array($fields)) {

                 $selectParams = $fields;
             } else {

             }

             $wherePart = self::selectAch($selectParams);

             $wherePart = rtrim(rtrim($wherePart, 'AND'));

             $select = "SELECT * FROM $tableName $wherePart";

             if(!empty($limit) && is_numeric($limit)) {
                 if(!empty($offset) && is_numeric($offset)) {
                     $select .= " LIMIT $offset, $limit";
                 }  else {
                     $select .= " LIMIT $limit";
                 }
             }


             $selectObj = DatabaseConnection::query($select, $one = false);

             return $selectObj;

         } else {
             return false;
         }
     }

     // Метод удаления
     public function remove($id)
     {
//         try {
//
//             throw new Exception('remove error');
//         }
//         catch (Exception $e) {
//
//         }
         $className = get_called_class();

//         $dbRows = self::refMethodInfo();

         $sqlWrUpQuery = '';

         $tableNameArr = explode('\\', $className);

         $tableName = '';


         if (self::$removed === true) {

          throw new Exception('Object has deleted');

//             echo 'Object has deleted';
//             return;

         } else {

             if (!empty($id) && is_int($id)) {
                 foreach ($tableNameArr as $item) {

                     if (preg_match('/^[A-Z]/', $item) !== 0) {
                         $tabNameAr = preg_split('/(?=[A-Z])/', $item, -1, PREG_SPLIT_NO_EMPTY);
                         $tableName = lcfirst(array_shift($tabNameAr));
                         if (!empty($tabNameAr[0])) {
                             foreach ($tabNameAr as $v) {
                                 $tableName .= '_' . lcfirst($v);
                             }
                         }
                     }
                 }
                 $removeQuery = "DELETE FROM $tableName WHERE $tableName.id = $id";
                 $selectObj = DatabaseConnection::query($removeQuery);
                 $removed = true;
               return  $selectObj;
             }
             return false;
         }
     }

     // Служебные методы

     static public function showColumns($table) {
        $query = "SHOW COLUMNS FROM $table";
       $res =  DatabaseConnection::query($query);
       $rowInfo = [];
         if(!empty($res)) {
       foreach ($res as $field) {
           $rowInfo[$field['Field']] = $field;
          if ($field['Key'] === 'PRI') {
              $rowInfo['id_row'] = $field['Field'];
                }
            }
        }
         return $rowInfo;
    }

     static public function refMethodInfo() {
         $methodNames = (new ReflectionClass(get_called_class()))->getProperties(ReflectionProperty::IS_PRIVATE);

         $methodArr = [];

         foreach ($methodNames as $item) {
             $methodArr[] = $item->name;
         }

         $dbRows = [];

         foreach ($methodArr as $item) {
             if (ctype_upper($item) === true) {
                 $dbRows[] = $item;
             } else {
                 $methodDbAr = preg_split('/(?=[A-Z])/', $item);
                 $dbM = array_shift($methodDbAr);
                 if (!empty($methodDbAr[0])) {
                     foreach ($methodDbAr as $val) {
                         $dbM .= '_' . lcfirst($val);

                     }
                 }
                 $dbRows[] = $dbM;
             }

         }
         return $dbRows;
     }

     static public function selectAch($selectParams) {

         $dbRows = self::refMethodInfo();

         static $wherePart = 'WHERE ';
         foreach ($selectParams as $key => $item) {

             if (is_array($item) === false) {
                 $item = trim($item);

                 if (in_array($key, $dbRows) === false) {
                     $wherePart .= '';

                 } elseif ($item === 'null') {
                     $wherePart .= ' ' . $key . ' IS ' . "NULL " . ' AND';

                 } else {
                     $wherePart .= ' ' . $key . ' = ' . "'" . $item . "'" . ' AND';
                 }
             } else {
                 self::selectAch($item);
             }
         }
         return $wherePart;
     }





     public function logout() {

     }


 }