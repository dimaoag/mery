<?php
namespace app\controllers;

use app\models\User;
use app\widgets\sms\TurboSMS;

class UserController extends AppController {



    public function registrationAction(){
        if (!empty($_POST)){
            $user = new User();
            $data = $_POST;
            if (empty($data['photo_origin'])){
                $data['photo_origin'] = 'no_avatar.jpg';
                $data['photo_profile'] = 'no_avatar.jpg';
            }
            $data['phone'] = str_replace(" ", "", $data['phone']);
            $user->load($data);
            if (!$user->validate($data) || !$user->isUnique()){
                $user->getErrors();
            } else {
                $user->hashPassword();
                $user_id = $user->save('user');
                $code = User::generateCode($user_id);
                $turboSMS = new TurboSMS();
                if ($turboSMS->send($user->attributes['phone'], $code)){
                    $_SESSION['user_id'] = $user_id;
                    redirect(PATH .'/user/confirm');
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }


    public function confirmAction(){
        $this->setMeta('Подтвердите свой телефон');
        if (!empty($_POST) && isset($_SESSION['user_id'])){
            $user = \R::load('user', $_SESSION['user_id']);
            if ((int)$_POST['code'] == $user->code){
                $user->active = 1;
                $res = \R::store($user);
                redirect(PATH . '/user/login');
            }
            $_SESSION['errors'] = 'Ошибка!. Неверный код.';
            redirect();
        }
    }


    public function loginAction(){
        if (!empty($_POST)){
            $user = new User();
            if ($user->login()){
                redirect(PATH);
            } else {
                $_SESSION['errors'] = 'Ошибка!. Телефон или пароль неверны!';
            }
            redirect();
        }
        $this->setMeta('Вход на сайт');
    }


    public function logoutAction(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }
        if (isset($_SESSION['errors']) || $_SESSION['success']) {
            unset($_SESSION['errors']);
            unset($_SESSION['success']);
        }
        redirect(PATH);
    }


    public function recoveryAction(){
        if (!empty($_POST)){
            $phone = $_POST['phone'] ? h($_POST['phone']) : null;
            $phone = str_replace(" ", "", $phone);
            $user = \R::findOne('user', 'phone = ?',[$phone]);
            if (!$user || !$phone){
                $_SESSION['errors'] = 'Ошибка! Указанный телефон не существует в базе!';
                redirect();
            }
            $turboSMS = new TurboSMS();
            if ($turboSMS->send($phone, base64_decode($user->password))){
                redirect(PATH.'/user/login');
            }
        }
        $this->setMeta('Восстановления пароля');
    }




    public function uploadPhotoAction(){
        function str_random($length){
            return substr(md5(microtime()),0,$length);
        }


        $uploaddir = 'upload/';
        if (isset($_POST['photo'])){
            $arr = [];
            $str = str_random(8);
            if ($_POST['photo']){
                $file = 'uploaded_photo'.$str.'_min.png';
                $uploadfile = $uploaddir . $file;
                $img = str_replace('data:image/png;base64,', '', $_POST['photo']);
                $img = str_replace(' ', '+', $img);
                $fileData = base64_decode($img);
                $url = $uploadfile;
                file_put_contents($url,$fileData);
                $arr['status'] = 'success';
                $arr['path_mini'] = PATH . '/' .  $uploadfile;
                $arr['file_mini'] = $file;

                //save in db
            }
        } else {
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);
            $arr = [];
            //crop
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
                $arr['status'] = 'success';
                $arr['path_max'] = PATH . '/' .  $uploadfile;
                $arr['file_max'] = $_FILES['file']['name'];
            } else {
                $arr['status'] = 'fail';
            }
        }

        header('Content-type: application/json');
        echo json_encode($arr);
        die();
    }
}