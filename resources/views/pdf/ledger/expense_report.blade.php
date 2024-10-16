@extends('pdf.ledger.app') @section('pdf_content')
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
        $startDate = session()->get('Data')['startDate'] ?? null;
        $endDate = session()->get('Data')['endDate'] ?? null;

        $expense_voucher = session()->get('Data')['expense_voucher'];
        $journal_voucher = session()->get('Data')['journal_voucher'];

        $account = session()->get('Data')['company'] ?? null;

        $salary = session()->get('Data')['salary'] ?? null;
        $rent = session()->get('Data')['rent'] ?? null;
        $utility = session()->get('Data')['utility'] ?? null;

        $salaryjv = session()->get('Data')['salaryjv'] ?? null;
        $rentjv = session()->get('Data')['rentjv'] ?? null;
        $utilityjv = session()->get('Data')['utilityjv'] ?? null;

        // $grand_total = 0;
        $total_amount = 0;
        $total_sale_amount = 0;
    @endphp
    <div class="invoice-header">
        <div class="ui left aligned grid">
            <div class="row">
                <div class="left floated left aligned six wide column">
                    <div class="ui">
                        <h1 class="ui header pageTitle">Expense Report
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
        @if ($account)
            <div class="ui card customercard">
                <div class="content">
                    <div class="header">Account Details</div>
                </div>
                <div class="content">
                    {{ $account->account_name }}
                </div>
            </div>
        @endif

        <div class="ui segment itemscard">
            <div class="content">
                @if (count($salary) > 0 || count($rent) > 0 || count($utility) > 0)
                    <h3><b>Expenses</b></h3>
                    @if (count($salary) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Voucher No</th>
                                    <th class="text-center colfix">Narration</th>
                                    <th class="text-center colfix">Expense Account</th>
                                    <th class="text-center colfix" style="text-align: center;">Cheque Date</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>Salary</b></h4>

                            <tbody>
                                @foreach ($salary as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>EV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->accounts->account_name }}</span>
                                        </td>
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($salaryjv as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>JV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        @if ($row->status == 'debit')
                                            <td style="text-align: left
                                ;">
                                                <span>{{ $row->toAccount->account_name }}</span>
                                            </td>
                                        @else
                                            <td style="text-align: left
                                ;">
                                                <span>{{ $row->fromAccount->account_name }}</span>
                                            </td>
                                        @endif
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;">
                                        {{ $salary->sum('amount') + $salaryjv->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                    @if (count($rent) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Voucher No</th>
                                    <th class="text-center colfix">Narration</th>
                                    <th class="text-center colfix">Expense Account</th>
                                    <th class="text-center colfix" style="text-align: center;">Cheque Date</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>rent</b></h4>

                            <tbody>
                                @foreach ($rent as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>EV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->accounts->account_name }}</span>
                                        </td>
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($rentjv as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>JV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        @if ($row->status == 'debit')
                                            <td style="text-align: left
                            ;">
                                                <span>{{ $row->toAccount->account_name }}</span>
                                            </td>
                                        @else
                                            <td style="text-align: left
                            ;">
                                                <span>{{ $row->fromAccount->account_name }}</span>
                                            </td>
                                        @endif
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;">
                                        {{ $rent->sum('amount') + $rentjv->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                    @if (count($utility) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Voucher No</th>
                                    <th class="text-center colfix">Narration</th>
                                    <th class="text-center colfix">Expense Account</th>
                                    <th class="text-center colfix" style="text-align: center;">Cheque Date</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>utility</b></h4>

                            <tbody>
                                @foreach ($utility as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>EV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->accounts->account_name }}</span>
                                        </td>
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($utilityjv as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 100px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>JV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        @if ($row->status == 'debit')
                                            <td style="text-align: left
                            ;">
                                                <span>{{ $row->toAccount->account_name }}</span>
                                            </td>
                                        @else
                                            <td style="text-align: left
                            ;">
                                                <span>{{ $row->fromAccount->account_name }}</span>
                                            </td>
                                        @endif
                                        <td class="text-center" style="text-align: center;">
                                            <span>{{ $row->cheque_date }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;">
                                        {{ $utility->sum('amount') + $utilityjv->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                @endif
            </div>
        </div>

    </div>
    </div>

    <script></script>
@endsection
