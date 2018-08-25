<?php

namespace App\Model\Nation;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "devvn_quanhuyen";
    public function province()
    {
        return $this -> belongsTo('App\Model\Nation\Province','matp','matp');
    }
    public function ward()
    {
    	return $this->hasMany('App\Model\Nation\Ward','maqh','maqh');
    }
}
