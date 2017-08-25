@extends('layouts.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="pull-left">

    </div>
    <div class="pull-right">
      <button type="button" class="btn btn-success"><i class="fa fa-printer"></i> Print Report</button>
    </div>
  </section>
  <section class="content">
    @include('partials.notification')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sales Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Order No.</th>
                <th>Receipt No.</th>
                <th>Cashier</th>
                <th>Items Sold</th>
                <th>Total</th>
                <th>Tendered</th>
                <th>Vat</th>
                <th>Discount</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
              @foreach($sales as $sale)
                <tr>
                  <td>{{ $sale->order_no }}</td>
                  <td>{{ $sale->receipt_no }}</td>
                  <td>{{ $sale->first_name }}</td>
                  <td>{{ $sale->count_item }}</td>
                  <td>&#8369;{{ sprintf('%0.2f', $sale->total) }}</td>
                  <td>&#8369;{{ sprintf('%0.2f', $sale->tendered)}}</td>
                  <td>&#8369;{{ sprintf('%0.2f', $sale->vat) }}</td>
                  <td>{{ $sale->discount_name == null ? '-' : $sale->discount_name }}</td>
                  @if ($sale->trashed())
                    <td><span class="label label-danger">VOIDED</span></td>
                  @else
                    <td><span class="label label-success">ACTIVE</span></td>
                  @endif
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
@endsection