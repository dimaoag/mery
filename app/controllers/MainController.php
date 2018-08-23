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

        $this->setMeta('Главная страница');
        $this->setData(compact('carousel', 'articles', 'videos', 'reviews'));
    }


}