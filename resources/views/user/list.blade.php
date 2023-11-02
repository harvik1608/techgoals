@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Users</h4>
                        </div>
                    </div>
                    @php
                        if(Session::get('success')) {
                            $class1 = "";
                            $class2 = "show active";
                            $aclass1 = "";
                            $aclass2 = "active";
                        } else {
                            $class1 = "show active";
                            $class2 = "";
                            $aclass1 = "active";
                            $aclass2 = "";
                        }
                    @endphp
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ $aclass1 }}" id="pills-home-tab-fill" data-toggle="pill" href="#pills-home-fill" role="tab" aria-controls="pills-home" aria-selected="true">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $aclass2 }}" id="pills-profile-tab-fill" data-toggle="pill" href="#pills-profile-fill" role="tab" aria-controls="pills-profile" aria-selected="false">Roles</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent-1">
                            <div class="tab-pane fade {{ $class1 }}" id="pills-home-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                                <p><a class="btn btn-sm btn-primary" href="{{ url('users/create') }}" style="float: right;">New User</a></p><br><br>
                                <div class="table-responsive">
                                    <table id="userList" class="table data-table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="25%">Name</th>
                                                <th width="25%">Email</th>
                                                <th width="15%">Mobile No.</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $class2 }} }}" id="pills-profile-fill" role="tabpanel" aria-labelledby="pills-home-tab-fill">
                                <p><a class="btn btn-sm btn-primary" href="{{ url('roles/create') }}" style="float: right;">New Role</a></p><br><br>
                                <div class="table-responsive">
                                    <table id="roleList" class="table data-table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="25%">Role</th>
                                                <th width="25%">Description</th>
                                                <th width="15%">Assigned To</th>
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
    </div>
</div>
<script type="text/javascript">
    var page_title = "Users";
    
    datatable();
    function datatable() {
        $("#userList").dataTable().fnDestroy();
        $('#userList').dataTable({
            bProcessing: true,
            bServerSide: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('load-users') }}",
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

        $("#roleList").dataTable().fnDestroy();
        $('#roleList').dataTable({
            bProcessing: true,
            bServerSide: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('load-roles') }}",
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
