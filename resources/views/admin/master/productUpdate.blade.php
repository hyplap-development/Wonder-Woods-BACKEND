@extends('layouts.admin')

@section('title')
Update Product
@endsection

@section('header')

@endsection

@section('content')

<div class="modal fade" id="allImages" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">All Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <form action="{{url('/admin/product/saveImages')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="modal-body">
                    <div class="row">
                        @foreach ($product->productimages as $productimages)
                        <input type="hidden" name="imageIds[]" value="{{$productimages->id}}">
                        <div class="col-sm-12 col-md-6 col-lg-3 mt-3 text-center">
                            <!-- <img src="{{asset($productimages->image)}}" onerror="this.onerror=null;this.src='/media/blank-image.svg'" alt="" style="height: 100%; width: 100%; border-radius: 5px;"> -->
                            <div class="image-input image-input-outline" id="image_input{{$productimages->id}}" style=" background-image: url('/media/blank-image.svg')">
                                <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url(/{{$productimages->image != null ? $productimages->image : '/media/blank-image.svg'}})"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                    <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
                                    <input type="file" name="image{{$productimages->id}}" accept=".png, .jpg, .jpeg, .webp" />
                                    <input type="hidden" name="profile_avatar_remove{{$productimages->id}}" />
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                        @endforeach
                        <div id="generateBlockHere">

                        </div>
                        <style>
                            .centerDiv {
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                align-items: center;
                                transition: 0.5s;
                            }

                            .centerDiv:hover {
                                cursor: pointer;
                                transform: scale(1.1);
                            }
                        </style>
                        <div class="col-3 mt-3 centerDiv" id="AddImage">
                            <a href="#" onclick="generateBlock()">
                                <div class="d-flex" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; height: 200px; width: 200px;">
                                    <div class="m-auto">
                                        <lord-icon src="https://cdn.lordicon.com/mrdiiocb.json" trigger="loop-on-hover" delay="500" target="#AddImage" colors="primary:#000000" style="width:100px;height:100px">
                                        </lord-icon>
                                        <h3 class="text-center" style="text-decoration: none;">Add Image</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Confirm & Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- data table -->
<form action="{{url('admin/product/update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hiddenId" value="{{$product->id}}">
    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card card-custom ">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Update Product Details </h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#allImages">All Images</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-5">
                            <div class="image-input image-input-outline" id="image_input" style=" background-image: url('/media/blank-image.svg')">
                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url(/{{$product->image != null ? $product->image : '/media/blank-image.svg'}})"></div>

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
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Category <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" onchange="getSubCategories()" id="categoryId" name="categoryId" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->categoryId == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Sub Category <span style="color: red;">&#42</span></label>
                                <input type="hidden" id="selectedSubCategory" value="{{$product->subCategoryId}}">
                                <select class="form-control selectpicker" id="subcategoryId" name="subCategoryId" required>
                                    <option value="">Select Sub Category</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Company <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="companyId" name="companyId" required>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}" {{$product->companyId == $company->id ? 'selected' : ''}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" minlength="3"  value="{{$product->name}}" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">MRP <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="mrp" name="mrp" value="{{$product->mrp}}" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Discounted Price <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="discountedPrice" name="discountedPrice" value="{{$product->discountedPrice}}" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Delivery Charge <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" value="0" id="deliveryCharge" name="deliveryCharge" value="{{$product->deliveryCharge}}" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">GST (in %) <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" value="18" id="gst" name="gst" value="{{$product->gst}}" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Status </label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Description <span style="color: red;">&#42</span></label>
                                <textarea class="form-control" id="description" name="description" required>{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mt-3">
            <div class="card card-custom ">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Meta Details </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Meta Title </label>
                                <input type="text" class="form-control" id="metaTitle" name="metaTitle" value="{{$product->metaTitle}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Meta Keywords</label>
                                <input type="text" class="form-control" id="metaKeywords" name="metaKeywords" value="{{$product->metaKeywords}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Meta Description</label>
                                <textarea class="form-control" id="metaDescription" name="metaDescription">{{$product->metaDescription}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mt-3">
            <div class="card card-custom ">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Specifications </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-group mb-0">
                                <label style="font-weight: bold; font-size: 15px;">Dimensions (in Inches)</label>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-0">
                            <div class="form-group">
                                <label style="font-weight: bold;">Length</label>
                                <input type="number" class="form-control" id="length" name="length" value="{{$product->length}}">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-0">
                            <div class="form-group">
                                <label style="font-weight: bold;">Width</label>
                                <input type="number" class="form-control" id="width" name="width" value="{{$product->width}}">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-0">
                            <div class="form-group">
                                <label style="font-weight: bold;">Height</label>
                                <input type="number" class="form-control" id="height" name="height" value="{{$product->height}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Warranty <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="warranty" name="warranty">
                                    <option value="0" {{$product->warranty == 0 ? 'selected' : ''}}>No Warranty</option>
                                    <option value="3" {{$product->warranty == 3 ? 'selected' : ''}}>3 Months</option>
                                    <option value="6" {{$product->warranty == 6 ? 'selected' : ''}}>6 Months</option>
                                    <option value="9" {{$product->warranty == 9 ? 'selected' : ''}}>9 Months</option>
                                    <option value="12" {{$product->warranty == 12 ? 'selected' : ''}}>1 Year</option>
                                    <option value="24" {{$product->warranty == 24 ? 'selected' : ''}}>2 Years</option>
                                    <option value="36" {{$product->warranty == 36 ? 'selected' : ''}}>3 Years</option>
                                    <option value="48" {{$product->warranty == 48 ? 'selected' : ''}}>4 Years</option>
                                    <option value="60" {{$product->warranty == 60 ? 'selected' : ''}}>5 Years</option>
                                    <option value="72" {{$product->warranty == 72 ? 'selected' : ''}}>6 Years</option>
                                    <option value="84" {{$product->warranty == 84 ? 'selected' : ''}}>7 Years</option>
                                    <option value="96" {{$product->warranty == 96 ? 'selected' : ''}}>8 Years</option>
                                    <option value="108" {{$product->warranty == 108 ? 'selected' : ''}}>9 Years</option>
                                    <option value="120" {{$product->warranty == 120 ? 'selected' : ''}}>10 Years</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Material <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" required name="material" id="material">
                                    <option value="">Select Material</option>
                                    <option value="Wood" {{$product->material == 'Wood' ? 'selected' : ''}}>Wood</option>
                                    <option value="MDF" {{$product->material == 'MDF' ? 'selected' : ''}}>MDF</option>
                                    <option value="HDF" {{$product->material == 'HDF' ? 'selected' : ''}}>HDF</option>
                                    <option value="Metal" {{$product->material == 'Metal' ? 'selected' : ''}}>Metal</option>
                                    <option value="Marble" {{$product->material == 'Marble' ? 'selected' : ''}}>Marble</option>
                                    <option value="Plastic" {{$product->material == 'Plastic' ? 'selected' : ''}}>Plastic</option>
                                    <option value="Glass" {{$product->material == 'Glass' ? 'selected' : ''}}>Glass</option>
                                    <option value="Fabric" {{$product->material == 'Fabric' ? 'selected' : ''}}>Fabric</option>
                                    <option value="Leather" {{$product->material == 'Leather' ? 'selected' : ''}}>Leather</option>
                                    <option value="Stone" {{$product->material == 'Stone' ? 'selected' : ''}}>Stone</option>
                                    <option value="Ceramic" {{$product->material == 'Ceramic' ? 'selected' : ''}}>Ceramic</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Available Colors (Seperate with comma) </label>
                                <input type="text" class="form-control" value="{{$product->colors}}" id="colors" name="colors">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Available Sizes (Seperate with comma eg. L x W x H ) </label>
                                <input type="text" class="form-control" value="{{$product->sizes}}" id="sizes" name="sizes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary mr-2">Update Product</button>
            </div>
        </div>
    </div>
</form>
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
            url: "{{url('admin/checkProdName')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'name': name.value,
            },
            dataType: "json",
            success: function(response) {
                if (response.status == 200) {
                    nameTitle.innerHTML = "Name is already in use";
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

<!-- image block generate -->
<script>
    var counter = 1;

    function generateBlock() {
        var divlocation = $('#generateBlockHere');
        var adddiv = $('#AddImage');

        // add new block
        var newBlock = '<div class="col-sm-12 col-md-6 col-lg-3 mt-3 text-center">\
        <div class="image-input image-input-outline" id="image_input2' + counter + '" style=" background-image: url('/media/blank-image.svg')">\
                                <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url('/media/blank-image.svg')"></div>\
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">\
                                    <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>\
                                    <input type="file" name="image[]" accept=".png, .jpg, .jpeg, .webp" />\
                                    <input type="hidden" name="profile_avatar_remove[]" />\
                                </label>\
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">\
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>\
                                </span>\
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Image">\
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>\
                                </span>\
                            </div>\
                            </div>';

        // append new block before addDiv
        $(newBlock).insertBefore(adddiv);

        // initialize image input
        var avatar5 = new KTImageInput('image_input2' + counter);

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
        counter++;


    }
</script>



<!-- Image upload -->
<script>
    var images = @json($product);
    var imageId = images.productimages.map(function(images) {
        return images.id;
    });
    console.log(imageId);

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

            $.each(imageId, function(i, item) {
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

<script>
    var category = $('#categoryId').val();
    console.log(category);
    $.ajax({
        type: "POST",
        url: "{{url('admin/getSubCategories')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'category': category,
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            $('#subcategoryId').attr('disabled', false);
            $('#subcategoryId').empty();
            $('#subcategoryId').append($('<option>', {
                value: '',
                text: 'Deselect'
            }));
            $.each(response, function(i, item) {
                $('#subcategoryId').append($('<option>', {
                    value: item.id,
                    text: item.name,
                    selected: item.id == $('#selectedSubCategory').val() ? true : false
                }));
            });
            $('#subcategoryId').selectpicker('refresh');
        },
        error: function(response) {
            console.log(response);
        }
    });

    function getSubCategories() {
        var category = $('#categoryId').val();
        console.log(category);
        $.ajax({
            type: "POST",
            url: "{{url('admin/getSubCategories')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'category': category,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#subcategoryId').attr('disabled', false);
                $('#subcategoryId').empty();
                $('#subcategoryId').append($('<option>', {
                    value: '',
                    text: 'Deselect'
                }));
                $.each(response, function(i, item) {
                    $('#subcategoryId').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
                $('#subcategoryId').selectpicker('refresh');
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
</script>
@endsection