@extends('site.layout.master')

@section('title','checkout')

@push('css')
    
@endpush



@section('content')
    
  
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('checkout')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="Email*">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							{!! Form::submit('order confirmly', ['class'=> 'btn btn-primary']) !!}
						</div>
					</div>
					<div style="margin-top:40px;" class="col-sm-5 clearfix">
						<div class="bill-to">
							
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Division --</option>
										<option>Dhaka</option>
										<option>Sylhet</option>
										<option>Rangpur</option>
										<option>Borishal</option>
										<option>Rajshahi</option>
										<option>Khulna</option>
										<option>Chitagong</option>
										<option>Mymonsingh</option>
									</select>
									<select>
										<option>-- District / Region --</option>
										<option>Sylhet</option>
										<option>Sonumgonj</option>
										<option>Moulvibazar</option>
										<option>Habigonj</option>
										<option>Kishorgonj</option>
										<option>Bramhonbaria</option>
										<option>Kustiya</option>
										<option>Jamalpur</option>
									</select>

									<input type="text" placeholder="Mobile Phone">
								
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
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
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><i class="fa fa-money"></i><?php echo $sum ;?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td><i class="fa fa-money"></i><?php $vat= $sum * 0.10 ;
                                            echo $vat ;?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><i class="fa fa-money"></i><?php $payable_amount=$sum + $vat ; 
                                            echo $payable_amount ; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

	

@endsection


@push('js')
    
@endpush