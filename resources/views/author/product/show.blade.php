@extends('backend/master')


@push('css')
    
    <!-- Bootstrap Select Css -->
    {{-- <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css ')}}" rel="stylesheet" /> --}}

@endpush




@section('content')
 
 {!! Form::open() !!}

<div class="card-header"><div class="card-title"><h5> visited product Details <i class="fa fa-eye"></i> </h5></div></div>
<div class="row">
    <div class="col-lg-8 col-md-12">
        <!--card for product title and image--> 
        <div class="card">
             <div class="card-header">
                 <div class="card-title"><h4>product name,price & Image</h4></div>
             </div>
             
             <div class="card-body">
                 {!! Form::label('name', 'product name',) !!}
                 {!! Form::text('', $product->name, ['class' => 'form-control form-inline']) !!}
                 
                 <div class="form-group mt-4 ">
                 {!! Form::label('productImage', 'product Related Image', ) !!}
          
                        
                        <img src="{{asset('backend/images/product/'.$product->image)}}" style="width:100px;height:100px;border-radius:10px;margin-top:-20px;">
                </div>
                  
                {!! Form::label('price','product price') !!}
                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}

                <div class="form-group mt-2 ">
                    <input type="checkbox" id="stock" {{ $product->is_stock==1 ? 'checked' : '' }} class="filled-in " name="" value="1">
                    <label for="stock">Stock</label>
                </div>
             </div>
             <div class="card-footer"></div>
         </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <!--card for product category and tags -->
                     <!-- Tags Input -->
                     <div class="card">
                        <div class="card-header bg-light-blue">
                            <h4>  Category    </h4>
                        </div>
                        <div class="card-body bg-blue">
                             @foreach ($product->categories as $category)
                                 <span class="badge bg-cyan ">{{ $category->name }}</span>
                             @endforeach
                        </div> 
                    </div>
                 
                    <div class="card-">
                        <div class=" card-header bg-info ">
                            <div class="card-title"><h4>Brands</h4></div>
                        </div>
                        <div class="card-body bg-green">
                            @foreach ($product->tags as $tag)
                            <span class="badge bg-pink ">{{ $tag->name }}</span>
                        @endforeach
                        </div>
                    </div>
                                     
            <a href="{{route('author.product.index')}}" class="btn mt-3 ml-5 btn-info waves-effect">Back</a>
               
            
                   
    </div>
 <!-- #END# Tags Input -->

</div>


<div class="row mt-3">
     <div class="col-lg-12 cl-md-12">
        <div class="card">
            <div class="card-header"> short description</div>
             <div class="card-body">
                 <textarea class="form-control" name="short_description" id="" rows="3">
                   {{ $product->short_description }}
                 </textarea>
             </div>
        </div>
         <div class="card">
             <div class="card-header">
                 <div class="card-title"><h4>long product Details</h4></div>
             </div>
             
             <div class="card-body">
                  <div class="form-group">
                    
                    {!! Form::textarea('',$product->long_description , ['id' => 'ckeditor']) !!}
                    
                </div>
             </div>
             <div class="card-footer"></div>
         </div>
        
     </div>
</div>




{!! Form::close() !!}


@endsection




@section('script')

<script> 
$(function () {
    //CKEditor
    CKEDITOR.replace('ckeditor');
    CKEDITOR.config.height = 300;

   
});
</script>
  
   <!-- Select Plugin Js -->
   <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js ')}}"></script>
   <!-- TinyMCE -->
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js ')}}"></script>

@endsection()