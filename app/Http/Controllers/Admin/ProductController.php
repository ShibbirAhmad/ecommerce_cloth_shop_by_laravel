<?php

namespace App\Http\Controllers\Admin;


use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view ('admin.product.index',compact(['products']));
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
       return view('admin.product.create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           
        $data= $request->all();
   
        $validate=Validator::make($data,[
          
            'name' => 'required|unique:products',
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
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        
        if (isset($request->is_stock)) {
               $product->is_stock=true;
        } else {
            $product->is_stock=false;
        } 
        
        $product->is_approved=true;

        
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
        

            return redirect()->route('admin.product.index')->with('success','successfully! New Product Published');    
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
