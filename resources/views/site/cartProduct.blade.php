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
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->product_quantity }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <h2 class="cart_total_price"><i class="fa fa-money"></i>{{$total=$cart->product_price * $cart->product_quantity }}</h2>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ route('delete.cart',$cart->id)}}"><i class="fa fa-times"></i></a>
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
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span><i class="fa fa-money"></i><?php echo $sum ;?></span></li>
                        <li>Eco Tax <span><i class="fa fa-money"></i><?php $vat= $sum * 0.10 ;
                                                                              echo $vat ;?></span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span><i class="fa fa-money"></i><?php $payable_amount=$sum + $vat ; 
                                                                         echo $payable_amount ; ?></span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
   
</section><!--/#do_action-->



@endsection


@push('js')
    
@endpush