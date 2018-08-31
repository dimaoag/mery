<?php
namespace app\controllers;

use app\models\Review;
use app\models\User;

class ReviewController extends AppController {

    public function indexAction(){
        if (!User::isAuth()) redirect();
        if ($this->isAjax()){
            $error = '';
            $review = new Review();
            if (empty($_POST['text'])){
                $error .= '<p class="text-danger">Заполните поле!</p>';
            }
            $data = $_POST;
            if ($error == ''){
                $data['user_id'] = $_SESSION['user']['id'];
                $data['status'] = 1;
                $review->load($data);
                if (!$review->validate($data)){
                    $review->getErrors();
                } else {
                    $id = $review->save('review');
                    $error = '<label class="text-success">Отзыв добавленно</label>';
                }
            }
            $res = [
                'error' => $error,
            ];
            echo json_encode($res);
            die();
        }
        $this->setMeta('Отзывы');
    }



    public function loadAction(){
        if ($this->isAjax()){
            $reviews = \R::getAll("SELECT review.*, user.first_name, user.last_name, user.photo_origin, user.photo_profile FROM review JOIN user ON review.user_id = user.id WHERE review.status = 1 ORDER BY review.created_at DESC LIMIT 10");
            require_once APP . '/views/Review/reviews.php';
        }
    }

}