<?php
namespace app\controllers;


class CategoryController extends AppController {

    public function viewAction(){

        $id = $this->route['alias'];
        $category = \R::findOne('category', 'id = ?', [$id]);
        if (!$category){
            throw new \Exception('Page not found', 404);
        }
        //gallery
        $gallery = \R::findAll('gallery', 'category_id = ?', [$category->id]);
        //master
        $master = \R::findOne('master', 'category_id = ?', [$category->id]);
        //course_kind (обучения с 0 или повышение квалификации)
        $courses_kind = \R::findAll('course_kind', 'category_id = ?', [$category->id]);
        //course_type (базовый или полный)
        $courses_type = \R::findAll('course_type', 'category_id = ?', [$category->id]);
        //courses
        $courses = \R::getAll("SELECT course.*, master.first_name, master.last_name FROM course JOIN master ON course.master_id = master.id WHERE course.category_id = $category->id AND date_start >= CURDATE() ORDER BY date_start ASC");
        //nearest_courses
        $nearest_courses = \R::getAll("SELECT * FROM course WHERE date_start >= CURDATE() ORDER BY date_start ASC LIMIT 6");
        //video_reviews
        $video_reviews = \R::findAll('video_review', 'category_id = ? AND is_show = 1', [$category->id]);




        $this->setMeta($category->name);
        $this->setData(compact('category', 'gallery', 'master', 'courses_kind', 'courses_type', 'courses', 'nearest_courses', 'video_reviews'));
    }

}