<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\AuthorizesMarketRequest;
use App\Traits\InteractsWithMarketResponses;

class MarketService
{
	use ConsumesExternalServices, AuthorizesMarketRequest, InteractsWithMarketResponses;

	/**
	 *  Url base para enviar peticiones
	 */
	protected $baseUri;

	public function __construct()
	{
		$baseUri = config('services.market.base_uri');
	}

	/**
	 * Obtiene la lista de productos desde la API
	 */
	public function getProducts()
	{
		return $this->makeRequest('GET','products');
	}
}