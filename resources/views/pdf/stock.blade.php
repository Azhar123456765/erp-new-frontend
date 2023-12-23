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
$pi = session()->get('Data')['pi'];
$si = session()->get('Data')['si'];

?>
@include('pdf.head_pdf')

<h2 style="text-align: center;">Stock Report</h2>
<div class="col-md-3"></div>
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
            <th>Avail Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($pi as $key => $row) {
            $pqty = App\Models\purchase_invoice::where('item', $row->product->product_id)->sum('pur_qty');
            $sqty = App\Models\sell_invoice::where('item', $row->product->product_id)->sum('sale_qty');
            $avail_qty = $pqty - $sqty;
        ?>
            <tr style="text-align: center; {{$avail_qty <= 0 ? 'color: red;' : ''}} {{$avail_qty >= 100 ? 'color: green;' : ''}} {{$row->product->opening_quantity == null ? 'color: goldenyellow;' : ''}}">
                <td style="text-align: left;">
                    <span><?php echo $row->product->product_name ?></span>
                </td>
                <td>
                    <span><?php echo $row->product->unit; ?></span>
                </td>
                <td>
                    <span><?php $qty = App\Models\purchase_invoice::where('item', $row->product->product_id)->sum('pur_qty');
                            echo $qty; ?></span>
                </td>
                <td>
                    <span><?php $qty = App\Models\purchase_invoice::where('item', $row->product->product_id)->sum('return_qty');
                            echo $qty; ?></span>
                </td>
                <td>
                    <span><?php $qty = App\Models\sell_invoice::where('item', $row->product->product_id)->sum('sale_qty');
                            echo $qty; ?></span>
                </td>
                <td>
                    <span><?php $qty = App\Models\sell_invoice::where('item', $row->product->product_id)->sum('return_qty');
                            echo $qty; ?></span>
                </td>
                <td>
                    <span><?php

                            echo $avail_qty;
                            ?></span>
                </td>
            <?php
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

<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d H:i:s'); ?>
</div>

</div>