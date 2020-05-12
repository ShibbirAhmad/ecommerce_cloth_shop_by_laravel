@extends('site.layout.master')

@section('title','home')

@push('css')
    

@endpush



@section('content')
    
      
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Sportswear
                        </a>
                    </h4>
                </div>
                <div id="sportswear" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category_sport as $sport)
                                 <li><a href="">{{ $sport->name }} </a></li>   
                            @endforeach 
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Mens
                        </a>
                    </h4>
                </div>
                <div id="mens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category_men as $men)   
                            <li><a href="{{$men->slug}}">{{ $men->name }}</a></li>
                            @endforeach   
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Womens
                        </a>
                    </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category_women as $women)   
                            <li><a href="{{$women->slug}}">{{ $women->name }}</a></li>
                            @endforeach 
                        </ul>
                    </div>
                </div>
            </div>
            
            @foreach ($category_general as $general)
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{$general->slug}}">{{ $general->name }}</a></h4>
                </div>
            </div>
            @endforeach
            
     
        </div><!--/category-products-->
    
        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($brands as $brand)
                    <li><a href="{{$brand->slug}}"> <span class="pull-right">({{$brand->products->count()}})</span>{{$brand->name}}</a></li>   
                    @endforeach     
                </ul>
            </div>
        </div><!--/brands_products-->
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b>$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('site/images/home/shipping.jpg ')}}" alt="" />
        </div><!--/shipping-->
        
    </div>
</div>

<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
       
        @foreach ($feature_products as $product)
            
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img  class="product_img"  src="{{ asset('backend/images/product/'.$product->image) }}" alt="" />
                            <h4> <i class="fa fa-money"> </i>{{ $product->price}} </h4>
                            <p>{{ $product->name }}</p>
                            <a href="{{ route('product.details',$product->slug) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h4><i class="fa fa-money"> </i>{{ $product->price}} </h4>
                                <p>{{ $product->name }}</p>
                                <a href="{{ route('product.details',$product->slug) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="{{ route('product.details',$product->slug) }}"><i class="fa fa-eye"></i>view product</a></li>
                    </ul>
                </div>
            </div>
        </div>
      
        @endforeach
       
        
    </div><!--features_items-->
    
    <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                <li ><a href="#blazers" data-toggle="tab">Blazers</a></li>
                <li><a href="#shirt" data-toggle="tab">Long Shirt</a></li>
                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                <li><a href="#pant" data-toggle="tab">Pant</a></li>
            </ul>
        </div>
        <div class="tab-content">
            
            <div class="tab-pane fade active in" id="tshirt" >
            @foreach ($product_tshirt as $tshirt)
                    <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="product_img" src="{{ asset('backend/images/product/'.$tshirt->image ) }}" alt="" />
                                <h4><i class="fa fa-money"> </i>{{ $tshirt->price }}</h4>
                                <p> {{ $tshirt->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
             @endforeach
            </div> 
             
             <div class="tab-pane fade" id="blazers" >
             @foreach ($product_blazer as $blazer)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="product_img" src="{{ asset('backend/images/product/'.$blazer->image ) }}" alt="" />
                                <h4><i class="fa fa-money"> </i>{{ $blazer->price }}</h4>
                                <p> {{ $blazer->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
           
            @endforeach
          </div>


            <div class="tab-pane fade" id="shirt" >
             @foreach ($product_long_shirt as $shirt)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="product_img" src="{{ asset('backend/images/product/'.$shirt->image ) }}" alt="" />
                                <h4><i class="fa fa-money"> </i>{{ $shirt->price }}</h4>
                                <p> {{ $shirt->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
         
             @endforeach
            </div>


             <div class="tab-pane fade" id="kids" >
                @foreach ($product_pant as $shirt)
           
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="product_img" src="{{ asset('backend/images/product/'.$shirt->image ) }}" alt="" />
                                <h4><i class="fa fa-money"> </i>{{ $shirt->price }}</h4>
                                <p> {{ $shirt->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
           
             @endforeach
            </div>

             <div class="tab-pane fade" id="pant" >
             @foreach ($product_pant as $shirt)
           
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img class="product_img" src="{{ asset('backend/images/product/'.$shirt->image ) }}" alt="" />
                                <h4><i class="fa fa-money"> </i>{{ $shirt->price }}</h4>
                                <p> {{ $shirt->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
           
             @endforeach
          </div>

        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               @foreach ($random_first as  $key=>$random_product)
                     <div class="{{$key==0 ? 'item active' : 'item'}}">	
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img class="recomend_img"   src="{{ asset('backend/images/product/'.$random_product->image) }}" alt="" />
                                    <h4><i class="fa fa-money"></i>{{ $random_product->price}}</h4>
                                    <p>{{ $random_product->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   
                </div>
                  {{$key++}}
               @endforeach
              
             
               

            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div><!--/recommended_items-->
    
</div>


@endsection




@push('js')
    
@endpush