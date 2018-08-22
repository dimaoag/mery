<?php
namespace app\models;


class User extends AppModel {


    public $attributes = [
        'first_name' => '',
        'last_name' => '',
        'phone' => '',
        'email' => '',
        'password' => '',
        'photo_origin' => '',
        'photo_profile' => '',
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
        $phone = !empty($_POST['phone']) ? trim(str_replace(" ", "", $_POST['phone'])) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        $phone = htmlspecialchars($phone);
        $password = htmlspecialchars($password);
        if ($phone && $password){
            if ($isAdmin){
                $user = \R::findOne('user', "phone = ? AND role = 'admin'", [$phone]);
            } else {
                $user = \R::findOne('user', "phone = ? AND active = 1", [$phone]);
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


    /**
     * @param $id
     * @return bool|int
     */
    public static function generateCode($id){
        $code = rand(1000, 9999);
        $user = \R::load('user', $id);
        $user->code = $code;
        $res = \R::store($user);
        if ($res){
            return $code;
        }
        return false;
    }


}