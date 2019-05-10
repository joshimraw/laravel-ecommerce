<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    public function getCategory($slug){
    	$categories = Category::all();

    	$category = Category::where('slug', $slug)->first();

    	return view('pages.category', compact('category', 'categories'));
    }


    public function getSearch(Request $request){
		$categories = Category::all();

    	$query = $request->input('query');
    	$products = Product::where("title", "LIKE", "%$query%")->get();

    	return view('pages.search', compact('products', 'query', 'categories' ));
    }



    // GENERAL PAGES
    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function getTermscondition(){
        return view('pages.terms-conditions');
    }
}
