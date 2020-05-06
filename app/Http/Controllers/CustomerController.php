<?php

namespace App\Http\Controllers;
use Validator;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
       public function index(){

           return view('site.customer');
       }



       //customer registration
       public function registration(Request $request){
             
             
        $data= $request->all();
   
        $validate=Validator::make($data,[
          
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'mobile' => 'required|unique:customers',
             
            ]);

        if ($validate->fails()) {
           
             return redirect()->back()->withErrors($validate)->withInput();

        }
       
        $customer=new Customer();
        $customer->first_name=$request->firstName;
        $customer->last_name=$request->lastName;
        $customer->email=$request->email;
        $customer->password=Hash::make($request->password);
        $customer->mobile=$request->mobile;

        if ($customer->save()) {
            
             return redirect()->back()->with('success','Welcome as new customer');
        }

       }



      //customer login 
      public function login($id){

           
      }











}
