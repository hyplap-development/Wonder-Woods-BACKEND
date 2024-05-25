@extends('layouts.admin')

@section('title')
All Transactions
@endsection

@section('meta')
@endsection

@section('header')
@endsection

@section('content')

<div class="col-sm-12 mt-3">
    <div class="card card-custom ">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">All Transactions</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Grand Total</th>
                        <th class="align-middle text-center">Customer</th>
                        <th class="align-middle text-center">Address 1</th>
                        <th class="align-middle text-center">Address 2</th>
                        <th class="align-middle text-center">State</th>
                        <th class="align-middle text-center">City</th>
                        <th class="align-middle text-center">Pincode</th>
                        <th class="align-middle text-center">Order Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($transactions as $data)
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center">{{$data->grandTotal}}</td>
                        <td class="align-middle text-center">{{$data->name}} <br> {{$data->phone}} <br> {{$data->email}} </td>
                        <td class="align-middle text-center">{{$data->address1}}</td>
                        <td class="align-middle text-center">{{$data->address2}}</td>
                        <td class="align-middle text-center">{{$data->state}}</td>
                        <td class="align-middle text-center">{{$data->city}}</td>
                        <td class="align-middle text-center">{{$data->pincode}}</td>
                        <td class="align-middle text-center">
                            <?php
                            if ($data->orderStatus == 'In Process') {
                                $btnClass = 'btn-outline-warning';
                            } elseif ($data->orderStatus == 'Completed') {
                                $btnClass = 'btn-outline-success';
                            } elseif ($data->orderStatus == 'Cancelled') {
                                $btnClass = 'btn-outline-danger';
                            }
                            ?>

                            <button type="button" class="btn {{$btnClass}} " data-toggle="modal" data-target="#statusModal{{$data->id}}">{{$data->orderStatus}}</button>
                        </td>
                        <td>
                            <div class="align-middle text-center">
                                <a href="{{url('admin/transaction/orders')}}/{{$data->id}}" class="btn btn-icon btn-outline-warning has-ripple"><i class="fas fa-cash-register"></i></a>
                            </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="statusModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <form action="{{url('admin/transaction/changeStatus')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="trxId" value="{{$data->id}}">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Status </label>
                                                    <select class="form-control selectpicker" name="status" id="status">
                                                        <option value="Completed" {{$data->orderStatus == 'Completed' ? 'selected' : '' }} >Completed</option>
                                                        <option value="In Process" {{$data->orderStatus == 'In Process' ? 'selected' : '' }} >In Process</option>
                                                        <option value="Cancelled" {{$data->orderStatus == 'Cancelled' ? 'selected' : '' }} >Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Save Status</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection