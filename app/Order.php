<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['product_id','product_name',

                         'product_image','product_price',

                         'product_quantity','payable_amount',

                         'payment_method', 'shoper_name',

                         'shoper_email','shoper_phone',

                         'shoper_division','shoper_district',

                         'shoper_zipCode',

                        'shoper_receievingDetails'
                        
                        ];















  }
