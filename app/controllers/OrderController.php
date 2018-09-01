<?php
namespace app\controllers;

use app\models\User;
use app\models\CourseOrder;
use app\models\CourseUser;
use mery\App;

class OrderController extends AppController {


    public function addAction(){
        if (!User::isAuth()){
            redirect(PATH . '/courses');
            die();
        }
        $res = '0';
        if ($this->isAjax()){
            $course_id = !empty($_POST['course_id']) ? (int)$_POST['course_id'] : null;
            $price = !empty($_POST['price']) ? (float)$_POST['price'] : null;

            $countUsers = \R::count('course_order',  "phone = {$_SESSION['user']['phone']} AND course_id = $course_id");
            if ((int)$countUsers >= 1){
                echo json_encode($res);
                die();
            }

            $course = \R::load('course', $course_id);
            $course->sits += 1;
            \R::store($course);

            $courseOrder = new CourseOrder();
            $dataCourse = [];
            $dataCourse['course_id'] = $course_id;
            $dataCourse['first_name'] = $_SESSION['user']['first_name'];
            $dataCourse['last_name'] = $_SESSION['user']['last_name'];
            $dataCourse['phone'] = $_SESSION['user']['phone'];
            $dataCourse['price'] = $price;
            $dataCourse['status'] = 1;
            $courseOrder->load($dataCourse);
            $res_order = $courseOrder->save('course_order', false);
            $course_info = \R::findOne('course', 'id = ?', [$course_id]);
//            $courseUser = new CourseUser();
//            $dataUser = [];
//            $dataUser['course_id'] = $course_id;
//            $dataUser['user_id'] = $_SESSION['user']['id'];
//            $dataUser['status'] = 1;
//            $courseUser->load($dataUser);
//            $res_user = $courseUser->save('course_user', false);

//            if ($res_order && $res_user){
            if ($res_order){
                $to = App::$app->getProperty('admin_email_to');
                $from = App::$app->getProperty('admin_email_from');
                $subject = "Новая заявка " . App::$app->getProperty('shop_name');
                $subject = "=?utf-8?B?".base64_encode($subject)."?=";
                $message = "Клиент ".$dataCourse['first_name']." ".$dataCourse['last_name']." телефон: ".$dataCourse['phone']."\r\n"
                            ."сделал заявку на курс".$course_info->name." c ".dateFormat($course_info->date_start)." по ".dateFormat($course_info->date_end)."\r\n"; // line max 70 chars
                $message = wordwrap($message, 150, "\r\n");

                // text/html
                $headers  = "Content-type: text/plain; charset=utf-8\r\n";
                $headers .= "From: $from\r\n";
                $headers .= "Reply-to: $from\r\n";

                $send = mail($to, $subject,$message, $headers);

                $res = '1';
                echo json_encode($res);
                die();
            } else {
                echo json_encode($res);
                die();
            }
        }

    }
}