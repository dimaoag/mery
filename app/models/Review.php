<?php
namespace app\models;


class Review extends AppModel {

    public $attributes = [
        'user_id' => '',
        'text' => '',
        'status' => '',
        'is_show' => '',
    ];


    public $rules = [
        'required' => [
            ['text'],
        ],
    ];





}