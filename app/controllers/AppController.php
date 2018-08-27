<?php
namespace app\controllers;

use app\models\AppModel;
use mery\App;
use mery\base\Controller;
use mery\Cache;
use app\widgets\menu\Menu;



class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('menu', self::cacheMenu());
        App::$app->setProperty('categories', self::cacheCategory());
    }


    /**
     * @return array
     */
    public static function cacheMenu(){
        $cache = Cache::instance();
        $menu = $cache->get('menu');
        if (!$menu){
            $menu = \R::getAssoc("SELECT * FROM menu WHERE status = '1'");
            $cache->set('menu', $menu);
        }
        return $menu;
    }


    /**
     * @return array
     */
    public static function cacheCategory(){
        $cache = Cache::instance();
        $categories = $cache->get('categories');
        if (!$categories){
            $categories = \R::getAssoc("SELECT * FROM category WHERE status = '1'");
            $cache->set('categories', $categories);
        }
        return $categories;
    }


}