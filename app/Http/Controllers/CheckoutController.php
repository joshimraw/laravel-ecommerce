<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(){

    	return view('frontend.checkout.index');
    }
}


