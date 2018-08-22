<?php
namespace app\controllers;


class CoursesController extends AppController {

    public function indexAction(){

        $categories = \R::findAll( 'category', 'WHERE status = 1' );

        $this->setMeta('Все курсы');
        $this->setData(compact('categories'));
    }
}