<?php


namespace core\classes;


use core\models\DatabaseConnection;
use core\models\Menu;
use core\models\Repository;
use core\models\User;
use http\Message;

class SiteController extends AbstractController
{

    public string $templateName =  __DIR__ . '/views/layouts/site.tpl.php';


    public function indexAction() {

        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/index.tpl.php');

    }


    public function viewAction($param) {

        echo 'viewAction!<br>';
        echo 'Param: ' . $param;

    }


    public function loginAction($login = null, $password = null) {

        unset($result);
        $l = LanguageController::getLanguage()[3];
        if(!empty($_POST['LoginForm']['username']) && !empty($_POST['LoginForm']['password'])) {

            $name = $_POST['LoginForm']['username'];
            $pass = $_POST['LoginForm']['password'];
            $name = trim($name);
            $pass = trim($pass);

            $validateN =  User::validateName($name, $reg = 1);
            $validateP =  User::validatePass($pass);

            if(isset($validateN['validate']) && isset($validateP['validate'])) {

              $result = User::login($name, $pass);

              if(!empty($result['login']) && $result['login'] === true) {

                  $id = User::userId($name);

                  if (session_id() == '') {
                      session_start();
                  }

                //Пишем в сессию информацию о том, что мы авторизовались:
                $_SESSION['auth'] = true;


                //Пишем в сессию логин и id пользователя (их мы берем из переменной $user!):
                $_SESSION['id'] = $id;
                $_SESSION['login'] = $name;
                header("location: /$l");

              }

            }

        }

        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/login.tpl.php');

    }

    public function logoutAction() {
        $l = LanguageController::getLanguage()[3];

        $_SESSION['auth'] = null;
        header("location: /$l");


    }
    public function verificationAction($param)
    {
        $dbName = DB_NAME;

        if (!empty($param->getGetParameters())) {
            $verifMail = $param->getGetParameters();
            $veriMailArr = explode('/', $verifMail);
            if (!empty($veriMailArr[0])) {
                $verify = $veriMailArr[0];
            }
            if (!empty($veriMailArr[1])) {
                $mail = $veriMailArr[1];
            }
            $temp = User::mailVerify($mail, $verify);

            if ($temp === true) {
                $message = "Поздравляем, - ваш почтовый ящик подтвержден. Войдите на сайт";
//                header('Location: /login');
                return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/login.tpl.php', $message);
            } else {echo $message = 'Вы не смогли подтвердить ваш e-mail';}
        }
        return false;

    }

    public function registerAction() {

        if(isset($_POST['SignupForm']['username']) && isset($_POST['SignupForm']['email']) && isset($_POST['SignupForm']['password'])) {


           $user = $_POST['SignupForm']['username'];
           $email = $_POST['SignupForm']['email'];
           $pass = $_POST['SignupForm']['password'];

//            $user = 'gleb';
//            $email = 'gleb.ivanchik@gmail.com';
//            $pass = 'takedzo83Z_';

            $validateN =  User::validateName($user, $reg = 1);
            $validateM =  User::validateEmail($email, $reg);
            $validateP =  User::validatePass($pass);



            if($validateN['validate'] === true && $validateM['validate'] === true && $validateP['validate'] === true) {

            $regRes = User::registerReg($user, $email, $pass);
            if(!empty($regRes['yes'])) {
                return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/register.tpl.php', $regRes);
            } elseif(!empty($regRes['no'])) {
                return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/register.tpl.php', $regRes);

            }
        } else {
               $message = [];

                    return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/register.tpl.php', $validateN);
            }
    }

        return  Parent::render($this->templateName,dirname(__DIR__) . '/views/site/register.tpl.php');


    }

}