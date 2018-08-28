<?php
namespace app\controllers\admin;

use app\models\admin\Category;
use mery\App;

class CategoryController extends AdminController {


    public function indexAction(){

        $categories = \R::getAll("SELECT category.*, menu.name as menu_name FROM category JOIN menu ON category.menu_id = menu.id");


        $this->setMeta('Категории курсов');
        $this->setData(compact('categories', 'masters'));
    }


    public function addAction(){

        $masters = \R::findAll('master');

        $this->setMeta('Создать новою категорию курсов');
        $this->setData(compact('masters'));
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'single'){
                //single
                $wmax = App::$app->getProperty('banner_width');
                $hmax = App::$app->getProperty('banner_height');
                $name = $_POST['name'];
                $category = new Category();
                $category->uploadImg($name, $wmax, $hmax);
            } else {
                //multi
                $wmax = App::$app->getProperty('gallery_with');
                $hmax = App::$app->getProperty('gallery_height');
                $name = $_POST['name'];
                $product = new Product();
                $product->uploadImg($name, $wmax, $hmax);

            }
        }
    }

    public function videoReviewsAction(){
        $id = $this->getRequestId();
        $reviews = \R::findAll('video_review', 'category_id = ?', [$id]);
        $category = \R::findOne('category', 'id = ? ', [$id]);

        $this->setMeta("Видеоотзывы оп {$category->name}");
        $this->setData(compact('reviews', 'category'));
    }


    public function videoDeleteAction(){
        $id = $this->getRequestId();
        $video = \R::load('video_review', $id);
        \R::trash($video);
        $_SESSION['success'] = 'Видео удалено!';
        redirect();
    }





}