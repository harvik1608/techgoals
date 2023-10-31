@extends('layouts.header')
@section('content')
@php
    if($lender) {
        $ptitle = "Edit Lender";
        $action = url("lenders/".$lender['id']);
        $btn_title = "Save";

        $name = $lender['name'];
        $logo = $lender['logo'];
        $app_url = $lender['app_url'];
    } else {
        $ptitle = "New Lender";
        $action = url("lenders");
        $btn_title = "Add";

        $name = "";
        $logo = "";
        $app_url = "";
    }
@endphp
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form method="post" action="{{ $action }}" id="userForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_logo" value="{{ $logo }}" />
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
                                    <label for="validationDefault01">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" autofocus />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault02">App. URL</label>
                                    <input type="text" class="form-control" id="app_url" name="app_url" value="{{ $app_url }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Logo</label>
                                    <input type="file" id="validationDefault01" id="logo" name="logo" />
                                    @if($logo != "")
                                        <br><br><br><img src="{{ asset('uploads/lender/'.$logo) }}" style="width: 100px;height: 100px;border-radius: 100%;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-sm" type="submit">{{ $btn_title }}</button>
                                <a class="btn btn-danger btn-sm" href="{{ url('lenders') }}">Back</a>
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
    var page_title = "Lenders";
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
