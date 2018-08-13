<?php
namespace app\controllers;

use app\models\AppModel;
use mery\App;
use mery\base\Controller;
use mery\Cache;


class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }


    /**
     * @return array
     */
//    public static function cacheCategory(){
//        $cache = Cache::instance();
//        $categories = $cache->get('categories');
//        if (!$categories){
//            $categories = \R::getAssoc("SELECT * FROM category");
//            $cache->set('categories', $categories);
//        }
//        return $categories;
//    }


}