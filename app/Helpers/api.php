<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 08.02.2018
 * Time: 10:39
 */
$_MEDIA_BUTTON = false;
function getAlertIconByClass($class = 'success')
{
    $icon = '';

    switch ($class) {
        case'success':
            $icon = 'fa fa-check';
            break;
        case'warning':
            $icon = 'fa fa-warning';
            break;
        case'info':
            $icon = 'fa fa-info';
            break;
        case'danger':
            $icon = 'fa fa-ban';
            break;
    }
    return $icon;
}

function is_enabled_media_modal()
{
    global $_MEDIA_BUTTON;
    return $_MEDIA_BUTTON;

}

function media_button(bool $multiple = false, $slug = 'drive')
{
    global $_MEDIA_BUTTON;
    $_MEDIA_BUTTON = true;
    return view('media.button', compact(['multiple', 'slug']));
}

function BBgetDateFormat($date, $format = null)
{
    if (!$date) null;

    if (!is_numeric($date))
        $date = strtotime($date);

    if ($format) {
        return date($format, $date);
    }

    return date('m/d/Y', $date);
}

/**
 * @param $time
 * @return bool|string
 */
function BBgetTimeFormat($time)
{
    if (!$time) null;

    return date("H:i:s", strtotime($time));
}
function userCan($permission){
    if(!Auth::check())return false;
    $role=Auth::user()->role;
    if($role->slug=='superadmin')return true;
    return $role->hasAccess($permission);
}

function getModuleRoutes($method, $sub)
{
    $routes = array();
    $new_array = [];
    $routeCollection = \Route::getRoutes();
    foreach ($routeCollection as $value) {
        $routes[$value->methods()[0]][$value->uri()] =  ['url'=>$value->uri(),'text'=>$value->getName()];
//        if (!isset($routes[$value->methods()[0]][$value->getPrefix()])) {
//            $routes[$value->methods()[0]][] = ['url'=>$value->uri(),'text'=>$value->getName()];
//        }
    }
    if (!isset($routes[$method]['admin'])) {
        $routes[$method]['admin'] = [];
    }
    ksort($routes[$method]);
    $routes[$method] = (keysort($routes[$method], $sub));

    if(isset($routes[$method][$sub]))
       return collect($routes[$method][$sub]);

}

 function keysort($array, $url, $count = 0)
{
    foreach ($array as $key => $value) {
        $count++;
        if (is_child($url, $key)) {
            $array[$url]['nodes'][$key] = $value;
            unset($array[$key]);
        }
    }
    if (isset($array[$url]['nodes']) && count($array[$url]['nodes'])) {
        foreach ($array[$url]['nodes'] as $k => $v) {
            $array[$url]['nodes'] = keysort($array[$url]['nodes'], $k);
        }
    }
    return $array;
}


 function is_child($parent, $child)
{
    if ($parent == $child) return false;
    $parent = clean_urls($parent);
    $child = clean_urls($child);
    return (array_sort_with_count($child, count($parent)) == $parent);
}


 function clean_urls($url)
{
    if (isset($url[0]) && $url[0] == '/') {
        $url = substr($url, 1);
    }
    return explode('/', $url);
}


function array_sort_with_count(array $array, $count)
{
    $cunk = array_chunk($array, $count);
    if (count($cunk)) {
        return $cunk[0];
    }
    return false;
}
