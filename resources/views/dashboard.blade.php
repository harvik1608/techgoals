@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Month Wise Customers</h3>
            <div class="ratio ratio-16x9">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('assets/js/plugins/chart.js') }}"></script>
<script type="text/javascript">
    var page_title = "Dashboard";

    const salesData = {
        type: "line",
        data: {
            labels: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ],
            datasets: [{
                label: 'Month Wise Customers',
                data: "<?php print_r ($data); ?>",
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    }
    const salesChartCtx = document.getElementById('salesChart');
    new Chart(salesChartCtx, salesData);
</script>
@endsection
