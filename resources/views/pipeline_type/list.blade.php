@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Pipeline Types</h4>
                        </div>
                        <div class="header-action">
                            <a class="btn btn-sm btn-primary" href="{{ url('pipeline_types/create') }}">New Pipeline Type</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbl" class="table data-table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="70%">Name</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var page_title = "Pipeline Types";
    
    datatable();
    function datatable() {
        $("#tbl").dataTable().fnDestroy();
        $('#tbl').dataTable({
            bProcessing: true,
            bServerSide: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('load-pipeline-types') }}"
            },
            oLanguage: 
            {
                sProcessing: "<i class='spinner-border text-primary m-2 loader-size'></i>"
            },
            language:
            {
                paginate:
                {
                    previous:"<i class='mdi mdi-chevron-left'>",
                    next:"<i class='mdi mdi-chevron-right'>"
                }
            },drawCallback:function(){
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            
        });
    }
</script>
@endsection
