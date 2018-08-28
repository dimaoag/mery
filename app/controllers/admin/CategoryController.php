<?php
namespace app\controllers\admin;

use app\models\admin\Category;
use mery\App;
use app\models\AppModel;

class CategoryController extends AdminController {


    public function indexAction(){

        $categories = \R::getAll("SELECT category.*, menu.name as menu_name FROM category JOIN menu ON category.menu_id = menu.id");


        $this->setMeta('Категории курсов');
        $this->setData(compact('categories', 'masters'));
    }


    /**
     *
     */
    public function addAction(){
//        unset($_SESSION['profile']);
//        debug($_SESSION,1);
        if (!empty($_POST)){
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            $category->attributes['status'] = $category->attributes['status'] ? '1' : '0';
            $category->attributes['menu_id'] = '2';
            $category->getImgBanner();
            $category->getImgProfile();
            if (!$category->validate($data)){
                $category->getErrors();
//                $_SESSION['form_data'] = $data;
                redirect();
            }
            if ($id = $category->save('category')){
                $category->saveGallery($id);
                $alias = AppModel::createAlias('category', 'alias', $data['name'], $id);
                $cat = \R::load('category', $id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] =  'Категория курсов создана!';
            }
            redirect();
        }
        $this->setMeta('Создать новою категорию курсов');
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'banner'){
                //banner
                $wmax = App::$app->getProperty('banner_width');
                $hmax = App::$app->getProperty('banner_height');
                $name = $_POST['name'];
                $category = new Category();
                $category->uploadImg($name, $wmax, $hmax);

            }
            if ($_POST['name'] == 'profile'){
                //profile
                $wmax = App::$app->getProperty('preview_width');
                $hmax = App::$app->getProperty('preview_height');
                $name = $_POST['name'];
                $category = new Category();
                $category->uploadImg($name, $wmax, $hmax);

            }
            if ($_POST['name'] == 'gallery') {
                //gallery
                $wmax = App::$app->getProperty('gallery_with');
                $hmax = App::$app->getProperty('gallery_height');
                $name = $_POST['name'];
                $category = new Category();
                $category->uploadImg($name, $wmax, $hmax);

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