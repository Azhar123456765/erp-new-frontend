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
        $FarmingPeriod = session()->get('Data')['FarmingPeriod'] ?? null;
        $FarmingDailyReport = session()->get('Data')['FarmingDailyReport'] ?? null;

        $farm = session()->get('Data')['farm'];

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
                        <h1 class="ui header pageTitle">Farm Daily Reports
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
                @foreach ($FarmingPeriod as $FarmingPeriodRow)
                    {{-- <h3><b>{{ $FarmingDailyReport->where('farming_period', $FarmingPeriodRow->id)->pluck('id') }}</b></h3> --}}
                    <table class="ui celled table" id="invoice-table">
                        <thead>
                            <tr>
                                <th class="text-center colfix date-th" style="text-align: center;">Date</th>
                                <th class="text-center colfix" style="text-align: center;">Hen Deaths</th>
                                <th class="text-center colfix" style="text-align: center;">Feed Consumed</th>
                                <th class="text-center colfix" style="text-align: center;">Water Consumed</th>
                                <th class="text-center colfix" style="text-align: center;">Extra Expense</th>
                            </tr>
                        </thead>
                        <h4><b>{{ $FarmingPeriodRow->start_date }} TO {{ $FarmingPeriodRow->end_date }}</b></h4>

                        <tbody>
                            @foreach ($FarmingDailyReport->where('farming_period', $FarmingPeriodRow->id) as $row)
                                <tr style="text-align: center;">
                                    <td class="text-right" style="width: 100px;">
                                        <span>{{ (new DateTime($row->date))->format('d-m-Y') }}</span>
                                    </td>
                                    <td class="text-right">
                                        <span>{{ $row->hen_deaths }}</span>
                                    </td>
                                    <td class="text-right">
                                        <span>{{ $row->feed_consumed }}</span>

                                    </td>
                                    <td class="text-right">
                                        <span>{{ $row->water_consumed }}</span>
                                    </td>
                                    <td class="text-right">
                                        <span>{{ $row->extra_expense_amount ?? 0 }}</span>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="full-width">
                            {{-- <tr>
                                <th colspan="4" style="text-align:right;"> Total: </th>
                                <th colspan="1" style="text-align:right;"> {{ $chickInvoice->sum('amount') }} </th>
                            </tr> --}}
                        </tfoot>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection
