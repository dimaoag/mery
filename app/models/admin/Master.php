<?php

namespace app\models\admin;

use app\models\AppModel;


class Master extends AppModel {

    public $attributes = [
        'first_name' => '',
        'last_name' => '',
        'category_id' => '',
        'position' => '',
        'video' => '',
        'description' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['first_name'],
            ['last_name'],
            ['category_id'],
            ['position'],
            ['video'],
            ['description'],
        ],
        'integer' => [
            ['category_id'],
        ],
    ];

}