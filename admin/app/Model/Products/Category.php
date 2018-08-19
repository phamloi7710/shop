<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public function product()
    {
    	return $this->hasMany('App\Model\Products\Product','category_id','id');
    }
}
