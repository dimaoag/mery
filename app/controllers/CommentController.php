<?php

namespace app\controllers;

use app\models\Comment;
use app\models\User;

class CommentController extends AppController {


    public function addAction(){
        if (!User::isAuth()) redirect();
        if ($this->isAjax()){
            $error = '';
            $comment = new Comment();
            if (empty($_POST['text'])){
                $error .= '<p class="text-danger">Заполните поле!</p>';
            }
            $data = $_POST;
            if ($error == ''){
                $data['user_id'] = $_SESSION['user']['id'];
                $data['status'] = 1;
                $comment->load($data);
                if (!$comment->validate($data)){
                    $comment->getErrors();
                } else {
                    $id = $comment->save('comment');
                    $error = '<label class="text-success">Комментарий создано!</label>';
                }
            }
            $res = [
                'error' => $error,
            ];
            echo json_encode($res);
            die();
        }
        die();
    }


    public function loadAction(){
        if ($this->isAjax()){
            $comments = \R::getAll("SELECT comment.*, user.first_name, user.last_name, user.photo_profile FROM comment JOIN user ON comment.user_id = user.id WHERE comment.status = 1 AND comment.article_id = ? ORDER BY comment.created_at DESC LIMIT 10", [$_SESSION['article_id']]);
            require_once APP . '/views/Comment/show.php';
        }
    }



}