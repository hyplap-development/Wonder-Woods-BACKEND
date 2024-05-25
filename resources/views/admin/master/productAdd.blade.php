@extends('layouts.admin')

@section('title')
Add Product
@endsection

@section('header')

@endsection

@section('content')

<!-- data table -->

<form action="{{url('admin/product/add')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="addImages" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Add Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                        </lord-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Multiple Images </label>
                                <input type="file" class="form-control" multiple name="multiImages[]" accept=".png, .jpg, .jpeg, .webp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="card card-custom ">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Add Product Details </h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImages">Add Images</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-5">
                            <div class="image-input image-input-outline" id="image_input" style=" background-image: url('/media/blank-image.svg')">
                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url('/media/blank-image.svg')"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                    <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
                                    <input type="file" name="image" required accept=".png, .jpg, .jpeg, .webp" />
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
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Sub Category <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="subcategoryId" disabled name="subCategoryId" required>
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Company <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="company" name="companyId" required>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Color <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="color" name="colorId" required>
                                    @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Size <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="size" name="sizeId" required>
                                    @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Room <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="room" name="roomId" required>
                                    @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">MRP <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="mrp" name="mrp" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Discounted Price <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="discountedPrice" name="discountedPrice" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Delivery Charge <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" value="0" id="deliveryCharge" name="deliveryCharge" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;"> Select Gst <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="gst" name="gst" required>
                                    @foreach($gsts as $gst)
                                    <option value="{{$gst->percent}}">{{$gst->percent}} %</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Tag </label>
                                <select class="form-control selectpicker" name="tag" id="tag">
                                    <option value="New">New</option>
                                    <option value="Discounted">Discounted</option>
                                    <option value="Exclusive">Exclusive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Status </label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;">Description <span style="color: red;">&#42</span></label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 mt-3">
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
                                <input type="number" class="form-control" id="length" name="length">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-0">
                            <div class="form-group">
                                <label style="font-weight: bold;">Width</label>
                                <input type="number" class="form-control" id="width" name="width">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-0">
                            <div class="form-group">
                                <label style="font-weight: bold;">Height</label>
                                <input type="number" class="form-control" id="height" name="height">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Material <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" required name="material" id="material">
                                    <option value="">Select Material</option>
                                    <option value="Wood">Wood</option>
                                    <option value="MDF">MDF</option>
                                    <option value="HDF">HDF</option>
                                    <option value="Marble">Metal</option>
                                    <option value="Marble">Marble</option>
                                    <option value="Plastic">Plastic</option>
                                    <option value="Glass">Glass</option>
                                    <option value="Fabric">Fabric</option>
                                    <option value="Leather">Leather</option>
                                    <option value="Stone">Stone</option>
                                    <option value="Ceramic">Ceramic</option>
                                </select>
                            </div>
                        </div>

                        <!-- Finish -->
                        <div class="col-sm-4">
                            <div class="form-group mb-0">
                                <label style="font-weight: bold;">Finish</label>
                                <select class="form-control selectpicker" required name="finish" id="finish">
                                    <option value="">Select Finish</option>
                                    <option value="Glossy">Glossy</option>
                                    <option value="Matte">Matte</option>
                                    <option value="Semi-Glossy">Semi-Glossy</option>
                                    <option value="Textured">Textured</option>
                                    <option value="Polished">Polished</option>
                                    <option value="Unpolished">Unpolished</option>
                                    <option value="Natural">Natural</option>
                                    <option value="Lacquered">Lacquered</option>
                                    <option value="Painted">Painted</option>
                                    <option value="Stained">Stained</option>
                                    <option value="Distressed">Distressed</option>
                                    <option value="Antique">Antique</option>
                                    <option value="Rustic">Rustic</option>
                                    <option value="Vintage">Vintage</option>
                                    <option value="Modern">Modern</option>
                                    <option value="Contemporary">Contemporary</option>
                                    <option value="Traditional">Traditional</option>
                                </select>
                            </div>
                        </div>

                        <!-- Style -->
                        <div class="col-sm-4">
                            <div class="form-group mb-0">
                                <label style="font-weight: bold;">Style</label>
                                <select class="form-control selectpicker" required name="style" id="style">
                                    <option value="">Select Style</option>
                                    <option value="Modern">Modern</option>
                                    <option value="Contemporary">Contemporary</option>
                                    <option value="Traditional">Traditional</option>
                                    <option value="Rustic">Rustic</option>
                                    <option value="Vintage">Vintage</option>
                                    <option value="Antique">Antique</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Scandinavian">Scandinavian</option>
                                    <option value="Bohemian">Bohemian</option>
                                    <option value="Coastal">Coastal</option>
                                    <option value="Mid-Century">Mid-Century</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Shabby Chic">Shabby Chic</option>
                                    <option value="Eclectic">Eclectic</option>
                                </select>
                            </div>
                        </div>

                        <!-- weight -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Weight (in KG)</label>
                                <input type="number" class="form-control" id="weight" name="weight">
                            </div>
                        </div>

                        <!-- storage dropdonw between yes and no -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Storage</label>
                                <select class="form-control selectpicker" required name="storage" id="storage">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Warranty <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="warranty" name="warranty">
                                    <option value="0">No Warranty</option>
                                    <option value="3">3 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="12">1 Year</option>
                                    <option value="24">2 Years</option>
                                    <option value="36">3 Years</option>
                                    <option value="48">4 Years</option>
                                    <option value="60">5 Years</option>
                                    <option value="72">6 Years</option>
                                    <option value="84">7 Years</option>
                                    <option value="96">8 Years</option>
                                    <option value="108">9 Years</option>
                                    <option value="120">10 Years</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-3">
            <div class="card card-custom ">
                <div class="card-header flex-wrap">
                    <div class="card-title">
                        <h3 class="card-label">Ratings</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">1 Star</label>
                                <input type="number" class="form-control" id="rating1" name="rating1" onkeyup="ratingChanged(1)" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">2 Star</label>
                                <input type="number" class="form-control" id="rating2" name="rating2" onkeyup="ratingChanged(2)" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">3 Star</label>
                                <input type="number" class="form-control" id="rating3" name="rating3" onkeyup="ratingChanged(3)" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">4 Star</label>
                                <input type="number" class="form-control" id="rating4" name="rating4" onkeyup="ratingChanged(4)" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">5 Star</label>
                                <input type="number" class="form-control" id="rating5" name="rating5" onkeyup="ratingChanged(5)" value="0" min="0" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p> Average Rating: <strong id="averageRating">0</strong> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary mr-2">Add Product</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<!-- image  -->
<script>
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
                    text: 'Select Sub Category'
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

<script>
    function ratingChanged(rating) {
        // Get the count of each rating
        var rating1 = parseInt($('#rating1').val());
        var rating2 = parseInt($('#rating2').val());
        var rating3 = parseInt($('#rating3').val());
        var rating4 = parseInt($('#rating4').val());
        var rating5 = parseInt($('#rating5').val());

        // Calculate the total number of ratings
        var totalRatings = rating1 + rating2 + rating3 + rating4 + rating5;

        // Check if totalRatings is not zero to avoid division by zero
        if (totalRatings === 0) {
            $('#averageRating').text('No ratings yet');
            return;
        }

        // Calculate the weighted sum of ratings
        var weightedSum = (rating1 * 1) + (rating2 * 2) + (rating3 * 3) + (rating4 * 4) + (rating5 * 5);

        // Calculate the average rating
        var average = weightedSum / totalRatings;

        // Display the average rating, rounded to one decimal place
        $('#averageRating').text(average.toFixed(1));
    }
</script>

@endsection