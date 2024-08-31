<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
$type = session()->get('Data')['type'] ?? null;
$chickenData = session()->get('Data')['chickenData'];
$chickData = session()->get('Data')['chickData'];
$feedData = session()->get('Data')['feedData'];
?>
@include('pdf.head_pdf')


<h2 style="text-align: center;">Purchase Report</h2>
<div class="col-md-3"></div>

<div class="row">
        <h4 style="text-align: center;">FROM: {{ (new DateTime($startDate))->format('d-m-Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
            {{ (new DateTime($endDate ))->format('d-m-Y') }}</h4>
    <h3 style="text-align: right; "><?php echo date('l'); ?>,<?php echo '  ' . date('d-m-Y'); ?></h3>
</div>
@if ($type == 1)
    @if (count($chickenData) > 0)
        <h4><b>Chickens</b></h4>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Invoice No</th>
                    <th>Supplier Name</th>
                    <th>Crate Qty</th>
                    <th>Gross Weight</th>
                    <th>Net Weight</th>
                    <th>Rate</th>
                    <th>total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chickenData as $row)
                    <tr style="text-align: center;">
                        <td>
                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                        </td>
                        <td>
                            <span>CK-{{ $row->unique_id }}</span>
                        </td>
                        <td style="text-align: left
        ;">
                            <span>{{ $row->supplier->company_name }}</span>
                        </td>
                        <td>
                            <span>{{ $row->crate_qty }}</span>
                        </td>
                        <td>
                            <span>{{ $row->gross_weight }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->net_weight }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->rate }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->amount }}</span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h3 style="text-align:right; border:none;"><b>Total Amount Of Purchase:&nbsp;&nbsp;</b><span
                style="color: green;"><b>{{ $chickenData->sum('amount') }}</b></span>
        </h3>
    @endif
    @if (count($chickData) > 0)
        <h4><b>Chicks</b></h4>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Invoice No</th>
                    <th>Supplier Name</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Bonus</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chickData as $row)
                    <tr style="text-align: center;">
                        <td>
                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                        </td>
                        <td>
                            <span>C-{{ $row->unique_id }}</span>
                        </td>
                        <td style="text-align: left
        ;">
                            <span>{{ $row->supplier->company_name }}</span>
                        </td>
                        <td>
                            <span>{{ $row->rate }}</span>
                        </td>
                        <td>
                            <span>{{ $row->discount }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->bonus }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->qty }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->amount }}</span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h3 style="text-align:right; border:none;"><b>Total Amount Of Purchase:&nbsp;&nbsp;</b><span
                style="color: green;"><b>{{ $chickData->sum('amount') }}</b></span>
        </h3>
    @endif
    @if (count($feedData) > 0)
        <h4><b>Feed</b></h4>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Invoice No</th>
                    <th>Supplier Name</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Bonus</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedData as $row)
                    <tr style="text-align: center;">
                        <td>
                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                        </td>
                        <td>
                            <span>F-{{ $row->unique_id }}</span>
                        </td>
                        <td style="text-align: left
        ;">
                            <span>{{ $row->supplier->company_name }}</span>
                        </td>
                        <td>
                            <span>{{ $row->rate }}</span>
                        </td>
                        <td>
                            <span>{{ $row->discount }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->bonus }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->qty }}</span>
                        </td>
                        <td style="text-align:right;">
                            <span>{{ $row->amount }}</span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h3 style="text-align:right; border:none;"><b>Total Amount Of Purchase:&nbsp;&nbsp;</b><span
                style="color: green;"><b>{{ $feedData->sum('amount') }}</b></span>
        </h3>
    @endif
    <h3 style="text-align:right; border:none;"><b>Grand Total:&nbsp;&nbsp;</b><span
            style="color: green;"><b>{{ $feedData->sum('amount') + $chickData->sum('amount') + $chickenData->sum('amount') }}</b></span>
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
                    <span style="width:8px;">{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                </td>
                <td>
                    <span>{{ $row->unique_id }}</span>
                </td>
                <td>
                    <span>{{ $row->book }}</span>
                </td>
                <td style="text-align: left;">
                    <span>{{ $row->product->product_name }}</span>
                </td>
                <td>
                    <span>{{ $row->price }}</span>
                </td>
                <td>
                    <span>{{ $row->qty }}</span>
                </td>
                <td>
                    <span>{{ $row->dis_amount }}</span>
                </td>
                <td style="text-align:right;">
                    <span>{{ $row->amount }}</span>
                </td>
            </tr>
            <?php
            if ($next_unique_id !== $row->unique_id || $next_key === count($sell_invoice) - 1) {
            ?>
        <tfoot style="color: green; font-weight: bolder ;">
            <tr>
                <td colspan="5" style="text-align:right; border: none !important; "><span
                        style="color:blue;">{{ $row->supplier->company_name }}'s</span> &nbsp; Invoice#
                    {{ $row->unique_id }} Total:</td>
                <td style="text-align:center;  background-color: lightgray;">{{ $row->qty_total }}</td>
                <td style="text-align:center; background-color: lightgray;">{{ $row->dis_total }}</td>
                <td style="text-align:right; background-color: lightgray;">{{ $row->amount_total }}</td>
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
                <td style="text-align:center;  background-color: lightgray;">{{ $qty_total }}</td>
                <td style="text-align:center; background-color: lightgray;">{{ $dis_total }}</td>
                <td style="text-align:right; background-color: lightgray;">{{ $amount_total }}</td>
            </tr>
        </tfoot>

    </table>

@endif

<div class="pdf-time">
    Generated on: <?php echo date('Y-m-d  H:i:s'); ?>
</div>

</div>
