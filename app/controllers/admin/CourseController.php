<?php

namespace app\controllers\admin;

use app\models\admin\Course;
use app\models\admin\CourseEdit;
use mery\App;
use mery\libs\Pagination;


class CourseController extends AdminController {


    public function indexAction(){

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('course');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $courses = \R::getAll("SELECT course.*, category.name AS cat_name, course_kind.name AS kind_name, course_type.name AS type_name, master.first_name, master.last_name FROM course JOIN category ON course.category_id = category.id JOIN course_kind ON course.kind_id = course_kind.id JOIN course_type ON course.type_id = course_type.id JOIN master ON course.master_id = master.id ORDER BY course.date_start DESC LIMIT $start, $perpage");
//        $courses = \R::getAll("SELECT course.*, category.name AS cat_name, course_kind.name AS kind_name, course_type.name AS type_name FROM course JOIN category ON course.category_id = category.id JOIN course_kind ON course.kind_id = course_kind.id JOIN course_type ON course.type_id = course_type.id ORDER BY course.date_start DESC LIMIT $start, $perpage");


        $this->setMeta('Все курсы');
        $this->setData(compact('courses','pagination', 'count'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $course = new Course();
            $data = $_POST;
            $course->load($data);
            $course->attributes['status'] = 1;
            $course->getImg();
            if (!$course->validate($data)){
                $course->getErrors();
                redirect();
            }
            if ($id = $course->save('course')){
                $_SESSION['success'] =  'Дата курса создана!';
            }
            redirect();
        }
        $categories = \R::findAll('category');
        $this->setMeta('Создать новый курс');
        $this->setData(compact('categories'));
    }

    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $course = new CourseEdit();
            $data = $_POST;
            $course->load($data);
            $course->attributes['status'] = 1;
            if (!$course->validate($data)){
                $course->getErrors();
                redirect();
            }
            if ($course->update('course', $id)){
                $_SESSION['success'] =  'Данные изменены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $course = \R::getAll('SELECT course.*, category.name AS cat_name, course_kind.name AS kind_name, course_type.name  AS type_name, master.first_name, master.last_name FROM course JOIN category ON course.category_id = category.id JOIN course_kind ON course.kind_id = course_kind.id JOIN course_type ON course.type_id = course_type.id JOIN master ON course.master_id = master.id WHERE course.id = ?', [$id]);

        $this->setMeta("Изменить {$course[0]['name']}");
        $this->setData(compact( 'course'));
    }


    public function deleteAction(){
        $id = $this->getRequestId();
        $course = \R::findOne('course', "id = ?", [$id]);
        if ($course->img != 'no_image.jpg'){
            @unlink(WWW . '/upload/' . $course->img);
        }
        \R::exec("DELETE FROM course WHERE id = ?", [$id]);
        $_SESSION['success'] =  'Дата курса удалена!';
        redirect();
    }



    public function typesAction(){
        $id = $_POST['kind_id'] ? (int)$_POST['kind_id'] : null;
        if ($id){
            $type_courses = \R::findAll('course_type', 'kind_id = ?', [$id]);
            $output = '<option value="">Выберите тип курса</option>';
            foreach ($type_courses as $type_course){
                $output .= '<option value="'.$type_course->id.'">'.$type_course->name.'</option>';
            }
            echo $output;
        }
        die();
    }

    public function masterAction(){
        $id = $_POST['type_id'] ? (int)$_POST['type_id'] : null;
        if ($id){
            $course_type = \R::findOne('course_type', 'id = ?', [$id]);
            $masters = \R::findAll('master', 'category_id = ?', [$course_type->category_id]);
            $output = '<option value="">Выберите мастера</option>';
            foreach ($masters as $master){
                $output .= '<option value="'.$master->id.'">'.$master->first_name.' '.$master->last_name.'</option>';
            }
            echo $output;
        }
        die();
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'course'){
                //single
                $wmax = App::$app->getProperty('course_with');
                $hmax = App::$app->getProperty('course_height');
                $name = $_POST['name'];
                $act = $_POST['act'];
                $id = $_POST['id'];
                $course = new Course();
                if ($act=='edit' && $id != '0'){
                    $course->editImg($id,$name, $wmax, $hmax);
                } else {
                    $course->uploadImg($name, $wmax, $hmax);
                }
            }
        }
    }


    public function deleteImageAction(){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        if (!$id || !$src || !$type) return false;
        if ($type == 'course' && $src != 'no_image.jpg') {
            @unlink(WWW . '/upload/' . $src);
            \R::exec("UPDATE `course` SET img = 'no_image.jpg' WHERE id = ? AND img = ?", [$id, $src]);
            exit('1');
        }
        if ($type == 'course') {
            exit('1');
        }

    }




}