@extends('admin.master')
@section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Record System.
                    <small class="float-right">Month:</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    <strong>Record System.</strong><br>
                    Name: <br>
                    Email: 
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 offset-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Salary:</b> 4F3S8J<br>
                  <b>Expense:</b> 2/22/2014<br>
                  <b>Borrow Money:</b> 968-34567 -/Rs of <strong>hamza</strong> <br>
                  <b>Lend Money:</b> 968-34567 -/Rs for <strong>ali</strong>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped datatable">
                    <thead>
                    <tr>
                      <th>Days</th>
                      <th>Income</th>
                      <th>Total Income</th>
                      <th>Expense</th>
                      <th>Borrow</th>
                      <th>Lend</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $income_moneys=0; 
                      
                      @endphp
                      @foreach($allDate->sortBy('date') as $dates)
                     
                    <tr>
                      <td width="50px"> {{ $dates}}</td>
                     <td width="50px">
                     @foreach($incomes as $income)
                     <?php 
                      if($dates==$income->date){
                        $income_money=$income->money;
                        $income_moneys+=$income->money;
                      }
                     ?>
                        @if($dates==$income->date)
                        {{$income->money}},
                       @endif
                     @endforeach 
                     </td>
                   <td width="50px">
                     
                       {{$income_moneys}}
                      
                     </td>
                     <td width="50px">
                     @foreach($expenses as $expense)
                        @if($dates==$expense->date)
                      {{$expense->money}},
                        @endif
                     @endforeach
                     </td>
                     <td width="50px">
                     @foreach($borrows as $borrow)
                        @if($dates==$borrow->date)
                        @if($borrow->borrow_toggle=="Borrow")
                      {{$borrow->money}},
                        @endif
                        @endif
                     @endforeach
                     </td>
                     <td width="50px">
                     @foreach($borrows as $borrow)
                        @if($dates==$borrow->date)
                        @if($borrow->borrow_toggle=="Lend")
                      {{$borrow->money}},
                        @endif
                        @endif
                     @endforeach</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td>2</td>
                      <td>-</td>
                      <td>200,300</td>
                      <td>200,50,300</td>
                      <td>-</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
   

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection