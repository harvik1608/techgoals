@extends('layouts.header')
@section('content')
@php
    if($area) {
        $ptitle = "Edit Area";
        $action = url("areas/".$area['id']);
        $btn_title = "Save";

        $name = $area['name'];
    } else {
        $ptitle = "Add Area";
        $action = url("areas");
        $btn_title = "Add";

        $name = "";
    }
@endphp
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<div class="app-title">
    <div>
        <h1><i class="bi bi-bank"></i> Areas</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-header">
                <h4>{{ $ptitle }}</h4>
            </div><hr>
            <form class="" method="post" action="{{ $action }}" enctype="multipart/form-data" id="empform">
                @csrf
                @if($name != "")
                    <input type="hidden" name="_method" value="PUT" />
                @endif
                <div class="tile-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label">Area Name*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter area name" value="{{ $name }}" autofocus />
                            @error('name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning btn-sm">SUBMIT</button>
                            <a class="btn btn-danger btn-sm" href="{{ url('areas') }} ">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/js/additional_methods.js') }}"></script>
<script type="text/javascript">
    var page_title = "Areas";
</script>
@endsection
