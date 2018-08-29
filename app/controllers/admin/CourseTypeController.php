<?php

namespace app\controllers\admin;


use app\models\admin\CourseType;

class CourseTypeController extends AdminController {



    public function indexAction(){
        $type_courses = \R::getAll('SELECT course_type.*, category.name AS cat_name, course_kind.name AS kind_name FROM course_type JOIN category ON course_type.category_id = category.id JOIN course_kind ON course_type.kind_id = course_kind.id ORDER BY course_type.category_id DESC');
        $this->setMeta('Типы курсов');
        $this->setData(compact('type_courses'));
    }



    public function addAction(){
        if (!empty($_POST)){
            $course_type = new CourseType();
            $data = $_POST;
            $course_type->load($data);
            if (!$course_type->validate($data)){
                $course_type->getErrors();
                redirect();
            }
            if ($id = $course_type->save('course_type', false)){
                $_SESSION['success'] =  'Тип курса создано!';
            }
            redirect();
        }
        $categories = \R::findAll('category');
        $this->setMeta('Создать тип курса');
        $this->setData(compact('categories'));
    }



    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $course_type = new CourseType();
            $data = $_POST;
            $course_type->load($data);
            if (!$course_type->validate($data)){
                $course_type->getErrors();
                redirect();
            }
            if ($id = $course_type->update('course_type', $id)){
                $_SESSION['success'] =  'Тип курса изменен!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $course_type = \R::getAll("SELECT course_type.*, category.name AS cat_name FROM course_type JOIN category ON course_type.category_id = category.id WHERE course_type.id = $id");
        $kinds = \R::findAll('course_kind', 'category_id = ?', [$course_type[0]['category_id']]);
        $this->setMeta('Редактировать тип курса');
        $this->setData(compact( 'course_type', 'kinds'));
    }

    public function deleteAction(){
        $id = $this->getRequestId();
        $res = \R::exec("DELETE FROM course_type WHERE id = ?", [$id]);
        if ($res) $_SESSION['success'] = 'Тип курса удалено!';
        redirect();
    }


    public function kindsAction(){
        $id = $_POST['category_id'] ? (int)$_POST['category_id'] : null;
        if ($id){
            $kind_courses = \R::findAll('course_kind', 'category_id = ?', [$id]);
            $output = '<option value="">Выберите вид курса</option>';
            foreach ($kind_courses as $kind_course){
                $output .= '<option value="'.$kind_course->id.'">'.$kind_course->name.'</option>';
            }
            echo $output;
        }
        die();
    }

}