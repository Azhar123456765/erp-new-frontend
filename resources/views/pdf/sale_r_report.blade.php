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
$startDate = session()->get('Data')['startDate'] ?? null;
$endDate = session()->get('Data')['endDate'] ?? null;
$total_amount = session()->get('Data')['total_amount'] ?? null;
$balance_amount = session()->get('Data')['balance_amount'] ?? null;
$credit = session()->get('Data')['credit'] ?? null;
$type = session()->get('Data')['type'] ?? null;
$qty_total = session()->get('Data')['qty_total'] ?? null;
$dis_total = session()->get('Data')['dis_total'] ?? null;
$amount_total = session()->get('Data')['amount_total'] ?? null;
?>


@if($type == 1)
<h2 style="text-align: center;">Sale Report</h2>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: right; ">{{date("l")}},{{ '  ' . date('d-m-Y')}}</h3>
</div>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Invoice No</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Cartage</th>
            <th>Previous Balance</th>
            <th>total Amount</th>
            <th>amount Paid</th>
            <th>Balance Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sell_invoice = session()->get('Data')["invoice"];

        if ($sell_invoice != null) {
            # code...
            foreach ($sell_invoice as $row) {
        ?>
                <tr style="text-align: center;">
                    <td>
                        <span>{{$row->date}}</span>
                    </td>
                    <td>
                        <span>{{$row->unique_id}}</span>
                    </td>
                    <td style="text-align: left
                ;">
                        <span>{{$row->remark}}</span>
                    </td>
                    <td>
                        <span>{{$row->qty_total}}</span>
                    </td>
                    <td>
                        <span>{{$row->cartage}}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{$row->previous_balance}}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{$row->amount_total}}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{$row->amount_paid}}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{$row->balance_amount}}</span>
                    </td>
                </tr>

        <?php
            }
        } else {
            echo 'No record Found';
        }
        ?>
    </tbody>
</table>
<h3 style="text-align:right; border:none;"><b>Total Amount Of Sales:&nbsp;&nbsp;</b><span style="color: green;"><b>{{$balance_amount}}</b></span>
</h3>
@elseif($type == 2)

<h2 style="text-align: center;">Sale Report (Detail Wise)</h2>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: right; ">{{date("l")}},{{ '  ' . date('d-m-Y')}}</h3>
</div>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Invoice No</th>
            <th>Book No</th>
            <th>Product Name</th>
            <th>Per Price</th>
            <th>Qty</th>
            <th>Discount</th>
            <th>total Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sell_invoice = session()->get('Data')["invoice"];

        if ($sell_invoice != null) {
            $unique_ids_seen = []; // Keep track of unique_ids already processed

            foreach ($sell_invoice as $key => $row) {
                $pr = $row->unique_id;
                // Check if this unique_id has been processed before
                if ($pr == $row->unique_id[$key - 1]) {
                    // Add the gap for the first occurrence of this unique_id
        ?>
                    <tr>
                        <td colspan="8" style="border: none !important;">&nbsp;</td>
                    </tr>
                <?php

                    $id = $row->unique_id;
                    $unique_ids_seen[] = $row->unique_id;
                }
                $couple = false;

                ?>
                <td style="{{$couple == true ? 'display:none;' : '' }} border:none; color: blue;">{{$row->customer->company_name}}</td>
                <tr style="text-align: center;">
                    <td>
                        <span style="width:8px;">{{$row->date}}</span>
                    </td>
                    <td>
                        <span>{{$row->unique_id}}</span>
                    </td>
                    <td>
                        <span>{{$row->book}}</span>
                    </td>
                    <td style="text-align: left;">
                        <span>{{$row->product->product_name}}</span>
                    </td>
                    <td>
                        <span>{{$row->sale_price}}</span>
                    </td>
                    <td>
                        <span>{{$row->sale_qty}}</span>
                    </td>
                    <td>
                        <span>{{$row->dis_amount}}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{$row->amount}}</span>
                    </td>
                </tr>
    <tfoot style="{{ $couple == false ? 'display:none;' : '' }} color: green; font-weight: bolder ;">
        <tr>
            <td colspan="5" style="text-align:right; border: none !important; ">Invoice# {{$row->unique_id}} Total:</td>
            <td style="text-align:center;  background-color: lightgray;">{{$row->qty_total}}</td>
            <td style="text-align:center; background-color: lightgray;">{{$row->dis_total}}</td>
            <td style="text-align:right; background-color: lightgray;">{{$row->amount_total}}</td>
        </tr>
    </tfoot>

    <tfoot style="{{ $couple == true ? 'display:none;' : '' }} color: green; font-weight: bolder ;">
        <tr>
            <td colspan="5" style="text-align:right; border: none !important; ">Invoice# {{$row->unique_id}} Total:</td>
            <td style="text-align:center;  background-color: lightgray;">{{$row->qty_total}}</td>
            <td style="text-align:center; background-color: lightgray;">{{$row->dis_total}}</td>
            <td style="text-align:right; background-color: lightgray;">{{$row->amount_total}}</td>
        </tr>
    </tfoot>

<?php

                $couple = true;
                $id = $row->unique_id;
            }
        } else {
            echo 'No record Found';
        }
?>
</tbody>
<tfoot style="{{ $couple == false ? 'display:none;' : '' }} color: blue; font-weight: bolder ;">
    <tr>
        <td colspan="5" style="text-align:right; border: none !important; ">Grand Total:</td>
        <td style="text-align:center;  background-color: lightgray;">{{$qty_total}}</td>
        <td style="text-align:center; background-color: lightgray;">{{$dis_total}}</td>
        <td style="text-align:right; background-color: lightgray;">{{$amount_total}}</td>
    </tr>
</tfoot>
</table>


@endif

@endsection