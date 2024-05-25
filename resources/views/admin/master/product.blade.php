@extends('layouts.admin')

@section('title')
All Products
@endsection

@section('header')

@endsection

@section('content')

<!-- Create Modal Button -->

<div class=" col-sm-12 text-right">
    <a href="{{url('admin/product/add')}}" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple">
        Add Product
    </a>
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
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-xl" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Product</th>
                        <th class="align-middle text-center">Company</th>
                        <th class="align-middle text-center">Price</th>
                        <th class="align-middle text-center">Room</th>
                        <th class="align-middle text-center">Size</th>
                        <th class="align-middle text-center">Color</th>
                        <th class="align-middle text-center">Delivery</th>
                        <th class="align-middle text-center">Other Details</th>
                        <th class="align-middle text-center">Ratings</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $data)
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle" style="min-width: 250px;">
                            <div class="d-flex">
                                <a href="" data-toggle="modal" data-target="#imageModal{{$data->id}}">
                                    <img src="{{asset($data->image)}}" onerror="this.onerror=null;this.src='/media/blank-image.svg'" style="border-radius: 5px;" alt="" width="50px" height="50px">
                                </a>
                                <div class="ml-3">
                                    <h5>{{$data->name}}</h5>
                                    <p>{{isset($data->category) ? $data->category->name : 'Category Not Found'}} | {{isset($data->subcategory) ? $data->subcategory->name : 'Sub Category Not Found'}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-center">{{ isset($data->company) ? $data->company->name : 'Company Not Found'}}</td>
                        <td class="align-middle text-center">₹{{$data->discountedPrice}}</td>
                        <td class="align-middle text-center">{{ isset($data->room) ? $data->room->name : 'Room Not Found'}}</td>
                        <td class="align-middle text-center">{{ isset($data->size) ? $data->size->name : 'Size Not Found'}}</td>
                        <td class="align-middle text-center">{{ isset($data->color) ? $data->color->name : 'Color Not Found'}}</td>
                        <td class="align-middle text-center">₹{{$data->deliveryCharge}}</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal{{$data->id}}">View</button>
                        </td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ratingModal{{$data->id}}">View</button>
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
                                            <img src="{{asset($data->image)}}" onerror="this.onerror=null;this.src='/media/blank-image.svg'" alt="" height="250px" width="250px" style="border-radius: 5px;">
                                        </div>
                                        @foreach ($data->productimages as $productimages)
                                        <div class="col-3 mt-5 text-center">
                                            <img src="{{asset($productimages->image)}}" onerror="this.onerror=null;this.src='/media/blank-image.svg'" alt="" style="height: 100%; width: 100%; border-radius: 5px;">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end image modal -->

                    <!-- other detail modal -->
                    <div class="modal fade" id="detailModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Other Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> Description </label> <br>
                                                <label> {{$data->description}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> GST </label> <br>
                                                <label> {{$data->gst}}% </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Material </label> <br>
                                                <label> {{$data->material}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Finish </label> <br>
                                                <label> {{$data->finish}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Style </label> <br>
                                                <label> {{$data->style}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Weight </label> <br>
                                                <label> {{$data->weight}} Kg </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Warranty </label> <br>
                                                <label> {{$data->warranty}} Months </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Storage </label> <br>
                                                <label> {{$data->storage === 1 ? 'Yes' : 'No'}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> Length </label> <br>
                                                <label> {{$data->length}} inches </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Width </label> <br>
                                                <label> {{$data->width}} inches </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Height </label> <br>
                                                <label> {{$data->height}} inches </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end other detail modal -->

                    <!-- rating modal -->
                    <div class="modal fade" id="ratingModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ratings</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> 1 Star </label> <br>
                                                <label> {{$data->oneStar}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> 2 Star </label> <br>
                                                <label> {{$data->twoStar}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> 3 Star </label> <br>
                                                <label> {{$data->threeStar}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> 4 Star </label> <br>
                                                <label> {{$data->fourStar}} </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;"> 5 Star </label> <br>
                                                <label> {{$data->fiveStar}} </label>
                                            </div>
                                        </div>
                                        <?php
                                        $totalRatings = $data->oneStar + $data->twoStar + $data->threeStar + $data->fourStar + $data->fiveStar;
                                        if ($totalRatings > 0) {
                                            $weightedSum = ($data->oneStar * 1) + ($data->twoStar * 2) + ($data->threeStar * 3) + ($data->fourStar * 4) + ($data->fiveStar * 5);
                                            $averageRating = $weightedSum / $totalRatings;
                                        } else {
                                            $averageRating = 'No ratings yet';
                                        }
                                        ?>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Average Rating</label><br>
                                                <label>{{ is_numeric($averageRating) ? number_format($averageRating, 1) : $averageRating }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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