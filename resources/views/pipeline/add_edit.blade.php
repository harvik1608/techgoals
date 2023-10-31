@extends('layouts.header')
@section('content')
@php
    if($pipeline) {
        $ptitle = "Edit Pipeline";
        $action = url("pipelines/".$pipeline['id']);
        $btn_title = "Save";

        $pipeline_type_id = $pipeline['pipeline_type_id'];
        $name = $pipeline['name'];
        $stage_id = $pipeline['stage_id'];
        $description = $pipeline['description'];
        $is_active = $pipeline['is_active'];
    } else {
        $ptitle = "New Pipeline";
        $action = url("pipelines");
        $btn_title = "Add";

        $pipeline_type_id = "";
        $name = "";
        $stage_id = "";
        $description = "";
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
                                    <label for="validationDefault02">Pipeline Type</label>
                                    <select class="form-control" id="pipeline_type_id" name="pipeline_type_id">
                                        @if($pipeline_types)
                                            @foreach($pipeline_types as $pipeline_type)
                                                @if($pipeline_type['id'] == $pipeline_type_id)
                                                    <option value="{{ $pipeline_type['id'] }}" selected>{{ $pipeline_type['name'] }}</option>
                                                @else 
                                                    <option value="{{ $pipeline_type['id'] }}">{{ $pipeline_type['name'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Pipeline Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" autofocus />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault02">Stage</label>
                                    <select class="form-control" id="stage_id" name="stage_id">
                                        @if($stages)
                                            @foreach($stages as $stage)
                                                @if($stage['id'] == $stage_id)
                                                    <option value="{{ $stage['id'] }}" selected>{{ $stage['name'] }}</option>
                                                @else 
                                                    <option value="{{ $stage['id'] }}">{{ $stage['name'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $description }}</textarea>
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
                                <a class="btn btn-danger btn-sm" href="{{ url('pipelines') }}">Back</a>
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
