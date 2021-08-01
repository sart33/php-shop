<?php


namespace core\classes;


class DeviceController extends AbstractController
{

    public $templateName =  __DIR__ . '/views/layouts/device.tpl.php';


    public function indexAction() {

        $param = $this->parsing('http://tz.loc/carrier', 'carrier', '596');

        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/device/index.tpl.php', $param);

    }



    protected function parsing($url, $login, $password)
    {

        if(!$url) return;

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            // true для возврата результата передачи в качестве строки из curl_exec()
            // вместо прямого вывода в браузер.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 5);
        curl_setopt($curl, CURLOPT_UNRESTRICTED_AUTH, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "login=$login&password=$password");



            $curl_response = curl_exec($curl);
            curl_close($curl);
            $curl_json = json_decode($curl_response, true);
            return $curl_json;



    }

}