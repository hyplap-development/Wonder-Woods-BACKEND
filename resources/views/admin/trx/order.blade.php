@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('meta')
@endsection

@section('header')
@endsection

@section('content')
<?php
if ($transaction->orderStatus == 'In Process') {
    $textClass = 'text-warning';
} elseif ($transaction->orderStatus == 'Completed') {
    $textClass = 'text-success';
} elseif ($transaction->orderStatus == 'Cancelled') {
    $textClass = 'text-danger';
}
?>

<div class="col-12 mt-3">
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Transaction Summary</h3>
            </div>
            <div class="card-toolbar">
                Status : &nbsp; <span class="{{$textClass}}"> {{$transaction->orderStatus}}</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label style="font-weight: bold;">TRANSACTION ID</label>
                        <p>{{$transaction->id}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label style="font-weight: bold;">GRAND TOTAL</label>
                        <p>{{$transaction->grandTotal}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: bold;">ADDRESS</label>
                        <p>{{$transaction->address1}}, {{$transaction->address2}}, {{$transaction->city}}, {{$transaction->state}}, {{$transaction->pincode}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 mt-3">
    <div class="card card-custom ">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">All Orders</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Product</th>
                        <th class="align-middle text-center">Quantity</th>
                        <th class="align-middle text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($orders as $data)
                    <tr>
                        <td class="align-middle text-center">{{$i++}}</td>
                        <td class="align-middle text-center">{{$data->name}} </td>
                        <td class="align-middle text-center">{{$data->qty}} </td>
                        <td class="align-middle text-center">{{$data->discountedPrice}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection