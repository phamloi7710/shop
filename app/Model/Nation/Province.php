<?php

namespace App\Model\Nation;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "devvn_tinhthanhpho";
    public function district()
    {
    	return $this->hasMany('App\Model\Nation\District','matp','matp');
    }
}
