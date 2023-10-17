@extends('layouts.header')
@section('content')
@php
    if($plan) {
        $ptitle = "Edit Plan";
        $action = url("plans/".$plan['id']);
        $btn_title = "Save";

        $name = $plan['name'];
        $amount = $plan['amount'];
        $duration = $plan['duration'];
        $visit = $plan['visit'];
    } else {
        $ptitle = "New Plan";
        $action = url("plans");
        $btn_title = "Add";

        $name = "";
        $amount = "";
        $duration = "";
        $visit = "";
    }
@endphp
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<div class="app-title">
    <div>
        <h1><i class="bi bi-bank"></i> Plans</h1>
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
                        <div class="col-lg-6">
                            <label class="form-label">Plan Name*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter plan name" value="{{ $name }}" autofocus />
                            @error('name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Plan Amount*</label>
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter plan amount" value="{{ $amount }}" />
                            @error('amount')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Plan Duration* <small>(in month)</small></label>
                            <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter plan duration" value="{{ $duration }}" />
                            @error('duration')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Visit*</label>
                            <input type="number" class="form-control" name="visit" id="visit" placeholder="Enter visit" value="{{ $visit }}" />
                            @error('visit')
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
    var page_title = "Plans";
</script>
@endsection
