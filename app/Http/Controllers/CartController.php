<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Product;


class CartController extends Controller
{

    public function index()
        {
             
            session_start();
            $session_id=session_id();

            $cart_products=Cart::where('session_id',$session_id)->get(); 

            // if ($products) {
            //     $i=0;
            //     $sum=0;
            //     $qty =0;
            //     while ($item=$products->fetch_assoc()) {
            //         $i++;


            //         $subTotal= $item['product_price'] * $item['quantity'];
            //     }
            // }


            return view('site.cartProduct',compact(['cart_products']));

            
        }
     
        

    public function addToCart(Request $request , $product_id){

         session_start();
         $session_id=session_id();
        
         $carted_product=Product::where('id',$product_id)->get();

         foreach ($carted_product as $product) {

            $cart= new Cart();
            $cart->session_id=$session_id;
            $cart->product_id=$product->id;
            $cart->product_name=$product->name;
            $cart->product_image=$product->image;
            $cart->product_price=$product->price;
            $cart->product_quantity=$request->quantity;

            $request->session()->put('session_id', $session_id);

            if ($cart->save()) {
               
                return redirect()->route('cart');
            }

           
         }
        
      
        
         
    }

   

    public function updateCart(Request $request, $id){
  
        $cart=  Cart::find($id);
         
        $this->validate($request,['quantity' => 'required|min:1']);
     
        $cart->product_quantity=$request->quantity;
        $cart->save();

        return redirect()->back();

        // $cart->update();

    }


     //cart delete
     public function cartDelete($id){

           $cart_dlt=Cart::findOrFail($id);
           if ($cart_dlt->delete()) {
               return redirect()->back()->with('warning','one item removed');
           }
     }




     //function for which product already ordered from cart tables
     public function ordered_product_removeCart(){
              session_start();
             $session_id=session_id();
             $cart_dlt=Cart::where('session_id',$session_id)->get();
             if ( $cart_dlt->delete()) {
                 
                    session_destroy();
                    session_unset();

                    return redirect()->route('home');
             }
     }












}
