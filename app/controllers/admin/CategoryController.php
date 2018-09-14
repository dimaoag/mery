<?php
namespace app\controllers\admin;

use app\models\admin\Category;
use app\models\admin\CategoryEdit;
use mery\App;
use app\models\AppModel;
use mery\libs\Pagination;

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
            redirect(ADMIN. '/category');
        }
        $this->setMeta('Создать новою категорию курсов');
    }


    public function editAction(){
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $category = new CategoryEdit();
            $data = $_POST;
            $category->load($data);
            $category->attributes['status'] = $category->attributes['status'] ? '1' : '0';
            $category->attributes['menu_id'] = '2';
            if (!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if ($category->update('category', $id)){
                $alias = AppModel::createAlias('category', 'alias', $data['name'], $id);
                $cat = \R::load('category', $id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] =  'Изменения сохранены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $category = \R::load('category', $id);
        $gallery = \R::getCol("SELECT src FROM gallery WHERE category_id = ?", [$id]);
        $this->setMeta('Изменения категории курса' . $category->name);
        $this->setData(compact('category',  'gallery'));
    }


    public function deleteAction(){
        $id = $this->getRequestId();
        $category = \R::findOne('category', "id = ?", [$id]);
        if ($category->banner != 'no_image.jpg'){
            @unlink(WWW . '/upload/' . $category->banner);
        }
        if ($category->img_preview != 'no_image.jpg'){
            @unlink(WWW . '/upload/' . $category->img_preview);
        }
        $gallery = \R::getCol("SELECT src FROM gallery WHERE category_id = ?", [$id]);
        if (!empty($gallery)){
            foreach ($gallery as $img){
                @unlink(WWW . '/upload/' . $img);
            }
            \R::exec("DELETE FROM gallery WHERE category_id = ?", [$id]);
        }
        \R::exec("DELETE FROM category WHERE id = ?", [$id]);
        $_SESSION['success'] =  'Категория удалена!';
        redirect();
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'banner'){
                //banner
                $wmax = App::$app->getProperty('banner_width');
                $hmax = App::$app->getProperty('banner_height');
                $name = $_POST['name'];
                $act = $_POST['act'];
                $id = $_POST['id'];
                $category = new Category();
                if ($act=='edit' && $id != '0'){
                    $category->editImg($id,$name, $wmax, $hmax);
                } else {
                    $category->uploadImg($name, $wmax, $hmax);
                }


            }
            if ($_POST['name'] == 'profile'){
                //profile
                $wmax = App::$app->getProperty('preview_width');
                $hmax = App::$app->getProperty('preview_height');
                $name = $_POST['name'];
                $act = $_POST['act'];
                $id = $_POST['id'];
                $category = new Category();
                if ($act=='edit' && $id != '0'){
                    $category->editImg($id,$name, $wmax, $hmax);
                } else {
                    $category->uploadImg($name, $wmax, $hmax);
                }

            }
        }
    }


    public function deleteImageAction(){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        if (!$id || !$src || !$type) return false;
        if ($type == 'banner' && $src != 'no_image.jpg') {
            @unlink(WWW . '/upload/' . $src);
            \R::exec("UPDATE `category` SET banner = 'no_image.jpg' WHERE id = ?", [$id]);
            exit('1');
        }
        if ($type == 'profile' && $src != 'no_image.jpg') {
            @unlink(WWW . '/upload/' . $src);
            \R::exec("UPDATE `category` SET img_preview = 'no_image.jpg' WHERE id = ?", [$id]);
            exit('1');
        }
        if ($type == 'banner') {
            exit('1');
        }
        if ($type == 'profile') {
            exit('1');
        }

    }



    public function videoReviewsAction(){
        $id = $this->getRequestId();
        $reviews = \R::findAll('video_review', 'category_id = ?', [$id]);
        $category = \R::findOne('category', 'id = ? ', [$id]);

        $this->setMeta("Видеоотзывы оп {$category->name}");
        $this->setData(compact('reviews', 'category'));
    }


    public function videoReviewAddAction(){
        if (!empty($_POST)) {
            $id = (int)$this->getRequestId(false);
            $url = h($_POST['url']);
            $is_show = (int)$_POST['status'];
            $res = \R::exec("INSERT INTO video_review (url, category_id, is_show) VALUES ('".$url."', $id, $is_show)");
            if ($res){
                $_SESSION['success'] = 'Видеоотзыв добавленно!';
            }
            redirect();
        }
        $cat_id = $this->getRequestId();
        $category = \R::findOne('category', 'id = ?', [$cat_id]);
        $this->setMeta("Добавить видеоотзыв к категории");
        $this->setData(compact('category'));
    }


    public function videoDeleteAction(){
        $id = $this->getRequestId();
        $video = \R::load('video_review', $id);
        \R::trash($video);
        $_SESSION['success'] = 'Видео удалено!';
        redirect();
    }





}