@extends('layouts.header')
@section('content')
@php
    if($pipeline_type) {
        $ptitle = "Edit Lender";
        $action = url("pipeline_types/".$pipeline_type['id']);
        $btn_title = "Save";

        $name = $pipeline_type['name'];
        $is_active = $pipeline_type['is_active'];
    } else {
        $ptitle = "New Pipeline Type";
        $action = url("pipeline_types");
        $btn_title = "Add";

        $name = "";
        $is_active = "";
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
                                    <label for="validationDefault01">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" autofocus />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault02">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1" <?php echo $is_active == 1 ? 'selected' : ''; ?>>Active</option>
                                        <option value="0" <?php echo $is_active == 0 ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-sm" type="submit">{{ $btn_title }}</button>
                                <a class="btn btn-danger btn-sm" href="{{ url('pipeline_types') }}">Back</a>
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
