<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'eshoper') }}</title>

    
	<!-- Stylesheets -->

    <link href="{{asset('site/css/bootstrap.min.css ')}}" rel="stylesheet">
    <link href="{{asset('site/css/font-awesome.min.css ')}}" rel="stylesheet">

    <link href="{{ asset('site/css/prettyPhoto.css ') }} " rel="stylesheet">
    <link href="{{ asset('site/css/price-range.css ') }}" rel="stylesheet">
    <link href="{{ asset('site/css/animate.css ') }}" rel="stylesheet">
	<link href="{{ asset('site/css/main.css ') }}" rel="stylesheet">
	<link href="{{ asset('site/css/responsive.css ') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('site/images/ico/favicon.ico ') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('site/images/ico/apple-touch-icon-144-precomposed.png ') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('site/images/ico/apple-touch-icon-114-precomposed.png ') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('site/images/ico/apple-touch-icon-72-precomposed.png ') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('site/images/ico/apple-touch-icon-57-precomposed.png ') }}">

	
     @stack('css')
   
</head>

<body>
    
    {{-- header area --}}
    @include('site.layout.header')


    {{-- slider area --}}
     @yield('slider') 
    

	<section>
		<div class="container">
			<div class="row">

                {{-- //this is for success result    --}}
         @if (Session::has('success'))
                            
         <div class="alert alert-success">{{Session::get('success')}}</div>
        
         @endif

       {{-- //this is for warning result --}}
         @if (Session::has('warning'))
         
         <div class="alert alert-warning">{{Session::get('warning')}}</div>
        
         @endif

         {{-- //this is for warning result --}}
         @if (Session::has('danger'))
         
         <div class="alert alert-danger">{{Session::get('danger')}}</div>
        
         @endif


         {{-- //display for all error result   --}}

         @if (count($errors)> 0) 
                
                <ul class="list-group">
                    
                 @foreach ($errors->all() as $error)

                  <li class="alert alert-warning list-group-item">{{$error}} </li> 
                  
                   @endforeach
                    
                </ul>
         @endif
        

               @yield('content')
                
			</div>
		</div>
    </section>
	
    
    {{-- footer area --}}

     @include('site.layout.footer')
    
    <script>
   
    //this for disappear alert

    setTimeout(removeAlert,5000)
    function removeAlert(){

   document.querySelector('.alert').remove();
   }

    </script>
    <script src="{{asset('site/js/jquery.js ') }}"></script>
	<script src="{{asset('site/js/bootstrap.min.js ') }}"></script>
    <script src="{{asset('js/myScript.js')}}"></script>
    
	<script src="{{ asset('site/js/jquery.scrollUp.min.js ') }} "></script>
	<script src="{{ asset('site/js/price-range.js ') }} "></script>
    <script src="{{ asset('site/js/jquery.prettyPhoto.js ') }} "></script>
    <script src="{{ asset('site/js/main.js ') }} "></script>

    @stack('js')

</body>
</html>