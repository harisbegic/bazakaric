<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryParent extends Model
{
    public function categoryChild() {
    	return $this->hasMany('App\categoryChild');
    }
}
