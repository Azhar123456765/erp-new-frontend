@php
$account = \App\Models\accounts::all();
$warehouse = \App\Models\warehouse::all();
$sales_officer = \App\Models\sales_officer::all();

$product_category = \App\Models\product_category::all();
$product_company = \App\Models\product_company::all();

$endDate = date('Y-m-d');
$startDate = date('Y-m-d', strtotime("-1 year", strtotime($endDate)));

$customer = \App\Models\buyer::all();
$supplier = \App\Models\seller::all();

$warehouse = \App\Models\warehouse::all();
$product = \App\Models\products::all();
@endphp
<style>
    .date {
        border: none;
        outline: none;
    }
</style>

<head>
    <!-- Include other necessary scripts and stylesheets -->
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<div class="modal fade" id="p-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitusers">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" target class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=users">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>





<div class="modal fade" id="p-supplier">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitsupplier">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=supplier">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>





<div class="modal fade" id="p-buyer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitbuyer">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=buyer">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="p-zone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitzone">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=zone">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="p-warehouse">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitwarehouse">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=warehouse">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="p-sales_officer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitsales_officer">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="1" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=sales_officer">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


@php

$id = session()->get("user_id")['user_id'];
$theme_colors = App\Models\users::where("user_id", $id)->get();

foreach ($theme_colors as $key => $value2) {

$theme_color = $value2->theme;
}

@endphp
<div class="modal fade" id="customize">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Customize Theme</h4>
                <div class="modal-body">
                    <form method="POST" action="/customize-form">
                        @csrf
                        <div class="form-group">
                            <label for="username">Theme</label>
                            <input type="color" class="form-control" name="theme_color" style="min-height:10vh;" value="{{$theme_color}}">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<style>
    @media (max-width: 755px) {

        .gen-led {
            width: auto !important;
            margin-left: auto !important;
            height: auto !important;

        }

    }

    .gen-led {
        width: 150%;
        margin-left: -28%;
        height: 70vh;
    }
</style>

<div class="modal fade" id="gen-led">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>General Ledger</h4>
                <div class="modal-body">
                    <form method="GET" action="/gen-led">
                        @csrf
                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Head Of Account</label>
                                    <select class="form-control" name="head_account" id="head_account" onchange="accountData()">
                                        <option></option>
                                        <option value="1" data-id="1">Cash</option>
                                        <option value="2" data-id="2">Accounts Receivable</option>
                                        <option value="3" data-id="3">Accounts Payable</option>
                                        <option value="4" data-id="4">Bank</option>
                                        <option value="5" data-id="5">Expense</option>
                                        <option value="6" data-id="6">Income</option>
                                        <option value="7" data-id="7">Cost Of Sales</option>
                                        <option value="8" data-id="8">Long Term Liabilities</option>
                                        <option value="9" data-id="9">Inventory</option>
                                        <option value="10" data-id="10">Capital</option>
                                        <option value="11" data-id="11">Drawing</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Account</label>
                                    <label for=""></label>
                                    <select class="form-control" name="account" id="gen-led-account">
                                        <option></option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Sales Officer</label>
                                    <label for=""></label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Company Type</label>
                                    <label for=""></label>
                                    <select class="form-control" name="company_type">
                                        <option></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Zone</label>
                                    <label for=""></label>
                                    <select class="js-example-basic-multiple js-states form-control" name="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Type</label>
                                    <select class="form-control" name="type">
                                        <option value="1">Summary</option>
                                        <option value="2">Detail</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="pur-r-report">
    <div class="modal-dialog">
        <div class="modal-content gen-led" style="height: 95vh;">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Purchase Return Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/pur-r-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Supplier</label>
                                    <select class="form-control" name="customer" id="customer">
                                        <option></option>
                                        @foreach ($supplier as $row)
                                        <option value="{{ $row->seller_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option></option>
                                        @foreach ($product_category as $row)
                                        <option value="{{ $row->product_category_id }}">{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Company</label>
                                    <select class="form-control" name="product_company">
                                        <option></option>
                                        @foreach ($product_company as $row)
                                        <option value="{{ $row->product_company_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select class="form-control" name="product">
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Select Type</label>
                                <select class="form-control" name="type">
                                    <option value="1">Invoice Wise</option>
                                    <option value="2">Prodcut Wise</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row" style="justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="pur-report">
    <div class="modal-dialog">
        <div class="modal-content gen-led" style="height: 95vh;">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Purchase Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/pur-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Supplier</label>
                                    <select class="form-control" name="customer" id="customer">
                                        <option></option>
                                        @foreach ($supplier as $row)
                                        <option value="{{ $row->seller_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option></option>
                                        @foreach ($product_category as $row)
                                        <option value="{{ $row->product_category_id }}">{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Company</label>
                                    <select class="form-control" name="product_company">
                                        <option></option>
                                        @foreach ($product_company as $row)
                                        <option value="{{ $row->product_company_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select class="form-control" name="product">
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Select Type</label>
                                <select class="form-control" name="type">
                                    <option value="1">Invoice Wise</option>
                                    <option value="2">Prodcut Wise</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row" style="justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="sale-r-report">
    <div class="modal-dialog">
        <div class="modal-content gen-led" style="height: 95vh;">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Sale Return Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/sale-r-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Customer</label>
                                    <select class="form-control" name="customer" id="customer">
                                        <option></option>
                                        @foreach ($customer as $row)
                                        <option value="{{ $row->buyer_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option></option>
                                        @foreach ($product_category as $row)
                                        <option value="{{ $row->product_category_id }}">{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Company</label>
                                    <select class="form-control" name="product_company">
                                        <option></option>
                                        @foreach ($product_company as $row)
                                        <option value="{{ $row->product_company_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select class="form-control" name="product">
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Select Type</label>
                                <select class="form-control" name="type">
                                    <option value="1">Invoice Wise</option>
                                    <option value="2">Prodcut Wise</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row" style="justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="sale-report">
    <div class="modal-dialog">
        <div class="modal-content gen-led" style="height: 95vh;">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Sale Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/sale-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Customer</label>
                                    <select class="form-control" name="customer" id="customer">
                                        <option></option>
                                        @foreach ($customer as $row)
                                        <option value="{{ $row->buyer_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option></option>
                                        @foreach ($product_category as $row)
                                        <option value="{{ $row->product_category_id }}">{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Company</label>
                                    <select class="form-control" name="product_company">
                                        <option></option>
                                        @foreach ($product_company as $row)
                                        <option value="{{ $row->product_company_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select class="form-control" name="product">
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label>Select Type</label>
                                <select class="form-control" name="type">
                                    <option value="1">Summary</option>
                                    <option value="2">invoice Wise</option>
                                    <option value="3">Prodcut Wise</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row" style="justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="cus-led">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Customer Ledger</h4>
                <div class="modal-body">
                    <form method="GET" action="/cus-led">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Customer</label>
                                    <select class="form-control" name="customer" id="customer" required>
                                        <option></option>
                                        @foreach ($customer as $row)
                                        <option value="{{ $row->buyer_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <select name="type" id="type">
                                        <option value="1">Sale Invoice Wise</option>
                                        <option value="2">Receipt Voucher Wise</option>
                                        <option value="3">All Legder</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row" style="justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="supplier-led">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Supplier Ledger</h4>
                <div class="modal-body">
                    <form method="GET" action="/supplier-led">
                        @csrf
                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option></option>
                                        @foreach ($supplier as $row)
                                        <option value="{{ $row->seller_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">

                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="profit-led">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Profit Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/profit-led">
                        @csrf
                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="stock-report">
    <div class="modal-dialog">
        <div class="modal-content stock-report">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Stock Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/stock-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Product Category</label>
                                    <select class="form-control" name="product_category">
                                        <option></option>
                                        @foreach ($product_category as $row)
                                        <option value="{{ $row->product_category_id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Select Product Company</label>
                                    <select class="form-control" name="product_company">
                                        <option></option>
                                        @foreach ($product_company as $row)
                                        <option value="{{ $row->product_company_id }}">{{ $row->company_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Product</label>
                                    <select class="form-control" name="product" id="product">
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="warehouse-report">
    <div class="modal-dialog">
        <div class="modal-content warehouse-report">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Stock Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/warehouse-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Warehouse</label>
                                    <select class="form-control" name="warehouse" id="warehouse">
                                        <option></option>
                                        @foreach ($warehouse as $row)
                                        <option value="{{ $row->warehouse_id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
    margin-top: 3.5%;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script>
    // if ($('#gen-led').hasClass('show')) {

    //     $('.form-control').select2({})
    // }    

    //         $('#gen-led').hide()

    $(document).ready(function() {
        $('.select2').select2({
            theme: 'classic',
            width: '100%',
        });
    });
</script>

<div class="modal fade" id="p-return">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="">
                        @csrf
                        <div class="form-group">
                            <label for="username">GR No</label>
                            <input type="number" min="1" class="form-control" id="invoice" name="limit" required value="">
                        </div>

                        <button type="button" class="btn btn-primary" id="btn" onclick="invoice()">Submit</button>

                    </form>
                    <script>
                        function invoice() {
                            let v = $("#invoice").val()

                            window.location.href = '/rp_med_invoice_form_id=' + v
                        }
                    </script>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="si-search">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Search Sale Invoice</h4>
                <div class="modal-body">
                    <form method="GET" action="/saleInvoice-search">
                        @csrf
                        <div class="form-group">
                            <label for="">Invoice No</label>
                            <input type="text" class="form-control" name="invoice_no" required>
                        </div>

                        <button type="submit" target class="btn btn-primary" id="btn">Search</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="pi-search">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Search Purchase Invoice</h4>
                <div class="modal-body">
                    <form method="GET" action="/purchaseInvoice-search">
                        @csrf
                        <div class="form-group">
                            <label for="">Invoice No</label>
                            <input type="text" class="form-control" name="invoice_no" required>
                        </div>

                        <button type="submit" target class="btn btn-primary" id="btn">Search</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="p_voucher_report">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Payment Voucher Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/p-voucher-report">
                        @csrf
                        <div class="row justify-content-between">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Company</label>
                                    <select class="form-control" name="company">
                                        <option></option>
                                        @foreach ($supplier as $row)
                                        <option value="{{ $row->seller_id }}S">{{ $row->company_name }} (Supplier)</option>
                                        @endforeach

                                        @foreach ($customer as $row)
                                        <option value="{{ $row->buyer_id }}B">{{ $row->company_name }} (Customer)</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Contra Account</label>
                                    <select class="form-control" name="contra_account">
                                        <option></option>
                                        @foreach ($account as $row)
                                        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">

                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="r_voucher_report">
    <div class="modal-dialog">
        <div class="modal-content gen-led">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Receipt Voucher Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/r-voucher-report">
                        @csrf
                        <div class="row justify-content-between">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Company</label>
                                    <select class="form-control" name="company">
                                        <option></option>
                                        @foreach ($supplier as $row)
                                        <option value="{{ $row->seller_id }}S">{{ $row->company_name }} (Supplier)</option>
                                        @endforeach

                                        @foreach ($customer as $row)
                                        <option value="{{ $row->buyer_id }}B">{{ $row->company_name }} (Customer)</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Contra Account</label>
                                    <select class="form-control" name="contra_account">
                                        <option></option>
                                        @foreach ($account as $row)
                                        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Sales Officer</label>
                                    <select class="form-control" name="sales_officer">
                                        <option></option>
                                        @foreach ($sales_officer as $row)
                                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">

                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" class="date" name="start_date" value="{{$startDate}}" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" class="date" name="end_date" value="{{$endDate}}" id="" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="submit" style="
    text-align: center;
">
                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>