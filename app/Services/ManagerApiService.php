<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/11/2018
 * Time: 11:54 AM
 */

namespace App\Services;


use App\Models\Settings;
use Carbon\Carbon;
use Mockery\Exception;

/**
 * Class ManagerApiService
 * @package App\Services
 */
class ManagerApiService
{
    /**
     * @var mixed
     */
    protected $id;
    /**
     * @var mixed
     */
    protected $secret;
    /**
     * @var mixed
     */
    protected $username;
    /**
     * @var mixed
     */
    protected $password;
    /**
     * @var \GuzzleHttp\Client
     */
    protected $http;
    /**
     * @var array
     */
    protected $urls = ['get_access_token' => 'oauth/token', 'get_refresh_token' => 'oauth/token'];
    /**
     * @var array
     */
    public $source = [];
    /**
     * @var
     */
    protected $settings;

    /**
     * ManagerApiService constructor.
     */
    public function __construct()
    {
        $settings = new Settings;
        $settings = $settings->getEditableData('manage_api_settings');
        $this->id = $settings->client_id;
        $this->secret = $settings->client_secret;
        $this->username = env('MANAGE_API_USERNAME');
        $this->password = env('MANAGE_API_PASSWORD');
        $this->http = new \GuzzleHttp\Client;
        if (!$this->id || !$this->secret || !$this->username || !$this->password) {
            throw new Exception('Missing required param');
        }
        $this->settings= new Settings;
        $this->source = $settings->getEditableData('manage_api_connection')->toArray();
    }

    /**
     * @return ManagerApiService
     */
    public function getAccessToken()
    {
        return $this->run('get_access_token');
    }

    /**
     * @param $url
     * @param $data
     * @return mixed
     */
    public function CURL($url, $data)
    {
        $response = $this->http->post($url, ['form_params' => $data]);
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @param $method
     * @param array $array
     * @return ManagerApiService
     */
    protected function run($method, array $array = [])
    {
        return $this->makeQuery($this->urls[$method], $method, $array);
    }

    /**
     * @param $url
     * @param $method
     * @param array $array
     * @return $this
     */
    protected function makeQuery($url, $method, $array = [])
    {
        $data = config('manage_api.' . $method);
        $data['client_id'] = $this->id;
        $data['client_secret'] = $this->secret;
        $data['username'] = $this->username;
        $data['password'] = $this->password;
        $data = array_merge($data, $array);
        $this->source = $this->CURL($this->url($url), $data);
        return $this;
    }

    /**
     * @param $path
     * @return string
     */
    protected function url($path)
    {
        return env('MANAGE_API_DOMAIN') . '/' . $path;
    }

    /**
     * @return mixed
     */
    public function save()
    {
        return $this->settings->updateOrCreateSettings('manage_api_connection', $this->source);
    }

    /**
     * @return ManagerApiService
     */
    protected function refreshToken()
    {
        return $this->run('get_refresh_token');
    }

    /**
     * @return $this|ManagerApiService
     */
    public function getFreshToken()
    {
        if ($this->tokenExpired()) {
            return $this->refreshToken()->source['access_token'];
        }
        return $this->source['access_token'];
    }

    /**
     * @return bool
     */
    public function tokenExpired()
    {
        return (bool) Carbon::parse($this->source['expires_in']) < Carbon::now();
    }
}