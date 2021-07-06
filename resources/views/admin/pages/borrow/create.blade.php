 @extends('admin.master')

@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
            @if (@$editborrow)
            <h3 class="card-title">Update Borrow Money</h3>
            @else
          <h3 class="card-title">Add Borrow Money</h3>
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
    @if (@$editborrow)
{{ route('update.borrow',$editborrow->id) }}
@else
{{route('store.borrow')}}
@endif    "  method="POST" >
        @csrf
            @if (@$editborrow)

        {{ method_field('PUT') }}
        @else

        {{ method_field('POST') }}
    @endif
        <div class="input-group mb-3">
            <label for="name">Name </label>
            <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" value="{{ @$editborrow->name }}" >
      </div>
      <br>
      <div class="input-group mb-3">
        <label for="description">Description </label>
        <input type="text" class="form-control form-control-border border-width-2" id="description" name="description" value="{{ @$editborrow->description }}" >
  </div>

  <div class="input-group mb-3 mt-5">
        <label for="description">Borrow To/ From </label>
        <input type="text" class="form-control form-control-border border-width-2" id="borrow" name="borrowedName" value="{{ @$editborrow->description }}" >
  </div>
  <br>
  <div class="input-group mb-3">
    <label >Money </label>
    <input type="text" class="form-control form-control-border border-width-2" name="money" value="{{ @$editborrow->money }}" >
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
  </div>

<br>
  <div class="input-group mb-3">
    <label>Date:</label>
      <div class="input-group date" style="width:96%" id="reservationdate" data-target-input="nearest">

        @if (@$editborrow)
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" value="{{Carbon\Carbon::parse($editborrow->date)->format('Y-m-d') }}"/>
          @else
          <input type="date" class="form-control form-control-border border-width-2 datetimepicker-input" data-target="#reservationdate" name="date" />
        @endif
  </div>
  </div>
  <br>

  <hr>
  <div class="form-group">
        @if($editborrow->borrow_toggle=="Borrow")
        
      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" class="custom-control-input" name="borrowedToggle" id="borrowedToggle" checked>
        <label class="custom-control-label" id="toggleLabel" for="borrowedToggle">
        To Borrow
     
        </label>
      </div>
        
        @else
      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" class="custom-control-input" name="borrowedToggle" id="borrowedToggle">
        <label class="custom-control-label" id="toggleLabel" for="borrowedToggle">
        To Lend
        </label>
      </div>
        
        @endif


  </div>
      <div class="card-footer text-right ">
   
        @if (@$editborrow)
        <button type="submit" class="btn btn-primary">Update Borrow Money</button>
        @else
        <button type="submit" class="btn btn-primary">Add Borrow Money</button>
        @endif


      </div>

    </form>
    </div>
    
</div>
</section>



@endsection

