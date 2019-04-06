<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    public function products(){

    	return $this->belongsToMany('App\Models\Product');
    }
}
