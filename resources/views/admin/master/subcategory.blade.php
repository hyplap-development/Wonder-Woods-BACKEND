@extends('layouts.admin')

@section('title')
Sub Category
@endsection

@section('header')

@endsection

@section('content')

<!-- Create Modal Button -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        Create Sub Category
    </button>
</div>

<!--Create Modal-->
<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{url('admin/subcategory/add')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center mb-5">
                            <div class="image-input image-input-outline" id="image_input" style=" background-image: url('/media/blank-image.svg')">
                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url('/media/blank-image.svg')"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                    <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg, .webp" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Category </label>
                                <select class="form-control selectpicker" name="categoryId" id="categoryId">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" minlength="3" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Status </label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer m-0 p-0 pt-3">
                        <button type="submit" id="addBtn" class="btn btn-primary font-weight-bold">
                            Add Sub Category
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
                <h3 class="card-label">Sub Category </h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Image</th>
                        <th class="align-middle text-center">Category</th>
                        <th class="align-middle text-center">Name</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($subcategories as $data)
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center">
                            <img src="/{{$data->image}}" onerror="this.onerror=null;this.src='/media/blank-image.svg'" style="border-radius: 5px;" alt="" width="50px" height="50px">
                        </td>
                        <td class="align-middle text-center">{{$data->category->name}}</td>
                        <td class="align-middle text-center">{{$data->name}}</td>
                        <td class="align-middle text-center">
                            @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="align-middle text-center">
                                <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#updateModal{{$data->id}}"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!-- update modal -->
                    <div class="modal fade" id="updateModal{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <form action="{{url('admin/subcategory/update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                        <div class="row">
                                            <div class="col-sm-12 text-center mb-5">
                                                <?php
                                                $image = $data->image != null ? $data->image : '/media/blank-image.svg';
                                                ?>
                                                <div class="image-input image-input-outline" id="image_input{{$data->id}}" style=" background-image: url('/{{$image}}')">
                                                    <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url('/{{$image}}')"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                        <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg, .webp" />
                                                        <input type="hidden" name="profile_avatar_remove" />
                                                    </label>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Image">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Select Category </label>
                                                    <select class="form-control selectpicker" name="categoryId" id="categoryId{{$data->id}}">
                                                        @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}" {{$data->categoryId == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                                    <input type="hidden" id="hiddenName{{$data->id}}" value="{{$data->name}}">
                                                    <input type="text" class="form-control" id="Name" name="name" value="{{$data->name}}" minlength="3" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Status </label>
                                                    <select class="form-control selectpicker" name="status" id="status{{$data->id}}">
                                                        <option value="1" {{$data->status == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{$data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="updateBtn{{$data->id}}" class="btn btn-primary btngld">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end update modal -->

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
                                <form action="{{url('/admin/subcategory/delete')}}" method="post">
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

<!-- Image upload -->
<script>
    var addedSubCategories = @json($subcategories);
    var subcategoryId = addedSubCategories.map(function(subcategory) {
        return subcategory.id;
    });

    var KTImageInputDemo = function() {
        // Private functions
        var initDemos = function() {
            var avatar5 = new KTImageInput('image_input');

            avatar5.on('cancel', function(imageInput) {
                swal.fire({
                    title: 'Image successfully changed !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar5.on('change', function(imageInput) {
                swal.fire({
                    title: 'Image successfully added !',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonText: 'Awesome!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            avatar5.on('remove', function(imageInput) {
                swal.fire({
                    title: 'Image successfully removed !',
                    type: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Got it!',
                    confirmButtonClass: 'btn btn-primary font-weight-bold'
                });
            });

            $.each(subcategoryId, function(i, item) {
                console.log(item);

                var avatar5 = new KTImageInput('image_input' + item);
                avatar5.on('cancel', function(imageInput) {
                    swal.fire({
                        title: 'Image successfully changed !',
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Awesome!',
                        confirmButtonClass: 'btn btn-primary font-weight-bold'
                    });
                });

                avatar5.on('change', function(imageInput) {
                    swal.fire({
                        title: 'Image successfully added !',
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Awesome!',
                        confirmButtonClass: 'btn btn-primary font-weight-bold'
                    });
                });

                avatar5.on('remove', function(imageInput) {
                    swal.fire({
                        title: 'Image successfully removed !',
                        type: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Got it!',
                        confirmButtonClass: 'btn btn-primary font-weight-bold'
                    });
                });
            });
        }
        return {
            init: function() {
                initDemos();
            }
        };
    }();
    KTUtil.ready(function() {
        KTImageInputDemo.init();
    });
</script>

@endsection