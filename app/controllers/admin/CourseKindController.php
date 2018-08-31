<?php
namespace app\controllers\admin;



use mery\libs\Pagination;

class CourseKindController extends AdminController {

    public function indexAction(){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('course_kind');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $kind_courses = \R::getAll("SELECT course_kind.*, category.name as cat_name FROM course_kind JOIN category ON course_kind.category_id = category.id ORDER BY course_kind.category_id DESC LIMIT $start, $perpage");
        $this->setMeta('Виды курсов');
        $this->setData(compact('kind_courses', 'pagination', 'count'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $category_id = (int)$_POST['category_id'];
            $name = h($_POST['name']);
            $res = \R::exec("INSERT INTO course_kind (name, category_id) VALUES ('".$name."', $category_id)");
            if ($res) $_SESSION['success'] = 'Вид курса создано!';
            redirect();
        }
        $categories = \R::findAll('category');
        $this->setMeta('Добавить новый выд курса');
        $this->setData(compact('categories'));
    }


    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $category_id = (int)$_POST['category_id'];
            $name = h($_POST['name']);
            $res = \R::exec("UPDATE `course_kind` SET name = ?, category_id = ? WHERE id = ?", [$name,$category_id,$id]);
            if ($res) $_SESSION['success'] = 'Вид курса изменено!';
            redirect();
        }
        $id = $this->getRequestId();
        $course_kind = \R::findOne('course_kind', 'id = ?', [$id]);
        $categories = \R::findAll('category');
        $this->setMeta('Добавить новый выд курса');
        $this->setData(compact('categories', 'course_kind'));
    }

    public function deleteAction(){
        $id = $this->getRequestId();
        $res = \R::exec("DELETE FROM course_kind WHERE id = ?", [$id]);
        if ($res) $_SESSION['success'] = 'Вид курса удалено!';
        redirect();
    }


}