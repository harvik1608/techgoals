@extends('layouts.header')
@section('content')
<style>
    #go-btn {
        margin-top: 35px !important;
    }
</style>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Dashboard</h4>
                    <!-- <div class="form-group mb-0 vanila-daterangepicker d-flex flex-row">
                        <div class="date-icon-set">
                            <input type="text" name="start" class="form-control" placeholder="From Date">
                            <span class="search-link">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </div>                  
                        <span class="flex-grow-0">
                            <span class="btn">To</span>
                        </span>
                        <div class="date-icon-set">
                            <input type="text" name="end" class="form-control" placeholder="To Date">
                            <span class="search-link">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </div>                  
                    </div> -->
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Pipelines</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold">0</h5>
                                            <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p> -->
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Active Leads</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                           <h5 class="mb-0 font-weight-bold">0</h5>
                                           <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+2.67%</p> -->
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                       <p class="mb-2 text-secondary">Customers</p>
                                       <div class="d-flex flex-wrap justify-content-start align-items-center">
                                          <h5 class="mb-0 font-weight-bold">0</h5>
                                          <!-- <p class="mb-0 ml-3 text-danger font-weight-bold">-9.98%</p> -->
                                       </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Application</h4>
                        </div>
                        <!-- <div class="header-action">
                            <i data-toggle="collapse" data-target="#form-select-1" aria-expanded="false">
                                <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </i>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pipeline</label>
                                <select class="form-control choicesjs" id="sel2" name="pipeline" multiple>
                                    <option>Select pipeline</option>
                                    <option>Personal Loan</option>
                                    <option>Offline DSA</option>
                                    <option>Test1</option>
                                    <option>Credit Card</option>
                                 </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Source</label>
                                <select class="form-control choicesjs" id="sel2" name="pipeline" multiple>
                                    <option>Credit Card Default</option>
                                    <option>New Loan</option>
                                 </select>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-primary" id="go-btn">Go</button>
                            </div>
                            <div class="col-lg-3">
                                <div class="date-icon-set">
                                    <input type="text" name="end" class="form-control" placeholder="To Date">
                                    <span class="search-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </div>  
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="mb-2 text-secondary">New Lead</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0 lacs</h5>
                                                            <p class="mb-0 ml-3 text-success font-weight-bold">0 App.</p>
                                                        </div>                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="mb-2 text-secondary">Logged</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0 lacs</h5>
                                                            <p class="mb-0 ml-3 text-success font-weight-bold">0 App.</p>
                                                        </div>                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="mb-2 text-secondary">Approved</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0 lacs</h5>
                                                            <p class="mb-0 ml-3 text-success font-weight-bold">0 App.</p>
                                                        </div>                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="mb-2 text-secondary">Disbursed</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0 lacs</h5>
                                                            <p class="mb-0 ml-3 text-success font-weight-bold">0 App.</p>
                                                        </div>                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <p class="mb-2 text-secondary">Reject</p>
                                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                                            <h5 class="mb-0 font-weight-bold">0 lacs</h5>
                                                            <p class="mb-0 ml-3 text-success font-weight-bold">0 App.</p>
                                                        </div>                             
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary btn-sm">New Lead</button>&nbsp;
                                <button class="btn btn-success btn-sm">Logged</button>&nbsp;
                                <button class="btn btn-success btn-sm">Approved</button>&nbsp;
                                <button class="btn btn-success btn-sm">Disbursed</button>&nbsp;
                                <button class="btn btn-success btn-sm">Reject</button>&nbsp;
                            </div><br><br><br>
                            <div class="col-lg-12">
                                <canvas id="application-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Lenders</h4>
                        </div>
                        <!-- <div class="header-action">
                            <i data-toggle="collapse" data-target="#form-select-1" aria-expanded="false">
                                <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </i>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pipeline</label>
                                <select class="form-control choicesjs" id="sel2" name="pipeline" multiple>
                                    <option>Select pipeline</option>
                                    <option>Personal Loan</option>
                                    <option>Offline DSA</option>
                                    <option>Test1</option>
                                    <option>Credit Card</option>
                                 </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Source</label>
                                <select class="form-control choicesjs" id="sel2" name="pipeline" multiple>
                                    <option>Credit Card Default</option>
                                    <option>New Loan</option>
                                 </select>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-primary" id="go-btn">Go</button>
                            </div>
                            <div class="col-lg-3">
                                <div class="date-icon-set">
                                    <input type="text" name="end" class="form-control" placeholder="To Date">
                                    <span class="search-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </div>  
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th align="center"><center>Name</center></th>
                                                <th><center>Logged</center></th>
                                                <th><center>Approved</center></th>
                                                <th><center>Disbursed</center></th>
                                                <th><center>Reject</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td><table width="100%"><tbody><tr><td>Nos</td><td align="right">Amount</td></tr></tbody></table></td>
                                                <td><table width="100%"><tbody><tr><td>Nos</td><td align="right">Amount</td></tr></tbody></table></td>
                                                <td><table width="100%"><tbody><tr><td>Nos</td><td align="right">Amount</td></tr></tbody></table></td>
                                                <td><table width="100%"><tbody><tr><td>Nos</td><td align="right">Amount</td></tr></tbody></table></td>
                                            </tr>
                                            @if($lenders)
                                                @foreach($lenders as $lender)
                                                    <tr>
                                                        <td>{{ $lender['name'] }}</td>
                                                        <td><table width="100%"><tbody><tr><td>0</td><td align="right">0,00,000</td></tr></tbody></table></td>
                                                        <td><table width="100%"><tbody><tr><td>0</td><td align="right">0,00,000</td></tr></tbody></table></td>
                                                        <td><table width="100%"><tbody><tr><td>0</td><td align="right">0,00,000</td></tr></tbody></table></td>
                                                        <td><table width="100%"><tbody><tr><td>0</td><td align="right">0,00,000</td></tr></tbody></table></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary btn-sm">New Lead</button>&nbsp;
                                <button class="btn btn-success btn-sm">Logged</button>&nbsp;
                                <button class="btn btn-success btn-sm">Approved</button>&nbsp;
                                <button class="btn btn-success btn-sm">Disbursed</button>&nbsp;
                                <button class="btn btn-success btn-sm">Reject</button>&nbsp;
                            </div><br><br><br>
                            <div class="col-lg-12">
                                <canvas id="lender-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Clients</h4>
                        </div>
                        <!-- <div class="header-action">
                            <i data-toggle="collapse" data-target="#form-select-1" aria-expanded="false">
                                <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </i>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Pipeline</label>
                                <select class="form-control choicesjs" id="sel2" name="pipeline" multiple>
                                    <option>Select pipeline</option>
                                    <option>Personal Loan</option>
                                    <option>Offline DSA</option>
                                    <option>Test1</option>
                                    <option>Credit Card</option>
                                 </select>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-sm btn-primary" id="go-btn">Go</button>
                            </div>
                                <div class="col-lg-3" style="float: right;">
                                    <div class="date-icon-set">
                                        <label>Date</label>
                                        <input type="date" name="end" class="form-control" placeholder="To Date">
                                        <!-- <span class="search-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </span> -->
                                    </div>  
                                </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tbl" class="table data-table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Source Link Name</th>
                                                <th>Leads Created</th>
                                                <th>Last Lead Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:;">PHYSICAL MARKETING</a></td>
                                                <td>21</td>
                                                <td>30-Oct-2023 12:38:53</td>
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
<script src="{{ asset('assets/js/chart.js') }}"></script>
<script type="text/javascript">
    var page_title = "Dashboard";
    const applicationData = {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            datasets: [{
                label: '',
                data: [65, 59, 80, 81, 56, 55, 40,78,45,95,47,88,12],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    }
    const salesChartCtx = document.getElementById('application-chart');
    new Chart(salesChartCtx, applicationData);

    const lenderData = {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            datasets: [{
                label: '',
                data: [65, 59, 80, 81, 56, 55, 40,78,45,95,47,88,12],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    }
    const salesChartCtx1 = document.getElementById('lender-chart');
    new Chart(salesChartCtx1, lenderData);
</script>
@endsection
