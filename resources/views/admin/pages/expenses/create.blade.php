 @extends('admin.master')

@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
            @if (@$editexpense)
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
    @if (@$editexpense)
{{ route('update.expense',$editexpense->id) }}
@else
{{route('store.expense')}}
@endif    "  method="POST" >
        @csrf
            @if (@$editexpense)

        {{ method_field('PUT') }}
        @else

        {{ method_field('POST') }}
    @endif
        <div class="input-group mb-3">
            <label for="name">Name </label>
            <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" value="{{ @$editexpense->name }}" >
      </div>
      <br>
      <div class="input-group mb-3">
        <label for="description">Description </label>
        <input type="text" class="form-control form-control-border border-width-2" id="description" name="description" value="{{ @$editexpense->description }}" >
  </div>

  <div class="input-group mb-3 mt-5">
    <label >Category</label>
    <select class="form-control form-control-border border-width-2 select2" name="category">
    <option disabled selected >--Select Expense Category--</option>
    @if (@$editexpense)
        <option value="{{$editexpense->childerns['id']}}" selected>{{@$editexpense->childerns['name']}}</option>
        
      @foreach($categories as $cats)
        @if (@$editexpense->childerns['id']!=$cats->id)  
          <option value="{{$cats->id}}">{{$cats->name}}</option>
        @endif
      @endforeach 
    @else
      @foreach($categories as $cats)
       
          <option value="{{$cats->id}}">{{$cats->name}}</option>
        
      @endforeach 
    @endif
    </select>
  </div>
  <br>
  <div class="input-group mb-3">
    <label >Money </label>
    <input type="text" class="form-control form-control-border border-width-2" name="money" value="{{ @$editexpense->money }}" >
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
  </div>
<br>
  <div class="input-group mb-3">
    <label>Date:</label>
      <div class="input-group date" style="width:96%" id="reservationdate" data-target-input="nearest">

        @if (@$editexpense)
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" value="{{Carbon\Carbon::parse($editexpense->date)->format('Y-m-d') }}"/>
          @else
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" />
        @endif
  </div>
      <div class="card-footer ">
   
        @if (@$editexpense)
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
