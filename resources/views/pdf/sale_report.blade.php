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
    // $total_amount = session()->get('Data')['total_amount'] ?? null;
    // $balance_amount = session()->get('Data')['balance_amount'] ?? null;
    // $credit = session()->get('Data')['credit'] ?? null;
    $type = session()->get('Data')['type'] ?? null;
    // $qty_total = session()->get('Data')['qty_total'] ?? null;
    // $dis_total = session()->get('Data')['dis_total'] ?? null;
    // $amount_total = session()->get('Data')['amount_total'] ?? null;
    $chickenData = session()->get('Data')['chickenData'];
    $chickData = session()->get('Data')['chickData'];
    $feedData = session()->get('Data')['feedData'];
    
    ?>


    @if ($type == 1)
        <h2 style="text-align: center;">Customer Report</h2>

        <div class="row">
            <h4 style="text-align: center;">FROM: {{ $startDate }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
                {{ $endDate }}</h4>
            <h3 style="text-align: right; ">{{ date('l') }},{{ '  ' . date('d-m-Y') }}</h3>
        </div>

        @if (count($chickenData) > 0)
            <h4>Chickens</h4>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
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
                                <span>{{ $row->date }}</span>
                            </td>
                            <td>
                                <span>{{ $row->unique_id }}</span>
                            </td>
                            <td style="text-align: left
                ;">
                                <span>{{ $row->customer->company_name }}</span>
                            </td>
                            <td>
                                <span>{{ $row->crate_qty }}</span>
                            </td>
                            <td>
                                <span>{{ $row->gross_weight }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_net_weight }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_rate }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_amount }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <h3 style="text-align:right; border:none;"><b>Total Amount Of Sales:&nbsp;&nbsp;</b><span
                    style="color: green;"><b>{{ $chickenData->sum('amount') }}</b></span>
            </h3>
        @endif
        @if (count($chickData) > 0)
            <h4>Chicks</h4>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
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
                                <span>{{ $row->date }}</span>
                            </td>
                            <td>
                                <span>{{ $row->unique_id }}</span>
                            </td>
                            <td style="text-align: left
                ;">
                                <span>{{ $row->customer->company_name }}</span>
                            </td>
                            <td>
                                <span>{{ $row->sale_rate }}</span>
                            </td>
                            <td>
                                <span>{{ $row->sale_discount }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_bonus }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_qty }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_amount }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <h3 style="text-align:right; border:none;"><b>Total Amount Of Sales:&nbsp;&nbsp;</b><span
                    style="color: green;"><b>{{ $chickData->sum('amount') }}</b></span>
            </h3>
        @endif
        @if (count($feedData) > 0)
            <h4>Feed</h4>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
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
                                <span>{{ $row->date }}</span>
                            </td>
                            <td>
                                <span>{{ $row->unique_id }}</span>
                            </td>
                            <td style="text-align: left
                ;">
                                <span>{{ $row->customer->company_name }}</span>
                            </td>
                            <td>
                                <span>{{ $row->sale_rate }}</span>
                            </td>
                            <td>
                                <span>{{ $row->sale_discount }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_bonus }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_qty }}</span>
                            </td>
                            <td style="text-align:right;">
                                <span>{{ $row->sale_amount }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <h3 style="text-align:right; border:none;"><b>Total Amount Of Sales:&nbsp;&nbsp;</b><span
                    style="color: green;"><b>{{ $feedData->sum('amount') }}</b></span>
            </h3>
        @endif
        <h3 style="text-align:right; border:none;"><b>Grand Total:&nbsp;&nbsp;</b><span
                style="color: green;"><b>{{ $feedData->sum('amount') + $chickData->sum('amount') + $chickenData->sum('amount') }}</b></span>
        </h3>
    @elseif($type == 2)
        <h2 style="text-align: center;">Customer Report (Detail Wise)</h2>

        <div class="row">
            <h4 style="text-align: center;">FROM: {{ $startDate }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
                {{ $endDate }}</h4>
            <h3 style="text-align: right; ">{{ date('l') }},{{ '  ' . date('d-m-Y') }}</h3>
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
        $invoice = session()->get('Data')["invoice"];
        $unique_ids = [];
        $last_unique_id = null;
        $last_row_key = null;

        foreach ($invoice as $key => $row) {

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
            $next_unique_id = isset($invoice[$next_key]) ? $invoice[$next_key]->unique_id : null;

        ?>


                <tr style="text-align: center;">
                    <td>
                        <span style="width:8px;">{{ $row->date }}</span>
                    </td>
                    <td>
                        <span>{{ $row->unique_id }}</span>
                    </td>
                    <td>
                        <span>{{ $row->book }}</span>
                    </td>
                    <td style="text-align: left;">
                        <span>{{ $row->product->product_name ?? 'null' }}</span>
                    </td>
                    <td>
                        <span>{{ $row->sale_price }}</span>
                    </td>
                    <td>
                        <span>{{ $row->sale_qty }}</span>
                    </td>
                    <td>
                        <span>{{ $row->dis_amount }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $row->amount }}</span>
                    </td>
                </tr>
                <?php
            if ($next_unique_id !== $row->unique_id || $next_key === count($invoice) - 1) {
            ?>
            <tfoot style="color: green; font-weight: bolder ;">
                <tr>
                    <td colspan="5" style="text-align:right; border: none !important; "><span
                            style="color:blue;">{{ $row->customer->company_name }}'s</span> &nbsp; Invoice#
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
    @elseif($type == 3)
        <h2 style="text-align: center;">Customer Report (Detail Wise)</h2>

        <div class="row">
            <h4 style="text-align: center;">FROM: {{ $startDate }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
                {{ $endDate }}</h4>
            <h3 style="text-align: right; ">{{ date('l') }},{{ '  ' . date('d-m-Y') }}</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $invoice = session()->get('Data')["invoice"];
        $unique_ids = [];
        $last_unique_id = null;
        $last_row_key = null;

        foreach ($invoice as $key => $row) {

            if ($last_unique_id !== $row->product_id) {
                // Add tfoot for the last row of the previous group
                if ($last_row_key !== null) {
                    echo '                    <tr>
                    <td colspan="8" style="border: none !important;">&nbsp;</td>
                </tr>';
                }

                // Update the last_unique_id and last_row_key for the next iteration
                $last_unique_id = $row->product_id;
                $last_row_key = $key;
            }

            $next_key = $key + 1;
            $next_unique_id = isset($invoice[$next_key]) ? $invoice[$next_key]->product_id : null;


        ?>


                <tr style="text-align: center;">
                    <td>
                        <span>{{ $row->unique_id }}</span>

                    </td>
                    <td>
                        <span style="width:8px;">{{ $row->date }}</span>
                    </td>
                    <td>
                        <span>{{ optional($row->customer)->company_name }}</span>
                    </td>
                    <td style="text-align: left;">
                        <span>{{ $row->product->product_name }}</span>
                    </td>
                    <td>
                        <span>{{ $row->sale_price }}</span>
                    </td>
                    <td>
                        <span>{{ $row->sale_qty }}</span>
                    </td>
                    <td>
                        <span>{{ $row->dis_amount }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $row->amount }}</span>
                    </td>
                </tr>
                <?php
            if ($next_unique_id !== $row->product_id || $next_key === count($invoice) - 1) {
            ?>
            <tfoot style="color: green; font-weight: bolder ;">
                <tr>
                    <td colspan="5" style="text-align:right; border: none !important; "><span
                            style="color:blue;">{{ $row->product_name }}'s</span> &nbsp; Total:</td>
                    <td style="text-align:center;  background-color: lightgray;">
                        {{ $invoice[$key]->where('item', $row->product_id)->sum('sale_qty') }}</td>
                    <td style="text-align:center; background-color: lightgray;">
                        {{ $invoice[$key]->where('item', $row->product_id)->sum('dis_amount') }}</td>
                    <td style="text-align:right; background-color: lightgray;">
                        {{ $invoice[$key]->where('item', $row->product_id)->sum('amount') }}</td>
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
@endsection
