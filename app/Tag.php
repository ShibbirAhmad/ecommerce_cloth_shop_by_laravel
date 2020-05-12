<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['name','slug'];


    //to make relationship with post
    public function posts(){

        return $this->belongsToMany('App\Post')->withTimestamps();
    }


    
    //to make realtion with product table
    public function products(){

        return $this->belongsToMany('App\Product');
   }




 
}
