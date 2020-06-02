<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['categoryChild_id'];

    public function materijal() 
    {
    	return $this->belongsTo('App\Materijal', 'materijal_id');
    }
    
    public function categoryChild() 
    {
    	return $this->belongsTo('App\categoryChild', 'categoryChild_id');
    }

    public function DUV() 
    {
    	return $this->belongsTo('App\duv', 'duv_id');
    }

    public function debljinaStjenke() 
    {
    	return $this->belongsTo('App\debljinaStjenke', 'debljinaStjenke_id');
    }

    public function lokacija() 
    {
    	return $this->belongsTo('App\Lokacija', 'lokacija_id');
    }

    public function promjer() 
    {
    	return $this->belongsTo('App\Promjer', 'promjer_id');
    }


    public function vrstaIzolacije() 
    {
    	return $this->belongsTo('App\vrstaIzolacije', 'vrstaIzolacije_id');
    }

    public function categoryParent()
    {
        return $this->belongsTo('App\categoryParent', 'categoryParent_id');
    }
}
