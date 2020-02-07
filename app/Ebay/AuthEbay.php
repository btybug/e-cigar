<?php


namespace App\Ebay;

use Carbon\Carbon;
use \DTS\eBaySDK\Account\Services;
use \DTS\eBaySDK\Order\Services\OrderService;
use \DTS\eBaySDK\Account\Types;
use \DTS\eBaySDK\Account\Enums;
use DTS\eBaySDK\OAuth\Services\OAuthService;
use DTS\eBaySDK\OAuth\Types\RefreshUserTokenRestRequest;
use DTS\eBaySDK\Shopping\Enums\SeverityCodeType;
use DTS\eBaySDK\Shopping\Services\ShoppingService;
use DTS\eBaySDK\Shopping\Types\GetCategoryInfoRequestType;


class AuthEbay
{
    protected $user;

    protected $token;

    protected $accessToken;

    protected $tokenType;

    protected $expiresIn;

    protected $refreshToken;

    protected $sandbox=true;

    protected $credentials;

    protected $mode;

    protected $oAuthService;
    protected $state;
    protected $code;



    public function __construct()
    {


        $this->run();
    }

    public static function __callStatic($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        $_this = new static;
        if (method_exists($_this, $method) && is_callable(array($_this, $method))) {
            return call_user_func_array([$_this, $method], $arguments);
        } else {
            throw new \Error("Method $name does not exist");
        }
    }

    public function scopeTest()
    {
        return $this;
    }


    public function __call($name, $arguments)
    {
        $method = 'scope' . ucfirst($name);
        if (method_exists($this, $method)
            && is_callable(array($this, $method))
        ) {
            return call_user_func_array([$this, $method], $arguments);
        }
        throw new Exception("Method $name does not exist");
    }

    private function run()
    {
        if (\File::exists(storage_path('app/ebay/token.json'))) {
            $this->token = json_decode(\File::get(storage_path('app/ebay/token.json')), true);
            if ($this->array_keys_exists(['accessToken', 'tokenType', 'expiresIn', 'refreshToken','state'],$this->token)) {
                $this->accessToken = $this->token['accessToken'];
                $this->tokenType = $this->token['tokenType'];
                $this->expiresIn = $this->token['expiresIn'];
                $this->refreshToken = $this->token['refreshToken'];
                $this->state = $this->token['state'];
                $this->code = $this->token['code'];

            }
        }
    }

    protected function array_keys_exists(array $keys, array $arr)
    {
        return !array_diff_key(array_flip($keys), $arr);
    }


    public function scopeGetAccount()
    {
        $config = config('ebay');
        $this->oAuthService = new Services\AccountService([
            'authorization' => $this->getFreshToken(),
            'sandbox' => true
        ]);
        $request = new Types\GetFulfillmentPoliciesByMarketplaceRestRequest();
        $request->marketplace_id = Enums\MarketplaceIdEnum::C_EBAY_US;
        $response = $this->oAuthService->getFulfillmentPoliciesByMarketPlace($request);


        if (isset($response->errors)) {
            $message='';
            foreach ($response->errors as $error) {

                $message.=      "%s: %s\n%s\n\n".$error->errorId.' '.$error->message.' '.$error->longMessage;

            }
            throw new \Exception($message,$response->getStatusCode());
        }
        if ($response->getStatusCode() === 200) {
              return $response;
        }
    }

    public function scopeGetCategories()
    {
        $config = config('ebay');
        $service = new ShoppingService([
            'credentials' => $config['sandbox']['credentials'],
            'sandbox' => true
        ]);

        /**
         * Create the request object.
         */
        $request = new GetCategoryInfoRequestType();

        $request->CategoryID = '-1';
        $request->IncludeSelector = 'ChildCategories';

        /**
         * Send the request.
         */
        $response = $service->getCategoryInfo($request);

        /**
         * Output the result of calling the service operation.
         */
        if (isset($response->Errors)) {
            foreach ($response->Errors as $error) {
                printf(
                    "%s: %s\n%s\n\n",
                    $error->SeverityCode === DTS\eBaySDK\Shopping\Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
                    $error->ShortMessage,
                    $error->LongMessage
                );
            }
        }

   dd($response->CategoryArray->Category);
    }

    public function scopeExists()
    {
        return isset($this->accessToken);
    }

    protected function getFreshToken(){
        if(time()>$this->expiresIn){
        $config = config('ebay');
        $this->oAuthService = new OAuthService([
            'credentials' => $config['sandbox']['credentials'],
            'ruName' => $config['sandbox']['ruName'],
            'sandbox' => true
        ]);
        $request = new RefreshUserTokenRestRequest();
        $request->refresh_token = $this->refreshToken;
        $request->scope = [
            'https://api.ebay.com/oauth/api_scope/sell.account',
            'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
            'https://api.ebay.com/oauth/api_scope/sell.inventory',

        ];
        $response = $this->oAuthService->refreshUserToken($request);
        $dataToken=$response->toArray();
                $this->token['accessToken']= $response->access_token ;
                $this->token['tokenType']=  $response->token_type;
                $this->token['expiresIn']=  time()+$response->expires_in-60;
                $this->token['refreshToken']=  $response->refresh_token;

//        $dataToken['expires_in']=time()+$dataToken['expires_in']-60;
//        $dataToken['tokenType']=$this->tokenType;
//        $dataToken['refreshToken']=$this->refreshToken;
//        $dataToken['state']=$this->state;

        \File::put(storage_path('app/ebay/token.json'),json_encode($this->token,true));
        $this->run();
        }
        return $this->accessToken;
    }
}
