<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Cart;

class Order extends Model
{
    public $fillable = [
    	'user_id',
    	'ip_address',
    	'name',
    	'phone_no',
    	'email',
    	'shipping_address',
        'payment_type',
        'transaction_id',
    	'is_paid',
    	'is_completed',
    ];


    public function user(){

    	return $this->belongsTo('App\Models\User');
    }

    public function carts(){

    	return $this->hasMany('App\Models\Cart');
    }
}
