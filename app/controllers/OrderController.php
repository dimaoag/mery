<?php
namespace app\controllers;

use app\models\User;
use app\models\CourseOrder;
use app\models\CourseUser;

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

//            $courseUser = new CourseUser();
//            $dataUser = [];
//            $dataUser['course_id'] = $course_id;
//            $dataUser['user_id'] = $_SESSION['user']['id'];
//            $dataUser['status'] = 1;
//            $courseUser->load($dataUser);
//            $res_user = $courseUser->save('course_user', false);

//            if ($res_order && $res_user){
            if ($res_order){
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