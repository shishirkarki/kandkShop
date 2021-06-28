<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function attributes(){
        return $this->hasMany('App\ProductsAttributes','product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
