<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
	/**
	 * Returns welcome page
	 * @return \Illuminate\Http\Response
	 */
    public function showWelcomePage()
    {
    	return view('welcome');
    }
}