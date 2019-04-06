<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;

class Product extends Model
{
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function category(){

    	return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Models\Tag');
    }
}
