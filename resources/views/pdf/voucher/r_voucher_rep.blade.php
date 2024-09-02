@extends('pdf.voucher.app') @section('pdf_content')
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

        $r_voucher = session()->get('Data')['r_voucher'];
        $company = session()->get('Data')['company'] ?? null;
        $total_amount = 0;
    @endphp
    <div class="invoice-header">
        <div class="ui left aligned grid">
            <div class="row">
                <div class="left floated left aligned six wide column">
                    <div class="ui">
                        <h1 class="ui header pageTitle">Receipt Voucher Report
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
        @if ($company)
            <div class="ui card customercard">
                <div class="content">
                    <div class="header">Details</div>
                </div>
                <div class="content">
                    {{ $company->company_name }}
                </div>
            </div>
        @endif

        <div class="ui segment itemscard">
            <div class="content">
                <h4><b>Chickens</b></h4>
                <table class="ui celled table" id="invoice-table">
                    <thead>
                        <tr>
                            <th class="text-center colfix">Date</th>
                            <th class="text-center colfix">Voucher No</th>
                            <th class="text-center colfix">Company</th>
                            <th class="text-center colfix">Narration</th>
                            <th class="text-center colfix">Contra Acount</th>
                            <th class="text-center colfix">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($r_voucher as $row)
                            <tr style="text-align: center;">
                                <td class="text-right" style="width: 70px;">
                                    <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                </td>
                                <td class="text-right">
                                    <span>RV-{{ $row->unique_id }}</span>
                                </td>
                                <td style="text-align: left
                ;">
                                    <span>{{ $row->customer->company_name }}</span>
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
                                    @php $total_amount += $row->amount; @endphp
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot class="full-width">
                        <tr>
                            <th colspan="1"></th>
                            <th colspan="1"></th>
                            <th colspan="1" style="text-align:right;"></th>
                            <th colspan="1" style="text-align:right;"> </th>
                            <th class="text-center colfix"> Total: </th>
                            <th colspan="1" style="text-align:right;" id="balance"> {{ $total_amount }} </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
