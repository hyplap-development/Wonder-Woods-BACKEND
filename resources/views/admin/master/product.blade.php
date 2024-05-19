@extends('layouts.admin')

@section('title')
All Products
@endsection

@section('header')

@endsection

@section('content')

<!-- Create Modal Button -->

<div class=" col-sm-12 text-right">
    <a href="{{url('admin/product/add')}}" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" >
        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="hover" colors="primary:#ffffff" target="#createBtn" style="width:25px;height:25px">
        </lord-icon>
        Add Product
    </a>
</div>

<!--Excel Modal-->
<div class="modal fade" id="importModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/product/importExcel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">Select Excel File <span style="color: red;">&#42</span></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="file" class="form-control" name="excel" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">
                                    Download Format
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{url('storage/ExcelFiles/ProductExcelFormat.xlsx')}}" id="download" download class="btn btn-success">
                                    <lord-icon src="https://cdn.lordicon.com/xhdhjyqy.json" trigger="hover" colors="primary:#FFFFFF" target="#download" style="width:25px;height:25px">
                                    </lord-icon>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer m-0 p-0 pt-3">
                        <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                        <button type="submit" id="addExcel" class="btn btn-primary font-weight-bold">
                            <lord-icon src="https://cdn.lordicon.com/mecwbjnp.json" trigger="hover" target="#addExcel" colors="primary:#FFFFFF,secondary:#FFFFFF" style="width:25px;height:25px">
                            </lord-icon>
                            Add Excel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="col-sm-12">
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
</div>
@endif
@endforeach
@if ($errors->any())
<div class="col-sm-12">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endforeach
</div>
@endif

<!-- data table -->

<div class="col-sm-12 mt-3">
    <div class="card card-custom ">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Products </h3>
            </div>
            <!-- <div class="card-toolbar">
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" id="export" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <lord-icon src="https://cdn.lordicon.com/diyeocup.json" trigger="hover" colors="primary:#ffffff" state="hover-1" target="#export" style="width:25px;height:25px">
                        </lord-icon>
                        Export
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="{{url('admin/product/exportExcel')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <button type="button" id="addExcel" class="btn btn-primary has-ripple" data-toggle="modal" data-target="#importModal">
                    <lord-icon src="https://cdn.lordicon.com/osqwjgzg.json" trigger="hover" colors="primary:#ffffff" target="#addExcel" style="width:25px;height:25px">
                    </lord-icon>
                    Import Excel
                </button>
            </div> -->
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Image</th>
                        <th class="align-middle text-center">Name</th>
                        <th class="align-middle text-center">Category</th>
                        <th class="align-middle text-center">Sub Category</th>
                        <th class="align-middle text-center">Company</th>
                        <th class="align-middle text-center">MRP</th>
                        <th class="align-middle text-center">Discounted Price</th>
                        <th class="align-middle text-center">GST</th>
                        <th class="align-middle text-center">Delivery</th>
                        <th class="align-middle text-center">Meta Details</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($products as $data)
                    <tr>
                        <td class="align-middle text-center">{{$i++}}</td>
                        <td class="align-middle text-center">
                            <a href="" data-toggle="modal" data-target="#imageModal{{$data->id}}">
                                <img src="{{asset($data->image)}}" onerror="this.onerror=null;this.src='/media/imageNotAdded.jpg'" style="border-radius: 5px;"  alt="" width="50px" height="50px">
                            </a>
                        </td>
                        <td class="align-middle text-center">{{$data->name}}</td>
                        <td class="align-middle text-center">{{ isset($data->category) ? $data->category->name : 'Category Not Found'}}</td>
                        <td class="align-middle text-center">{{ isset($data->subCategory) ? $data->subCategory->name : 'Sub Category Not Found'}}</td>
                        <td class="align-middle text-center">{{ isset($data->company) ? $data->company->name : 'Company Not Found'}}</td>
                        <td class="align-middle text-center">{{$data->mrp}}</td>
                        <td class="align-middle text-center">{{$data->discountedPrice}}</td>
                        <td class="align-middle text-center">{{$data->gst}}</td>
                        <td class="align-middle text-center">{{$data->deliveryCharge}}</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metaModal{{$data->id}}">View</button>
                        </td>
                        <td class="align-middle text-center">
                            @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="align-middle text-center">
                                <a href="{{url('admin/product/update')}}/{{$data->slug}}" class="btn btn-icon btn-outline-warning has-ripple"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!-- image modal -->
                    <div class="modal fade" id="imageModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Images</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="{{asset($data->image)}}" onerror="this.onerror=null;this.src='/media/imageNotAdded.jpg'" alt="" height="250px" width="250px" style="border-radius: 5px;">
                                        </div>
                                        @foreach ($data->productimages as $productimages)
                                        <div class="col-3 mt-5 text-center">
                                            <img src="{{asset($productimages->image)}}" onerror="this.onerror=null;this.src='/media/imageNotAdded.jpg'" alt="" style="height: 100%; width: 100%; border-radius: 5px;">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end image modal -->
                    <!-- meta modal -->
                    <div class="modal fade" id="metaModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Meta Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Meta Title </label> <br>
                                                <label></label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Meta Keywords </label> <br>
                                                <label></label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Meta Description </label> <br>
                                                <label></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end meta modal -->

                    <!-- delete modal -->
                    <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <form action="{{url('/admin/product/delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                    <div class="modal-body">
                                        <span>Are you sure you want to delete {{$data->name}}? <br> Action cannot be reverted</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="delYes" class="btn btn-danger">
                                            <lord-icon src="https://cdn.lordicon.com/dovoajyj.json" trigger="hover" target="#delYes" colors="primary:#FFFFFF" style="width:25px;height:25px">
                                            </lord-icon>
                                            Yes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete modal -->
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