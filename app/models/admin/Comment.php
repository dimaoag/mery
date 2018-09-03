<?php

namespace app\models\admin;
use app\models\AppModel;

class Comment extends AppModel {

    public $attributes = [
        'text' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['text'],
        ],
    ];
}