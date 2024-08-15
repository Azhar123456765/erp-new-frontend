<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Invoice Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css'>
    <link rel="stylesheet" href="./style.css">

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 200mm;
                height: 297mm;
            }

            /* ... the rest of the rules ... */
        }

        body {
            background: #EEE;
            /* font-size:0.9em !important; */
        }

        .bigfont {
            font-size: 3rem !important;
        }

        .invoice {
            width: 970px !important;
            margin: 50px auto;
        }

        .logo {
            float: left;
            padding-right: 10px;
            margin: 10px auto;
        }

        dt {
            float: left;
        }

        dd {
            float: left;
            clear: right;
        }

        .customercard {
            min-width: 98.5%;
        }

        .itemscard {
            min-width: 98.5%;
            margin-left: 0.5%;
        }

        .logo {
            max-width: 5rem;
            margin-top: -0.25rem;
        }

        .invDetails {
            margin-top: 0rem;
        }

        .pageTitle {
            margin-bottom: -1rem;
        }
    </style>
</head>

@php

$data = session()->get('pdf_data');
    // $customer = App\Models\Buyer::where('buyer_id', $data['pur_company'])->first();
    $org = App\Models\Organization::all();
    foreach ($org as $key => $value) {
        $logo = $value->logo;
        $address = $value->address;
        $name = $value->organization_name;
        $phone_number = $value->phone_number;
        $email = $value->email;
    }

@endphp

<body>
    <!-- partial:index.partial.html -->
    <div class="container invoice">
        <div class="invoice-header">
            <div class="ui left aligned grid">
                <div class="row">
                    <div class="left floated left aligned six wide column">
                        <div class="ui">
                            <h1 class = "ui header pageTitle">Sale Invoice
                            </h1>
                            <h4 class="ui sub header invDetails">NO: {{ $data['unique_id'] }} | Date:
                                {{ $data['date'] }}</h4>
                        </div>
                    </div>
                    <div class="right floated left aligned six wide column">
                        <div class="ui">
                            <div class="column two wide right floated">
                                <img class="logo"
                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path($logo))) }}" />
                                <ul class="">
                                    <li><strong>{{ $name }}</strong></li>
                                    <li>{{$phone_number}}</li>
                                    <li>{{$address}}</li>
                                    <li>{{$email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui segment cards">
            {{-- <div class="ui card">
                <div class="content">
                    <div class="header">Company Details</div>
                </div>
                <div class="content">
                    <ul>
                        <li> <strong> Name: RCJA </strong> </li>
                        <li><strong> Address: </strong> 1 Unknown Street VIC</li>
                        <li><strong> Phone: </strong> (+61)404123123</li>
                        <li><strong> Email: </strong> admin@rcja.com</li>
                        <li><strong> Contact: </strong> John Smith</li>
                    </ul>
                </div>
            </div> --}}
            <div class="ui card customercard">
                <div class="content">
                    <div class="header">Customer Details</div>
                </div>
                <div class="content">
                    <ul>
                        <li> <strong> Name: {{$customer->company_name}} </strong> </li>
                        <li><strong> Address: </strong> {{$customer->address}}</li>
                        <li><strong> Phone: </strong> {{$customer->phone_number}}</li>
                        <li><strong> Email: </strong> {{$customer->email}}</li>
                    </ul>
                </div>
            </div>

            <div class="ui segment itemscard">
                <div class="content">
                    <table class="ui celled table">
                        <thead>
                            <tr>
                                <th>Item / Details</th>
                                <th class="text-center colfix">Rate</th>
                                <th class="text-center colfix">Quantity</th>
                                <th class="text-center colfix">Discount(%)</th>
                                <th class="text-center colfix">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count(array_filter($data['amount'])); $i++)
                                <tr>
                                    <td>
                                        Chick
                                        <br>
                                        {{-- <small class="text-muted">The best lorem in town, try it now or leave
                                        forever</small> --}}
                                    </td>
                                    <td class="text-right">
                                        <span class="mono">{{ $data['rate']["$i"] }}</span>
                                        <br>
                                        {{-- <small class="text-muted">Before Tax</small> --}}
                                    </td>
                                    <td class="text-right">
                                        <span class="mono">{{ $data['qty']["$i"] }}</span>
                                        <br>
                                        {{-- <small class="text-muted">18 Units</small> --}}
                                    </td>
                                    <td class="text-right">
                                        <span class="mono">-{{ $data['discount']["$i"] }}%</span>
                                        <br>
                                        {{-- <small class="text-muted">Special -10%</small> --}}
                                    </td>
                                    <td class="text-right">
                                        <span class="mono">{{ $data['amount']["$i"] }}</span>
                                        <br>
                                        {{-- <small class="text-muted">VAT 20%</small> --}}
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot class="full-width">
                            <tr>
                                <th> Total: </th>
                                <th colspan="1"></th>
                                <th colspan = "1"> {{ $data['qty_total'] }} </th>
                                <th colspan = "1"></th>
                                <th colspan = "1"> {{ $data['amount_total'] }} </th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

            {{-- <div class="ui card">
                <div class="content center aligned text segment">
                    <small class="ui sub header"> Amount Due (AUD): </small>
                    <p class="bigfont"> $5000.25 </p>
                </div>
            </div>
            <div class="ui card">
                <div class="content">
                    <div class="header">Payment Details</div>
                </div>
                <div class="content">
                    <p> <strong> Account Name: </strong> "RJCA" </p>
                    <p> <strong> BSB: </strong> 111-111 </p>
                    <p> <strong>Account Number: </strong> 1234101 </p>
                </div>
            </div>
            <div class="ui card">
                <div class="content">
                    <div class="header">Notes</div>
                </div>
                <div class="content">
                    Payment is requested within 15 days of recieving this invoice.
                </div>
            </div> --}}
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
</body>

</html>
