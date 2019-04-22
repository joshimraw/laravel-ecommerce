<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function store(Request $request){



    	$this->validate($request, array(
    		'firstname'		=> 'required',
    		'lastname'		=> 'required',
    		'phone'			=> 'required',
    		'email'			=> 'required',
    		'address'		=> 'required',
    		'payment_type'	=> 'required',
    	));



    	$fullname = $request->firstname . ' ' .$request->lastname;
    	$order 	= new Order;
    	if(Auth::check()){
    		$order->user_id = Auth::id();
    	}
    	$order->ip_address 	= request()->ip();
    	$order->name 		= $fullname;
    	$order->phone_no	= $request->phone;
    	$order->email 		= $request->email;
    	$order->shipping_address = $request->address;
    	$order->payment_type 	 = $request->payment_type;
    	$order->transaction_id	 ='112233';

    	$order->save();


        foreach(Cart::totalCarts() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }

    	Toastr::success('Order has placed successfully', 'Success');
    	return redirect()->route('home');
    }
}
