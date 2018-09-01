<?php
namespace app\models;


class Comment extends AppModel {

    public $attributes = [
        'user_id' => '',
        'article_id' => '',
        'text' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['user_id'],
            ['article_id'],
            ['text'],
        ],
    ];


}