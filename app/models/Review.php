<?php
namespace app\models;


class Review extends AppModel {

    public $attributes = [
        'user_id' => '',
        'text' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['text'],
        ],
    ];





}