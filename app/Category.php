<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['name','slug','image'];


    //to make relationship with post
    public function posts(){

        return $this->belongsToMany('App\Post')->withTimestamps();
    }


    //to make realtion with product table
    public function products(){

         return $this->belongsToMany('App\Product');
    }



    
    
}
