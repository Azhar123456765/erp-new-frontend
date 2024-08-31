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
$startDate = session()->get('Data')['startDate'];
$endDate = session()->get('Data')['endDate'];
$chickenInvoice = session()->get('Data')['chickenInvoice'];
$chickInvoice = session()->get('Data')['chickInvoice'];
$feedInvoice = session()->get('Data')['feedInvoice'];
$payment_voucher = session()->get('Data')['payment_voucher'];
$receipt_voucher = session()->get('Data')['receipt_voucher'];
$expense_voucher = session()->get('Data')['expense_voucher'];
$company = session()->get('Data')['company'];
$type = session()->get('Data')['type'];

$credit = 0;
$debit = 0;
$balance = 0;
?>
@include('pdf.head_pdf')

<h2 style="text-align: center;">General Ledger {{ $type == 1 ? '(Summary)' : '(Detail Wise)' }}</h2>
<div class="col-md-3"></div>

<div class="row">
    <h4 style="text-align: center;">FROM:
        {{ (new DateTime($startDate))->format('d-m-Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
        {{ (new DateTime($endDate))->format('d-m-Y') }}</h4>
    <h3 style="text-align: left; ">Account:&nbsp;{{ $name2 ?? '' }}</h3>
    <h3 style="text-align: right; ">{{ date('l') }},{{ '  ' . date('d-m-Y') }}</h3>
</div>
@if ($type == 1)
    <table id="invoice-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Reference</th>
                <th>Description</th>
                <th>Credit</th>
                <th>Debit</th>
                <th>Closing Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chickenInvoice as $row)
                @if (!$company)
                    @php
                        $company;
                    @endphp
                @endif
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>CH-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
                ;">
                        <span>{{ $row->product->product_name }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->seller ? $row->amount : 0.0 }}
                            @else
                                {{ $row->seller == $company ? $row->amount : 0.0 }}
                            @endif
                        </span>
                    </td>

                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->buyer ? $row->sale_amount : 0.0 }}
                            @else
                                {{ $row->buyer == $company ? $row->sale_amount : 0.0 }}
                            @endif
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $balance += $row->amount - $row->sale_amount }}
                            @else
                                {{ $row->seller == $company ? ($balance += $row->amount) : '' }}
                                {{ $row->buyer == $company ? ($balance += $row->sale_amount) : '' }}
                            @endif
                        </span>
                    </td>
                </tr>
                @if (!isset($company) || empty($company))
                    @php $credit += $row->amount; @endphp
                @elseif($row->seller == $company)
                    @php $credit += $row->amount @endphp
                @endif

                @if (!isset($company) || empty($company))
                    @php $debit += $row->sale_amount; @endphp
                @elseif($row->buyer == $company)
                    @php $debit += $row->sale_amount @endphp
                @endif
            @endforeach
            @foreach ($chickInvoice as $row)
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>C-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
            ;">
                        <span>{{ $row->product->product_name }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->seller ? $row->amount : 0.0 }}
                            @else
                                {{ $row->seller == $company ? $row->amount : 0.0 }}
                            @endif
                        </span>
                    </td>

                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->buyer ? $row->sale_amount : 0.0 }}
                            @else
                                {{ $row->buyer == $company ? $row->sale_amount : 0.0 }}
                            @endif
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $balance += $row->amount - $row->sale_amount }}
                            @else
                                {{ $row->seller == $company ? ($balance += $row->amount) : '' }}
                                {{ $row->buyer == $company ? ($balance += $row->sale_amount) : '' }}
                            @endif
                        </span>
                    </td>
                </tr>
                @if (!isset($company) || empty($company))
                    @php $credit += $row->amount; @endphp
                @elseif($row->seller == $company)
                    @php $credit += $row->amount @endphp
                @endif

                @if (!isset($company) || empty($company))
                    @php $debit += $row->sale_amount; @endphp
                @elseif($row->buyer == $company)
                    @php $debit += $row->sale_amount @endphp
                @endif
            @endforeach
            @foreach ($feedInvoice as $row)
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>F-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
            ;">
                        <span>{{ $row->product->product_name }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->seller ? $row->amount : 0.0 }}
                            @else
                                {{ $row->seller == $company ? $row->amount : 0.0 }}
                            @endif
                        </span>
                    </td>

                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $row->buyer ? $row->sale_amount : 0.0 }}
                            @else
                                {{ $row->buyer == $company ? $row->sale_amount : 0.0 }}
                            @endif
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <span>
                            @if (!isset($company) || empty($company))
                                {{ $balance += $row->amount - $row->sale_amount }}
                            @else
                                {{ $row->seller == $company ? ($balance += $row->amount) : '' }}
                                {{ $row->buyer == $company ? ($balance += $row->sale_amount) : '' }}
                            @endif
                        </span>
                    </td>
                </tr>
                @if (!isset($company) || empty($company))
                    @php $credit += $row->amount; @endphp
                @elseif($row->seller == $company)
                    @php $credit += $row->amount @endphp
                @endif

                @if (!isset($company) || empty($company))
                    @php $debit += $row->sale_amount; @endphp
                @elseif($row->buyer == $company)
                    @php $debit += $row->sale_amount @endphp
                @endif
            @endforeach
            @foreach ($payment_voucher as $row)
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>PV-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
            ;">
                        <span>{{ $row->narration }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $row->amount }}</span>
                    </td>

                    <td style="text-align:right;">
                        <span>0.000</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $balance += $row->amount }}</span>
                    </td>
                </tr>
                @php $credit += $row->amount; @endphp
            @endforeach
            @foreach ($receipt_voucher as $row)
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>RV-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
            ;">
                        <span>{{ $row->narration }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>0.000</span>
                    </td>

                    <td style="text-align:right;">
                        <span>{{ $row->amount }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $balance -= $row->amount }}</span>
                    </td>
                </tr>
                @php $debit += $row->amount; @endphp
            @endforeach
            @foreach ($expense_voucher as $row)
                <tr style="text-align: center;">
                    <td>
                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                    </td>
                    <td>
                        <span>EV-{{ $row->unique_id }}</span>
                    </td>
                    <td style="text-align: left
            ;">
                        <span>{{ $row->narration }}</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $row->amount }}</span>
                    </td>

                    <td style="text-align:right;">
                        <span>0.000</span>
                    </td>
                    <td style="text-align:right;">
                        <span>{{ $balance += $row->amount }}</span>
                    </td>
                </tr>
                @php $credit += $row->amount; @endphp
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right; border: none !important; ">Total:</td>
                <td style="color: red; text-align: right;">
                    {{ $credit }}</td>
                <td style="color: green; text-align: right;">
                    {{ $debit }}</td>
                <td style="color: blue; text-align: right;">
                    {{ $balance }}</td>
            </tr>
        </tfoot>
    </table>
@elseif($type == 2)
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
                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                </td>
                <td>
                    <span>{{ $row->unique_id }}</span>
                </td>
                <td style="text-align: left
                ;">
                    <span>{{ $row->product->product_name }}</span>
                </td>
                <td>
                    <span>{{ $row->qty }}</span>
                </td>
                <td style="text-align:right;">
                    <span>0.0000</span>
                </td>

                <td style="text-align:right;">
                    <span>{{ $row->amount }}</span>
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
                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                </td>
                <td>
                    <span>{{ $row->unique_id }}</span>
                </td>
                <td style="text-align: left
        ;">
                    <span>{{ $row->narration }}</span>
                </td>
                <td>
                    <span><?php ?>0.0000</span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.0000</span>
                </td>
                <td style="text-align:right;">
                    <span>{{ $row->amount }}</span>
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
                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                </td>
                <td>
                    <span>{{ $row->unique_id }}</span>
                </td>
                <td style="text-align: left
;">
                    <span>{{ $row->product->product_name }}</span>
                </td>
                <td>
                    <span>{{ $row->qty ?? 0 }}</span>
                </td>
                <td style="text-align:right;">
                    <span>{{ $row->amount }}</span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.0000</span>
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
                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                </td>
                <td>
                    <span>{{ $row->unique_id }}</span>
                </td>
                <td style="text-align: left
;">
                    <span>{{ $row->narration }}</span>
                </td>
                <td>
                    <span><?php ?>0.0000</span>
                </td>
                <td style="text-align:right;">
                    <span>{{ $row->amount }}</span>
                </td>
                <td style="text-align:right;">
                    <span><?php ?>0.0000</span>
                </td>

            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right; border: none !important; ">Total:</td>
                <td style="color: red; text-align: right;">
                    {{ $credit = $ledgerDatapi->sum('amount') + $ledgerDatapv->sum('amount') }}</td>
                <td style="color: green; text-align: right;">
                    {{ $debit = $ledgerDatasi->sum('amount') + $ledgerDatarv->sum('amount') }}</td>
            </tr>
        </tfoot>
        <h5 style="text-align: right; color: blue;">Profit: {{ $debit - $credit }}</h5>
    </table>
@endif
<div class="pdf-time">
    Generated on: {{ date('Y-m-d H:i:s') }}
</div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        sortTableByDate(); // Sort on document ready
        calculateClosingBalance()
    });

    function sortTableByDate() {
        const table = document.getElementById('invoice-table');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort((rowA, rowB) => {
            const dateA = parseDate(rowA.cells[0].textContent.trim());
            const dateB = parseDate(rowB.cells[0].textContent.trim());
            return dateA - dateB; // For ascending order
        });

        rows.forEach(row => tbody.appendChild(row)); // Reorder rows
    }

    function parseDate(dateStr) {
        const [day, month, year] = dateStr.split('-').map(Number);
        return new Date(year, month - 1, day); // JavaScript Date object uses 0-based month
    }

    function calculateClosingBalance() {
        const table = document.getElementById('invoice-table');
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');

        let runningBalance = 0; // Initialize running balance

        rows.forEach(row => {
            // Fetch the values from Credit and Debit columns
            const creditText = row.cells[3].textContent.trim();
            const debitText = row.cells[4].textContent.trim();

            // Parse the values to float, accounting for potential empty values
            const credit = parseFloat(creditText.replace(/,/g, '') || '0');
            const debit = parseFloat(debitText.replace(/,/g, '') || '0');

            // Update the running balance
            runningBalance += credit;
            runningBalance -= debit;

            // Update the Closing Balance column with the new value
            row.cells[5].textContent = runningBalance.toFixed(2); // Format to 2 decimal places

            // Optional: Log for debugging
            console.log(
                `Row: ${row.rowIndex}, Credit: ${credit}, Debit: ${debit}, Running Balance: ${runningBalance.toFixed(2)}`
            );
        });
    }
</script>
