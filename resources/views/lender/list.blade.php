@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Lenders</h4>
                        </div>
                        <div class="header-action">
                            <a class="btn btn-sm btn-primary" href="{{ url('lenders/create') }}">New Lender</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbl" class="table data-table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Logo</th>
                                        <th width="25%">Name</th>
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
    var page_title = "Lenders";
    
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
                url: "{{ route('load-lenders') }}",
                data: {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    whatsapp_no: $("#whatsapp_no").val(),
                    email: $("#email").val(),
                    area: $("#area").val(),
                    kids: $("#kids").val(),
                    reference: $("#reference").val(),
                    dob: $("#dob").val(),
                    anni_date: $("#anni_date").val(),
                    sdate: $("#sdate").val(),
                    edate: $("#edate").val(),
                }
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
