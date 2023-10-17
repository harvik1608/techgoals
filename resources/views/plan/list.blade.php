@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<div class="app-title">
    <div>
        <h1><i class="bi bi-bank"></i> Plans</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <a class="btn btn-sm btn-success" href="{{ url('plans/create') }}" style="float: right;">New Plan</a><br><br>
                <table class="table table-hover table-bordered" id="tbl">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Name</th>
                            <th width="10%">Amount</th>
                            <th width="10%">Duration</th>
                            <th width="10%">Total Visits</th>
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
    var page_title = "Plans";
    $(document).ready(function(){
        var tbl = $('#tbl').DataTable({
            "ajax": "{{ route('load-plans') }}"
        });
    });
</script>
@endsection
