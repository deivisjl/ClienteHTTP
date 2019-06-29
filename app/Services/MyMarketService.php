<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\AuthorizesMarketRequest;
use App\Traits\InteractsWithMarketResponses;

class MyMarketService
{
	use ConsumesExternalServices, AuthorizesMarketRequest, InteractsWithMarketResponses;

	/**
	 *  Url base para enviar peticiones
	 */
	protected $baseUri;

	private static $marketInstance;

	public function __construct()
	{
		$this->baseUri = config('services.market.base_uri');
	}

	public static function getInstance()
	{
		if (!self::$marketInstance instanceof self) {
            self::$marketInstance = new self();
        }

		return self::$marketInstance;
	}

	/**
	 * Obtiene la lista de productos desde la API
	 */
	public function getProducts()
	{	
		return $this->makeRequest('GET','products');
	}

	public function getCategories()
	{	
		return $this->makeRequest('GET','categories');
	}

	public function getProduct($id)
	{
		return $this->makeRequest('GET',"products/{$id}");
	}

	public function getCategoriesProducts($id)
	{	
		return $this->makeRequest('GET',"categories/{$id}/products");
	}
}