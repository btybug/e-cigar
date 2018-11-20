<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/20/2018
 * Time: 9:41 PM
 */

namespace App\Models;


class GetForexData
{
    private $api_key = 'ezlj4iid4fywjjm11wj66f48xds8bxi00qdx266xysczpi8lonlnxwk24gq4nh6o';

    public function latest()
    {
        $endpoint = 'latest';

// Initialize CURL:
        $ch = curl_init('https://www.getforexdata.com/api/' . $endpoint . '?access_key=' . $this->api_key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

// Decode JSON response:
        $exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
        return $exchangeRates;
    }

}