<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;


class OrderController extends Controller
{
    public function index(){

         session_start();
        $session_id=session_id();

        $cart_products=Cart::where('session_id',$session_id)->get(); 

        return view('site.checkout',compact(['cart_products']));
    }













    
}
