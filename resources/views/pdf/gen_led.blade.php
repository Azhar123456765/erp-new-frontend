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
$data = session()->get('otherData');



$startDate = session()->get('otherData')['startDate'];
$endDate = session()->get('otherData')['endDate'];

$amount = session()->get('otherData')['amount'];
$credit = session()->get('otherData')['credit'];
$debit = session()->get('otherData')['debit'];
$account = session()->get('otherData')['account_id'];


$name = App\Models\accounts::where('account_id',$account)->get();

foreach ($name as $key => $value) {
    $name2 = $value->account_name;
}
// $startDate = $value->startDate


?>
@include('pdf.head_pdf')

<h2 style="text-align: center;">General Ledger</h2>
<div class="col-md-3"></div>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: left; ">Account:&nbsp;{{$name2 ?? ''}}</h3>
    <h3 style="text-align: right; "><?php echo date("l"); ?>,<?php echo '  ' . date('Y m d'); ?></h3>
</div>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Reference</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Credit</th>
            <th>Debit</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $sell_invoice = session()->get('gen-led-si');
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
                    <span><?php echo $row->desc; ?></span>
                </td>
                <td>
                    <span><?php echo $row->qty_total; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_paid; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->previous_balance; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>


        <?php

        $sell_invoice = session()->get('gen-led-rc');
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
                    <span><?php  ?></span>
                </td>
                <td>
                    <span><?php ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="4" style="text-align:right; border:none;"><b>Total:</b></td>
        <td><b>{{$credit}}</b></td>
        <td><b>{{$debit}}</b></td>
        <td><b>{{$amount}}</b></td>

    </tfoot>
</table>

<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d H:i:s'); ?>
</div>

</div>