@extends('admin.master')

@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
            @if (@$incomeCategory)
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
    @if (@$incomeCategory)
{{ route('update.incomeCategory',$incomeCategory->id) }}
@else
{{route('store.incomeCategory')}}
@endif    "  method="POST" >
        @csrf
            @if (@$incomeCategory)
    
        {{ method_field('PUT') }}
        @else
  
        {{ method_field('POST') }}
    @endif
        <div class="input-group mb-3">
            <label for="name">Name </label>
            <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" value="{{ @$incomeCategory->name }}" >
      </div>
      <br>
    
      <div class="card-footer text-right">
        @if (@$incomeCategory)
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
