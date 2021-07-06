@extends('admin.master')

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Expenses of </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

             <a href="{{ route('expense') }}" class="mb-2 btn btn-block btn-outline-secondary btn-flat">Create Expense</a>

      <table id="example1" class="table table-bordered table-striped">
        <thead>


        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Category</th>
          <th>Date</th>
          <th>Money</th>
          <th >Action</th>
        </tr>
        </thead>
        <tbody>

                @foreach ($expense as $data )
                @php

            @endphp
                <tr>
             <td>   {{ $data->id }}</td>
             <td>   {{ $data->name }}</td>
             <td>   {{ $data->description }}</td>
             <td>   {{ $data->childerns['name']}}</td>
             <td>   {{ $data->date }}</td>
             <td>   {{ $data->money }}</td>
             <td class="text-center">
                 <a  class="btn  btn-warning btn-sm" href={{route('edit.expense', $data->id)}}>
                    <i class="fas fa-edit"></i>

                <a  class="btn  btn-danger btn-sm ml-1" href={{route('delete.expense', $data->id)}}>
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
