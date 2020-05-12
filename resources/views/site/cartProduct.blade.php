@extends('site.layout.master')


@section('title','cart')

@push('css')
    
@endpush

@section('content')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table text-center table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                        if ($cart_products) {
                            $sum=0;

                    ?>
                    @foreach ($cart_products as $cart)
                    
                          <tr>
                        <td class="cart_product">
                            <a href=""><img style="width:100px;height:110px;border-radius:5px" src="{{asset('backend/images/product/'.$cart->product_image)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cart->product_name}}</a></h4>
                            
                        </td>
                        <td class="cart_price">
                            <h2 class="cart_total_price" ><i class="fa fa-money"> </i>{{ $cart->product_price }}</h2>
                        </td>
                        <td class="cart_quantity">
                           <div class="cart_quantity_button">
                            {!! Form::open(['method'=> 'PATCH' , 'route' =>[  'update.cart',$cart->id]]) !!}
                             
                               <button id="add" class="cart_quantity_up">+</button>
                                
                                <input  class="cart_quantity_input" type="text" name="quantity" value="{{$cart->product_quantity }}" autocomplete="off" size="2">
                                <button id="subtract" class="cart_quantity_down">-</button>
                                {!! Form::close() !!}
                             </div>
                          

                        </td>
                        <td class="cart_total">
                            <h2 class="cart_total_price"><i class="fa fa-money"></i>{{$total=$cart->product_price * $cart->product_quantity }}</h2>
                        </td>
                        <td class="cart_delete">
                          
                        <div class=" cart_quantity_delete ">
                          {!! Form::open(['method'=>'DELETE', 'route'=> ['delete.cart',$cart->id ]] ) !!}
                            <button class="btnDelete btn btn-danger"><i class="fa fa-times"></i></button>
                           {!! Form::close() !!}
                        </div>
                        </td>
                    </tr>
 
                         <?php $sum=$sum + $total ?>
                    @endforeach
                  
                    <?php    
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
         </div>
        <div class="row">
        
            <div class="col-md-8 col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span><i class="fa fa-money"></i><?php echo $sum ;?></span></li>
                        <li>Eco Tax <span><i class="fa fa-money"></i><?php $vat= $sum * 0.10 ;
                                                                              echo $vat ;?></span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span><i class="fa fa-money"></i><?php $payable_amount=$sum + $vat ; 
                                                                         echo $payable_amount ; ?></span></li>
                    </ul>
                        <a class="btn btn-default update" href="{{route('home')}}">Continue Shoping</a>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                </div>
            </div>
            
        </div>
    </div>
   
</section><!--/#do_action-->



@endsection


@push('js')

      <script>
                          
                            
      

      </script>




@endpush