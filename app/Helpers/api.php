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
    if(! $country) return [];
    return ($all) ? $countries->whereNameCommon($country)->first()->hydrateStates()->states->pluck('name', 'name')->toArray() :
        ['all_selected' => 'All Regions'] + $countries->whereNameCommon($country)->first()->hydrateStates()->states->pluck('name', 'name')->toArray();
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

function getUniqueCode($table, $column, $prefix = '')
{
    do {
        $code = $prefix . BBcodeDate(2000) . generate_random_letters(4);
    } while (DB::table($table)->where($column, $code)->exists());
    return $code;
}


function commentRender($comments, $i = 0,$parent = false)
{
    if (count($comments)) {
        $comment = $comments[$i];
        //render main content
        if($parent){
            echo '<div class="row user-comment-img sub pl-4 w-100 m-0">';
        }else{
            echo '<div class="row user-comment-img">';
        }

        echo '<div class="col-lg-2 col-md-2 hidden-xsd-none d-sm-block">';
        echo '<figure class="thumbnail">';
            echo '<img class="img-fluid" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png">';
            if($comment->author){
                if($comment->author->isAdministrator()){
                    echo '<figcaption class="text-center">Admin</figcaption>';
                }else{
                    echo '<figcaption class="text-center">' .$comment->author->username.'</figcaption>';
                }
            }else{
                echo '<figcaption class="text-center">' .$comment->guest_name.'</figcaption>';
            }

        echo '</figure>';
        echo '</div>';


        echo '<div class="col-lg-10 col-md-10">';
        echo '<div class="card arrow left mb-4">';
        echo '<div class="card-body">';
        echo '<header class="text-left">';
        echo '<div class="comment-user"><i class="fa fa-user"></i> That Guy</div>';
        echo '<time class="comment-date" datetime="'. $comment->created_at .'"><i class="fa fa-clock-o"></i> '. time_ago($comment->created_at) .'</time>';
        echo '</header>';
        echo '<div class="comment-post">';
        echo '<p>'.$comment->comment.'</p>';
        echo '</div>';
        echo '<p class="text-right"><a href="#" data-id="'.$comment->id.'" class="btn btn-secondary btn-sm reply"><i class="fa fa-reply"></i> reply</a></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        if (count($comment->children)) {
            commentRender($comment->children, 0,true);
        }

        echo '</div>';
        $i = $i + 1;
        if ($i != count($comments)) {
            commentRender($comments, $i,$parent);
        }
    }
}


function replyRender($replies, $i = 0,$parent = false)
{
    if (count($replies)) {
        $reply = $replies[$i];

        if($reply->getTable() == 'history'){
            echo '<div class="row">'.$reply->user->name .' has '.$reply->body.'</div>';
        }else{
            //render main content
            if($parent){
                echo '<div class="clearfix"></div><div class="row user-comment-img sub pl-4 w-100 m-0">';
            }else{
                echo '<div class="row user-comment-img">';
            }

            echo '<div class="col-lg-2 col-md-2 hidden-xsd-none d-sm-block">';
            echo '<figure class="thumbnail">';
            echo '<img class="img-fluid" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png">';
            if($reply->author){
                if($reply->author->isAdministrator()){
                    echo '<figcaption class="text-center">Admin</figcaption>';
                }else{
                    echo '<figcaption class="text-center">' .$reply->author->username.'</figcaption>';
                }
            }else{
                echo '<figcaption class="text-center">' .$reply->guest_name.'</figcaption>';
            }

            echo '</figure>';
            echo '</div>';


            echo '<div class="col-lg-10 col-md-10">';
            echo '<div class="card arrow left mb-4">';
            echo '<div class="card-body">';
            echo '<header class="text-left">';
            echo '<div class="comment-user"><i class="fa fa-user"></i> That Guy</div>';
            echo '<time class="comment-date" datetime="'. $reply->created_at .'"><i class="fa fa-clock-o"></i> '. time_ago($reply->created_at) .'</time>';
            echo '</header>';
            echo '<div class="comment-post">';
            echo '<p>'.$reply->reply.'</p>';
            echo '</div>';
            echo '<p class="text-right"><a href="#" data-id="'.$reply->id.'" class="btn btn-secondary btn-sm reply"><i class="fa fa-reply"></i> reply</a></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            if (count($reply->children)) {
                replyRender($reply->children, 0,true);
            }
            echo '</div>';
        }


        $i = $i + 1;
        if ($i != count($replies)) {
            replyRender($replies, $i,$parent);
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

function meta($object, $type = 'seo_posts')
{
    $settings = new \App\Models\Settings();
    $metaTags = $settings->getEditableData($type);
    if (!$metaTags) return null;
    $metaTags = $metaTags->toArray();
    $columns = $object->toArray();
    $HTML = Html::meta('og:image', url($object->image))->toHtml()."\n\r";
    foreach ($metaTags as $name => $metaTag) {
        if (!is_null($metaTag)) {
            $objSeo=$object->seo()->where('name',$name)->where('type','general')->first();
            if(!$objSeo){
            $value = parametazor($metaTag,$object);
            }else{
                $value=$objSeo->content;
            }
            $HTML.= Html::meta($name, $value)->toHtml()."\n\r";
        }
    }
    return $HTML;
}

function parametazor($string,$object)
{
    preg_match('/{(.*?)}/', $string, $matches);
    if (count($matches)) {
        $string = str_replace($matches[0], $object->{$matches[1]}, $string);
        $string = parametazor($string,$object);
    }
    return $string;
}
function getSeo(array $seo,$index,$object)
{
 if($seo && is_object($object) && isset($seo[$index])) return parametazor($seo[$index],$object);
 return null;
}

function mergeCollections($collection1,$collection2){
    $collection = collect();

    foreach ($collection1 as $col1)
        $collection->push($col1);
    foreach ($collection2 as $col2)
        $collection->push($col2);
    $data = $collection->sortByDesc('created_at');
    return $data->merge([]);
}

