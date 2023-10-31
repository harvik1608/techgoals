@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="iq-edit-list usr-edit">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-3 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">Personal Information</a>
                                </li>
                                <li class="col-md-3 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">Change Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $profile['avatar'] }}" name="old_avatar" />
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-12">
                                                <div class="profile-img-edit">
                                                    <div class="crm-profile-img-edit">
                                                        <img class="crm-profile-pic rounded-circle avatar-100" src="{{ $profile['avatar'] }}" alt="profile-pic">
                                                        <div class="crm-p-image bg-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload()">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                            <input class="file-upload" type="file" accept="image/*" id="profile-pic" name="avatar" />
                                                        </div>
                                                    </div>                                          
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row align-items-center">
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $profile['name'] }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{ $profile['email'] }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Mobile No.</label>
                                                <input type="number" class="form-control" id="phone" name="phone" value="{{ $profile['phone'] }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Country</label>
                                                <input type="text" class="form-control" id="country" name="country" value="{{ $profile['country'] }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="fname">State</label>
                                                <input type="text" class="form-control" id="state" name="state" value="{{ $profile['state'] }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="fname">City</label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{ $profile['city'] }}" />
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="fname">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ $profile['address'] }}" />
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-outline-primary mr-2">Clear</button>
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                            <div class="card">
                               <div class="card-header d-flex justify-content-between">
                                  <div class="header-title">
                                     <h4 class="card-title">Change Password</h4>
                                  </div>
                               </div>
                               <div class="card-body">
                                    <form method="post" action="{{ route('submit-change-password') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="cpass">Old Password :</label>
                                            <input type="Password" class="form-control" id="opassword" name="opassword" value="">
                                            @error('opassword')
                                                <small class="error-text">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="npass">New Password :</label>
                                            <input type="Password" class="form-control" id="npassword" name="npassword" value="">
                                            @error('npassword')
                                                <small class="error-text">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vpass">Confirm Password :</label>
                                            <input type="Password" class="form-control" id="cpassword" name="cpassword" value="">
                                            @error('cpassword')
                                                <small class="error-text">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="reset" class="btn btn-outline-primary mr-2">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/js/additional_methods.js') }}"></script>
<script type="text/javascript">
    var page_title = "Profile";
    $(document).ready(function(){
        $("#userForm").validate({
            rules:{
                name: {
                    required: true
                }
            },
            messages:{
                name: {
                    required: "<small class='error'>Name is required</small>"
                }
            }
        });
    });
    function image_upload()
    {
        $("#profile-pic").trigger("click");
    }
</script>
@endsection
