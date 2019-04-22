<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class Cart extends Model
{
    public $fillable = [
    	'product_id',
    	'user_id',
    	'order_id',
    	'ip_address',
    	'product_quantity'
    ];

    public function user(){

    	return $this->belongsTo('App\Models\User');
    }

    public function order(){

    	return $this->belongsTo('App\Models\Order');
    }

    public function product(){

    	return $this->belongsTo('App\Models\Product');
    }

    


    public static function totalCarts(){

        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
            ->where('order_id', NULL)->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())
            ->where('order_id', NULL)->get();
        }

        return $carts;
    }
}
