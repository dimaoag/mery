<?php

namespace app\controllers\admin;

use app\models\admin\User;
use mery\libs\Pagination;

class UserController extends AdminController {

    public function loginAdminAction(){
        $this->layout = 'login_admin';
        if (!empty($_POST)){
            $user = new User();
            if ($user->login(true)){
                $_SESSION['success'] = 'Success!';
            } else {
                $_SESSION['errors'] = 'Error! Телефон или пароль неверны.';
            }
            if (User::isAdmin()){
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
    }


    public function indexAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perpage");

        $this->setMeta('Все пользователи');
        $this->setData(compact('users', 'pagination', 'count'));
    }


    public function editAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->attributes['password']){
                unset($user->attributes['password']);
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if (!$user->validate($data) || !$user->isUnique()){
                $user->getErrors();
                redirect();
            }
            if ($user->update('user', $id)){
                $_SESSION['success'] = 'Сохранено!';
            }
            redirect();
        }
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);

        $this->setMeta('Edit user profile');
        $this->setData(compact('user'));
    }



    public function deleteAction(){
        if (!User::isMainAdmin()){
            redirect(ADMIN);
        }
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);
        \R::trash($user);
        $_SESSION['success'] = 'Пользователь удален!';
        redirect();
    }

}