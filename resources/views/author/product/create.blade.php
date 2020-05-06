@extends('backend/master')


@push('css')
    
    <!-- Bootstrap Select Css -->
    {{-- <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css ')}}" rel="stylesheet" /> --}}

@endpush




@section('content')
 
 {!! Form::open(['route' => 'author.product.store','files'=> true]) !!}

<div class="card-header">
    <div class="card-title"><h5>Add New product <i class="fa fa-edit"></i> </h5></div>
</div>

<div class="row">
    <div class="col-lg-8 col-md-12">
        <!--card for product title and image--> 
        <div class="card">
             <div class="card-header">
                 <div class="card-title"><h4>product Name Image & price </h4></div>
             </div>
             
             <div class="card-body">
                 {!! Form::label('name', 'product Name',) !!}
                 {!! Form::text('name', '', ['class' => 'form-control form-inline']) !!}
                 
                 <div class="form-group mt-4 ">
                 {!! Form::label('productImage', 'product Related Image', ) !!}
                 {!! Form::file('productImage', ['class' => 'form-control form-inline ']) !!}  
                </div>
                 
                {!! Form::label('price','product price') !!}
                {!! Form::text('price', '', ['class' => 'form-control']) !!}

                <div class="form-group mt-2 ">
                    <input type="checkbox" id="publish" class="filled-in " name="is_stock" value="1">
                    <label for="publish">STOCK</label>
                </div>
             </div>
             <div class="card-footer"></div>
         </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <!--card for product category and tags -->
                     <!-- Tags Input -->
                     
                     <div class="card">
                        <div class="card-header">
                            <h4>  Category & Brand    </h4>
                        </div>
                        <div class="card-body">
                            
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="category">Select Category</label>
                                       <select name="categories[]" class="form-control show-tick " data-live-search="true" multiple id="" >
                                           @foreach ($categories as $category)
                                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                       <label for="tag">Select Brand</label>
                                       <select name="tags[]" class="form-control show-tick " data-live-search="true" multiple  id="tag" >
                                           @foreach ($tags as $tag)
                                               <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <br>
                                <a href="{{route('author.product.index')}}" class="btn btn-danger waves-effect">Back</a>
                                
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary  waves-effect ']) !!}
                                
                          
                        </div>
                        <div class="card-footer"></div>
                    </div>
                   
    </div>
 <!-- #END# Tags Input -->

</div>


<div class="row mt-3">
     <div class="col-lg-12 cl-md-12">
         <div class="card">
             <div class="card-header">write short description</div>
             
             <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" name="short_description" id="" placeholder="write short description" rows="3"></textarea>
                  
              </div>
           </div>
         </div>

         <div class="card">
             <div class="card-header">
                 <div class="card-title"><h5>Write product Details</h5></div>
             </div>
             
             <div class="card-body">
                  <div class="form-group">
                    
                    {!! Form::textarea('long_description', '', ['id' => 'ckeditor']) !!}
                    
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