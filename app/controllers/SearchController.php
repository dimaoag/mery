<?php
namespace app\controllers;

use mery\App;
use mery\libs\Pagination;

class SearchController extends AppController {


    public function typeaheadAction(){
        if ($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $categories = \R::getAll("SELECT id, name FROM category WHERE name LIKE ? AND status = '1' LIMIT 10", ["%{$query}%"]);
            }
            echo json_encode($categories);
        }
        die();
    }

    public function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;


        if ($query){
            redirect(PATH. '/category/'.$query);

//            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
//            $perpage = App::$app->getProperty('pagination');
//            $total = \R::count('product', "title LIKE ? AND status = '1'", ["%{$query}%"]);
//            $paginationObj = new Pagination($page, $perpage, $total);
//            $pagination  = $paginationObj->getHtml();
//            $start = $paginationObj->getStart();
//            $isPagination = ($perpage <= $total) ? true : false;
//
//
//            $products = \R::find('product', "title LIKE ? AND status = '1' LIMIT ?, ?", ["%{$query}%", $start, $perpage]);
        }




        $this->setMeta('Search by: ' . htmlSpecialCharsWrapper($query));
        $this->setData(compact('products', 'query', 'pagination', 'isPagination'));
    }



}