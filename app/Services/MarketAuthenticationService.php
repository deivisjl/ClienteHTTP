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
        $formParams = [
            'grant_type'=>'client_credentials',
            'client_id'=>$this->clientId,
            'client_secret'=>$this->clientSecret,
        ];

        $tokenData = $this->makeRequest('POST','oauth/token', [], $formParams);

        return "{$tokenData->token_type} {$tokenData->access_token}";
    }
}