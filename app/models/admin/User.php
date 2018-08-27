<?php
namespace app\models\admin;

class User extends \app\models\User{

    public $attributes = [
        'id' => '',
        'first_name' => '',
        'last_name' => '',
        'phone' => '',
        'email' => '',
        'password' => '',
        'active' => '',
        'role' => '',
    ];


    public $rules = [
        'required' => [
            ['first_name'],
            ['last_name'],
            ['phone'],
            ['role'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['first_name', 3],
            ['last_name', 3],
            ['password', 4],
        ],

    ];



    /**
     * @return bool
     */
    public function isUnique(){
        $user =  \R::findOne('user', '(phone = ?) AND id <> ?', [$this->attributes['phone'], $this->attributes['id']]);
        if ($user){
            if ($user->phone == $this->attributes['phone']){
                $this->errors['unique'][] = 'Этот телефон уже есть в базе!';
            }
            return false;
        }
        return true;
    }


}