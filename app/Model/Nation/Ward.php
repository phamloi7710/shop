<?php

namespace App\Model\Nation;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = "devvn_xaphuongthitran";
    public function district()
    {
        return $this -> belongsTo('App\Model\Nation\District','maqh','maqh');
    }
}
