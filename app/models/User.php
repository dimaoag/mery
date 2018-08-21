<?php
namespace app\models;


class User extends AppModel {


    public $attributes = [
        'first_name' => '',
        'last_name' => '',
        'phone' => '',
        'email' => '',
        'password' => '',
        'img' => 'no_avatar.jpg',
        'role' => 'user',
    ];


    public $rules = [
        'required' => [
            ['first_name'],
            ['last_name'],
            ['phone'],
            ['password'],
        ],
        'email' => [
            ['email']
        ],
        'numeric' => [
            ['phone']
        ],
        'lengthMin' => [
            ['first_name', 4],
            ['last_name', 3],
            ['password', 4],
        ],

    ];



    public function hashPassword(){
        $this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
    }


    /**
     * @return bool
     */
    public function isUnique(){
        $user =  \R::findOne('user', 'phone = ?', [$this->attributes['phone']]);
        if ($user){
            if ($user->phone == $this->attributes['phone']){
                $this->errors['unique'][] = 'Такой номет телефона уже существует!';
            }
            return false;
        }
        return true;
    }


    /**
     * @param bool $isAdmin
     * @return bool
     */
    public function login($isAdmin = false){
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        if ($login && $password){
            if ($isAdmin){
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            } else {
                $user = \R::findOne('user', "login = ?", [$login]);
            }
            if ($user){
                if (password_verify($password, $user->password)){
                    foreach ($user as $key => $value){
                        if ($key != 'password'){
                            $_SESSION['user'][$key] = $value;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }


    /**
     * @return bool
     */
    public static function isAuth(){
        return isset($_SESSION['user']) ? true : false;
    }


    /**
     * @return bool
     */
    public static function isAdmin(){
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'){
            return true;
        }
        return false;
    }


    public static function generateCode($id){



    }


}