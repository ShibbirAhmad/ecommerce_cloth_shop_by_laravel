<?php

namespace App\Http\Controllers\Author;

use App\Product;
use App\Tag;
use App\Category;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products=Product::where('user_id',2)->latest()->get();
        return view ('author.product.index',compact(['products']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        $tags=Tag::all();
       return view('author.product.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        
        $validate=Validator::make($data,[  
        
            'name' => 'required|unique:products',
            'price' => 'required',
            'productImage' => 'mimes:jpg,jpeg,png,gif',
            'categories' => 'required',
            'tags' => 'required',
            

            ]);

        if ($validate->fails()) {
            
            return redirect()->back()->withErrors($validate)->withInput();

        }
        $product=new Product();
        $product->user_id=Auth::user()->id;
        $product->name=$request->name;
        $product->slug=str_slug($request->name); 
        $product->price=$request->price;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        
        if (isset($request->is_stock)) {
                $product->is_stock=true;
        } else {
            $product->is_stock=false;
        } 
        
        $product->is_approved=false;

        
        if ($product->save()) {
    
       if ($request->hasFile('productImage')) {
           $image=$request->file('productImage');
           $slug=str_slug($request->name);
           $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('backend/images/product/'),$imageName);

           product::find($product->id)->update(['image'=>$imageName]);
         
           } 
         }
     
                
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);
        

     return redirect()->route('author.product.index')->with('success','successfully! New Product Published'); 
   
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('danger','Access Deny for you ');
       }
        return view('author.product.show',compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if ($product->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('danger','Access Deny for you ');
       }
        $categories=Category::all();
        $tags=Tag::all();
        return view('author.product.edit',compact(['product','categories','tags']) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($product->user_id != Auth::user()->id  ) {
           
            return redirect()->back()->with('danger','Access Deny for you ');
       }
        
        $data= $request->all();
   
        $validate=Validator::make($data,[
          
            'name' => 'required',
            'price' => 'required',
            'productImage' => 'mimes:jpg,jpeg,png,gif',
            'categories' => 'required',
             'tags' => 'required',
             

            ]);

        if ($validate->fails()) {
           
             return redirect()->back()->withErrors($validate)->withInput();

        }
     
    
        $product->name=$request->name;
        $product->slug=str_slug($request->name); 
        $product->price=$request->price;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        
        if (isset($request->is_stock)) {
               $product->is_stock=true;
        } else {
            $product->is_stock=false;
        }
        
        $product->is_approved=false;
                
      
        
        if ($product->save()) {
           
              if ($request->hasFile('productImage')) {
 
                //checking old image and deleting
            if (file_exists('backend/images/product/'.$product->image) ) {
                  
                unlink('backend/images/product/'.$product->image); 
                }
                  $image=$request->file('productImage');
                  $slug=str_slug($request->name);
                  $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('backend/images/product/'),$imageName);

                  product::find($product->id)->update(['image'=>$imageName]);
                
                  }
                }
            
                
        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);
        
            return redirect()->back()->with('warning','successfully! this product Updated');    
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->tags()->detach();

        if (file_exists('backend/images/product/'.$product->image)) {
        
        unlink('backend/images/product/'.$product->image);

        }
        
        if ( $product->delete()) {
                
            return redirect()->back()->with('danger','one product Deleted ');
        
            }

    }
}
