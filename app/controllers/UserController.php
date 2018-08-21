<?php
namespace app\controllers;

use app\models\User;
use app\widgets\sms\TurboSMS;

class UserController extends AppController {



    public function registrationAction(){
        if (!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $data['phone'] = str_replace(" ", "", $data['phone']);
            $user->load($data);
            if (!$user->validate($data) || !$user->isUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            } else {
                $user->attributes['phone'] = '+' . $user->attributes['phone'];
                $user->hashPassword();
                $user_id = $user->save('user');

//                $turboSMS = new TurboSMS();
//                if ($turboSMS->send($user->attributes['phone'], '1111')){
//                    $_SESSION['success'] = 'Success!';
//                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
    }


    public function confirmAction(){
        $this->setMeta('Подтвердите свой телефон');

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