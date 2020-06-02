<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class duv extends Model
{
    public function product()
    {
    	return $this->hasMany('App\Product');
    }
}

