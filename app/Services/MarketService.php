<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class MarketService
{
	use ConsumesExternalServices;

	/**
	 * Resolve the elements
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