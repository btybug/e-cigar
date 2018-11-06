<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 08.02.2018
 * Time: 10:39
 */
$_MEDIA_BUTTON = false;
global $_MODEL_BOOTED;
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

function is_enabled_model_boot()
{
    return Config::get('model_boot', false);

}

function is_enabled_media_modal()
{
    global $_MEDIA_BUTTON;
    return $_MEDIA_BUTTON;

}

function enableMedia()
{
    global $_MEDIA_BUTTON;
    $_MEDIA_BUTTON = true;
}

function media_button(string $name, $model = null, bool $multiple = false, $slug = 'drive')
{
    enableMedia();
    $uniqId = uniqid('media_');
    return view('media.button', compact(['multiple', 'slug', 'name', 'model', 'uniqId']));
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

function userCan($permission)
{
    if (!Auth::check()) return false;
    $role = Auth::user()->role;
    if ($role->slug == 'superadmin') return true;
    return $role->hasAccess($permission);
}

function getModuleRoutes($method, $sub, $permissions = [])
{
    $routes = array();
    $new_array = [];
    $routeCollection = \Route::getRoutes();
    foreach ($routeCollection as $value) {
        if (isset($permissions[$value->getName()])) {

            $routes[$value->methods()[0]][$value->uri()] = ['url' => $value->uri(), 'text' => $value->getName(), 'state' => ['checked' => true]];
        } else {
            $routes[$value->methods()[0]][$value->uri()] = ['url' => $value->uri(), 'text' => $value->getName()];
        }
    }
    if (!isset($routes[$method]['admin'])) {
        $routes[$method]['admin'] = [];
    }
    ksort($routes[$method]);
    $routes[$method] = (keysort($routes[$method], $sub));

    if (isset($routes[$method][$sub]))
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

function get_pluck($data, $key, $name)
{
    $result = [];
    if (count($data)) {
        foreach ($data as $datum) {
            $result[$datum->{$key}] = $datum->{$name};
        }
    }

    return $result;
}

function get_translated($model, $locale, $column)
{

    if (is_array($model)) {
        $result = get_translated_by_array($model, $locale, $column);
    } else {
        $result = ($model && $model->getTranslation($locale)) ? $model->getTranslation($locale)->{$column} : null;
    }
    return $result;
}

function get_translated_by_array($model, $locale, $column)
{
    return ($model && isset($model['translatable'][$locale][$column])) ? $model['translatable'][$locale][$column] : null;
}

function post_url($post)
{
    return ($post->url) ? "/news/" . $post->url : "#";
}

function get_languages()
{
    return \App\Models\SiteLanguages::all();
}

function get_languages_pluck()
{
    return \App\Models\SiteLanguages::pluck('name', 'code')->all();
}

function get_default_language()
{
    $lang = \App\Models\SiteLanguages::where('default', 1)->first();
    return $lang;
}

function reset_password_link($token)
{
    return url(config('app.url') . route('password.reset', $token, false));
}

function confirmation_link($notifiable)
{
    return URL::temporarySignedRoute(
        'verification.verify', \Carbon\Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
    );
}

function app_name()
{
    return env('APP_NAME');
}

function app_url($user)
{
    return env('APP_URL');
}

function app_blog_url($user)
{
    return route('blog');
}

function receiver_name($user)
{
    return $user->name;
}

function receiver_last_name($user)
{
    return $user->last_name;
}

function receiver_last_phone($user)
{
    return $user->phone;
}

function shortUniqueID()
{
    return base_convert(microtime(false), 10, 36);
}

function sc($content, $user)
{
    $ShortCodes = new \App\Services\ShortCodes();
    $content = $ShortCodes->MailShortcoder($content, $user);
    $content = $ShortCodes->relatedShortcoder($content, $user);
    return $content;
}

function cartCount()
{
    $cartService = new \App\Services\CartService();

    return $cartService->getCount();
}

function getRegions($country, $all = false)
{
    $countries = new \PragmaRX\Countries\Package\Countries();
    return ($all) ? $countries->whereNameCommon($country)->first()->hydrateStates()->states->pluck('name', 'name')->toArray() : ['all_selected' => 'All Regions'] + $countries->whereNameCommon($country)->first()->hydrateStates()->states->pluck('name', 'name')->toArray();
}

function getCities($country)
{
    $countries = new \PragmaRX\Countries\Package\Countries();
    $country = $countries->where('name.common', $country)->first();
    return ($country) ? $country->hydrate('cities')->cities->pluck('name', 'name') : [];
}

function getRegionByZone($country)
{
    if (!$country) return [];
    $country = \App\Models\ZoneCountries::find($country);
    return ($country) ? [$country->region->id => $country->region->name] : [];
}

function getCountryByZone($country)
{
    if (!$country) return null;
    $country = \App\Models\ZoneCountries::find($country);
    return ($country) ? $country : null;
}

function stripe_key()
{
    $settings = new \App\Models\Settings();
    $model = $settings->getEditableData('payments_gateways');
    return isset($model->stripe_key) ? $model->stripe_key : null;
}

function stripe_secret()
{
    $settings = new \App\Models\Settings();
    $model = $settings->getEditableData('payments_gateways');
    return isset($model->stripe_secret) ? $model->stripe_secret : null;
}

function generate_random_letters($length, $prefix = '', $suffix = '')
{
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= chr(rand(ord('a'), ord('z')));
    }
    return upper($prefix . $random . $suffix);
}

function BBcodeDate($then)
{
    return (date('Y') - $then) . date('md');
}

function getUniqueCode($table,$column,$prefix='')
{
    do{
        $code = $prefix . BBcodeDate(2000) . generate_random_letters(4);
    }
    while (DB::table($table)->where($column, $code)->exists());
    return $code;
}

function commentRender($comments, $i = 0,$parent = false)
{
    if (count($comments)) {
        $comment = $comments[$i];
        //render main content
        if($parent){
            echo '<div class="reply-comment user-comment-img mt-md-5 mt-4 ml-5">';
        }else{
            echo '<div class="user-comment-img mt-md-5 mt-4">';
        }
        echo '<div class="row">';
        echo '<div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">';
        echo '<div class="user-img">';
        echo '<img src="/public/images/male.png" alt="">';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-sm-11 col-md-8 col-lg-6 col-xl-3">';
        echo '<div class="user-comment d-flex flex-column">';
        echo '<div class="user-title d-flex justify-content-between flex-wrap mb-1">';
        if($comment->author){
            if($comment->author->isAdmin()){
                echo '<h6>Admin</h6>';
            }else{
                echo '<h6>' .$comment->author->username.'</h6>';
            }
        }else{
            echo '<h6>'. $comment->guest_name .'</h6>';
        }
        echo '<span>'. time_ago($comment->created_at) .'</span>';
        echo '</div>';
        echo '<div class="content-reply d-flex justify-content-between">';
        echo '<p>'.$comment->comment.'</p>';
        echo '<a href="javascript:void(0)" data-id="'.$comment->id.'" class="reply"><i class="fas fa-reply"></i> reply</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        if (count($comment->children)) {
            commentRender($comment->children, 0,true);
        }

        echo '</div>';
        $i = $i + 1;
        if ($i != count($comments)) {
            commentRender($comments, $i);
        }
    }
}


function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}