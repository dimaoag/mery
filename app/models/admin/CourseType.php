<?php
namespace app\models\admin;

use app\models\AppModel;

class CourseType extends AppModel {

    public $attributes = [
        'name' => '',
        'kind_id' => '',
        'category_id' => '',
        'price' => '',
        'description' => '',
    ];


    public $rules = [
        'required' => [
            ['name'],
            ['kind_id'],
            ['category_id'],
            ['price'],
        ],
        'integer' => [
            ['kind_id'],
            ['category_id'],
        ],
    ];

}