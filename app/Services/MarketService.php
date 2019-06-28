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
		$accessToken = $this->resolveAccessToken();

		$headers['Authorization'] = $accessToken;
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

	//
	public function resolveAccessToken()
	{
		return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM0ODg5ZjEyZTlhNTc1ZTg4ZjUwN2E2Yjc2NWMwNDFmYjljN2IxZWJmMjcxN2FjYjgxNmQxMGYxMTM4MjU0MDc3NTQ2YzI3MTk0ZmM1MWQ0In0.eyJhdWQiOiIxIiwianRpIjoiYzQ4ODlmMTJlOWE1NzVlODhmNTA3YTZiNzY1YzA0MWZiOWM3YjFlYmYyNzE3YWNiODE2ZDEwZjExMzgyNTQwNzc1NDZjMjcxOTRmYzUxZDQiLCJpYXQiOjE1NjE3MzkzNjIsIm5iZiI6MTU2MTczOTM2MiwiZXhwIjoxNTkzMzYxNzYxLCJzdWIiOiIxIiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.ZNT1oP4CTTWLO5Vm0FdzrVw8NRLbmCe5CqDZh_x6AAVGWV1Ge8pxDWn5UnyiHtzPmEAmhhRV2hyLucttQh9Xtfae2_RRHScYH_0E_l-uuyklcBuoDRclO8AY3wIuWrxOQwU3Up5BB2fo-9knrk64YnXDFnWshXPJeo46lqfNnSYkve3iheotsQbyH_IOMnoLCmNCEhBRCKR8K3YhT8VABHk6tOE3tuzPaGHunCTZwNCpqgKH93TnmMBXOE19cm4mABzKI24K9Sr7IIFA2-CKKD3BHd0RzxWWT6ctAgWeUh_2byzbfX05VZOSK5WY1NQ1Wc1kGdneFSsuEbe-tue_4kCtgK96zR7I1JWaL5tNgzQurrud1M_dyBwpL_Kk5AONvpSek5Ugc60PrnoOtC-B0uZFLBKN2sfP6U4D4JlkJjNtSdNgspCfTC73eHLr8Watre0A7D7zrc85E7UYjWNdXzMgp3DsqZ0f755_TgwdkO9v-Xu0TMzwBQQmLT0r0xlsuA4VaRtviWkSYfmBGFlWbqK1-slp2JFZ0ClntGIYhw7MxCfvLitZbSBA5ZKUmKoHB2nC8mCqSdx6xjKUgGjCJ0dx6esx7S1Dkf-M_Gc5DQVd-VxIwZFysbw5l_7PDsQGD2m4TmAjwqgvqnudDmSf818d-FU4W5hhG8VfYv78ykQ';
	}
}