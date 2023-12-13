@extends('master') @section('title','Dashboard') @section('content')
@php
$endDate = date('Y-m-d');
$startDate = date('Y-m-d', strtotime("-1 year", strtotime($endDate)));
@endphp
<div class="container">
    <br>
    @if(session()->get('user_id')['role'] == 'user')

    <h3>User's Dashboard</h3>
    @elseif(session()->get('user_id')['role'] == 'admin')
    <style>
        .date {
            border: none;
            outline: none;
            background: transparent;
        }
    </style>
    <label for="">Start Date:</label>
    <input type="date" class="date" name="start_date" id="start_date" onchange="date()" value="{{$startDate}}">
    &nbsp;&nbsp;&nbsp;
    <label for="">End Date:</label>
    <input type="date" class="date" name="end_date" id="end_date" onchange="date()" value="{{$endDate}}">

    @endif
    <br><br>

    <div class="row m-t-25" style="text-transform: capitalize;">

        @if(session()->get('user_id')['role'] == 'user')
        <div class="col-md-12">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total No of records you input</span>
                    <span class="info-box-number">{{session()->get('user_id')['no_records']}}</span>
                </div>
            </div>
        </div>
        @elseif(session()->get('user_id')['role'] == 'admin')
        <div class="col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">items Purchase</span>
                    <span class="info-box-number" id="pur_qty">{{$sell_invoice_qty}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-truck"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">items Sale</span>
                    <span class="info-box-number" id="sell_qty">{{$sell_invoice_qty}}</span>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" onclick="expense()">Total Expense <a href="#">(Click For more details)</a></span>
                    <span class="info-box-number" id="expense">{{$expense}}&nbsp;Rs</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-money-bill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text" onclick="income()">Total Earning <a href="#">(Click For more details)</a></span>
                    <span class="info-box-number" id="earning">{{$earning}}&nbsp;Rs</span>
                </div>
            </div>
        </div>

    </div>
    @endif

    <div class="row">


        <!-- <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <h3 class="title-2 m-b-40">Yearly Income</h3>
                    <canvas id="team-chart2" height="195" style="display: block; width: 390px; height: 195px;" width="390" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div> -->


        <!-- 
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <h3 class="title-2 m-b-40">Yearly Sales</h3>
                    <canvas id="sales-chart" height="195" style="display: block; width: 390px; height: 195px;" width="390" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div> -->

    </div>






    <!-- <div class="col-lg-6">
        <div class="au-card m-b-30">
        <h3 class="title-2 m-b-40">Yearly Sales</h3>

            <div class="au-card-inner">
                <canvas id="sales-chart1" height="195" width="390"></canvas>
            </div>
        </div>
    </div> -->

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    //Team chart
    var ctx = document.getElementById("team-chart2").getContext('2d');
    if (ctx) {


        var chartData = <?php
                        echo json_encode($chartData);
                        ?>;
        var chartData2 = <?php
                            echo json_encode($chartData2);
                            ?>;

        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(chartData + chartData2).map(month => getMonthName(month)),
                type: 'line',
                defaultFontFamily: 'Poppins',
                datasets: [{
                    data: Object.values(chartData),
                    label: "Earning",
                    backgroundColor: 'green',
                    borderColor: 'green',
                    borderWidth: 3.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'lightgreen',

                }, {


                    label: "Expense",
                    data: Object.values(chartData2),
                    backgroundColor: 'red',
                    borderColor: 'red',
                    borderWidth: 3.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'red',


                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Poppins',
                    bodyFontFamily: 'Poppins',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Poppins',
                    },


                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        ticks: {
                            fontFamily: "Poppins"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value',
                            fontFamily: "Poppins"
                        },
                        ticks: {
                            fontFamily: "Poppins"
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });
    }





























    //Sales chart
    var ctx = document.getElementById("sales-chart1");
    if (ctx) {
        ctx.height = 150;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                type: 'line',
                defaultFontFamily: 'Poppins',
                datasets: [{
                    label: "Foods",
                    data: [0, 30, 10, 120, 50, 63, 10],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(220,53,69,0.75)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(220,53,69,0.75)',
                }, {
                    label: "Electronics",
                    data: [0, 50, 40, 80, 40, 79, 120],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(40,167,69,0.75)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(40,167,69,0.75)',
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Poppins',
                    bodyFontFamily: 'Poppins',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Poppins',
                    },
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        ticks: {
                            fontFamily: "Poppins"
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value',
                            fontFamily: "Poppins"

                        },
                        ticks: {
                            fontFamily: "Poppins"
                        }
                    }]
                },
                title: {
                    display: false,
                    text: 'Normal Legend'
                }
            }
        });
    }


    function getMonthName(month) {
        var months = [
            "January", "February", "March", "April", "May", "June", "July",
            "August", "September", "October", "November", "December"
        ];
        return months[month - 1];
    }

    function date() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $('#sell_qty').text('loading...');
        $('#pur_qty').text('loading...');
        $('#expense').text('loading...');
        $('#earning').text('loading...');

        $.ajax({
            url: '/dashboard',
            method: 'POST',
            data: {
                start_date: start_date,
                end_date: end_date
            },
            success: function(response) {
                $('#sell_qty').text(response.sell_qty);
                $('#pur_qty').text(response.pur_qty);
                $('#expense').text(response.expense + ' Rs');
                $('#earning').text(response.earning + ' Rs');
            },
            error: function(error) {
                // Handle the error
            },
        });
    }

    function expense() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        window.location.href = `expense?start_date=` + start_date+`&end_date=` + end_date+``
    }

    function income() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        window.location.href = `income?start_date=` + start_date+`&end_date=` + end_date+``
    }
</script>
@endsection