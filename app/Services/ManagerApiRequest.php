<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 12/12/2018
 * Time: 1:52 PM
 */

namespace App\Services;


use Illuminate\Http\Request;

final class ManagerApiRequest
{
    protected $service;
    protected $http;
    public function __construct(ManagerApiService $service)
    {
        $this->service=$service;
        $this->http = new \GuzzleHttp\Client;
    }

    public function getTest()
    {

        $response = $this->http->post($this->url('oauth-channel/test'),  [
            'headers'=>$this->headers(),
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'client-id',
                'client_secret' => 'client-secret',
                'redirect_uri' => 'http://example.com/callback',
                'code' =>'qaq',
            ],]);
        return json_decode((string)$response->getBody(), true);
    }

    public function getProducts(Request $request)
    {
        $response = $this->http->post($this->url('oauth-channel/get-all-products'),  [
            'headers'=>$this->headers(),
            'form_params' => $request->except('_token')]);
        return json_decode((string)$response->getBody(), true);
    }

    protected function url($path)
    {
        return env('MANAGE_API_DOMAIN') . '/api/' . $path;
    }

    protected function headers()
    {
        return   [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer '.$this->service->getFreshToken(),
    ];
    }
}