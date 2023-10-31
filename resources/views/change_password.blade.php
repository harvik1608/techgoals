@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="chang-pwd" role="tabpanel">
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
                                            <input type="Password" class="form-control" id="password" name="password" value="">
                                            @error('password')
                                                <small class="error-text">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="vpass">Confirm Password :</label>
                                            <input type="Password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
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
