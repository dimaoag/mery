<?php
namespace app\controllers\admin;



use mery\Cache;

class CacheController extends AdminController {

    public function indexAction(){

        $this->setMeta('Очистить кеш');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();

        switch ($key){
            case 'menu':
                $cache->delete('menu');  //app/controllers/AppController;
                break;
            case 'categories':
                $cache->delete('categories');  //widgets/filter/Filter.php;
                break;
        }
        $_SESSION['success'] = 'Кеш удален!';
        redirect();
    }



}