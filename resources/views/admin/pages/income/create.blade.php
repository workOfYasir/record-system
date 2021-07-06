 @extends('admin.master')

@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
            @if (@$editincome)
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
    <form  action="
    @if (@$editincome)
    {{ route('update.income',$editincome->id) }}
    @else
    {{route('store.income')}}
    @endif"  method="POST" >
        @csrf
            @if (@$editincome)
        {{ method_field('PUT') }}
            @else
        {{ method_field('POST') }}
            @endif
        <div class="input-group mb-3">
            <label for="name">Name </label>
            <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" value="{{ @$editincome->name }}" >
      </div>
      <br>
      <div class="input-group mb-3">
        <label for="description">Description </label>
        <input type="text" class="form-control form-control-border border-width-2" id="description" name="description" value="{{ @$editincome->description }}" >
  </div>

  <br>
  <div class="input-group mb-3">
    <label >Money </label>
    <input type="text" class="form-control form-control-border border-width-2" name="money" value="{{ @$editincome->money }}" >
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
  </div>
<br>
  <div class="input-group mb-3">
    <label>Date:</label>
      <div class="input-group date" style="width:96%" id="reservationdate" data-target-input="nearest">

        @if (@$editincome)
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" value="{{Carbon\Carbon::parse($editincome->date)->format('Y-m-d') }}"/>
          @else
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" />
        @endif
  </div>
      <div class="card-footer ">
   
        @if (@$editincome)
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
