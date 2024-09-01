@extends('pdf.farm.app') @section('pdf_content')
    @php
        $single_data = session()->get('single_pdf_data');
        $data = session()->get('pdf_data');
        // dd($data);
        $org = App\Models\Organization::all();
        foreach ($org as $key => $value) {
            $logo = $value->logo;
            $address = $value->address;
            $name = $value->organization_name;
            $phone_number = $value->phone_number;
            $email = $value->email;
        }
        $startDate = session()->get('Data')['startDate'];
        $endDate = session()->get('Data')['endDate'];
        $single_data = session()->get('Data')['single_data'];
        $chickenInvoice = session()->get('Data')['chickenInvoice'];
        $chickInvoice = session()->get('Data')['chickInvoice'];
        $feedInvoice = session()->get('Data')['feedInvoice'];
        $payment_voucher = session()->get('Data')['payment_voucher'];
        $receipt_voucher = session()->get('Data')['receipt_voucher'];
        $expense_voucher = session()->get('Data')['expense_voucher'];
        $company = session()->get('Data')['account'];
        $type = session()->get('Data')['type'];

        $credit = 0;
        $debit = 0;
        $balance = 0;
    @endphp
    <div class="invoice-header">
        <div class="ui left aligned grid">
            <div class="row">
                <div class="left floated left aligned six wide column">
                    <div class="ui">
                        <h1 class="ui header pageTitle">General Ledger
                        </h1>
                        <h4 class="ui sub header invDetails">FROM:
                            {{ (new DateTime($startDate))->format('d-m-Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
                            {{ (new DateTime($endDate))->format('d-m-Y') }}</h4>
                    </div>
                </div>
                <div class="right floated left aligned six wide column">
                    <div class="ui">
                        <div class="column two wide right floated">
                            <img class="logo"
                                src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path($logo))) }}" />
                            <ul class="">
                                <li><strong>{{ $name }}</strong></li>
                                <li>{{ $phone_number }}</li>
                                <li>{{ $address }}</li>
                                <li>{{ $email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui segment cards">
        <div class="ui card customercard">
            <div class="content">
                <div class="header">Account Details</div>
            </div>
            <div class="content">
                {{ $single_data->account_name }}
            </div>
        </div>

        <div class="ui segment itemscard">
            <div class="content">
                <table class="ui celled table" id="invoice-table">
                    <thead>
                        <tr>
                            <th class="text-center colfix">Date</th>
                            <th class="text-center colfix">Reference</th>
                            <th class="text-center colfix">Description</th>
                            <th class="text-center colfix">Debit</th>
                            <th class="text-center colfix">Credit</th>
                            <th class="text-center colfix">Closing Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $unique_ids = [];
                            $last_unique_id = null;
                            $last_row_key = null;
                        @endphp
                        @foreach ($chickenInvoice as $row)
                            @if (!$company)
                                @php
                                    $company;
                                @endphp
                            @endif
                            @php
                                if ($last_unique_id !== $row->unique_id) {
                                    $last_unique_id = $row->unique_id;
                                    $last_row_key = $key;
                                }
                                $last_unique_id = $row->unique_id;
                                $next_key = $key + 1;
                                $next_unique_id = isset($invoice[$next_key]) ? $invoice[$next_key]->unique_id : null;
                            @endphp
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>CH-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
                ;">
                                    <span>{{ $row->description }}</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->seller ? $row->amount_total : 0.0 }}
                                        @else
                                            {{ $row->seller == $company ? $row->amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>

                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->buyer ? $row->sale_amount_total : 0.0 }}
                                        @else
                                            {{ $row->buyer == $company ? $row->sale_amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $balance += $row->amount_total - $row->sale_amount_total }}
                                        @else
                                            {{ $row->seller == $company ? ($balance += $row->amount_total) : '' }}
                                            {{ $row->buyer == $company ? ($balance += $row->sale_amount_total) : '' }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @if (!isset($company) || empty($company))
                                @php $credit += $row->amount_total; @endphp
                            @elseif($row->seller == $company)
                                @php $credit += $row->amount_total @endphp
                            @endif

                            @if (!isset($company) || empty($company))
                                @php $debit += $row->sale_amount_total; @endphp
                            @elseif($row->buyer == $company)
                                @php $debit += $row->sale_amount_total @endphp
                            @endif
                        @endforeach
                        @foreach ($chickInvoice as $row)
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>C-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
            ;">
                                    <span>{{ $row->description }}</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->seller ? $row->amount_total : 0.0 }}
                                        @else
                                            {{ $row->seller == $company ? $row->amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>

                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->buyer ? $row->sale_amount_total : 0.0 }}
                                        @else
                                            {{ $row->buyer == $company ? $row->sale_amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $balance += $row->amount_total - $row->sale_amount_total }}
                                        @else
                                            {{ $row->seller == $company ? ($balance += $row->amount_total) : '' }}
                                            {{ $row->buyer == $company ? ($balance += $row->sale_amount_total) : '' }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @if (!isset($company) || empty($company))
                                @php $credit += $row->amount_total; @endphp
                            @elseif($row->seller == $company)
                                @php $credit += $row->amount_total @endphp
                            @endif

                            @if (!isset($company) || empty($company))
                                @php $debit += $row->sale_amount_total; @endphp
                            @elseif($row->buyer == $company)
                                @php $debit += $row->sale_amount_total @endphp
                            @endif
                        @endforeach
                        @foreach ($feedInvoice as $row)
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>F-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
            ;">
                                    <span>{{ $row->description }},
                                        {{ $row->seller == $company ? str_replace('.00', '', $row->qty_total) : str_replace('.00', '', $row->sale_qty_total) }}
                                        Bags</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->seller ? $row->amount_total : 0.0 }}
                                        @else
                                            {{ $row->seller == $company ? $row->amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>

                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $row->buyer ? $row->sale_amount_total : 0.0 }}
                                        @else
                                            {{ $row->buyer == $company ? $row->sale_amount_total : 0.0 }}
                                        @endif
                                    </span>
                                </td>
                                <td style="text-align:right;">
                                    <span>
                                        @if (!isset($company) || empty($company))
                                            {{ $balance += $row->amount_total - $row->sale_amount_total }}
                                        @else
                                            {{ $row->seller == $company ? ($balance += $row->amount_total) : '' }}
                                            {{ $row->buyer == $company ? ($balance += $row->sale_amount_total) : '' }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @if (!isset($company) || empty($company))
                                @php $credit += $row->amount_total; @endphp
                            @elseif($row->seller == $company)
                                @php $credit += $row->amount_total @endphp
                            @endif

                            @if (!isset($company) || empty($company))
                                @php $debit += $row->sale_amount_total; @endphp
                            @elseif($row->buyer == $company)
                                @php $debit += $row->sale_amount_total @endphp
                            @endif
                        @endforeach
                        @foreach ($payment_voucher as $row)
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>PV-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
            ;">
                                    <span>{{ $row->narration }}</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>0.00</span>
                                </td>

                                <td style="text-align:right;">
                                    <span>{{ $row->amount }}</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>{{ $balance += $row->amount }}</span>
                                </td>
                            </tr>
                            @php $credit += $row->amount_total; @endphp
                        @endforeach
                        @foreach ($receipt_voucher as $row)
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>RV-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
            ;">
                                    <span>{{ $row->narration }}</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>{{ $row->amount }}</span>
                                </td>

                                <td style="text-align:right;">
                                    <span>0.00</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>{{ $balance -= $row->amount }}</span>
                                </td>
                            </tr>
                            @php $debit += $row->amount_total; @endphp
                        @endforeach
                        @foreach ($expense_voucher as $row)
                            <tr style="text-align: center;">
                                <td class="text-right">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
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
                                    <span>0.00</span>
                                </td>
                                <td style="text-align:right;">
                                    <span>{{ $balance += $row->amount }}</span>
                                </td>
                            </tr>
                            @php $credit += $row->amount_total; @endphp
                        @endforeach

                    </tbody>
                    <tfoot class="full-width">
                        <tr>
                            <th colspan="1"></th>
                            <th colspan="1"></th>
                            <th> Total: </th>
                            <th colspan="1" style="text-align:right;"> {{ $credit }} </th>
                            <th colspan="1" style="text-align:right;"> {{ $debit }} </th>
                            <th colspan="1" style="text-align:right;" id="balance"> {{ $balance }} </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            sortTableByDate(); // Sort on document ready
            calculateClosingBalance();
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

                // Log for debugging
                console.log(
                    `Row: ${row.rowIndex}, Credit: ${credit}, Debit: ${debit}, Running Balance: ${runningBalance.toFixed(2)}`
                );
            });

            // Update the <th> element with id "balance" with the last sum of the running balance
            const balanceHeader = document.getElementById('balance');
            if (balanceHeader) {
                balanceHeader.textContent = runningBalance.toFixed(2); // Display the final running balance
            }
        }
    </script>
@endsection
