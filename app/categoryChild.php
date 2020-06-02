<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryChild extends Model
{
    public function categoryParent() {
    	return $this->belongsTo('App\categoryParent', 'categoryParent_id');
    }

    public function product()
    {
    	return $this->hasMany('App\Product');
    }
}
