<?php

namespace App\Http\Controllers;

use App\Services\MyMarketService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    	/**
	 * @var App\Services\MarketService
	 */
	protected $marketService;

    public function __construct()
    {

    	$this->marketService = MyMarketService::getInstance();
    }
}
