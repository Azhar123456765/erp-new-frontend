@extends('pdf.ledger.app') @section('pdf_content')
    @php
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
        $expense_voucher = session()->get('Data')['expense_voucher'] ?? null;
        $payment_voucher = session()->get('Data')['payment_voucher'] ?? null;
        $chickenInvoice = session()->get('Data')['chickenInvoice'] ?? null;
        $chickInvoice = session()->get('Data')['chickInvoice'] ?? null;
        $feedInvoice = session()->get('Data')['feedInvoice'] ?? null;
        $daily_reports = session()->get('Data')['daily_reports'] ?? null;

        $salary = session()->get('Data')['salary'] ?? null;
        $rent = session()->get('Data')['rent'] ?? null;
        $utility = session()->get('Data')['utility'] ?? null;

        $farm = session()->get('Data')['farm'];

        $salary = $expense_voucher->whereIn('cash_bank', $salary);
        $rent = $expense_voucher->whereIn('cash_bank', $rent);
        $utility = $expense_voucher->whereIn('cash_bank', $utility);
        // dd($chickInvoice);
        $total_amount = 0;
        $total_sale_amount = 0;
    @endphp
    <style>
        .ui .content p {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="invoice-header">
        <div class="ui left aligned grid">
            <div class="row">
                <div class="left floated left aligned six wide column">
                    <div class="ui">
                        <h1 class="ui header pageTitle">Farm Report
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
        @if ($farm)
            <div class="ui card customercard">
                <div class="content">
                    <div class="header">Farm Details</div>
                </div>
                <div class="content">
                    {{ $farm->name }}
                </div>
            </div>
        @endif

        <div class="ui segment itemscard">
            <div class="content">


                @if (count($salary) > 0 || count($rent) > 0 || count($utility) > 0)
                    <h3><b>Expenses</b></h3>
                    @if (count($chickInvoice) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Invoice No</th>
                                    <th class="text-center colfix">Description</th>
                                    <th class="text-center colfix">Parties</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>Chicks Purchase</b></h4>

                            <tbody>
                                @foreach ($chickInvoice as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 70px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>C-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->product->product_name }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->supplier->company_name }}&nbsp;&nbsp; TO
                                                &nbsp;&nbsp;{{ $row->customer->company_name }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="4" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $chickInvoice->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                        </table>
                    @endif
                    @if (count($feedInvoice) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Invoice No</th>
                                    <th class="text-center colfix">Description</th>
                                    <th class="text-center colfix">Parties</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>Feed Purchase</b></h4>

                            <tbody>
                                @foreach ($feedInvoice as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 70px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>F-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->product->product_name }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->supplier->company_name }}&nbsp;&nbsp; TO
                                                &nbsp;&nbsp;{{ $row->customer->company_name }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="4" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $feedInvoice->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
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
                                        <td class="text-right" style="width: 70px;">
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
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $salary->sum('amount') }} </th>
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
                                        <td class="text-right" style="width: 70px;">
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
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $rent->sum('amount') }} </th>
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
                                        <td class="text-right" style="width: 70px;">
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
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="5" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $utility->sum('amount') }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                @endif


                @if (count($daily_reports) > 0)
                    <table class="ui celled table" id="invoice-table">
                        <thead>
                            <tr>
                                <th class="text-center colfix" style="text-align: center;">Hean Deaths</th>
                                <th class="text-center colfix" style="text-align: center;">Feed Consumed</th>
                                <th class="text-center colfix" style="text-align: center;">Water Consumed</th>
                                <th class="text-center colfix" style="text-align: center;">Extra Expense</th>
                            </tr>
                        </thead>
                        <h4><b>Farm Daily Reports</b></h4>
                        <h3 class="ui sub header invDetails">FROM:
                            {{ (new DateTime($startDate))->format('d-m-Y') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:
                            {{ (new DateTime($endDate))->format('d-m-Y') }}</h3>
                        <tbody>
                            <tr style="text-align: center;">

                                <td class="text-right" style="text-align: center;">
                                    <span>{{ $daily_reports->sum('hen_deaths') }}</span>
                                </td>
                                <td style="text-align: center
;">
                                    <span>{{ $daily_reports->sum('feed_consumed') }}</span>
                                </td>
                                <td style="text-align: center
;">
                                    <span>{{ $daily_reports->sum('water_consumed') }}</span>
                                </td>
                                <td class="text-center" style="text-align: center;">
                                    <span>{{ $daily_reports->sum('extra_expense_amount') }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                @if (count($payment_voucher) > 0)
                    <h3><b>Liablities</b></h3>
                    @if (count($payment_voucher) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Voucher No</th>
                                    <th class="text-center colfix">Narration</th>
                                    <th class="text-center colfix">Payable Account</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>Accounts Payable</b></h4>

                            <tbody>
                                @foreach ($payment_voucher as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 70px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>PV-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->narration }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->accounts->account_name ?? null }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="4" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $payment_voucher->sum('amount') }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                @endif
                @if (count($chickenInvoice) > 0)
                    <h3><b>Income</b></h3>
                    @if (count($chickenInvoice) > 0)
                        <table class="ui celled table" id="invoice-table">
                            <thead>
                                <tr>
                                    <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                    <th class="text-center colfix" style="text-align: center;">Invoice No</th>
                                    <th class="text-center colfix">Description</th>
                                    <th class="text-center colfix">Parties</th>
                                    <th class="text-center colfix">Amount</th>
                                </tr>
                            </thead>
                            <h4><b>Chickens Sale</b></h4>

                            <tbody>
                                @foreach ($chickenInvoice as $row)
                                    <tr style="text-align: center;">
                                        <td class="text-right" style="width: 70px;">
                                            <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span>CH-{{ $row->unique_id }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->product->product_name }}</span>
                                        </td>
                                        <td style="text-align: left
;">
                                            <span>{{ $row->supplier->company_name }}&nbsp;&nbsp; TO
                                                &nbsp;&nbsp;{{ $row->customer->company_name }}</span>
                                        </td>
                                        <td style="text-align:right;">
                                            <span>{{ $row->amount }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th colspan="4" style="text-align:right;"> Total: </th>
                                    <th colspan="1" style="text-align:right;"> {{ $chickenInvoice->sum('amount') }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                @endif

                @php
                    $total_amount = 0;
                    $total_sale_amount = 0;
                @endphp
            </div>
        </div>
        <div class="ui card">
            <div class="content" style="border-top:1px solid #363636 !important;">
                <div class="header">Amount Details</div>
            </div>
            <div class="content" style="border-top:1px solid #363636 !important;">
                <p> <strong> Total Income: </strong>PKR {{ $chickenInvoice->sum('amount') }} </p>
                <p> <strong> Liablities: </strong>PKR {{ $payment_voucher->sum('amount') }} </p>
                <p> <strong> Expenses: </strong>
                    PKR {{ $chickInvoice->sum('amount') + $feedInvoice->sum('amount') + $expense_voucher->sum('amount') }}
                </p>
            </div>
        </div>
        <div class="ui card">
            <div class="content" style="border-top:1px solid #363636 !important;">
                <div class="header">Hens Summary</div>
            </div>
            <div class="content" style="border-top:1px solid #363636 !important;">
                <p> <strong> Total Chicks Purchase: </strong>{{ $chickInvoice->sum('sale_qty') }} </p>
                <p> <strong> Total Deaths: </strong>{{ $daily_reports->sum('hen_deaths') }} </p>
                <p> <strong> Remaining Hens:
                    </strong>{{ $chickInvoice->sum('sale_qty') - $daily_reports->sum('hen_deaths') }} </p>
                <p> <strong> Chickens Sale (QTY):
                    </strong>{{ $chickenInvoice->sum('hen_qty') }} </p>
                <p> <strong> Chickens Sale (Net Weight):
                    </strong>{{ $chickenInvoice->sum('net_weight') }} </p>
            </div>
        </div>
        <div class="ui card">
            <div class="content" style="border-top:1px solid #363636 !important;">
                <div class="header">Secondary Expense Summary</div>
            </div>
            <div class="content" style="border-top:1px solid #363636 !important;">
                <p> <strong> Salary: </strong>{{ $salary->sum('amount') }} </p>
                <p> <strong> Rent: </strong>{{ $rent->sum('amount') }} </p>
                <p> <strong> Utility:
                    </strong>{{ $utility->sum('amount') }} </p>

            </div>
        </div>
    </div>
    </div>
@endsection
