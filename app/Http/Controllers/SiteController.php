<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;

class SiteController extends Controller
{
        public function index($slug){

     


             $product=Product::where('slug',$slug)->first(); 
               
             $category_sport=Category::whereIn('name',['Nike','Under Armour','Adidas','Puma','ASICS'])->get();
   
             $category_men=Category::whereIn('id',[ 12,13,14,15,16,17,18])->get();
             
             $category_women=Category::whereIn('id',[ 12,13,14,19,20])->get();
             
             $category_general=Category::whereIn('id',[ 6,5,22,24,23])->get();
              
             $similar_product=Product::approved()->take(4)->inRandomOrder()->get();
            
             $recomended_product=Product::approved()->take(9)->inRandomOrder()->get();

             $brand=$product->tags();
             $brands=Tag::all();

            return view('site.productDetails',compact(['product',
                                                         'brands','brand',
                                                         'similar_product',
                                                         'recomended_product',
                                                         'category_sport',
                                                         'category_men',
                                                         'category_women',
                                                         'category_general']));
        }











}
