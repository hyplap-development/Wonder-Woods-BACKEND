@extends('layouts.admin')

@section('title')
Your Enquiries
@endsection

@section('header')

@endsection

@section('content')

<!-- data table -->
<div class="col-sm-12 mt-3">
    <div class="card card-custom ">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Company </h3>
            </div>
            <div class="card-toolbar">

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Name</th>
                        <th class="align-middle text-center">Email</th>
                        <th class="align-middle text-center">Phone</th>
                        <th class="align-middle text-center">Subject</th>
                        <th class="align-middle text-center">Message</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($enquiries as $data)
                    <tr>
                        <td class="align-middle text-center">{{$i++}}</td>
                        <td class="align-middle text-center">{{$data->name}}</td>
                        <td class="align-middle text-center">{{$data->email}}</td>
                        <td class="align-middle text-center">{{$data->phone}}</td>
                        <td class="align-middle text-center">{{$data->subject}}</td>
                        <td class="align-middle text-center">{{$data->message}}</td>
                        <td class="align-middle text-center">
                            @if($data->status == 'Pending')
                            <span class="badge badge-danger">Pending</span>
                            @elseif($data->status == 'Completed')
                            <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            <div class="align-middle text-center">
                                <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#updateModal{{$data->id}}"><i class="fas fa-pen"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!-- update modal -->
                    <div class="modal fade" id="updateModal{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <form action="{{url('admin/enquiries/update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Status </label>
                                                    <select class="form-control selectpicker" name="status" id="status{{$data->id}}">
                                                        <option value="Pending" {{$data->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="Completed" {{$data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="updateBtn{{$data->id}}" class="btn btn-primary btngld">
                                            <lord-icon src="https://cdn.lordicon.com/wloilxuq.json" trigger="hover" disabled target="#updateBtn{{$data->id}}" colors="primary:#FFFFFF" state="hover-2" style="width:35px;height:35px">
                                            </lord-icon>
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end update modal -->
                    @endforeach

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection