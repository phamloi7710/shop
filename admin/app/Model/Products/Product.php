<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = "products";
    public function category()
    {
        return $this -> belongsTo('App\Model\Products\Category','category_id','id');
    }
    protected $fillable = [
        'name',
        'code',
        'priceWareHouse',
        'priceSell',
        'priceSale',
        'qty',
        'summary',
        'note'
    ];
}
