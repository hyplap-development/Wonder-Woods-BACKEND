@extends('layouts.admin')

@section('title')
Category
@endsection

@section('header')

@endsection

@section('content')

<!-- Create Modal Button -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="hover" colors="primary:#ffffff" target="#createBtn" style="width:25px;height:25px">
        </lord-icon>
        Create Category
    </button>
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
                <form action="{{url('admin/category/importExcel')}}" method="post" enctype="multipart/form-data">
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
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">
                                    Download Format
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{url('storage/ExcelFiles/CategoryExcelFormat.xlsx')}}" id="download" download class="btn btn-success">
                                    <lord-icon src="https://cdn.lordicon.com/xhdhjyqy.json" trigger="hover" colors="primary:#FFFFFF" target="#download" style="width:25px;height:25px">
                                    </lord-icon>
                                    Download
                                </a>
                            </div>
                        </div> -->
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

<!--Create Modal-->
<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{url('admin/category/add')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center mb-5">
                            <div class="image-input image-input-outline" id="image_input" style=" background-image: url(/media/imgBack.png)">
                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url(/media/imgBack.png)"></div>

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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" onkeyup="checkName()" minlength="3"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Status </label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label style="font-weight: bold;">Description </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label style="font-weight: bold;">Meta Title </label>
                            <input type="text" class="form-control" name="metaTitle" >
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label style="font-weight: bold;">Meta Keywords </label>
                            <input type="text" class="form-control" name="metaKeywords">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label style="font-weight: bold;">Meta Description </label>
                            <textarea class="form-control" name="metaDescription"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer m-0 p-0 pt-3">
                        <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                        <button type="submit" id="addBtn" class="btn btn-primary font-weight-bold">
                            <lord-icon src="https://cdn.lordicon.com/mecwbjnp.json" trigger="hover" target="#addBtn" colors="primary:#FFFFFF,secondary:#FFFFFF" style="width:35px;height:35px">
                            </lord-icon>
                            Add Category
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
                <h3 class="card-label">Category </h3>
            </div>
            <!-- <div class="card-toolbar">
                
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
                        <th class="align-middle text-center">Description</th>
                        <th class="align-middle text-center">Meta Details</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($categories as $data)
                    <tr>
                        <td class="align-middle text-center">{{$i++}}</td>
                        <td class="align-middle text-center">
                            <img src="/{{$data->image}}" onerror="this.onerror=null;this.src='/media/imageNotAdded.jpg'" style="border-radius: 5px;" alt="" width="50px" height="50px">
                        </td>
                        <td class="align-middle text-center">{{$data->name}}</td>
                        <td class="align-middle text-center">{{$data->description}}</td>
                        <td class="align-middle text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metaModal{{$data->id}}">
                                View
                            </button>
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
                                <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#updateModal{{$data->id}}"><i class="fas fa-pen"></i></a>
                                <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>

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
                                                <label>{{$data->metaTitle}}</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Meta Keywords </label> <br>
                                                <label>{{$data->metaKeywords}}</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold;">Meta Description </label> <br>
                                                <label>{{$data->metaDescription}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end meta modal -->

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
                                <form action="{{url('admin/category/update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                        <div class="row">
                                            <div class="col-sm-12 text-center mb-5">
                                                <div class="image-input image-input-outline" id="image_input{{$data->id}}" style=" background-image: url(/media/imgBack.png)">
                                                    
                                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url(/{{$data->image != null ? $data->image : '/media/imgBack.png'}})"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                        <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
                                                        <input type="file" name="image"  accept=".png, .jpg, .jpeg, .webp " />
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
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                                    <input type="hidden" id="hiddenName{{$data->id}}" value="{{$data->name}}">
                                                    <input type="text" class="form-control" id="Name" name="name" onkeyup="checkName('{{$data->id}}')" value="{{$data->name}}" minlength="3"  required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Status </label>
                                                    <select class="form-control selectpicker" name="status" id="status{{$data->id}}">
                                                        <option value="1" {{$data->status == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{$data->status == 0 ? 'selected' : '' }}>Deactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label style="font-weight: bold;">Description </label>
                                                <textarea class="form-control" name="description">{{$data->description}}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label style="font-weight: bold;">Meta Title </label>
                                                <input type="text" class="form-control" name="metaTitle" value="{{$data->metaTitle}}" >
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label style="font-weight: bold;">Meta Keywords </label>
                                                <input type="text" class="form-control" value="{{$data->metaKeywords}}" name="metaKeywords">
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label style="font-weight: bold;">Meta Description </label>
                                                <textarea class="form-control" name="metaDescription">{{$data->metaDescription}}</textarea>
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
                                <form action="{{url('/admin/category/delete')}}" method="post">
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

<!-- Check fields in create modal -->
<script>
    function checkName() {
        var name = document.getElementById('name');
        var nameTitle = document.getElementById('nameTitle');

        if (name.value == "") {
            nameTitle.innerHTML = "Name is required";
            nameTitle.style.color = 'red';
            name.style.border = '1px solid red';
            $('#addBtn').attr('disabled', true)
            return;
        }

        $.ajax({
            type: "POST",
            url: "{{url('admin/checkCatName')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'name': name.value,
            },
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    nameTitle.innerHTML = "Category is already added";
                    nameTitle.style.color = '#e0844b';
                    name.style.border = '1px solid #e0844b';
                    $('#addBtn').attr('disabled', true)

                } else {
                    nameTitle.innerHTML = "Name is available";
                    nameTitle.style.color = 'green';
                    name.style.border = '1px solid green';
                    $('#addBtn').attr('disabled', false)
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
</script>

<!-- Check fields in update modal -->
<script>
    function checkName(id) {
        var name = document.getElementById('name' + id);
        var nameHidden = document.getElementById('hiddenName' + id);
        var nameTitle = document.getElementById('nameTitle' + id);

        if (name.value == "") {
            nameTitle.innerHTML = "name is required";
            nameTitle.style.color = 'red';
            name.style.border = '1px solid red';
            document.getElementById('updateBtn' + id).disabled = true;
            return;
        }

        $.ajax({
            type: "POST",
            url: "{{url('admin/checkCatName')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'name': name.value,
            },
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    if (response.data.name == nameHidden.value) {
                        nameTitle.innerHTML = "Current category name";
                        nameTitle.style.color = 'green';
                        name.style.border = '1px solid green';
                        document.getElementById('updateBtn' + id).disabled = false;
                    } else {
                        nameTitle.innerHTML = "Category is already added";
                        nameTitle.style.color = '#e0844b';
                        name.style.border = '1px solid #e0844b';
                        document.getElementById('updateBtn' + id).disabled = true;
                    }
                } else {
                    nameTitle.innerHTML = "Name is available";
                    nameTitle.style.color = 'green';
                    name.style.border = '1px solid green';
                    document.getElementById('updateBtn' + id).disabled = false;
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
</script>


<!-- Image upload -->
<script>
    var addedCategories = @json($categories);
    var categoryId = addedCategories.map(function(category) {
        return category.id;
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

            $.each(categoryId, function(i, item) {
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