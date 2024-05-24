@extends('master') @section('title', 'Dashboard') @section('content')
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
                            <span class="info-box-text" onclick="expense()">Total Expense <a href="#">(Click For more
                                    details)</a></span>
                            <span class="info-box-number" id="expense">{{$expense}}&nbsp;Rs</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-money-bill"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" onclick="income()">Total Earning <a href="#">(Click For more
                                    details)</a></span>
                            <span class="info-box-number" id="earning">{{$earning}}&nbsp;Rs</span>
                        </div>
                    </div>
                </div>

            </div>
        @endif

    <div class="row p-3">


        <div class="col-lg-6 rounded-2 shadow bg-white p-4">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <h3 class="title-2 m-b-40">Yearly Income</h3>
                    <canvas id="team-chart2" height="195" style="display: block; width: 390px; height: 195px;"
                        width="390" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>



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
    <div class="col-md-12">
        <div class="form-group">
            <label>Select Contra Account</label>
            <select class="form-control select-account" name="contra_account">

            </select>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


@endsection