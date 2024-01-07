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
$data = session()->get('Data');



$startDate = session()->get('Data')['startDate'];
$endDate = session()->get('Data')['endDate'];


$account = session()->get('Data')['account'];

$ledgerDatasi = session()->get('Data')['ledgerDatasi'];
$ledgerDatarv = session()->get('Data')['ledgerDatarv'];
$ledgerDatapi = session()->get('Data')['ledgerDatapi'];
$ledgerDatapv = session()->get('Data')['ledgerDatapv'];

$type = session()->get('Data')['type'];


$name = App\Models\accounts::where('account_id', $account)->get();

foreach ($name as $key => $value) {
    $name2 = $value->account_name;
}
// $startDate = $value->startDate


?>
@include('pdf.head_pdf')

<h2 style="text-align: center;">General Ledger {{$type == 1 ? '(Summary)' : '(Detail Wise)'}}</h2>
<div class="col-md-3"></div>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
    <h3 style="text-align: left; ">Account:&nbsp;{{$name2 ?? ''}}</h3>
    <h3 style="text-align: right; "><?php echo date("l"); ?>,<?php echo '  ' . date('d-m-Y'); ?></h3>
</div>
@if($type == 1)
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Reference</th>
            <th>Remarks</th>
            <th>Qty</th>
            <th>Credit</th>
            <th>Debit</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($ledgerDatasi as $row) {
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
                <td style="text-align:right;">
                    <span>0.00</span>
                </td>

                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>

        <?php

        foreach ($ledgerDatarv as $row) {
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
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>

        <?php

        foreach ($ledgerDatapi as $row) {
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
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.00</span>
                </td>

            </tr>
        <?php
        }
        ?>


        <?php

        foreach ($ledgerDatapv as $row) {
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
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount_total; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.00</span>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="text-align:right; border: none !important; ">Total:</td>
            <td style="color: red; text-align: right;">{{$credit = $ledgerDatapi->sum('amount_total')+$ledgerDatapv->sum('amount_total')}}</td>
            <td style="color: green; text-align: right;">{{$debit = $ledgerDatasi->sum('amount_total')+$ledgerDatarv->sum('amount_total')}}</td>
        </tr>
    </tfoot>
    <h5 style="text-align: right; color: blue;">Profit: {{$debit - $credit}}</h5></table>
@elseif($type ==2 )
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Reference</th>
            <th>Product / Narration</th>
            <th>Qty</th>
            <th>Credit</th>
            <th>Debit</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($ledgerDatasi as $row) {
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
                    <span><?php echo $row->product_name; ?></span>
                </td>
                <td>
                    <span><?php echo $row->qty; ?></span>
                </td>
                <td style="text-align:right;">
                    <span>0.00</span>
                </td>

                <td style="text-align:right;">
                    <span><?php echo $row->amount; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>

        <?php

        foreach ($ledgerDatarv as $row) {
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
                    <span><?php echo $row->narration; ?></span>
                </td>
                <td>
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount; ?></span>
                </td>
            </tr>
        <?php
        }
        ?>

        <?php

        foreach ($ledgerDatapi as $row) {
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
                    <span><?php echo $row->qty ?? 0; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.00</span>
                </td>

            </tr>
        <?php
        }
        ?>


        <?php

        foreach ($ledgerDatapv as $row) {
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
                    <span><?php echo $row->narration; ?></span>
                </td>
                <td>
                    <span><?php  ?>0.00</span>
                </td>
                <td style="text-align:right;">
                    <span><?php echo $row->amount; ?></span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.00</span>
                </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
        <td colspan="4" style="text-align:right; border: none !important; ">Total:</td>
            <td style="color: red; text-align: right;">{{$credit = $ledgerDatapi->sum('amount')+$ledgerDatapv->sum('amount')}}</td>
            <td style="color: green; text-align: right;">{{$debit = $ledgerDatasi->sum('amount')+$ledgerDatarv->sum('amount')}}</td>
        </tr>
    </tfoot>
    <h5 style="text-align: right; color: blue;">Profit: {{$debit - $credit}}</h5>
</table>
@endif
<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d H:i:s'); ?>
</div>

</div>