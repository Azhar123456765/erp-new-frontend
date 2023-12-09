<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
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

$pur_qty = session()->get('Data')['pur_qty'] ?? null;
$sale_qty = session()->get('Data')['sale_qty'] ?? null;
$avail_qty = session()->get('Data')['avail_qty'] ?? null;

$warehouse = session()->get('Data')['warehouse'] ?? null;
$product = session()->get('Data')['product'] ?? null;

$type = session()->get('Data')['type'] ?? null;


?>
@include('pdf.head_pdf')

<h2 style="text-align: center;">Stock Report</h2>
<div class="col-md-3"></div>
@if($type == 1)
<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: left;">Product:<span style="color:green;">&nbsp;{{$product ?? ''}}</span></h3>
    <br>
    <h3 style="text-align: left;">Warehouse:<span style="color:blue;">&nbsp;{{$warehouse ?? 'All'}}</span></h3>
    <h3 style="text-align: right;"><?php echo date("l"); ?>,<?php echo '  ' . date('d-m-Y'); ?></h3>
</div>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Unit</th>
            <th>Purchase</th>
            <th>Purchase Return</th>
            <th>Sale</th>
            <th>Sale Return</th>
            <th>Available Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pi = session()->get('Data')['pi'];
        foreach ($pi as $key => $row) {
            $si = session()->get('Data')['si'];
            foreach ($si as $key => $row2) {
        ?>
            <tr style="text-align: center; {{$row->product->opening_quantity <= 0 ? 'color: red;' : ''}} {{$row->product->opening_quantity == null ? 'color: darkgoldenrod;' : ''}}">
                <td>
                    <span><?php echo $row->product->product_name . ' ' . $row->product->category . ' COM ' . $row->product->company ?></span>
                </td>
                <td>
                    <span><?php echo $row->product->unit; ?></span>
                </td>
                <td>
                    <span><?php echo $row->total_pur_qty; ?></span>
                </td>
                <td>
                    <span><?php echo $row->total_r_pur_qty; ?></span>
                </td>
                <td>
                    <span><?php echo $row2->total_sale_qty ?></span>
                </td>
                <td>
                    <span><?php echo $row2->total_r_sale_qty ?></span>
                </td>
                <td>
                    <span><?php echo $row->product->opening_quantity ?? "(SOMETHING WENT WRONG)" ?></span>
                </td>
        <?php
        }
    }
        ?>
          
        </tr>
    </tbody>
    <!-- <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Purchase Qty:</b></td>
        <td style="border:none;"><b>{{$pur_qty}}</b></td>
    </tfoot>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Sale Qty:</b></td>
        <td style="border:none;"><b>{{$sale_qty}}</b></td>
    </tfoot>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Available Qty:</b></td>
        <td style="border:none;"><b>{{$avail_qty}}</b></td>
    </tfoot> -->

    </h3>

</table>
@elseif($type == 2)


<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: left;">Product:<span style="color:green;">&nbsp;{{$product ?? 'All'}}</span></h3>
    <br>
    <h3 style="text-align: left;">Warehouse:<span style="color:blue;">&nbsp;{{$warehouse ?? 'All'}}</span></h3>
    <h3 style="text-align: right;"><?php echo date("l"); ?>,<?php echo '  ' . date('d-m-Y'); ?></h3>
</div>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Reference</th>
            <th>Company</th>
            <th>Product</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = session()->get('Data')['query'];
        foreach ($query as $row) {
        ?>
            <tr style="text-align: center;">
                <td>
                    <span><?php echo $row->date; ?></span>
                </td>
                <td>
                    <span><?php echo $row->unique_id; ?></span>
                </td>
                <td>
                    <span>{{$row->customer->company_name}}</span>
                </td>
                <td style="text-align: left">
                    <span>{{$row->product->product_name}}</span>
                </td>
                <td style="text-align:right;">
                    <span>- <?php echo $row->sale_qty; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>
        <?php
        $query2 = session()->get('Data')['query2'];
        foreach ($query2 as $row) {
        ?>
            <tr style="text-align: center;">
                <td>
                    <span><?php echo $row->date; ?></span>
                </td>
                <td>
                    <span><?php echo $row->unique_id; ?></span>
                </td>
                <td>
                    <span>{{$row->supplier->company_name}}</span>
                </td>
                <td style="text-align: left
        ;">
                    <span><?php echo $row->product->product_name; ?></span>
                </td>
                <td style="text-align:right;">
                    <span>+ <?php echo $row->pur_qty; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Purchase Qty:</b></td>
        <td style="border:none;"><b>{{$pur_qty}}</b></td>
    </tfoot>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Sale Qty:</b></td>
        <td style="border:none;"><b>{{$sale_qty}}</b></td>
    </tfoot>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Available Qty:</b></td>
        <td style="border:none;"><b>{{$avail_qty}}</b></td>
    </tfoot>

    </h3>

</table>


@endif
<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d H:i:s'); ?>
</div>

</div>