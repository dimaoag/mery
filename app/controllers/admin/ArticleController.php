<?php
namespace app\controllers\admin;


use mery\App;
use mery\libs\Pagination;
use app\models\admin\Article;
use app\models\admin\ArticleEdit;

class ArticleController extends AdminController {

    public function indexAction(){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('article');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $articles = \R::getAll("SELECT * FROM article ORDER BY article.created_at DESC LIMIT $start, $perpage");
        $this->setMeta('Все статьи');
        $this->setData(compact('articles', 'count', 'pagination'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $article = new Article();
            $data = $_POST;
            $article->load($data);
            $article->attributes['status'] = 1;
            $article->attributes['is_show'] = 0;
            $article->getImg();
            if (!$article->validate($data)){
                $article->getErrors();
                redirect();
            }
            if ($id = $article->save('article')){
                $_SESSION['success'] =  'Статья создана!';
            }
            redirect();
        }
        $this->setMeta('Добавить новую статью');
    }


    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $article = new ArticleEdit();
            $data = $_POST;
            $article->load($data);
            if (!$article->validate($data)){
                $article->getErrors();
                redirect();
            }
            if ($article->update('article', $id)){
                $_SESSION['success'] =  'Данные изменены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $article = \R::getRow('SELECT * FROM article WHERE article.id = ?', [$id]);

        $this->setMeta("Изменить {$article['title']}");
        $this->setData(compact( 'article'));
    }


    public function deleteAction(){
        $id = $this->getRequestId();
        $article = \R::findOne('article', "id = ?", [$id]);
        if ($article->img != 'no_image.jpg'){
            @unlink(WWW . '/upload/' . $article->img);
        }
        \R::exec("DELETE FROM article WHERE id = ?", [$id]);
        $_SESSION['success'] =  'Статья удалена!';
        redirect();
    }



    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'article'){
                //banner
                $wmax = App::$app->getProperty('banner_width');
                $hmax = App::$app->getProperty('banner_height');
                $name = $_POST['name'];
                $act = $_POST['act'];
                $id = $_POST['id'];
                $article = new Article();
                if ($act=='edit' && $id != '0'){
                    $article->editImg($id,$name, $wmax, $hmax);
                } else {
                    $article->uploadImg($name, $wmax, $hmax);
                }
            }
        }
    }


    public function deleteImageAction(){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        if (!$id || !$src || !$type) return false;
        if ($type == 'article' && $src != 'no_image.jpg') {
            @unlink(WWW . '/upload/' . $src);
            \R::exec("UPDATE `article` SET img = 'no_image.jpg' WHERE id = ?", [$id]);
            exit('1');
        }
        if ($type == 'article') {
            exit('1');
        }
    }





}