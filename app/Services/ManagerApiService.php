<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/11/2018
 * Time: 11:54 AM
 */

namespace App\Services;


use App\Models\Settings;
use Mockery\Exception;

class ManagerApiService
{
    protected $id;
    protected $secret;
    protected $username;
    protected $password;
    protected $http;
    protected $urls = ['get_access_token' => 'oauth/token', 'refresh_token' => 'oauth/token'];
    protected $source = [];
    protected $settings;

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
        $this->source=$settings->getEditableData('manage_api_connection')->toArray();
    }

    public function getAccessToken()
    {
        return $this->run('get_access_token');
    }

    public function CURL($url, $data)
    {
        $response = $this->http->post($url, ['form_params' => $data]);
        return json_decode((string)$response->getBody(), true);
    }

    protected function run($method, array $array = [])
    {
        return $this->makeQuery($this->urls[$method], $method, $array);
    }

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

    protected function url($path)
    {
        return env('MANAGE_API_DOMAIN') . '/' . $path;
    }

    public function save()
    {
       return $this->settings->updateOrCreateSettings('manage_api_connection', $this->source);
    }
}