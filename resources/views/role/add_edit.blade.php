@extends('layouts.header')
@section('content')
@php
    if($role) {
        $ptitle = "Edit Role";
        $action = url("roles/".$role['id']);
        $btn_title = "Save";

        $name = $role['name'];
        $parent_role_id = $role['parent_role_id'];
        $description = $role['description'];
    } else {
        $ptitle = "New Role";
        $action = url("roles");
        $btn_title = "Add";

        $name = "";
        $parent_role_id = "";
        $description = "";
    }
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form method="post" action="{{ $action }}" id="userForm" enctype="multipart/form-data">
                        @csrf
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
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" value="{{ $name }}" autofocus />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault02">Parent Role ID</label>
                                    <select class="form-control" id="parent_role_id" name="parent_role_id">
                                        <option value="">Option</option>
                                        @if($roles)
                                            @foreach($roles as $role)
                                                @if($role['id'] == $parent_role_id)
                                                    <option value="{{ $role['id'] }}" selected>{{ $role['name'] }}</option>
                                                @else 
                                                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $description }}</textarea>
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
    var page_title = "CRM";
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
</script>
@endsection
