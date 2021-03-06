<?php
/**
 * Created by PhpStorm.
 * User: Sahak
 * Date: 8/13/2016
 * Time: 12:31 AM
 */

namespace App\Services\google;



abstract class GoogleOauth {

    const TOKEN_URL = 'https://accounts.google.com/o/oauth2/token';
    const SCOPE_URL = 'https://www.googleapis.com/auth/analytics.readonly';

    protected $assoc = true;
    protected $clientId = '';

    public function __set($key, $value) {
        $this->{$key} = $value;
    }

    public function setClientId($id) {
        $this->clientId = $id;
    }

    public function returnObjects($bool) {
        $this->assoc = !$bool;
    }

    /**
     * To be implemented by the subclasses
     *
     */
    public function getAccessToken($data=null) {}

}