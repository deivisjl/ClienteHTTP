<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function showProducts($title, $id)
    {		
		$products = $this->marketService->getCategoriesProducts($id);

    	return view('categories.products.show',['products' => $products]);
    }
}
