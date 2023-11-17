@extends('layouts.header')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Stage Templates</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <p class="mb-2 text-secondary">
                                                    Test
                                                </p>
                                                <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                    <h5 class="mb-0 font-weight-bold">5 Stages</h5>
                                                    <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                                </div>                            
                                            </div>
                                        </div>
                                        <hr>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>New Lead</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" placeholder="New Lead" /></td>
                                                </tr>
                                            </tbody>
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
</div>
<script type="text/javascript">
    var page_title = "Stage Templates";
</script>
@endsection
