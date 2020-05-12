@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 

   <h4 class="heading">Those product are pending, Need to approval </h4>
    <div class="card">
            <div class="card-body">
                       
 <table class="table table-bordered text-center ">
        <thead>
                <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>Description </th>
                        <th>is_stock</th>
                        
                        <th colspan="2" >Action</th>
                  </tr> 
        </thead>
        <tfoot>
                <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>price</th>
                        <th>Description </th>
                        <th>is_stock</th>
                       
                        <th colspan="2" >Action</th>
                  </tr> 
        </tfoot>
        <tbody>
                @foreach ($products as $key=>$data)
                <tr>
                       <td>{{$key+1}}</td> 
                       <td>{{$data->name}}</td>
                       <td>{{$data->user->name }}</td>
                       <td> {{$data->view_count }} </td>
                       <td> 
                               @if ($data->is_stock==true)
                                   <span class="badge bg-blue">Available</span>
                               @else
                               <span class="badge bg-pink">Unavailable</span> 
                               @endif
                       </td>
                       <td>
                        @if ($data->is_approved==true)
                        <span class="badge bg-blue">Approved</span>
                    @else
                    <span class="badge bg-pink">Pending</span> 
                    @endif   
                       </td>
                       <td colspan="2">
                             
                        <div  >
                                {!! Form::open(['method'=>'PATCH', 'route'=> ['admin.product.approve',$data->id ]] ) !!}
                                 <button class="btnApprove btn btn-info"><span  class="" >approve</span><i class="fa fa-check ml-1  "></i></button>
                                {!! Form::close() !!}
                        </div> 

                            <a href="{{route('admin.product.show',$data->id)}}" style="margin-top:10px;margin-right:25px;" class="btn btn-dark "><i class="fas fa-eye"></i></a>   
         
                      
                       <div style="margin-top:-32px; margin-left:55px" >
                           {!! Form::open(['method'=>'DELETE', 'route'=> ['admin.product.destroy',$data->id ]] ) !!}
                            <button class="btnDelete btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                           {!! Form::close() !!}
                       </div> 
                    
                    </td>            
                </tr>

                    
                @endforeach
        </tbody>
</table>

            </div>
    </div>
 




@endsection




@section('script')
  <script> 
 
             $(document).ready(function () {
                     
                    $('.btnApprove').click(function(e){
                      
                        if (confirm('Are you sure to Approve this product?')) {
                             
                           return true;
                       }  
                       
                       e.preventDefault();
                    });
             });
      
</script>
 
@endsection()