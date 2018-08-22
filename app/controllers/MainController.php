<?php
namespace app\controllers;


use app\models\AppModel;
use mery\App;

class MainController extends AppController
{

    public function indexAction(){

        $carousel = \R::findAll( 'carousel', 'WHERE status = 1' );
        $articles = \R::findAll( 'article', 'WHERE is_show = 1 AND status = 1 LIMIT 3' );
        $videos = \R::findAll( 'video', 'WHERE is_show = 1 AND status = 1 LIMIT 3' );
        $reviews = \R::getAll("SELECT review.*, user.first_name, user.last_name, user.photo_origin, user.photo_profile FROM review JOIN user ON review.user_id = user.id WHERE review.is_show = 1");
//        debug($reviews, 1);

        $this->setMeta('Главная страница');
        $this->setData(compact('carousel', 'articles', 'videos', 'reviews'));
    }

    //public $layout = 'test';

//    public function indexAction(){
//        $brands = \R::find('brand', 'LIMIT 3');
//        $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
//        $this->setMeta('Home', 'Description', 'Keywords');
//        $this->setData(compact('brands', 'hits'));
//
//    }

}