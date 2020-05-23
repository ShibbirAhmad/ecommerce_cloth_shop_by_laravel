<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Payment;

class PaymentController extends Controller
{
    
    
      // function for load payment
      public function index(){
         session_start();
         $session_id=session_id();
         $order=Order::where('session_id',$session_id)->get();

         
        return view('site.payment',compact(['order']) );

     }


    
    //function for payment
    public function paymentReceieve(Request $request){
           session_start();
           $session_id=session_id();
           $ordered=Order::where('session_id',$session_id)->get();
           foreach($ordered as $order){

           $payment= new Payment();

           $payment->shoper_name=$order->shoper_name;
           $payment->shoper_district=$order->shoper_district;
           $payment->shoper_phone=$order->shoper_phone;
           $payment->payable_amount=$order->payable_amount;

           if (isset($request->payment_on_delevery)) {
            $payment->payment_on_delevery=true;
           }else{  $payment->payment_on_delevery=false ; }

           $payment->bkash_number=$request->bkash_number;
           $payment->bkash_TxdNo=$request->bkash_TxdNo;



           if ($payment->save()) {
             
              return redirect()->route('clear.cart');
           }

           
         }

    } 






}
