@extends('layouts.header')
@section('content')
<style>
    p.card-text {
        margin-bottom: 0px !important;
    }
</style>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Pipelines</h4>
                        </div>
                        <div class="header-action">
                            <a class="btn btn-sm btn-primary" href="{{ url('pipelines/create') }}">New Pipeline</a>
                        </div>
                    </div>
                </div>
                @if($pipelines)
                    <div class="row">
                        @foreach($pipelines as $pipeline)
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            {{ $pipeline['name'] }}
                                            <div style="float: right;">
                                                <a style="font-size: 12px;" href="{{ url('pipelines/'.$pipeline['id'].'/edit') }}">Edit</a>
                                                <a style="font-size: 12px;" onclick="remove_row('<?php echo url('pipelines/'.$pipeline['id']); ?>')"> | Remove</a>
                                            </div>
                                        </h4>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="mb-2 text-secondary">Active Leads</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0</h5>
                                                            <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="mb-2 text-secondary">Dynamic Links</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0</h5>
                                                            <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="mb-2 text-secondary">Users</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0</h5>
                                                            <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="mb-2 text-secondary">Partners</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0</h5>
                                                            <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text"><small class="text-muted">Created On : {{ format_date(3,$pipeline['created_at']) }}</small></p>
                                        <p class="card-text"><small class="text-muted">State Template : {{ $pipeline['stage'] }}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var page_title = "CRM";
</script>
@endsection
