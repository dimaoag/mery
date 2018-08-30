<?php
namespace app\controllers\admin;

use app\models\CourseOrder;

class OrderController extends AdminController {


    public function indexAction(){

        $id = (int)$this->getRequestId();
        $orders = \R::getAll('SELECT course_order.* FROM course_order WHERE course_order.course_id = ?', [$id]);

        $course = \R::findOne('course', 'id = ?',[$id]);
        $this->setMeta("Заявки по курсу {$course->name}");
        $this->setData(compact('orders', 'course'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $order = new CourseOrder();
            $data = $_POST;
            $course = \R::findOne('course', 'id = ?', [$data['course_id']]);
            $course_type = \R::findOne('course_type', 'id = ?', [$course->type_id]);
            $data['price'] = $course_type->price;
            $order->load($data);
            if (!$order->validate($data)){
                $order->getErrors();
                redirect();
            }
            $countUsers = \R::count('course_order',  "phone = {$data['phone']} AND course_id = {$data['course_id']}");
            if ((int)$countUsers >= 1){
                $_SESSION['errors'] =  'Такой номер уже записан на текущую дату!';
                redirect();
            }
            if ($order->save('course_order', false)){
                $course = \R::load('course', $data['course_id']);
                $course->sits += 1;
                \R::store($course);
                $_SESSION['success'] =  'Клиент успешно записан!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $course = \R::findOne('course', 'id = ?', [$id]);
        $this->setMeta('Записать клиента на дату');
        $this->setData(compact('course'));
    }


    public function editAction(){
        if (!empty($_POST)){
            $order = new CourseOrder();
            $id = $this->getRequestId(false);
            $data = $_POST;
            $course = \R::findOne('course', 'id = ?', [$data['course_id']]);
            $course_type = \R::findOne('course_type', 'id = ?', [$course->type_id]);
            $course_order = \R::findOne('course_order', 'id = ?', [$id]);
            $data['price'] = $course_type->price;
            $order->load($data);
            if (!$order->validate($data)){
                $order->getErrors();
                redirect();
            }
            $countUsers = \R::count('course_order',  "phone = {$data['phone']} AND course_id = {$data['course_id']}");
            if ((int)$countUsers > 1){
                $_SESSION['errors'] =  'Такой номер уже записан на текущую дату!';
                redirect();
            }
            if ($order->update('course_order', $id)){
                if ($order->attributes['status'] == '4'){
                    $course = \R::load('course', $data['course_id']);
                    $course->sits -= 1;
                    \R::store($course);
                }
                if ($course_order->status == '4'){
                    $course = \R::load('course', $data['course_id']);
                    $course->sits += 1;
                    \R::store($course);
                }
                $_SESSION['success'] =  'Данние изменены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $order = \R::getRow("SELECT course_order.*, course.name, course.date_start, course.date_end FROM course_order JOIN course ON course_order.course_id = course.id WHERE course_order.id = ?", [$id]);
        $this->setMeta('Записать клиента на дату');
        $this->setData(compact('order'));
    }



    public function deleteAction(){
        $id = $this->getRequestId();
        $course_order = \R::findOne('course_order', 'id = ?', [$id]);
        $course_id = $course_order->course_id;
        $res = \R::exec("DELETE FROM course_order WHERE id = ?", [$id]);
        if ($res) {
            $course = \R::load('course', $course_id);
            $course->sits -= 1;
            \R::store($course);
            $_SESSION['success'] = 'Заявка удалена!';
        }
        redirect();
    }



}