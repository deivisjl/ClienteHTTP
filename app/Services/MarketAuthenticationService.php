<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\InteractsWithMarketResponses;

class MarketAuthenticationService{

    use ConsumesExternalServices, InteractsWithMarketResponses;

    /**
	 *  Url base para enviar peticiones
	 */
    protected $baseUri;
    
    protected $clientId;

    protected $clientSecret;

    protected $passwordClientId;

    protected $passwordClientSecret;

    private static $marketInstance;

	public function __construct()
	{
        $this->baseUri = config('services.market.base_uri');
        $this->clientId = config('services.market.client_id');
        $this->clientSecret = config('services.market.client_secret');
        $this->passwordClientId = config('services.market.password_client_id');
        $this->passwordClientSecret = config('services.market.password_client_secret');
    }
    
    public function getClientCredentialsToken()
    {
        if($token = $this->existingValidClientCredentialsToken())
        {
            return $token;
        }

        $formParams = [
            'grant_type'=>'client_credentials',
            'client_id'=>$this->clientId,
            'client_secret'=>$this->clientSecret,
        ];

        $tokenData = $this->makeRequest('POST','oauth/token', [], $formParams);

        $this->storeValidToken($tokenData,'client_credentials');

        return $tokenData->access_token;
    }

    public function resolveAuthorizationUrl()
    {
        $query = http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => route('authorization'),
            'response_type' => 'code',
            'scope' => 'purchase-product manage-products manage-account read-general',
        ]);

        return "{$this->baseUri}/oauth/authorize/?{$query}";
    }

    public function getCodeToken($code)
    {
        $formParams = [
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_ur' => route('authorization'),
            'code' => $code,
        ];

        $tokenData = $this->makeRequest('POST','oauth/token',[],$formParams);

        $this->storeValidToken($tokenData,'authorization_code');

        return $tokenData;
    }

    public function getPasswordToken($username, $password)
    {
        $formParams = [
            'grant_type' => 'password',
            'client_id' => $this->passwordClientId,
            'client_secret' => $this->passwordClientSecret,
            'username' => $username,
            'password' => $password,
            'scope' => 'purchase-product manage-products manage-account read-general',
        ];

        $tokenData = $this->makeRequest('POST','oauth/token',[],$formParams);

        $this->storeValidToken($tokenData,'password');

        return $tokenData;
    }

    public function storeValidToken($tokenData, $grantType)
    {
        $tokenData->token_expires_at = now()->addSeconds($tokenData->expires_in - 5);

        $tokenData->access_token = "{$tokenData->token_type} {$tokenData->access_token}";

        $tokenData->grant_type = $grantType;

        session()->put(['current_token' => $tokenData]);
    }

    public function existingValidClientCredentialsToken()
    {
        if(session()->has('current_token'))
        {
            $tokenData = session()->get('current_token');

            if(now()->lt($tokenData->token_expires_at))
            {
                return $tokenData->access_token;
            }
        }

        return false;
    }
}