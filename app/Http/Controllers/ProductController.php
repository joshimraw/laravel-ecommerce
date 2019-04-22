<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function detail($slug){

    	$product = Product::where('slug', $slug)->first();
    	$categories = Category::all();

    	return view('product.single', compact('product', 'categories'));
    }
}
