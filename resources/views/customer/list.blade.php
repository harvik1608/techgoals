@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<div class="app-title">
    <div>
        <h1><i class="bi bi-people"></i> Customers</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="form-label">Whatsapp No.</label>
                            <input type="text" id="whatsapp_no" class="form-control" placeholder="Search by whatsapp no." />
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="Search by email" />
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label">Kids</label>
                            <select class="form-control" id="kids" id="kids">
                                <option value="">Option</option>
                                <?php
                                    for($i = 1; $i <= 10; $i ++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';   
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label">Reference</label>
                            <select class="form-control" name="reference" id="reference">
                                <option value="">Option</option>
                                <option value="1">WOM</option>
                                <option value="2">Newspaper</option>
                                <option value="3">Social Media</option>
                                <option value="4">Old Customer</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label">Month</label>
                            <select class="form-control" name="month" id="month">
                                <option value="">Option</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-3">
                            <button type="button" class="btn btn-primary btn-sm" id="searchbtn">Search</button>
                        </div>
                    </div>
                </form><br><br>
                <a class="btn btn-sm btn-success" href="{{ url('customers/create') }}" style="float: right;">New Customer</a><br><br>
                <table class="table table-hover table-bordered" id="tbl">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Name</th>
                            <th width="15%">Email</th>
                            <th width="15%">Phone</th>
                            <th width="15%">Whatsapp No.</th>
                            <th width="10%">DOB</th>
                            <th width="15%">Anni. Date</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
    var page_title = "Customers";
    $(document).ready(function(){
        var tbl = $('#tbl').DataTable({
            "ajax": "{{ route('load-customers') }}"
        });
        $(document).on("click","#searchbtn",function(){
            $.ajax({
                url: "{{ route('filter-customer') }}",
                type: "get",
                data:{
                    whatsapp_no: $("#whatsapp_no").val()
                },
                success:function(response){
                    $("#dailyNews").dataTable().fnDestroy()
                    tbl.destroy();

                }
            });
        });
    });
</script>
@endsection
