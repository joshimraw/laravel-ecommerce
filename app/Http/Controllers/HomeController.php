<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    

    public function index()
    {
    	$categories = Category::latest()->take('4')->get();
    	$recent_products = Product::latest()->take('3')->get();
    	$new_products = Product::latest()->take('6')->get();


        return view('home', compact('categories', 'recent_products', 'new_products'));
    }
}
