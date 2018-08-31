<?php
namespace app\controllers\admin;

use app\models\admin\Carousel;
use mery\App;

class CarouselController extends AdminController {

    public function indexAction(){

        $images = \R::getAll("SELECT carousel.*, category.name FROM carousel join category ON carousel.category_id = category.id");

        $this->setMeta('Слайдер на главном экране!');
        $this->setData(compact('images'));
    }


    public function addAction(){

        if (!empty($_POST)){
            $carousel = new Carousel();
            $data = $_POST;
            $carousel->load($data);
            $carousel->attributes['status'] = 1;
            $carousel->getImg();
            if (!$carousel->validate($data)){
                $carousel->getErrors();
                redirect();
            }
            if ($id = $carousel->save('carousel')){
                $_SESSION['success'] =  'Дата курса создана!';
            }
            redirect();
        }

        $categories = \R::findAll('category');
        $this->setMeta('Добавить новое фото');
        $this->setData(compact('categories'));
    }


    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $carousel = new Carousel();
            $data = $_POST;
            $carousel->load($data);
            $carousel->getImg();
            if (!$carousel->validate($data)){
                $carousel->getErrors();
                redirect();
            }
            if ($carousel->update('carousel', $id)){
                $_SESSION['success'] =  'Данные изменены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $image = \R::findOne('carousel', 'id = ?',[$id]);
        $categories = \R::findAll('category');

        $this->setMeta("Изменить фото");
        $this->setData(compact( 'image', 'categories'));
    }


    public function deleteAction(){
        $id = $this->getRequestId();
        $carousel = \R::findOne('carousel', "id = ?", [$id]);
        if ($carousel->src != 'no_image.jpg'){
            @unlink(WWW . '/upload/' . $carousel->src);
        }
        \R::exec("DELETE FROM carousel WHERE id = ?", [$id]);
        $_SESSION['success'] =  'Фото удалено!';
        redirect();
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'car'){
                //single
                $wmax = App::$app->getProperty('banner_width');
                $hmax = App::$app->getProperty('banner_height');
                $name = $_POST['name'];
                $carousel = new Carousel();
                $carousel->uploadImg($name, $wmax, $hmax);
            }
        }
    }


    public function deleteImageAction(){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        if (!$id || !$src || !$type) return false;
        if ($type == 'car' && $src != 'no_image.jpg') {
            @unlink(WWW . '/upload/' . $src);
            \R::exec("UPDATE `carousel` SET src = 'no_image.jpg' WHERE id = ? AND src = ?", [$id, $src]);
            exit('1');
        }
        if ($type == 'car') {
            exit('1');
        }

    }



}