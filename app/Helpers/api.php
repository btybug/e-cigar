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
