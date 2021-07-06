@extends('admin.master')

@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
            @if (@$expenseCategory)
            <h3 class="card-title">Update Expenses</h3>
            @else
          <h3 class="card-title">Add Expenses</h3>
            @endif
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
    <form action="
    @if (@$expenseCategory)
{{ route('update.expenseCategory',$expenseCategory->id) }}
@else
{{route('store.expenseCategory')}}
@endif    "  method="POST" >
        @csrf
            @if (@$expenseCategory)
    
        {{ method_field('PUT') }}
        @else
  
        {{ method_field('POST') }}
    @endif
        <div class="input-group mb-3">
            <label for="name">Name </label>
            <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" value="{{ @$expenseCategory->name }}" >
      </div>
      <br>
    
      <div class="card-footer text-right">
        @if (@$expenseCategory)
        <button type="submit" class="btn btn-primary">Update Expense</button>
        @else
        <button type="submit" class="btn btn-primary">Add Expense</button>
        @endif

      </div>
    </form>
    </div>
</div>
</section>

@endsection
