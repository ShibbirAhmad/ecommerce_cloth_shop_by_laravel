<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Product;
use App\Cart;
use App\Order;


class OrderController extends Controller
{
    public function index(){

         session_start();
        $session_id=session_id();

        $cart_products=Cart::where('session_id',$session_id)->get(); 

        return view('site.checkout',compact(['cart_products']));
    }




     
    //function for storing order
    public function storeOrder(Request $request){
             
             $data=$request->all();
             $validate=Validator::make($data,[
                // 
                
                     'customer_name' => 'required',
                     'shoper_email' => 'required|email',
                     'shoper_phone' =>  'required|min:11|max:14',
                     'division' => 'required',
                     'district' => 'required',
                     'zip_code'  => 'required',
                     'receieveing_description' => 'required',
                     'payment_method' => 'required',
                    

             ]);     
             
             
             if ($validate->fails() ) {
           
                return redirect()->back()->withErrors($validate)->withInput();
   
           }



      //order accepting process
       session_start();  
      $session_id=session_id();

      $order_able_products=Cart::where('session_id',$session_id)->get();


     foreach ($order_able_products as $ordered) {
         
             $order= new Order(); 
             $order->session_id=$ordered->session_id;
             $order->product_id=$ordered->product_id;

             $order->product_name=$ordered->product_name;

             $order->product_image=$ordered->product_image;

             $order->product_price=$ordered->product_price;

             $order->product_quantity=$ordered->product_quantity;

             $order->payable_amount=$request->payable_amount;

             $order->payment_method=$request->payment_method;

             $order->shoper_name=$request->customer_name;

             $order->shoper_email=$request->shoper_email;

             $order->shoper_phone=$request->shoper_phone;

             $order->shoper_division=$request->division;

             $order->shoper_district=$request->district;

             $order->shoper_zipCode=$request->zip_code;

             $order->shoper_receieving_Details=$request->receieveing_description;

              
            


            if ($order->save()) {
                
                return redirect()->route('payment');
            }

     }








    }









    
}
