<?php
namespace app\controllers;


class UserController extends AppController {

    public function indexAction(){
        $this->setMeta('User');
    }

    public function registrationAction(){
        $this->setMeta('');
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