@extends('admin.master')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Income Categories </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
     
             <a href="{{ route('create.incomeCategory') }}" class="mb-2 btn btn-block btn-outline-secondary btn-flat">Create Expense Categories</a>

      <table id="example1" class="table table-bordered table-striped">
        <thead>


        <tr>
          <th width="100px">ID</th>
          <th>Name</th>
          <th width="100px">Action</th>
       
        </tr>
        </thead>
        <tbody>
            
                 @foreach ($incomeCategory as $data )
                 <tr>
             <td>   {{ $data->id }}</td>
             <td>   {{ $data->name }}</td>
            
             <td class="text-center">        
                 <a  class="btn  btn-warning btn-sm" href={{route('edit.incomeCategory', $data->id)}}>
                    <i class="fas fa-edit"></i> 
              
                <a  class="btn  btn-danger btn-sm ml-1" href={{route('delete.incomeCategory', $data->id)}}>
                    <i class="fas fa-trash"></i>
              
            </td>
            </tr>
            @endforeach 
            
        </tbody>
  
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>



@endsection
