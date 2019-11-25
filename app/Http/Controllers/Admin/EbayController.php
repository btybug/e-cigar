<?php


namespace App\Http\Controllers\Admin;


use App\Ebay\Ebay;
use App\Http\Controllers\Controller;
use DTS\eBaySDK\Account\Enums;
use DTS\eBaySDK\Account\Services;
use DTS\eBaySDK\Account\Types;
use DTS\eBaySDK\OAuth\Services\OAuthService;
use Illuminate\Http\Request;


class EbayController extends Controller
{
    protected $view = 'admin.ebay';
    protected $oAuthService;

    public function __construct()
    {
        $config = config('ebay');
        $this->oAuthService = new OAuthService([
            'credentials' => $config['sandbox']['credentials'],
            'ruName' => $config['sandbox']['ruName'],
            'sandbox' => true
        ]);
    }
    public function settings()
    {
        return $this->view('settings');
    }

    public function listing()
    {
        return $this->view('listing');
    }

    public function orders()
    {
        return $this->view('orders');
    }

    public function test()
    {
        $e = new Ebay();
        dd($e->getAccessToken());
        $service = new Services\AccountService([
            'authorization' => config('ebay.production.oauthUserToken')
        ]);
        /**
         * Create the request object.
         */
        $request = new Types\GetFulfillmentPoliciesByMarketplaceRestRequest();
        /**
         * Note how URI parameters are just properties on the request object.
         */
        $request->marketplace_id = Enums\MarketplaceIdEnum::C_EBAY_US;
        /**
         * Send the request.
         */
        $response = $service->getFulfillmentPoliciesByMarketPlace($request);
        /**
         * Output the result of calling the service operation.
         */
        echo "====================\nFulfillment Policies\n====================\n";
        printf("\nStatus Code: %s\n\n", $response->getStatusCode());
        if (isset($response->errors)) {
            foreach ($response->errors as $error) {
                printf(
                    "%s: %s\n%s\n\n",
                    $error->errorId,
                    $error->message,
                    $error->longMessage
                );
            }
        }
        if ($response->getStatusCode() === 200) {
            foreach ($response->fulfillmentPolicies as $policy) {
                printf(
                    "(%s) %s: %s\n",
                    $policy->fulfillmentPolicyId,
                    $policy->name,
                    $policy->description
                );
            }
        }
        /**
         * Create the request object.
         */
        $request = new Types\GetPaymentPoliciesByMarketplaceRestRequest();
        /**
         * Note how URI parameters are properties on the request object.
         */
        $request->marketplace_id = Enums\MarketplaceIdEnum::C_EBAY_US;
        /**
         * Send the request.
         */
        $response = $service->getPaymentPoliciesByMarketPlace($request);
        /**
         * Output the result of calling the service operation.
         */
        echo "\n================\nPayment Policies\n================\n";
        printf("\nStatus Code: %s\n\n", $response->getStatusCode());
        if (isset($response->errors)) {
            foreach ($response->errors as $error) {
                printf(
                    "%s: %s\n%s\n\n",
                    $error->errorId,
                    $error->message,
                    $error->longMessage
                );
            }
        }
        if ($response->getStatusCode() === 200) {
            foreach ($response->paymentPolicies as $policy) {
                printf(
                    "(%s) %s: %s\n",
                    $policy->paymentPolicyId,
                    $policy->name,
                    $policy->description
                );
            }
        }
        /**
         * Create the request object.
         */
        $request = new Types\GetReturnPoliciesByMarketplaceRestRequest();
        /**
         * Note how URI parameters are properties on the request object.
         */
        $request->marketplace_id = Enums\MarketplaceIdEnum::C_EBAY_US;
        /**
         * Send the request.
         */
        $response = $service->getReturnPoliciesByMarketPlace($request);
        /**
         * Output the result of calling the service operation.
         */
        echo "\n===============\nReturn Policies\n===============\n";
        printf("\nStatus Code: %s\n\n", $response->getStatusCode());
        if (isset($response->errors)) {
            foreach ($response->errors as $error) {
                printf(
                    "%s: %s\n%s\n\n",
                    $error->errorId,
                    $error->message,
                    $error->longMessage
                );
            }
        }
        if ($response->getStatusCode() === 200) {
            foreach ($response->returnPolicies as $policy) {
                printf(
                    "(%s) %s: %s\n",
                    $policy->returnPolicyId,
                    $policy->name,
                    $policy->description
                );
            }
        }
    }

    public function app()
    {
        return $this->view('templates.index');
    }

    public function getAppToken()
    {
        $config = config('ebay');
        $service = new OAuthService([
            'credentials' => $config['sandbox']['credentials'],
            'ruName' => $config['sandbox']['ruName'],
            'sandbox' => true
        ]);

        $api = $service->getAppToken();
        return $this->view('templates.get_app_token', [
            'statusCode' => $api->getStatusCode(),
            'accessToken' => $api->access_token,
            'tokenType' => $api->token_type,
            'expiresIn' => $api->expires_in,
            'refreshToken' => $api->refresh_token,
            'error' => $api->error,
            'errorDescription' => $api->error_description
        ]);
    }

    public function getUserToken()
    {
        $config = config('ebay');
        $service = new OAuthService([
            'credentials' => $config['sandbox']['credentials'],
            'ruName' => $config['sandbox']['ruName'],
            'sandbox' => true
        ]);
        $state = uniqid();
        $url =  $service->redirectUrlForUser([
            'state' => $state,
            'scope' => [
                'https://api.ebay.com/oauth/api_scope/sell.account',
                'https://api.ebay.com/oauth/api_scope/sell.inventory'
            ]
        ]);
        return $this->view('templates.get_user_token',[
            'url'   => $url,
            'state' => $state
        ]);
    }

    public function getUserTokenBack(Request $request)
    {
        $api = $this->oAuthService->getUserToken(new Types\GetUserTokenRestRequest([
            'code' => $request->getQueryParam('code')
        ]));
        $token=[
            'state' => $request->getQueryParam('state'),
            'code' => $request->getQueryParam('code'),
            'statusCode' => $api->getStatusCode(),
            'accessToken' => $api->access_token,
            'tokenType' => $api->token_type,
            'expiresIn' => $api->expires_in,
            'refreshToken' => $api->refresh_token,
            'error' => $api->error,
            'errorDescription' => $api->error_description
        ];
        \File::put('ebay.json',json_encode($token,true));
        return $this->view();
    }
}

