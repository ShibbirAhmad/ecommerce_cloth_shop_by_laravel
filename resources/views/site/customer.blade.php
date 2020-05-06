@extends('site.layout.master')

@section('title','customer')

@push('css')
    

@endpush



@section('slider')
     
	
@endsection



@section('content')
    
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New Cusetomer Signup!</h2>
                    {!! Form::open(['route' =>'customer.registration']) !!}
                        <input type="text" name="firstName"  placeholder="First Name"/>
                        <input type="text" name="lastName"  placeholder="Last Name"/>
                        <input type="email" name="email" placeholder="Email Address"/>
                        <input type="password" name="password" placeholder="Password"/>
                        <input type="text"  name="mobile" placeholder="your mobile number">
                        <button type="submit" class="btn btn-default">Signup</button>
                   {!! Form::close() !!}
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->



@endsection




@push('js')
    
@endpush