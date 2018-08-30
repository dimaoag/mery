<?php
namespace app\controllers\admin;

use app\models\admin\Gallery;
use mery\App;

class GalleryController extends AdminController {


    public function indexAction(){

        $id = (int)$this->getRequestId();
        $gallery = \R::findAll('gallery', 'category_id = ?', [$id]);
        $category = \R::findOne('category', 'id = ?', [$id]);
        $this->setMeta('Галерея курса ');
        $this->setData(compact('gallery', 'category'));
    }


    public function addImageAction(){
        if (isset($_GET['upload'])){
            if ($_POST['name'] == 'gallery') {
                //gallery
                $wmax = App::$app->getProperty('gallery_with');
                $hmax = App::$app->getProperty('gallery_height');
                $name = $_POST['name'];
                $id = $_POST['id'];
                $gallery = new Gallery();
                $gallery->uploadImg($id,$name, $wmax, $hmax);
            }
        }
    }


    public function deleteImageAction(){
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        if (!$id || !$src || !$type) return false;
        if ($type == 'gallery'){
            if (\R::exec("DELETE FROM gallery WHERE category_id = ? AND src = ?", [$id, $src])){
                @unlink(WWW . '/upload/'. $src);
                $_SESSION['gal'] = '1';
                exit('1');
            }
        }
        exit('1');
    }



}