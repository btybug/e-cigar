<?php


namespace App\Ebay;

use \DTS\eBaySDK\Account\Services;
use \DTS\eBaySDK\Account\Types;
use \DTS\eBaySDK\Account\Enums;
use DTS\eBaySDK\OAuth\Services\OAuthService;


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
            if ($this->array_keys_exists(['accessToken', 'tokenType', 'expiresIn', 'refreshToken'],$this->token)) {
                $this->accessToken = $this->token['accessToken'];
                $this->tokenType = $this->token['tokenType'];
                $this->expiresIn = $this->token['expiresIn'];
                $this->refreshToken = $this->token['refreshToken'];

            }
        }
    }

    protected function array_keys_exists(array $keys, array $arr)
    {
        return !array_diff_key(array_flip($keys), $arr);
    }


    public function scopeGetAccount()
    {
        $this->oAuthService = new Services\AccountService([
            'authorization' => 'v^1.1#i^1#p^1#f^0#r^0#I^3#t^H4sIAAAAAAAAAOVYa2wUVRTu9mV4FJW3gGEzokbLzM5jXzNhN9m2QDf2sbAtlBoed2fudofOzkzm3ul2IdFShB+YAoqYCH8qQSJKSPghwUTAV8AfEgkSNQgkRiVYE/CPUDEG7+6Wsq0ECl20iftnc+8959zvfOece+5ctqt83PObazdfr3A8UtzbxXYVOxzcBHZceVnlpJLiWWVFbJ6Ao7drXldpd8nlBQgkNVNaCpFp6Ag6O5OajqTsZICyLV0yAFKRpIMkRBKWpWiovk7iGVYyLQMbsqFRznBNgPKzUBRicVF2CzKQRS+Z1W/ZbDICFBfjoYcX3YD3C25FFMg6QjYM6wgDHQconuVEmuNo3tvECRLHSxzHCD5vK+VcBi2kGjoRYVgqmIUrZXWtPKx3hwoQghYmRqhgOLQo2hgK1yxsaFrgyrMVHOAhigG20dBRtaFA5zKg2fDu26CstBS1ZRkiRLmCuR2GGpVCt8A8APwc1SLv97CKAIESh9CjFITKRYaVBPjuODIzqkLHs6IS1LGK0/dilLARWwtlPDBqICbCNc7M3xIbaGpchVaAWlgVWhGKRKhgFCRAey1op6GstgGLjla10KzgF1mfl/fQXuKwIir8wDY5WwMkD9un2tAVNUMZcjYYuAoSzHA4M2weM0SoUW+0QnGcwZMv5xlkkGvNhDQXQxsn9ExUYZLQ4MwO783/oDbGlhqzMRy0MHwhS1CAAqapKtTwxWwmDiRPJwpQCYxNyeVKpVJMSmAMq83Fsyznaqmvi8oJmARUVjZT6xl59d4KtJp1RYZEE6kSTpsESyfJVAJAb6OCguAV3MIA70NhBYfP/mMiz2fX0HooVH1A4PbFWNHDczzBycUKUR/BgRR1ZXDAGEjTSWC1Q2xqQIa0TPLMTkJLVSTBE+cFfxzSileM024xHqdjHsVLc6RUWQhjMVn0/3/KZKSJHoWyBXGBMr1AWe6N1C1JhCpRuhaHFV3r9Le0VK8z/Q3h1PKEYbdozS8k1lWipjZvsj4w0lq4s/OyYcKIoalyegzWuqVEgIXTVXaajKNQ08jfqNxFGXfHVqgz+ogYAKbKZIqbkY2kywDkVM9Mrc4ido5EyBWz00ybDREmKBTSVkespJL6YMgZoYxcJXcCEQdGrkLubIot4wfaKHvUMYRJtS2B0X3t2TmElFFlT8g0w8mkjUFMg+FC9cb/pC/e0T2V3Bvvz6dMrT9kv0hkcyFWldylj8nGmUEdMmNBZNgWue8yjZlbUJPRDnXSVbBlaBq0lnGjDvYYi/F9td4H87qQt76xk9myppLkWT3WPPsX4qmCQt1sSrsd2wrkN+fxuX0+QRRGV6HV2ag2pcdaR681EIbKQ/hEcQ19LgkWZX9ct+Mo2+34sNjhYH0szVWyz5WXNJeWTKQQaewMAroSMzoZFcQZ0j51gG0LMu0wbQLVKi53qOfOyv15DzW9K9mZg08140q4CXnvNuyc2ytl3KMzKjiRIx86nMDxHNfKPnV7tZSbXjr1lbnTLuKrCz4q28V3nD9/6Vr/gbdYtmJQyOEoKyJZVbSl6OIPF7rPeFY2eNinZ393MfDM8cnzXHt97rlrTh1/r2PjzxUd77SePbLuL3PjvK304dWu4uWLt7ajGyenzXdo01cc3/RpX2QS2uUP84e+f/1g1WtzZjEnmvu3b/jg8NLL+3Dln3u2v+ze/6jU4z8459jMijNOa9b4/W/6Dz65Zc2GZ1/0L0597Zraf/ax0wnXIq/7hnSiZn/Vq7M3/ppYtX6i/13rs68u/BK/dCBKLd23bfO1np6bO6488f436/c45vd8vDN1+Hpf85Rzre6b8Py34s7IsVXj+5asrf9jyt7Khp2//f74ld2HvjzpXnVk8unPj759ddOP9Bc76mr3SVbvG9deOiXs/uQnmJrRx+bC+DfmcrFEQhMAAA=='
        ]);
        $request = new Types\GetFulfillmentPoliciesByMarketplaceRestRequest();
        $request->marketplace_id = Enums\MarketplaceIdEnum::C_EBAY_US;
        $response = $this->oAuthService->getFulfillmentPoliciesByMarketPlace($request);
        if (isset($response->errors)) {
            $message='';
            foreach ($response->errors as $error) {

                $message.=      "%s: %s\n%s\n\n".$error->errorId. $error->message. $error->longMessage;

            }
            throw new \Exception($message,$response->getStatusCode());
        }
        if ($response->getStatusCode() === 200) {
              return $response->paymentPolicies;
        }
    }

    public function scopeExists()
    {
        return isset($this->accessToken);
    }
}
