<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = "userGroup";
    public function user()
    {
    	return $this->hasMany('App\User','group_id','id');
    }
}
