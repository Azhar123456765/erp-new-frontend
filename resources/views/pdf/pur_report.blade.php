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
// $data = session()->get('Data');



$startDate = session()->get('Data')['startDate'];
$endDate = session()->get('Data')['endDate'];
$total_amount = session()->get('Data')['total_amount'];
$balance_amount = session()->get('Data')['balance_amount'];
$credit = session()->get('Data')['credit'];
$type = session()->get('Data')['type'];

$qty_total = session()->get('Data')['qty_total'] ?? null;
$dis_total = session()->get('Data')['dis_total'] ?? null;
$amount_total = session()->get('Data')['amount_total'] ?? null;
// $name = App\Models\accounts::where('account_id',$account)->get();

// foreach ($name as $key => $value) {
//     $name2 = $value->account_name;
// }
// // $startDate = $value->startDate


?>
@include('pdf.head_pdf')

<style>
    * {
        font-family: "Poppins", sans-serif !important;
        font-size: 12px !important;
    }
</style>
<h2 style="text-align: center;">Purchase Report</h2>
<div class="col-md-3"></div>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: right; "><?php echo date("l"); ?>,<?php echo '  ' . date('d-m-Y'); ?></h3>
</div>
@if($type == 1)

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Invoice No</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Total Discount Amount</th>
            <th>Sales Tax</th>
            <th>total Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sell_invoice = session()->get('Data')['invoice'];
        print_r($sell_invoice);
        if ($sell_invoice != null) {
            # code...
            foreach ($sell_invoice as $row) {
        ?>
                <tr style="text-align: center;">
                    <td>
                        <span><?php echo $row->date; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row->unique_id; ?></span>
                    </td>
                    <td style="text-align: left
                ;">
                        <span><?php echo $row->remark; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row->qty_total; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row->dis_amount; ?></span>
                    </td>
                    <td style="text-align:right;">
                        <span><?php echo $row->sales_tax; ?></span>
                    </td>
                    <td style="text-align:right;">
                        <span><?php echo $row->amount_total; ?></span>
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
<h3 style="text-align:right; border:none;"><b>Total Amount Of Purchase With Tax:&nbsp;&nbsp;</b><span style="color: green;"><b>{{$balance_amount}}</b></span>
</h3>

@elseif($type == 2)

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
        $unique_ids = [];
        $last_unique_id = null;
        $last_row_key = null;

        foreach ($sell_invoice as $key => $row) {

            if ($last_unique_id !== $row->unique_id) {
                // Add tfoot for the last row of the previous group
                if ($last_row_key !== null) {
                    echo '                    <tr>
                    <td colspan="8" style="border: none !important;">&nbsp;</td>
                </tr>';
                }

                // Update the last_unique_id and last_row_key for the next iteration
                $last_unique_id = $row->unique_id;
                $last_row_key = $key;
            }

            $last_unique_id = $row->unique_id;
            $next_key = $key + 1;
            $next_unique_id = isset($sell_invoice[$next_key]) ? $sell_invoice[$next_key]->unique_id : null;

            if ($next_unique_id !== $row->unique_id || $next_key === count($sell_invoice) - 1) {
        ?>


            <?php } ?>

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
            <?php
            if ($next_unique_id !== $row->unique_id || $next_key === count($sell_invoice) - 1) {
            ?>
    <tfoot style="color: green; font-weight: bolder ;">
        <tr>
            <td colspan="5" style="text-align:right; border: none !important; "><span style="color:blue;">{{$row->supplier->company_name}}'s</span> &nbsp; Invoice# {{$row->unique_id}} Total:</td>
            <td style="text-align:center;  background-color: lightgray;">{{$row->qty_total}}</td>
            <td style="text-align:center; background-color: lightgray;">{{$row->dis_total}}</td>
            <td style="text-align:right; background-color: lightgray;">{{$row->amount_total}}</td>
        </tr>
    </tfoot>
<?php
            }
        }
?>


</tbody>

<tfoot style="color: blue; font-weight: bolder ;">
    <tr>
        <td colspan="5" style="text-align:right; border: none !important; ">Grand Total:</td>
        <td style="text-align:center;  background-color: lightgray;">{{$qty_total}}</td>
        <td style="text-align:center; background-color: lightgray;">{{$dis_total}}</td>
        <td style="text-align:right; background-color: lightgray;">{{$amount_total}}</td>
    </tr>
</tfoot>

</table>

@endif

<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d  H:i:s'); ?>
</div>

</div>