<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role_id','username', 'email', 'password',
    ];

    //to know role or user
    public function role()
    {
        return $this->belongsTo('App\Role');
    }


        //to know how many post of user

        public function posts()
        {
            return $this->hasMany('App\Post');
        }


          //to know how many product of user
          public function products()
          {
              return $this->hasMany('App\Product');
          }

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
