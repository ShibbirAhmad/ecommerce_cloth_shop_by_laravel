@extends('site.layout.master')

@section('title','payment')


@push('css')
    
@endpush


@section('content')
    <div class="container"> 
          <div class="row">

              <div class="col-md-8 col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h4>select payment method</h4>
                    </div>
                      
                    <div class="card-body">
                       {!! Form::open(['route' => 'payment.add']) !!}
                       

                        <div style="margin-top:30px;margin-left:20px;"  class="form-group">
                            <input  type="checkbox" id="payment" class="filled-in " name="payment_on_delevery" value="1">
                            <label for="publish">payment on Delevery</label>

                        </div>
                        
                    </div>

                </div> 
                  

                   <div style="margin-top:30px" class="card">
                       <div class="card-header"> <h2 style="margin-left:150px;margin-bottom:30px">or</h2> <h4>send money 01772654094 to this number </h4>   </div>
                       <div class="card-body">
                        <div  class="form-group mt-5">
                        
                            {!! Form::label('number', 'your Bkash Number') !!}
                            {!! Form::text('bkash_number', '', ['class' => 'form-control']) !!} 
 
                            {!! Form::label('txdN', 'your Bkash TxdNo.') !!}
                            {!! Form::text('bkash_TxdNo', '', ['class' => 'form-control']) !!} 
                            
                         </div>
                       </div>
                   </div>
              </div>

           

              <div class="col-md-4 col-sm-4">
                  <div class="card">
                      <div class="card-header">
                          <h4>your ordered info.</h4>
                      </div>
                        
                      <div class="card-body">
                       
                           <div class="table-responsive">
                               <table class="table table-bordered ">
                                       @foreach ($order as $order)
                                      
                                        <tr>
                                            <td>Total</td>
                                            <td> <input type="text"  disabled  class="form-control"  value="{{ $order->payable_amount }}" ></td>
                                        </tr>

                                        <tr>
                                            <td>Name</td>
                                            <td> <input type="text"  disabled class="form-control"  value="{{ $order->shoper_name }}" > </td>
                                        </tr>                                        

                                        <tr>
                                            <td>District</td>
                                            <td><input type="text" disabled  class="form-control"  value="{{ $order->shoper_district }}" ></td>
                                        </tr>

                                        <tr>
                                            <td>mobile</td>
                                            <td> <input type="text" disabled  class="form-control" value="{{ $order->shoper_phone }}" ></td>
                                        </tr>

                                        <tr>
                                            <td>Receieving info.</td>
                                            <td>{{$order->shoper_receieving_Details }}</td>
                                        </tr>
                                             
                                       @endforeach
                               </table>
                           </div>
                         
                      </div>

                  </div>
              </div>
          {!! Form::submit('order confirmly', ['class'=> 'btn btn-primary ']) !!}
          {!! Form::close() !!}

          </div>
        </div>

@endsection



@push('js')
    
@endpush