<?php
namespace app\controllers\admin;

use mery\libs\Pagination;
use app\models\Review;

class ReviewController extends AdminController {


    public function indexAction(){
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 50;
        $count = \R::count('review');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $reviews = \R::getAll("SELECT review.*, user.first_name, user.last_name FROM review JOIN user ON review.user_id = user.id ORDER BY review.created_at DESC LIMIT $start, $perpage");

        $this->setMeta('Отзывы');
        $this->setData(compact('reviews', 'pagination', 'count'));
    }



    public function editAction(){
        if (!empty($_POST)){
            $id = $this->getRequestId(false);
            $review = new Review();
            $data = $_POST;
            $review->load($data);
            if (!$review->validate($data)){
                $review->getErrors();
                redirect();
            }
            if ($review->update('review', $id)){
                $_SESSION['success'] = 'Отзыв изменен!';
            }
            redirect();
        }
        $id = $this->getRequestId();
        $review = \R::load('review', $id);
        $this->setMeta("Изменить отзыв {$review->id}");
        $this->setData(compact('review'));
    }



    public function deleteAction(){
        $id = $this->getRequestId();
        $review = \R::load('review', $id);
        \R::trash($review);
        $_SESSION['success'] = 'Отзыв удален!';
        redirect();
    }



}