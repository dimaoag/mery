<?php
namespace app\controllers;


class ArticleController extends AppController {

    public function viewAction(){

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $article = \R::findOne('article', 'id = ?', [$id]);
        if (!$article){
            throw new \Exception('Page not found', 404);
        }

        $_SESSION['article_id'] = $id;

        $this->setMeta($article->title);
        $this->setData(compact('article'));
    }



}