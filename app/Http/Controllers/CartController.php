<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){

    	$carts = Cart::totalCarts();

    	return view('frontend.carts.index', compact('carts'));
    }


    public function store(Request $request, $id){
   	
        if(Auth::check()){
            $oldCarts = Cart::where('user_id', Auth::id())
                     ->where('product_id', $id)->first();
        }else{
            $oldCarts = Cart::where('ip_address', request()->ip())
                     ->where('product_id', $id)->first();
        }
    	

    	if(!empty($oldCarts)){


    		Toastr::warning('The Product is already added into cart', 'warning');
    		return back();

    	}else{
    		$cart = new Cart();
    		if(Auth::check()){
    			$cart->user_id = Auth::id();
    		}

    		$cart->product_id = $id;
    		$cart->ip_address = request()->ip();
            $cart->product_quantity = $request->product_quantity;
    		$cart->save();

    		Toastr::success('Cart Added', 'Success');
    		return back();
    	}

    }

    public function destroy($id){
    	$cart = Cart::find($id);
    	$cart->delete();

    	Toastr::warning('Cart has Deleted', 'Warning');
    	return redirect()->route('carts.index');
    }
}
