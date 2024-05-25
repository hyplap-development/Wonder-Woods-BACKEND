@extends('layouts.admin')

@section('title')
End Users
@endsection

@section('header')

@endsection

@section('content')

<!-- Create Modal Button -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        Create User
    </button>
</div>

<!--Create Modal-->
<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                    </lord-icon>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{url('admin/user/add')}}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" minlength="3" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Password <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Password" onkeyup="validatePass()" name="password" required>
                                <div class="row">
                                    <div class="col-sm-1 text-center">
                                        <i id="redCapital" class="fas fa-times" style="color: red;"></i>
                                        <i id="greenCapital" class="fas fa-check" style="color: green; display: none;"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>1 Capital letter</label>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <i id="redSmall" class="fas fa-times" style="color: red;"></i>
                                        <i id="greenSmall" class="fas fa-check" style="color: green; display: none;"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>1 small letter</label>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <i id="redNumber" class="fas fa-times" style="color: red;"></i>
                                        <i id="greenNumber" class="fas fa-check" style="color: green; display: none;"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <label> 1 Number </label>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <i id="redSpecial" class="fas fa-times" style="color: red;"></i>
                                        <i id="greenSpecial" class="fas fa-check" style="color: green; display: none;"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <label> 1 Special </label>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <i id="red8charac" class="fas fa-times" style="color: red;"></i>
                                        <i id="green8charac" class="fas fa-check" style="color: green; display: none;"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <label> Password should contain atleast 8 characters </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Email <span style="color: red;">&#42</span></label>
                                <input type="email" class="form-control" onkeyup="checkEmail()" id="Email" name="email" autocomplete="false" required>
                                <span id="emailTitle"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Phone <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" onkeyup="checkPhone()" id="Phone" name="phone" maxlength="10" pattern="[789][0-9]{9}" required>
                                <span id="phoneTitle"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                        <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                        <button type="submit" id="addBtn" disabled class="btn btn-primary font-weight-bold">
                            Add User
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
                <h3 class="card-label">End Users </h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Sr.no</th>
                        <th class="align-middle text-center">Name</th>
                        <th class="align-middle text-center">Email</th>
                        <th class="align-middle text-center">Phone Number</th>
                        <th class="align-middle text-center">Addresses</th>
                        <th class="align-middle text-center">Status</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($enduser as $data)
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center">{{$data->name}}</td>
                        <td class="align-middle text-center">{{$data->email}}</td>
                        <td class="align-middle text-center">{{$data->phone}}</td>
                        <td class="align-middle text-center">
                            <a href="" data-toggle="modal" data-target="#addressModal{{$data->id}}" class="btn btn-icon btn-outline-primary has-ripple"><i class="fas fa-map-marker-alt"></i></a>
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

                    <!-- address modal -->
                    <div class="modal fade" id="addressModal{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Addresses</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row ">
                                        <style>
                                            .modal-card-border {
                                                border-radius: 8px;
                                                padding: 10px;
                                                box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                                            }

                                            /* enlarge card */
                                            .modal-card-border:hover {
                                                transform: scale(1.05);
                                                transition: 0.5s;
                                            }
                                        </style>
                                        @foreach ($data->address as $address)
                                        <div class="{{ $address->tag == 'home' ? 'col-12' : 'col-md-6'}} mb-4">
                                            <div class="modal-card-border">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3>{{ $address->tag == 'home' ? 'Home' : 'Other'}}</h3>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="m-0 p-0 mb-3">
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>Address 1</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>{{$address->address1}}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>Address 2</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>{{$address->address2}}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>City</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>{{$address->city}}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>State</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>{{$address->state}}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>Pincode</h6>
                                                    </div>
                                                    <div class="col-8">
                                                        <p>{{$address->pincode}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end address modal -->

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
                                <form action="{{url('admin/user/update')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Name <span style="color: red;">&#42</span></label>
                                                    <input type="text" class="form-control" id="Name{{$data->id}}" name="name" minlength="3" value="{{$data->name}}" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Email <span style="color: red;">&#42</span></label>
                                                    <input type="hidden" id="hiddenEmail{{$data->id}}" value="{{$data->email}}">
                                                    <input type="email" class="form-control" onkeyup="checkEmails('{{$data->id}}')" id="Email{{$data->id}}" name="email" autocomplete="false" value="{{$data->email}}" required>
                                                    <span id="emailTitle{{$data->id}}"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Phone <span style="color: red;">&#42</span></label>
                                                    <input type="hidden" id="hiddenPhone{{$data->id}}" value="{{$data->phone}}">
                                                    <input type="text" class="form-control" onkeyup="checkPhones('{{$data->id}}')" id="Phone{{$data->id}}" name="phone" maxlength="10" pattern="[6789][0-9]{9}" value="{{$data->phone}}" required>
                                                    <span id="phoneTitle{{$data->id}}"></span>
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
                    <div class="modal fade" id="deleteModal{{$data->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <lord-icon src="https://cdn.lordicon.com/vfzqittk.json" trigger="hover" state="hover-2" colors="primary:#000000" style="width:35px;height:35px">
                                        </lord-icon>
                                    </button>
                                </div>
                                <form action="{{url('/admin/user/delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$data->id}}" name="hiddenId">
                                    <div class="modal-body">
                                        <span>Are you sure you want to delete {{$data->name}}? <br> Action cannot be reverted</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="delYes" class="btn btn-danger">
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
    var emailFlag = false;
    var phoneFlag = false;
    var passwordFlag = false;

    function checkButtonStatus() {
        if (emailFlag && phoneFlag && passwordFlag) {
            document.getElementById('addBtn').disabled = false;
        } else {
            document.getElementById('addBtn').disabled = true;
        }
    }

    function checkEmail() {
        var email = document.getElementById('Email');
        var emailTitle = document.getElementById('emailTitle');
        var emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

        if (email.value == "") {
            emailTitle.innerHTML = "Email is required";
            emailTitle.style.color = 'red';
            email.style.border = '1px solid red';
            emailFlag = false;
            checkButtonStatus();
            return;
        }

        if (!emailRegex.test(email.value)) {
            emailTitle.innerHTML = "Please enter a valid email";
            emailTitle.style.color = 'red';
            email.style.border = '1px solid red';
            emailFlag = false;
            checkButtonStatus();
            return;
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('admin/checkEmail')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': email.value,
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        emailTitle.innerHTML = "Email is already taken";
                        emailTitle.style.color = '#e0844b';
                        email.style.border = '1px solid #e0844b';
                        emailFlag = false;
                        checkButtonStatus();

                    } else {
                        emailTitle.innerHTML = "Email is available";
                        emailTitle.style.color = 'green';
                        email.style.border = '1px solid green';
                        emailFlag = true;
                        checkButtonStatus();
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

    }

    function checkPhone() {
        var phone = document.getElementById('Phone');
        var phoneTitle = document.getElementById('phoneTitle');
        var phoneRegex = /^[6-9]\d{9}$/;

        if (phone.value == "") {
            phoneTitle.innerHTML = "Phone is required";
            phoneTitle.style.color = 'red';
            phone.style.border = '1px solid red';
            phoneFlag = false;
            checkButtonStatus();
            return;
        }

        if (!phoneRegex.test(phone.value)) {
            phoneTitle.innerHTML = "Please enter a valid phone number";
            phoneTitle.style.color = 'red';
            phone.style.border = '1px solid red';
            phoneFlag = false;
            checkButtonStatus();
            return;
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('admin/checkPhone')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': phone.value,
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        phoneTitle.innerHTML = "Phone is already taken";
                        phoneTitle.style.color = '#e0844b';
                        phone.style.border = '1px solid #e0844b';
                        phoneFlag = false;
                        checkButtonStatus();
                    } else {
                        phoneTitle.innerHTML = "Phone is available";
                        phoneTitle.style.color = 'green';
                        phone.style.border = '1px solid green';
                        phoneFlag = true;
                        checkButtonStatus();
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }

    function validatePass() {
        var pass = document.getElementById('Password');
        var countUpper = (pass.value.match(/[A-Z]/g) || []).length;
        var countLower = (pass.value.match(/[a-z]/g) || []).length;
        var countNum = (pass.value.match(/[0-9]/g) || []).length;
        var countSpecial = (pass.value.match(/[@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g) || []).length;
        // var passTitle = document.getElementById('passTitle');
        if (pass.value.length < 8) {
            document.getElementById('red8charac').style.display = 'block';
            document.getElementById('green8charac').style.display = 'none';
        } else {
            document.getElementById('red8charac').style.display = 'none';
            document.getElementById('green8charac').style.display = 'block';
        }

        if (countUpper == 0) {
            document.getElementById('redCapital').style.display = 'block';
            document.getElementById('greenCapital').style.display = 'none';
        } else {
            document.getElementById('redCapital').style.display = 'none';
            document.getElementById('greenCapital').style.display = 'block';
        }

        if (countLower == 0) {
            document.getElementById('redSmall').style.display = 'block';
            document.getElementById('greenSmall').style.display = 'none';
        } else {
            document.getElementById('redSmall').style.display = 'none';
            document.getElementById('greenSmall').style.display = 'block';
        }

        if (countNum == 0) {
            document.getElementById('redNumber').style.display = 'block';
            document.getElementById('greenNumber').style.display = 'none';
        } else {
            document.getElementById('redNumber').style.display = 'none';
            document.getElementById('greenNumber').style.display = 'block';
        }

        if (countSpecial == 0) {
            document.getElementById('redSpecial').style.display = 'block';
            document.getElementById('greenSpecial').style.display = 'none';
        } else {
            document.getElementById('redSpecial').style.display = 'none';
            document.getElementById('greenSpecial').style.display = 'block';
        }

        if (pass.value.length >= 8 && countUpper > 0 && countLower > 0 && countNum > 0 && countSpecial > 0) {
            passwordFlag = true;
            checkButtonStatus();
        } else {
            passwordFlag = false;
            checkButtonStatus();
        }
    }
</script>

<!-- Check fields in update modal -->
<script>
    var emailUpdateFlag = true;
    var phoneUpdateFlag = true;

    function checkEmails(id) {
        var email = document.getElementById('Email' + id);
        var emailHidden = document.getElementById('hiddenEmail' + id);
        var emailTitle = document.getElementById('emailTitle' + id);
        var emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

        if (email.value == "") {
            emailTitle.innerHTML = "Email is required";
            emailTitle.style.color = 'red';
            email.style.border = '1px solid red';
            emailUpdateFlag = false;
            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                document.getElementById('updateBtn' + id).disabled = false;
            } else {
                document.getElementById('updateBtn' + id).disabled = true;
            }
            return;
        }

        if (!emailRegex.test(email.value)) {
            emailTitle.innerHTML = "Please enter a valid email";
            emailTitle.style.color = 'red';
            email.style.border = '1px solid red';
            emailUpdateFlag = false;
            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                document.getElementById('updateBtn' + id).disabled = false;
            } else {
                document.getElementById('updateBtn' + id).disabled = true;
            }
            return;
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('admin/checkEmail')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': email.value,
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        if (response.data.email == emailHidden.value) {
                            emailTitle.innerHTML = "Your currently registered email";
                            emailTitle.style.color = 'green';
                            email.style.border = '1px solid green';
                            emailUpdateFlag = true;
                            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                                document.getElementById('updateBtn' + id).disabled = false;
                            } else {
                                document.getElementById('updateBtn' + id).disabled = true;
                            }
                        } else {
                            emailTitle.innerHTML = "Email is already taken";
                            emailTitle.style.color = '#e0844b';
                            email.style.border = '1px solid #e0844b';
                            emailUpdateFlag = false;
                            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                                document.getElementById('updateBtn' + id).disabled = false;
                            } else {
                                document.getElementById('updateBtn' + id).disabled = true;
                            }
                        }
                    } else {
                        emailTitle.innerHTML = "Email is available";
                        emailTitle.style.color = 'green';
                        email.style.border = '1px solid green';
                        emailUpdateFlag = true;
                        if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                            document.getElementById('updateBtn' + id).disabled = false;
                        } else {
                            document.getElementById('updateBtn' + id).disabled = true;
                        }
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

    }

    function checkPhones(id) {
        var phone = document.getElementById('Phone' + id);
        var phoneHidden = document.getElementById('hiddenPhone' + id);
        var phoneTitle = document.getElementById('phoneTitle' + id);
        var phoneRegex = /^[6-9]\d{9}$/;

        if (phone.value == "") {
            phoneTitle.innerHTML = "Phone is required";
            phoneTitle.style.color = 'red';
            phone.style.border = '1px solid red';
            phoneUpdateFlag = false;
            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                document.getElementById('updateBtn' + id).disabled = false;
            } else {
                document.getElementById('updateBtn' + id).disabled = true;
            }
            return;
        }

        if (!phoneRegex.test(phone.value)) {
            phoneTitle.innerHTML = "Please enter a valid phone";
            phoneTitle.style.color = 'red';
            phone.style.border = '1px solid red';
            phoneUpdateFlag = false;
            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                document.getElementById('updateBtn' + id).disabled = false;
            } else {
                document.getElementById('updateBtn' + id).disabled = true;
            }
            return;
        } else {
            $.ajax({
                type: "POST",
                url: "{{url('admin/checkPhone')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': phone.value,
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        console.log(phoneHidden.value);
                        if (response.data.phone == phoneHidden.value) {
                            phoneTitle.innerHTML = "Your currently registered phone";
                            phoneTitle.style.color = 'green';
                            phone.style.border = '1px solid green';
                            phoneUpdateFlag = true;
                            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                                document.getElementById('updateBtn' + id).disabled = false;
                            } else {
                                document.getElementById('updateBtn' + id).disabled = true;
                            }
                        } else {
                            phoneTitle.innerHTML = "Phone is already taken";
                            phoneTitle.style.color = '#e0844b';
                            phone.style.border = '1px solid #e0844b';
                            phoneUpdateFlag = false;
                            if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                                document.getElementById('updateBtn' + id).disabled = false;
                            } else {
                                document.getElementById('updateBtn' + id).disabled = true;
                            }
                        }
                    } else {
                        phoneTitle.innerHTML = "Phone is available";
                        phoneTitle.style.color = 'green';
                        phone.style.border = '1px solid green';
                        phoneUpdateFlag = true;
                        if (emailUpdateFlag == true && phoneUpdateFlag == true) {
                            document.getElementById('updateBtn' + id).disabled = false;
                        } else {
                            document.getElementById('updateBtn' + id).disabled = true;
                        }
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
</script>

@endsection