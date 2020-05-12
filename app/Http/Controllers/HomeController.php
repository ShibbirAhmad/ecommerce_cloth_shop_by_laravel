<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $category_sport=Category::whereIn('name',['Nike','Under Armour','Adidas','Puma','ASICS'])->get();

         $category_men=Category::whereIn('id',[ 12,13,14,15,16,17,18])->get();
        
         $category_women=Category::whereIn('id',[ 12,13,14,19,20])->get();
        
         $category_general=Category::whereIn('id',[ 6,5,22,24,23])->get();
              
         $brands=Tag::all();
         $product_tshirt=Product::approved()->where('name','LIKE','%t-shirt%')->take(4)->inRandomOrder()->get();
         $product_blazer=Product::approved()->where('name','LIKE','%blazer%')->take(4)->inRandomOrder()->get();
         $product_sunglass=Product::approved()->where('name','LIKE','%sunglass%')->take(4)->inRandomOrder()->get();
         $product_kids=Product::approved()->where('name','LIKE','%kids%')->take(4)->inRandomOrder()->get();
         $product_pant=Product::approved()->where('name','LIKE','%pant%')->take(4)->inRandomOrder()->get();
         $product_long_shirt=Product::approved()->where('name','LIKE','%shirt%')->take(4)->inRandomOrder()->get();
         $product_shoes=Product::approved()->where('name','LIKE','%shoes%')->take(4)->inRandomOrder()->get();
         
         $feature_products=Product::latest()->take(6)->approved()->get();
         $random_slider=Product::approved()->take(3)->inRandomOrder()->get();
         $random_first=Product::approved()->take(9)->inRandomOrder()->get();
         

        return view('site.index',compact(['feature_products','brands',
                                           'random_first',
                                          'product_tshirt',
                                          'product_blazer',
                                          'product_sunglass',
                                          'product_kids',
                                          'product_pant',
                                          'product_long_shirt',
                                          'product_shoes',
                                          'random_slider',
                                          'category_sport',
                                          'category_general',
                                          'category_men',
                                          'category_women'
                                          ]));
    }





    
}
