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



$startDate = session()->get('Data')['startDate'] ?? null;
$endDate = session()->get('Data')['endDate'] ?? null;
$lastChar = session()->get('Data')['lastChar'] ?? null;
// $total_amount = session()->get('Data')['total_amount'] ?? null;
// $balance_amount = session()->get('Data')['balance_amount'] ?? null;
// $credit = session()->get('Data')['credit'] ?? null;
// $grand_total = session()->get('Data')['grand_total' ] ?? null;
// $debit = session()->get('Data')['debit'] ?? null;
// $customerName = session()->get('Data')['customerName'] ?? null;
// $type = session()->get('Data')['type'] ?? null;

// $querysi = session()->get('Data')['ledgerDatasi'] ?? null;
// $queryrv = session()->get('Data')['ledgerDatarv'] ?? null;
// $querypv = session()->get('Data')['ledgerDatapv'] ?? null;

?>

@include('pdf.head_pdf')

<style>
    * {
        font-family: "Poppins", sans-serif !important;
        font-size: 12px !important;
    }
</style>
<h2 style="text-align: center;">Receipt Voucher</h2>
<div class="col-md-3"></div>

<div class="row">
    <h4 style="text-align: center;">FROM: {{$startDate}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: {{$endDate}}</h4>
</div>

<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Voucher No</th>
            <th>Company</th>
            <th>Narration</th>
            <th>Contra Acount</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $total_amount = 0;
        $r_voucher = session()->get('Data')['r_voucher'] ?? null;

        if ($r_voucher != null) {
            foreach ($r_voucher as $row) {
        ?>
                <tr style="text-align: center;">
                    <td>
                        <span><?php echo $row->date; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row->unique_id; ?></span>
                    </td>
                    <td>
                        <span>
                            <?php echo $row->company_ref == 'S' ? $row->supplier->company_name : $row->buyer->company_name; ?>
                        </span>
                    </td>
                    <td style="text-align: left
                ;">
                        <span><?php echo $row->narration; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row->accounts->account_name ?? null; ?></span>
                    </td>
                    <td style="text-align:right;">
                        <span><?php echo $row->amount; ?></span>
                    </td>
                </tr>

        <?php
        $total_amount += $row->amount;
            }
        } else {
            echo 'No record Found';
        }
        ?>
    </tbody>
    <tfoot style="color: darkblue; text-align:right;">
        <td colspan="5" style="text-align:right; border:none;"><b>Total:</b></td>
        <td style="color: red; text-align: right;">{{$total_amount}}</td>

    </tfoot>
</table>
</h3>


<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d  H:i:s'); ?>
</div>

</div>