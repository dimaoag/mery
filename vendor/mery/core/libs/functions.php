<?php

/**
 * @param $array
 */
function debug($array, $die = false){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    if ($die){
        die();
    }
}


/**
 * @param bool $http
 */
function redirect($http = false){
    if ($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die();
    //exit;
}


/**
 * @param $str
 * @return string
 */
function h($str){
    return htmlspecialchars($str, ENT_QUOTES); //преобразования html тегов (экранирования)
}

/**
 * @param $dateTime
 * @return mixed
 */
function echoDate($dateTime){
    $res = explode(' ', $dateTime);
    return $res[0];
}

function dateFormat($date){
    $arr = explode('-', $date);
    $res = array_reverse ($arr);
    return $res[0].'-'.$res[1].'-'.$res[2];
}
