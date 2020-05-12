<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['user_id', 'name', 'slug','image','price',
                          'short_description',
                          'long_description',
                          'is_approved',
                          'is_stock'];




   //to make relationship with category
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }



    //to make relationship with tags
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    
    //to know author
    public function user()
 
    {
        return $this->belongsTo('App\User');
    }


    public function scopeApproved($query){
          
         return $query->where('is_approved',true);
    }

}
