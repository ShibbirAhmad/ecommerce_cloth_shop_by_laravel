@extends('backend/master')


@push('css')
    
@endpush




@section('content')
 



<a href="{{route('author.product.create')}}" class="btn btn-primary m-2" >Add New product</a>
    <div class="card">
            <div class="card-body">
            <div class="table-responsive ">      
 <table class="table table-bordered text-center ">
        <thead>
           <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Image</th>
                <th>price</th>
                <th>Description </th>
                <th>is_stock</th>
                <th>Is_Approved</th>
                <th colspan="2" >Action</th>
          </tr>  
        </thead>
        <tfoot>
                <tr>
                        <th>serial</th>
                        <th>Name</th>
                        <th>Image</th>  
                        <th>price</th>
                        <th>Description  </th>
                        <th>is_stock</th>
                        <th>Is_Approved</th>
                        <th colspan="2" >Action</th>
                  </tr> 
        </tfoot>
        <tbody>
                @foreach ($products as $key=>$data)
                <tr>
                       <td>{{$key+1}}</td> 
                       <td>{{$data->name}}</td>
                       <td><img src="{{asset('backend/images/product/'.$data->image)}}" 
                            style="width:80px;height:80px;border-radius:10px;" alt=""></td>
                       <td>{{ $data->price }}</td>
                       <td> {{ str_limit($data->short_description, 30) }} </td>
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
                            <a href="{{route('author.product.show',$data->id)}}"  class="btn btn-dark "><i class="fas fa-eye"></i></a>   
                            <a href="{{route('author.product.edit',$data->id)}}" style="margin-right:70px;" class="btn btn-success "><i class="fas fa-edit"></i></a>
                      
                       <div style="margin-top:-33px; margin-left:55px" >
                           {!! Form::open(['method'=>'DELETE', 'route'=> ['author.product.destroy',$data->id ]] ) !!}
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
    </div>
 




@endsection




@section('script')
  <script> 
 

</script>
 
@endsection()