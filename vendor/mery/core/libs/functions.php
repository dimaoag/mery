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

function dateFormat($date, $delimiter = '-'){
    $arr = explode('-', $date);
    $res = array_reverse ($arr);
    return $res[0].$delimiter.$res[1].$delimiter.$res[2];
}

function echoMonth($date){
    $arr = explode('-', $date);
    switch ($arr[1]){
        case '01':
            return 'Янв';
            break;
        case '02':
            return 'Фев';
            break;
        case '03':
            return 'Мар';
            break;
        case '04':
            return 'Апр';
            break;
        case '05':
            return 'Май';
            break;
        case '06':
            return 'Июн';
            break;
        case '07':
            return 'Июл';
            break;
        case '08':
            return 'Авг';
            break;
        case '09':
            return 'Сен';
            break;
        case '10':
            return 'Окт';
            break;
        case '11':
            return 'Ноя';
            break;
        case '12':
            return 'Дек';
            break;
    }
}

function echoDay($date){
    $arr = explode('-', $date);
    return $arr[2];
}
