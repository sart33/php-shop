<?php


namespace core\classes;


class ClientController extends AbstractController
{
    public $templateName =  __DIR__ . '/views/layouts/device.tpl.php';


    public function indexAction() {
        if (!empty($_SESSION['auth'])) {


            $jsonClient = file_get_contents('/var/www/my-project/core/log/restapi_log');

            return Parent::render($this->templateName, dirname(__DIR__) . '/views/client/index.tpl.php', $jsonClient);
        } else {

            header("HTTP/1.1 403 Forbidden");
            echo 'Авторизируйтесть для доступа к даной странице';
        }
    }


    public function insertAction() {

        $param = $_POST;


//        $param =  [
//        'product_name' => 'Шкаф',
//        'product_weight' => '100',
//        'count' => '100',
//        'cost' => '300000',
//        'address' => 'г. Чернигов,  ул. Шевченко, 95',
//        'tel' => '+38 095 241 68 84',
//        'additional_info' => '555555'
//];

        $formData = json_encode($param);

        $this->hello('http://tz.loc/client/insert', $formData);
//        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/client/index.tpl.php', $param);

    }

    public function costAction() {

        $param = $_POST;


//        $param =  [
//        'product_name' => 'Шкаф',
//        'product_weight' => '100',
//        'count' => '100',
//        'cost' => '300000',
//        'address' => 'г. Чернигов,  ул. Шевченко, 95',
//        'tel' => '+38 095 241 68 84',
//        'additional_info' => '555555'
//];

        $formData = json_encode($param);

        $this->hello('http://tz.loc/client/cost', $formData);
//        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/client/index.tpl.php', $param);

    }

    public function resultAction()
    {

        $json = file_get_contents('php://input');
        file_put_contents('/var/www/my-project/core/log/restapi_log', $json);


        header("Location: /client");


    }

    protected function hello($url, $jsonData)
    {

        if(!$url) return;

        $curl = curl_init();


        // true для возврата результата передачи в качестве строки из curl_exec()
        // вместо прямого вывода в браузер.
        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jsonData))
        );


//        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
//        curl_setopt($curl, CURLOPT_MAXREDIRS, 5);

       curl_exec($curl);

        $info = curl_getinfo($curl, CURLINFO_HEADER_OUT);
        curl_close($curl);
//        $curl_json = json_decode($curl_res);

//        $json = file_get_contents('php://input');
//        file_put_contents('/var/www/my-project/core/log/restapi_log', $json);
//        $jsonClient = file_get_contents('/var/www/my-project/core/log/restapi_log');
        header("Location: /client");
//        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/client/result.tpl.php', $jsonClient);




    }

//    public function dDos()
//    {
//     for ($i = 0; $i < 1000; $i++) {
//         $this->costAction($i);
//        }
//
//    }

}