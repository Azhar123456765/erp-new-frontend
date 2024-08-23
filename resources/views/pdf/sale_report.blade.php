@extends('pdf.head_pdf') @section('content')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 150px;
            /* Adjust the logo width as needed */
        }

        .address {
            font-weight: normal;
            text-align: right;
        }

        .pdf-time {
            position: fixed;
            bottom: 20px;
            left: 20px;
            font-size: 12px;
            color: #999;
        }

        .col-md-3 {
            display: flex;
            flex-direction: row;
        }
    </style>
    <?php
    // $startDate = session()->get('Data')['startDate'] ?? null;
    // $endDate = session()->get('Data')['endDate'] ?? null;
    // $total_amount = session()->get('Data')['total_amount'] ?? null;
    // $balance_amount = session()->get('Data')['balance_amount'] ?? null;
    // $credit = session()->get('Data')['credit'] ?? null;
    // $type = session()->get('Data')['type'] ?? null;
    // $qty_total = session()->get('Data')['qty_total'] ?? null;
    // $dis_total = session()->get('Data')['dis_total'] ?? null;
    // $amount_total = session()->get('Data')['amount_total'] ?? null;
    ?>


    <h2 style="text-align: center;">AL HABIB TRADERS (Sale + Purchase Report)</h2>

    <div class="row">
        {{-- <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: right; ">{{date("l")}},{{ '  ' . date('d-m-Y')}}</h3> --}}
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Narration</th>
                <th>Supplier</th>
                <th>Rate</th>
                <th>Qty</th>
                <th>Weight</th>
                <th>Amount</th>
                <th>Customer</th>
                <th>Rate</th>
                <th>Qty</th>
                <th>Weight</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>11-11-24</td>
                <td>SI-2024-12</td>
                <td>ABC CHICKEN</td>
                <td><b>AL HABIB TRADERS</b></td>
                <td>100</td>
                <td>10</td>
                <td>10</td>
                <td>1000</td>
                <td>ABC TRADERS</td>
                <td>100</td>
                <td>10</td>
                <td>10</td>
                <td>1000</td>

            </tr>
        </tbody>
    </table>
    {{-- <h3 style="text-align:right; border:none;"><b>Total Amount Of Sales:&nbsp;&nbsp;</b><span
            style="color: green;"><b>{{ $balance_amount }}</b></span>
    </h3> --}}
@endsection
