<?php
namespace app\models;


class Menu extends AppModel {



    public $attributes = [
        'name' => '',
        'alias' => '',
        'is_child' => '',
        'status' => '',
    ];


    public $rules = [
        'required' => [
            ['name'],
        ],
    ];



}