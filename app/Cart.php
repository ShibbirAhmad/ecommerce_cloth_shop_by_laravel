<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
          protected $fillable=['session_id','product_id',
                                'product_name','product_image',
                                 'product_price','product_quantity'];




    public function products()
    {
        return $this->hasMany('App\Product');
    }






}
