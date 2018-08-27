<?php
namespace app\controllers\admin;


class MainController extends AdminController {

    public function indexAction(){
        $countUsers = \R::count('user');
        $countCategories = \R::count('category');
        $countCourses = \R::count('course', 'date_start >= CURDATE()');
        $countOrders = \R::count('course_order',  "status = '1' AND created_at >= CURDATE()");

        $this->setMeta('Админка');
        $this->setData(compact('countUsers', 'countCategories', 'countCourses', 'countOrders'));
    }
}