<?php
namespace app\controllers\admin;


class MainController extends AdminController {

    public function indexAction(){
        $countUsers = \R::count('user');
        $countCategories = \R::count('category');
        $countCourses = \R::count('course');
        $countOrders = \R::count('course_order');

        $this->setMeta('Админка');
        $this->setData(compact('countUsers', 'countCategories', 'countCourses', 'countOrders'));
    }
}