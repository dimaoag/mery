<?php
namespace app\controllers\admin;

use app\models\admin\Comment;

class CommentController extends AdminController {



    public function viewsAction(){
        $id = $this->getRequestId();
        $article = \R::findOne('article', 'id = ?',[$id]);
        $comments = \R::getAll("SELECT comment.*, user.first_name, user.last_name FROM comment JOIN user ON comment.user_id = user.id WHERE article_id = ?", [$id]);


        $this->setMeta("Комментарии к {$article->title}");
        $this->setData(compact('article', 'comments'));
    }


    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $comment = new Comment();
            $data = $_POST;
            $comment->load($data);
            if (!$comment->validate($data)){
                $comment->getErrors();
                redirect();
            }
            if ($comment->update('comment', $id)){
                $_SESSION['success'] =  'Данные изменены!';
            }
            redirect();
        }

        $id = $this->getRequestId();
        $comment = \R::findOne('comment', 'id = ?', [$id]);
        $this->setMeta('Изменение комментария');
        $this->setData(compact('comment'));
    }



    public function deleteAction(){
        $id = $this->getRequestId();
        $comment = \R::findOne('comment', "id = ?", [$id]);
        \R::exec("DELETE FROM comment WHERE id = ?", [$id]);
        $_SESSION['success'] =  'Комментарий удален!';
        redirect();
    }



}