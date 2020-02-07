<?php


namespace App\Ebay;
use \DTS\eBaySDK\OAuth\Services;
use \DTS\eBaySDK\OAuth\Types;

class Ebay
{
    public function getAccessToken()
    {
        $service = new Services\OAuthService([
            'credentials' => config('ebay.production.credentials'),
            'ruName'      => config('ebay.production.ruName'),
            'sandbox'     => false
        ]);
        /**
         * Send the request.
         */
        $response = $service->getAppToken();
        /**
         * Output the result of calling the service operation.
         */
        printf("\nStatus Code: %s\n\n", $response->getStatusCode());
        if ($response->getStatusCode() !== 200) {
            printf(
                "%s: %s\n\n",
                $response->error,
                $response->error_description
            );
        } else {
           return $response;
        }
    }
}
