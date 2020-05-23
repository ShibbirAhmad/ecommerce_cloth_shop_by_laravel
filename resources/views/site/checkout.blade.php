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

         {!! Form::open(['route' => 'order']) !!}  
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<div class="form-group ">
								<input type="text" name="customer_name" class="form-control mb-3"  required  placeholder="Customer Name">
								<input style="margin-top:5px;"  type="email" name="shoper_email" class="form-control " required  placeholder="Email*">
						
							</div>

						
						</div>
					</div>
					<div style="margin-top:40px;" class="col-sm-5 clearfix">
						<div class="bill-to">
							
								<div class="form-group mt-3">
									<input type="text" name="zip_code" class="form-control" placeholder="Zip / Postal Code *">
									<select name="division" style="margin-top:5px;" class="form-control  ">
										<option>-- Division --</option>
										<option value="Dhaka " >Dhaka</option>
										<option value="Sylhet " >Sylhet</option>
										<option value="Rangpur " >Rangpur</option>
										<option value="Borishal " >Borishal</option>
										<option value="Rajshahi " >Rajshahi</option>
										<option value=" Khulna" >Khulna</option>
										<option value=" Chitagong" >Chitagong</option>
										<option value="Mymonsingh " >Mymonsingh</option>
									</select>
									<select name="district" style="margin-top:5px;"  class="form-control ">
										<option>-- District / Region --</option>
										<option value="Sylhet " >Sylhet</option>
										<option value="Sonumgonj " >Sonumgonj</option>
										<option value="Moulvibazar " >Moulvibazar</option>
										<option value=" Habigonj" >Habigonj</option>
										<option value="Kisorgonj " >Kishorgonj</option>
										<option value=" Bramhonbaria" >Bramhonbaria</option>
										<option value=" Kustiya" >Kustiya</option>
										<option value="Jamalpur " >Jamalpur</option>
									</select>

									<input  style="margin-top:5px;"  name="shoper_phone" type="text" class="form-control" required   placeholder="Mobile Phone">
								
								</div>
								{!! Form::submit('order', ['class'=> 'btn btn-primary']) !!}	
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="receieveing_description" class="form-control" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="payment-options">
				<span>
					<label><input type="radio"  name="payment_method" value="bank"  checked > Direct Bank Transfer</label>
				</span>
                        
				<span>
					<label><input type="radio" name="payment_method" value="bkash" checked > BKASH</label>
				</span>

				<span>
					<label><input type="radio" name="payment_method" value="payment on delevery" checked > Payment on Delevery </label>
				</span>
				<span>
					<label><input type="radio" name="payment_method" value="paypal" checked > Paypal</label>
				</span>
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
							
							  
								<button id="add" class="cart_quantity_up">+</button>
								 
								 <input  class="cart_quantity_input" type="text" name="quantity" value="{{$cart->product_quantity }}" autocomplete="off" size="2">
								
								 <button id="subtract" class="cart_quantity_down">-</button>
							
							  </div>
						   
 
						 </td>
                        <td class="cart_total">
                            <h2 class="cart_total_price"><i class="fa fa-money"></i>{{$total=$cart->product_price * $cart->product_quantity }}</h2>
                        </td>
                        <td class="cart_delete">
                                
                        <div class=" cart_quantity_delete ">
                            
                              <button class="btnDelete btn btn-danger"><i class="fa fa-times"></i></button>
                         
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
											echo $payable_amount ; ?>
											  </span>
											  {!! Form::hidden('payable_amount',$payable_amount ) !!}
											
											  {!! Form::close() !!}
											</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>

	</section> <!--/#cart_items-->

	

@endsection


@push('js')
    
@endpush