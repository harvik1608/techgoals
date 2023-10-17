@extends('layouts.header')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
        <p></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Male</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Female</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Today Users</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Today Male</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon bi bi-people fs-1"></i>
            <div class="info">
                <h4>Today Female</h4>
                <p><b>0</b></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var page_title = "Dashboard";
</script>
@endsection
