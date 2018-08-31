<?php
namespace app\controllers\admin;

use app\models\admin\Master;

class MasterController extends AdminController {

    public function indexAction(){

        $masters = \R::getAll('SELECT master.*, category.name FROM master JOIN category ON master.category_id = category.id');

        $this->setMeta('Мастера');
        $this->setData(compact('masters'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $master = new Master();
            $data = $_POST;
            $data['status'] = 1;
            $master->load($data);
            if (!$master->validate($data)){
                $master->getErrors();
                redirect();
            }
            if ($master->save('master')){
                $_SESSION['success'] = 'Мастера создано!';
            }
            redirect();
        }
        $categories = \R::findAll('category');
        $this->setMeta('Добавить нового мастера');
        $this->setData(compact('categories'));
    }


    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $master = new Master();
            $data = $_POST;
            $data['status'] = 1;
            $master->load($data);
            if (!$master->validate($data)){
                $master->getErrors();
                redirect();
            }
            if ($master->update('master', $id)){
                $_SESSION['success'] = 'Данные изменены!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $master = \R::findOne('master', 'id = ?',[$id]);
        $categories = \R::findAll('category');
        $this->setMeta('Добавить нового мастера');
        $this->setData(compact('categories', 'master'));
    }


    public function deleteAction(){
        $id = $this->getRequestId();
        $master = \R::load('master', $id);
        \R::trash($master);
        $_SESSION['success'] = 'Мастер удален!';
        redirect();
    }


}