<?php

namespace App\Http\Middleware;

use Closure;

class UserCan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $request->path();
//        dd(self::getModuleRoutes('PATCH','admin'));
        return $next($request);
    }

    public function parametazor($url)
    {
        preg_match('/{(.*?)}/', $url, $matches);
        if (count($matches)) {
            $url = str_replace($matches[0], 'code_1941', $url);
            preg_match('/{(.*?)}/', $url, $matches2);
            $url = parametazor($url);
        }
        $url = str_replace('code_1941', '{param}', $url);
        return $url;
    }

    public static function getModuleRoutes($method, $sub)
    {
        $routes = array();
        $new_array = [];
        $routeCollection = \Route::getRoutes();
        foreach ($routeCollection as $value) {
            $routes[$value->methods()[0]][$value->uri()] = [];
            if (!isset($routes[$value->methods()[0]][$value->getPrefix()])) {
                $routes[$value->methods()[0]][$value->getPrefix()] = [];
            }
        }
        foreach ($routes[$method] as $key => $val) {
            if (isset($key[0]) && $key[0] == '/') {
                $key = substr($key, 1);
            }
            $routes[$method][$key] = $val;
//            if (isset($routes[$method]['/' . $key])) {
//                unset($routes['GET']['/' . $key]);
//            }

        }
        if (!isset($routes[$method]['admin'])) {
            $routes[$method]['admin'] = [];
        }
        ksort($routes[$method]);
        $routes[$method] = (self::keysort($routes[$method], $sub));
        $_this = new static();
        if(isset($routes[$method][$sub]))
            $_this->array = collect($routes[$method][$sub]);

        return $_this;
    }

    public static function keysort($array, $url, $count = 0)
    {
        foreach ($array as $key => $value) {
            $count++;
            if (self::is_child($url, $key)) {
                $array[$url][$key] = [];
                unset($array[$key]);
            }
        }
        if (isset($array[$url]) && count($array[$url])) {
            foreach ($array[$url] as $k => $v) {
                $array[$url] = self::keysort($array[$url], $k);
            }
        }
        return $array;
    }


    public static function is_child($parent, $child)
    {
        if ($parent == $child) return false;
        $parent = self::clean_urls($parent);
        $child = self::clean_urls($child);
        return (self::array_sort_with_count($child, count($parent)) == $parent);
    }


    public static function clean_urls($url)
    {
        if (isset($url[0]) && $url[0] == '/') {
            $url = substr($url, 1);
        }
        return explode('/', $url);
    }


    public static function array_sort_with_count(array $array, $count)
    {
        $cunk = array_chunk($array, $count);
        if (count($cunk)) {
            return $cunk[0];
        }
        return false;
    }
}
