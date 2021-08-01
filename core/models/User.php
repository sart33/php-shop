<?php


namespace core\models;


class User extends Repository
{




    public static function login($username, $password) {
        $dbName = DB_NAME;
        $login = [];
        $login['login'] = false;
        if(!empty($username) && !empty($password)) {

            $sqlLogin = "SELECT password_hash FROM $dbName.user WHERE username='$username' AND active =1";
            $passHash = DatabaseConnection::query($sqlLogin);

            if(empty($passHash)) {
                $login['message'] = 'Такого пользователя не существует';

                return $login;
            }
            if (password_verify($password,$passHash[0]['password_hash']) === true) {
                $login['login'] = true;
                $login['yes'] = 'Вы успешно авторизированы';
            } else {
                $login['passError'] = 'Ошибка ввода пароля. Попробуйте еще раз';
            }
        }

         return $login;

     }

    public static function validateName($name, $reg = null)
    {

        $nameVal = [];
        $nameVal['validate'] = false;

        $dbName = DB_NAME;

        $name = trim($name);

        if (preg_match('#^\b(\w+?\b\s*?\b\w*?)\b$#ui', $name) === 1) {

            if(!empty($reg)) {
                $nameVal['validate'] = true;
            }
            elseif (empty(DatabaseConnection::query("SELECT id FROM $dbName.user WHERE username ='$name'")[0])) {

            } else {
                $nameVal['message'] = 'Пользователь с таким именем уже существует';
            }
        } else {
            $nameVal['message'] = 'Использованы запрещенные символы в поле "Имя"';
        }
        return $nameVal;
    }



        public static function validateEmail($mail, $reg = null)
        {

//            $mail = 'glebivanchik@gmail.com';

            $mailVal = [];
            $mailVal['validate'] = false;

            $dbName = DB_NAME;

            $mail = trim($mail);

            if (preg_match('#^\b(\w+?\b[\.|-]?\b\w*?\b@\w+?\.?[a-z]{2,32}\.?[a-z]?)$#ui', $mail) === 1) {
                if(!empty($reg)) {
                    $mailVal['validate'] = true;
                }
                elseif (empty(DatabaseConnection::query("SELECT id FROM $dbName.user WHERE email ='$mail'")[0])) {
                    $mailVal['validate'] = true;
                } else {
                    $mailVal['message'] = 'Пользователь с таким почтовым ящиком уже существует';

                }
            } else {
                $mailVal['message'] = 'Использованы запрещенные символы в поле "Email"';
            }
            return $mailVal;
        }

            public static function validatePass($password) {

                $passVal = [];
                $passVal['validate'] = false;

                $dbName = DB_NAME;

                $password = trim($password);

                if(strlen($password) >= 6) {

                 if(preg_match('#^([^\s]*)$#', $password) === 1) {

                     $passVal['validate'] = true;
                 } else {
                     $passVal['message'] = 'Пароль не должен содержать пробелы';
                 }

                } else {
                    $passVal['message'] = 'Пароль должен содержать не менее 6 символов';
                }

                return $passVal;

        }


    public static function userId($user)
    {

        $userId = '';

        $dbName = DB_NAME;

        $user = trim($user);

        $tableVerify = DatabaseConnection::query(   "SELECT id FROM $dbName.user WHERE username='$user'");

        return $tableVerify[0]['id'];


    }

    public static function registerReg($user, $email, $pass) {

        $dbName = DB_NAME;
        $message = [];
        $date = new \DateTime();
        $updatedDate = $date->format('Y-m-d H:i:s');

        $passHash = password_hash($pass, PASSWORD_ARGON2ID);

        $verifToken = bin2hex(random_bytes(50));

      $tempVarTwo = DatabaseConnection::query("INSERT INTO $dbName.user (username, password_hash, email, role, active, updated_at, verification_token) VALUES ('$user', '$passHash', '$email', 1, 0, '$updatedDate', '$verifToken')");

      if($tempVarTwo !== false) {
          $message['yes'] = 'Регистрацйия прошла успешно. Чтобы завершить ее перейдите по ссылке отправленой Вам не электронную почту';
          return $message;
      } else {
          $message['no'] = 'Регистрацйия закончилась неудачей. Попробуйте еще раз. В случае если ошибка будет повторяться - обратитесь в тех. поддержку сайта';
          return $message;
      }


    }
    public static function mailVerify($mail, $verify)
    {
        $dbName = DB_NAME;

            $tableVerify = DatabaseConnection::query(   "SELECT verification_token FROM $dbName.user WHERE email='$mail'");
            "http://my-project.loc/verification?ver=f3c3a52f45125c03a0dd7c38f393d90691823f31254b22c990cd5b47bcaaa045573a4904ccdb7695f57a3c1e04cb8854ff1f&mail=gleb-ivanchik@gmail.com";

            if($verify === $tableVerify[0]['verification_token']) {
                $tableVerify = DatabaseConnection::query("UPDATE $dbName.user SET active = 1 WHERE `verification_token` ='$verify'");

                return true;
            } else {
                return false;
            }


        }

    }