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
                                <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url('/{{$productimages->image != null ? $productimages->image : '/media/blank-image.svg'}}')"></div>

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
                                <div class="image-input-wrapper" style="width: 150px; height: 150px; background-image: url('/{{$product->image != null ? $product->image : '/media/blank-image.svg'}}')"></div>

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
                                <label style="font-weight: bold;">Select Color <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="colorId" name="colorId" required>
                                    @foreach($colors as $color)
                                    <option value="{{$color->id}}" {{$product->colorId == $color->id ? 'selected' : ''}}>{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Size <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="sizeId" name="sizeId" required>
                                    @foreach($sizes as $size)
                                    <option value="{{$size->id}}" {{$product->sizeId == $size->id ? 'selected' : ''}}>{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Select Room <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="roomId" name="roomId" required>
                                    @foreach($rooms as $room)
                                    <option value="{{$room->id}}" {{$product->roomId == $room->id ? 'selected' : ''}}>{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" minlength="3" value="{{$product->name}}" required>
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
                                <select class="form-control selectpicker" name="gst" id="gst" required>
                                    @foreach($gsts as $gst)
                                    <option value="{{$gst->percent}}" {{$product->percent == $gst->percent ? 'selected' : ''}}>{{$gst->percent}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Tag </label>
                                <select class="form-control selectpicker" name="tag" id="tag">
                                    <option value="New" {{$product->tag == 'New' ? 'selected' : ''}}>New</option>
                                    <option value="Discounted" {{$product->tag == 'Discounted' ? 'selected' : ''}}>Discounted</option>
                                    <option value="Exclusive" {{$product->tag == 'Exclusive' ? 'selected' : ''}}>Exclusive</option>
                                </select>
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

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Material <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" required name="material" id="material">
                                    <option value="">Select Material</option>
                                    <option value="Wood" {{ $product->material === 'Wood' ? 'selected' : '' }}>Wood</option>
                                    <option value="MDF" {{ $product->material === 'MDF' ? 'selected' : '' }}>MDF</option>
                                    <option value="HDF" {{ $product->material === 'HDF' ? 'selected' : '' }}>HDF</option>
                                    <option value="Marble" {{ $product->material === 'Marble' ? 'selected' : '' }}>Metal</option>
                                    <option value="Marble" {{ $product->material === 'Marble' ? 'selected' : '' }}>Marble</option>
                                    <option value="Plastic" {{ $product->material === 'Plastic' ? 'selected' : '' }}>Plastic</option>
                                    <option value="Glass" {{ $product->material === 'Glass' ? 'selected' : '' }}>Glass</option>
                                    <option value="Fabric" {{ $product->material === 'Fabric' ? 'selected' : '' }}>Fabric</option>
                                    <option value="Leather" {{ $product->material === 'Leather' ? 'selected' : '' }}>Leather</option>
                                    <option value="Stone" {{ $product->material === 'Stone' ? 'selected' : '' }}>Stone</option>
                                    <option value="Ceramic" {{ $product->material === 'Ceramic' ? 'selected' : '' }}>Ceramic</option>
                                </select>
                            </div>
                        </div>

                        <!-- Finish -->
                        <div class="col-sm-4">
                            <div class="form-group mb-0">
                                <label style="font-weight: bold;">Finish</label>
                                <select class="form-control selectpicker" required name="finish" id="finish">
                                    <option value="">Select Finish</option>
                                    <option value="Glossy" {{ $product->finish == "Glossy" ? 'selected' : '' }}>Glossy</option>
                                    <option value="Matte" {{ $product->finish == "Matte" ? 'selected' : '' }}>Matte</option>
                                    <option value="Semi-Glossy" {{ $product->finish == "Semi-Glossy" ? 'selected' : '' }}>Semi-Glossy</option>
                                    <option value="Textured" {{ $product->finish == "Textured" ? 'selected' : '' }}>Textured</option>
                                    <option value="Polished" {{ $product->finish == "Polished" ? 'selected' : '' }}>Polished</option>
                                    <option value="Unpolished" {{ $product->finish == "Unpolished" ? 'selected' : '' }}>Unpolished</option>
                                    <option value="Natural" {{ $product->finish == "Natural" ? 'selected' : '' }}>Natural</option>
                                    <option value="Lacquered" {{ $product->finish == "Lacquered" ? 'selected' : '' }}>Lacquered</option>
                                    <option value="Painted" {{ $product->finish == "Painted" ? 'selected' : '' }}>Painted</option>
                                    <option value="Stained" {{ $product->finish == "Stained" ? 'selected' : '' }}>Stained</option>
                                    <option value="Distressed" {{ $product->finish == "Distressed" ? 'selected' : '' }}>Distressed</option>
                                    <option value="Antique" {{ $product->finish == "Antique" ? 'selected' : '' }}>Antique</option>
                                    <option value="Rustic" {{ $product->finish == "Rustic" ? 'selected' : '' }}>Rustic</option>
                                    <option value="Vintage" {{ $product->finish == "Vintage" ? 'selected' : '' }}>Vintage</option>
                                    <option value="Modern" {{ $product->finish == "Modern" ? 'selected' : '' }}>Modern</option>
                                    <option value="Contemporary" {{ $product->finish == "Contemporary" ? 'selected' : '' }}>Contemporary</option>
                                    <option value="Traditional" {{ $product->finish == "Traditional" ? 'selected' : '' }}>Traditional</option>
                                </select>
                            </div>
                        </div>

                        <!-- Style -->
                        <div class="col-sm-4">
                            <div class="form-group mb-0">
                                <label style="font-weight: bold;">Style</label>
                                <select class="form-control selectpicker" required name="style" id="style">
                                    <option value="">Select Style</option>
                                    <option value="Modern" {{ $product->style == 'Modern' ? 'selected' : '' }}>Modern</option>
                                    <option value="Contemporary" {{ $product->style == 'Contemporary' ? 'selected' : '' }}>Contemporary</option>
                                    <option value="Traditional" {{ $product->style == 'Traditional' ? 'selected' : '' }}>Traditional</option>
                                    <option value="Rustic" {{ $product->style == 'Rustic' ? 'selected' : '' }}>Rustic</option>
                                    <option value="Vintage" {{ $product->style == 'Vintage' ? 'selected' : '' }}>Vintage</option>
                                    <option value="Antique" {{ $product->style == 'Antique' ? 'selected' : '' }}>Antique</option>
                                    <option value="Industrial" {{ $product->style == 'Industrial' ? 'selected' : '' }}>Industrial</option>
                                    <option value="Scandinavian" {{ $product->style == 'Scandinavian' ? 'selected' : '' }}>Scandinavian</option>
                                    <option value="Bohemian" {{ $product->style == 'Bohemian' ? 'selected' : '' }}>Bohemian</option>
                                    <option value="Coastal" {{ $product->style == 'Coastal' ? 'selected' : '' }}>Coastal</option>
                                    <option value="Mid-Century" {{ $product->style == 'Mid-Century' ? 'selected' : '' }}>Mid-Century</option>
                                    <option value="Minimalist" {{ $product->style == 'Minimalist' ? 'selected' : '' }}>Minimalist</option>
                                    <option value="Shabby Chic" {{ $product->style == 'Shabby Chic' ? 'selected' : '' }}>Shabby Chic</option>
                                    <option value="Eclectic" {{ $product->style == 'Eclectic' ? 'selected' : '' }}>Eclectic</option>
                                </select>
                            </div>
                        </div>

                        <!-- weight -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Weight (in KG)</label>
                                <input type="number" class="form-control" id="weight" name="weight" value="{{$product->weight}}">
                            </div>
                        </div>

                        <!-- storage dropdonw between yes and no -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Storage</label>
                                <select class="form-control selectpicker" required name="storage" id="storage">
                                    <option value="0" {{$product->storage == 0 ? 'selected' : ''}}>No</option>
                                    <option value="1" {{$product->storage == 1 ? 'selected' : ''}}>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Warranty <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" id="warranty" name="warranty">
                                    <option value="0" {{ $product->warrenty == '0' ? 'selected' : '' }}>No Warranty</option>
                                    <option value="3" {{ $product->warrenty == '3' ? 'selected' : '' }}>3 Months</option>
                                    <option value="6" {{ $product->warrenty == '6' ? 'selected' : '' }}>6 Months</option>
                                    <option value="9" {{ $product->warrenty == '9' ? 'selected' : '' }}>9 Months</option>
                                    <option value="12" {{ $product->warrenty == '12' ? 'selected' : '' }}>1 Year</option>
                                    <option value="24" {{ $product->warrenty == '24' ? 'selected' : '' }}>2 Years</option>
                                    <option value="36" {{ $product->warrenty == '36' ? 'selected' : '' }}>3 Years</option>
                                    <option value="48" {{ $product->warrenty == '48' ? 'selected' : '' }}>4 Years</option>
                                    <option value="60" {{ $product->warrenty == '60' ? 'selected' : '' }}>5 Years</option>
                                    <option value="72" {{ $product->warrenty == '72' ? 'selected' : '' }}>6 Years</option>
                                    <option value="84" {{ $product->warrenty == '84' ? 'selected' : '' }}>7 Years</option>
                                    <option value="96" {{ $product->warrenty == '96' ? 'selected' : '' }}>8 Years</option>
                                    <option value="108" {{ $product->warrenty == '108' ? 'selected' : '' }}>9 Years</option>
                                    <option value="120" {{ $product->warrenty == '120' ? 'selected' : '' }}>10 Years</option>
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
                                <input type="number" class="form-control" id="rating1" name="rating1" onkeyup="ratingChanged(1)" min="0" required value="{{$product->oneStar}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">2 Star</label>
                                <input type="number" class="form-control" id="rating2" name="rating2" onkeyup="ratingChanged(2)" min="0" required value="{{$product->twoStar}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">3 Star</label>
                                <input type="number" class="form-control" id="rating3" name="rating3" onkeyup="ratingChanged(3)" min="0" required value="{{$product->threeStar}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">4 Star</label>
                                <input type="number" class="form-control" id="rating4" name="rating4" onkeyup="ratingChanged(4)" min="0" required value="{{$product->fourStar}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">5 Star</label>
                                <input type="number" class="form-control" id="rating5" name="rating5" onkeyup="ratingChanged(5)" min="0" required value="{{$product->fiveStar}}">
                            </div>
                        </div>
                        <?php
                        $totalRatings = $product->oneStar + $product->twoStar + $product->threeStar + $product->fourStar + $product->fiveStar;
                        if ($totalRatings > 0) {
                            $weightedSum = ($product->oneStar * 1) + ($product->twoStar * 2) + ($product->threeStar * 3) + ($product->fourStar * 4) + ($product->fiveStar * 5);
                            $averageRating = $weightedSum / $totalRatings;
                            $averageRating = number_format((float)$averageRating, 1, '.', '');
                        } else {
                            $averageRating = 'No ratings yet';
                        }
                        ?>
                        <div class="col-sm-12">
                            <p> Average Rating: <strong id="averageRating"> {{$averageRating}} </strong></p>
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
        <div class="image-input image-input-outline" id="image_input2' + counter + '" style=" background-image: url(' / media / blank - image.svg ')">\
                                <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url(' / media / blank - image.svg ')"></div>\
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