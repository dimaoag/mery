<?php
namespace app\controllers\admin;

use app\models\Menu;
use app\models\AppModel;

class MenuController extends AdminController {


    public function indexAction(){
        $menu = \R::findAll('menu');
        $this->setMeta('Меню');
        $this->setData(compact('menu'));
    }


    public function addAction(){
        if (!empty($_POST)){
            $menu = new Menu();
            $data = $_POST;
            $data['is_child'] = '0';
            $menu->load($data);
            if (!$menu->validate($data)){
                $menu->getErrors();
                redirect();
            }
            if ($id = $menu->save('menu')){
                $alias = AppModel::createAlias('menu', 'alias', $data['name'], $id);
                $cat = \R::load('menu', $id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] = 'Пункт меню создан!';
            }
            redirect();
        }
        $this->setMeta('Создать новый пункт меню');
    }




    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $menu = new Menu();
            $data = $_POST;
            $menu->load($data);
            if (!$menu->validate($data)){
                $menu->getErrors();
                redirect();
            }
            if ($menu->update('menu', $id)){
                $alias = AppModel::createAlias('menu', 'alias', $data['name'], $id);
                $menuItemLoad = \R::load('menu', $id);
                $menuItemLoad->alias = $alias;
                \R::store($menuItemLoad);
                $_SESSION['success'] = 'Пункт меню изменен!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $menuItem = \R::load('menu', $id);
        $this->setMeta("Изменить пункт {$menuItem->name}");
        $this->setData(compact('menuItem'));
    }



    public function deleteAction(){
        $id = $this->getRequestId();
        $menuItem = \R::load('menu', $id);
        if ($menuItem->is_child){
            $_SESSION['errors'] = 'Ошибка. Пункт меню содержит подпункты!';
            redirect();
        }
        \R::trash($menuItem);
        $_SESSION['success'] = 'Пункт меню удален!';
        redirect();
    }

}