@include('inc.style')
@include('inc.bar')

@yield('content')



@php
// Retrieve data directly in Blade
$account = \App\Models\accounts::all();
$warehouse = \App\Models\warehouse::all();
$sales_officer = \App\Models\sales_officer::all();

$customer = \App\Models\buyer::all();

$warehouse = \App\Models\warehouse::all();
$product = \App\Models\products::all();

@endphp
<style>
    /* styles.css */
    .loader-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-top: 4px solid green;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="loader-wrapper" id="loader">
    <div class="loader"></div>
</div>
<script>
    // script.js
    window.onload = function() {
        const loader = document.getElementById("loader");
        loader.style.display = "none";
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
@if (session('message') != '')

<script>
    Swal.fire({
        icon: 'success',
        title: "{{ session('message') }}",
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1900 // Automatically close after 3 seconds
    });
    $('.select').select2({
        theme: 'default',
        width: 'resolve',
    });

    // Swal.fire({
    //     icon: 'success',
    //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    //   })    
</script>

@endif

@if (session('something_error') != '')
<script>
    Swal.fire({
        icon: 'warning',
        title: "{{ session('message') }}",
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1900 // Automatically close after 3 seconds
    });
</script>
@endif
@if($errors->all() != null)
<script>
    Swal.fire({
        icon: 'warning',
        @foreach ($errors->all() as $error)

        title: "{{ $error }}",
@endforeach
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1900 // Automatically close after 3 seconds
    });
</script>
@endif


<br><br><br><br><br><br>
<!-- <div class="row" style="align-items: center;">
    <div class="col-md-12">
        <div class="copyright">
            <p style="color: #a0aec0;">Version: 0.1.0</p>
        </div>
    </div>
</div> -->
<div class="row" style="align-items: center;">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2023 <a href="https://psofts.online" style="color: green;">www.psofts.online</a> All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </div>
</div>




<!-- href="" data-toggle="modal" data-target="#login-modal" -->




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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="number" min="1" class="form-control " id="type" name="limit" required value="">
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
                            <input type="color" class="form-control " name="theme_color" style="min-height:10vh;" value="{{$theme_color}}">
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
                                    <select class="form-control " name="head_account" id="head_account" onchange="accountData()">
                                        <option></option>
                                        <option value="1" data-id="1">Cash</option>
                                        <option value="2" data-id="2">Accounts Receivable</option>
                                        <option value="3" data-id="3">Accounts Payable</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Account</label>
                                    <label for=""></label>
                                    <select class="form-control " name="account" id="gen-led-account">
                                        <option></option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>Sales Officer</label>
                                    <label for=""></label>
                                    <select class="form-control " name="sales_officer">
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
                                    <select class="form-control " name="company_type">
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

                        </div>

                        <div class="row" style="    justify-content: space-between;
margin-top:12%;
text-align: center;
">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">From:</label>

                                    <input type="date" name="start_date" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" name="end_date" id="" required>
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
                                    <select class="form-control " name="customer" id="customer">
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
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
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

                                    <input type="date" name="start_date" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" name="end_date" id="" required>
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

                                    <input type="date" name="start_date" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" name="end_date" id="" required>
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
                <h4>StockT Report</h4>
                <div class="modal-body">
                    <form method="GET" action="/stock-report">
                        @csrf
                        <div class="row" style="justify-content: space-between;">

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Product</label>
                                    <select class="form-control " name="product" id="product" required>
                                        <option></option>
                                        @foreach ($product as $row)
                                        <option value="{{ $row->product_id }}">{{ $row->product_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
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

                                    <input type="date" name="start_date" id="" required>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">To:</label>
                                    <input type="date" name="end_date" id="" required>
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
        $('select').select2({
            theme: 'default',
            width: 'resolve',
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
                            <input type="number" min="1" class="form-control " id="invoice" name="limit" required value="">
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

@include('inc.script')