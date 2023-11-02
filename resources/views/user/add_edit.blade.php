@extends('layouts.header')
@section('content')
@php
    if($user) {
        $ptitle = "Edit User";
        $action = url("users/".$user['id']);
        $btn_title = "Save";

        $name = $user['name'];
        $email = $user['email'];
        $phone = $user['phone'];
        $country = $user['country'];
        $state = $user['state'];
        $city = $user['city'];
        $address = $user['address'];
        $avatar = $user['avatar'];
        $role_id = $user['role_id'];
        $assigned_to = $user['assigned_to'];
    } else {
        $ptitle = "New User";
        $action = url("users");
        $btn_title = "Add";

        $name = "";
        $email = "";
        $phone = "";
        $country = "";
        $state = "";
        $city = "";
        $address = "";
        $avatar = "";
        $role_id = 0;
        $assigned_to = 0;
    }
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form method="post" action="{{ $action }}" id="userForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_avatar" value="{{ $avatar }}" />
                        @if($name != "")
                            <input type="hidden" name="_method" value="put">
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ $ptitle }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" autofocus />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Email*</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $email }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Password* <small>(Keep blank to keep password as it is.)</small></label>
                                    <input type="text" class="form-control" id="password" name="password" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Mobile No.*</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Role*</label>
                                    <select class="form-control" id="role_id" name="role_id">
                                        <option value="">Option</option>
                                        @if($roles)
                                            @foreach($roles as $key => $val)
                                                @if($val['id'] == $role_id)
                                                    <option value="{{ $val['id'] }}" selected>{{ $val['name'] }}</option>
                                                @else 
                                                    <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Reporting To*</label>
                                    <select class="form-control" id="assigned_to" name="assigned_to">
                                        <option value="">Option</option>
                                        @if($users)
                                            @foreach($users as $key => $val)
                                                @if($val['id'] == $assigned_to)
                                                    <option value="{{ $val['id'] }}" selected>{{ $val['name'] }}</option>
                                                @else 
                                                    <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $country }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{ $state }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $city }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $address }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Photo</label>
                                    <input type="file" id="validationDefault01" id="avatar" name="avatar" />
                                    @if($avatar != "")
                                        <br><br><br><img src="{{ asset('uploads/user/'.$avatar) }}" style="width: 100px;height: 100px;border-radius: 100%;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-sm" type="submit">{{ $btn_title }}</button>
                                <a class="btn btn-danger btn-sm" href="{{ url('users') }}">Back</a>
                            </div>
                        </div>
                    </form>
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
                },
                email:{
                    required: true,
                    email: true
                },
                password:{
                    required: true,
                    minlength: 6
                },
                phone:{
                    required: true
                },
                role_id:{
                    required: true
                },
                assigned_to:{
                    required: true  
                }
            },
            messages:{
                name: {
                    required: "<small class='error'>Name is required</small>"
                },
                email:{
                    required: "<small class='error'>Email is required</small>",
                    email: "<small class='error'>Email is invalid</small>"
                },
                password:{
                    required: "<small class='error'>Password is required</small>",
                    minlength: "<small class='error'>Password must be 8 characters long</small>"
                },
                phone:{
                    required: "<small class='error'>Mobile no. is required</small>",
                },
                role_id:{
                    required: "<small class='error'>Role is required</small>",
                },
                assigned_to:{
                    required: "<small class='error'>Assigned to is required</small>",
                }
            }
        });
    });
</script>
@endsection
