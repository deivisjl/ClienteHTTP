<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class MarketService
{
	use ConsumesExternalServices;

	/**
	 *  Url base para enviar peticiones
	 */
	protected $baseUri;

	public function __construct()
	{
		$baseUri = config('services.market.base_uri');
	}

	/**
	 * Resolve the elements of request
	 */
	public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
	{

	}
	/**
	 * 	Decode correspondingly the response
	 */
	public function decodeResponse($response)
	{

	}
	/**
	 *  Resolve if the request to the service failed
	 */
	public function checkIfErrorResponse($response)
	{

	}
}