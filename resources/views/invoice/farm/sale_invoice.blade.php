@extends('master') @section('title', 'Sale Invoice') @section('content')

<head>

</head>
<style>
    @media (max-width: 755px) {
        body {
            overflow: scroll !important;
            width: max-content;

        }

        .img {
            position: absolute;
            top: 70% !important;
            left: 80.5% !important;
            width: 217px;
            height: 191px;
        }

        .options {
            width: 23% !important;
        }

    }





    .container {
        transform: scale(0.75);
    }

    * input {
        border: 1px solid gray !important;
        width: 71px;
    }

    label {
        margin: 3px;
        font-weight: 900;
        font-size: medium;
    }

    .top label {
        margin: 5px;
    }

    .dup_invoice label {
        width: 55px;
        text-align: center;
        height: 55px;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
    }




    .dup input {
        border: 1px solid;
        width: 71px;
    }

    .total input {
        border: 1px solid;
        width: 71px;
    }

    .dup_invoice {
        /* margin-top: 39px; */
        margin: 6px;
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .dup {
        /* margin-top: 39px; */
        display: flex;
        justify-content: center;
    }

    .invoice input {
        border: 1px solid;
        width: 71px;
    }

    .invoice label {
        text-align: center;
    }

    .invoice {
        background-color: #f8f9fa;
        border: none;

        height: 167.5px;
        overflow-y: scroll;
        overflow-x: hidden;

    }

    .total input {
        border: 1px solid;
        width: 71px;
    }

    .top {
        /* margin-top: 5%; */
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-around !important;
    }

    input {
        width: 131px !important;
        height: 27px !important;
    }

    select {
        width: 131px !important;
        height: 27px !important;
    }

    .select2-container--classic {
        width: 191px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
    }

    #form {
        width: 140%;
        margin-left: -22%;
    }

    .fields {

        width: 19%;
        justify-content: space-around;
        flex-direction: column;
    }

    .one {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .flex {
        display: flex;
        justify-content: end;
    }

    input:focus {
        border: 3px solid;
        background-color: lightgray;
        /* Change this to your desired dark background color */
        color: black;
        /* Change this to your desired text color */
        outline: none;
        /* Remove the classic focus outline */
    }

    .select2:focus {
        border: 100px solid;
        background-color: lightgray;
        /* Change this to your desired dark background color */
        color: black;
        /* Change this to your desired text color */
        outline: 50px;
        /* Remove the classic focus outline */
    }


    .remark .select2-container--classic .select2-selection--single .select2-selection__rendered {
        width: 219px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }

    .cash .select2-container--classic .select2-selection--single .select2-selection__rendered {
        width: 159px !important;
    }

    /* .fields input{
    padding-left: 25%;
  }
  .one select{
    padding-left: 25%;
      } */

    .dup_invoice input {
        border: 1px solid;
        width: 63px !important;
    }

    .dup_invoice input[id="amount"] {
        width: 90px !important;
    }

    .total input {
        width: 63px !important;
    }

    .xl-width-inp {
        width: 90px !important;
    }
</style>
<div class="container" style="margin-top: -90px; padding-top: 5px;        overflow-x: visible;
">
    <form id="form">
        <h3 style="text-align: center;">Sale Invoice</h3>

        <h5 style="text-align: end;">FARM</h5>
        <div class="top">
            <div class="fields">
                <div class="one">
                    <label for="Invoice">Invoice#</label>
                    <input onkeydown="handleKeyPress(event)" style="border: none !important; width: 219px !important;"
                        type="text" id="invoice#" name="unique_id" value="<?php $year = date('Y');
                        $lastTwoWords = substr($year, -2);
                        echo $rand = 'SI' . '-' . $year . '-' . $count + 1; ?>" />
                </div>
                <div class="one">
                    <label for="date">Date</label>
                    <input onkeydown="handleKeyPress(event)"
                        style="border: none !important; width: 219px !important; text-align:center;        " type="date"
                        id="date" name="date" value="<?php
                        $currentDate = date('Y-m-d');
                        echo $currentDate;
                        ?>" />
                </div>
                <div class="one  remark">
                    <label for="seller">Company</label>
                    <select name="company" id="seller" class="company select-buyer" onchange="seller123()" required>

                    </select>
                </div>

            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="sales_officer">Sales Officer</label>
                    <select name="sales_officer" id="sales_officer" class="select-sales_officer">
                    </select>

                </div>
                <input onkeydown="handleKeyPress(event)" type="hidden" name="unique_id" value="<?php echo $rand; ?>">
                <div class="one  remark">
                    <label for="remark">Remarks</label>
                    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="remark"
                        name="remark" />
                </div>
            </div>
        </div>

        <br />

        <div class="invoice">
            @csrf
            <div class="dup_invoice" onchange="addInvoice()">
                <div class="div   items">
                    <label for="item">Item</label>
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice()" required class="item0">
                        <option value="000">Chickens</option>
                        <option value="111">Chicks</option>
                        <option value="222">Feed</option>
                    </select>
                </div>
                <script></script>

                <div class="div">
                    <label for="rate_type">Rate Type</label>
                    <input onkeydown="handleKeyPress(event)" type="text" style="text-align:center !important;"
                        id="rate_type" name="rate_type[]" />
                </div>

                <div class="div">
                    <label for="vehicle_no">Vehicle No.</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="vehicle_no" name="vehicle_no[]" />
                </div>

                <div class="div">
                    <label for="crate_type">Crate Type</label>
                    <input onkeydown="handleKeyPress(event)" type="date" id="crate_type" name="crate_type[]" />
                </div>



                <div class="div">
                    <label for="price">Crate Qty</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" placeholder="0.00" id="crate_qty" name="crate_qty[]" required
                        onchange="count();  total_amount();" />
                </div>

                <div class="div">
                    <label for="pur_qty">Hen Qty</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="hen_qty" name="hen_qty[]" onchange='qty(); per_unit();' />
                </div>

                <div class="div">
                    <label for="pur_qty">Gross Weight</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="gross_weight" name="gross_weight[]" />
                </div>

                <div class="div">
                    <label for="dis">Actual Rate</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="actual_rate" name="actual_rate[]"
                        onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <label for="dis">Feed Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="feed_cut" name="feed_cut[]"
                        onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <label for="mor_cut">Mor Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="mor_cut" name="mor_cut[]" />
                </div>

                <div class="div">
                    <label for="crate_cut">Crate Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="crate_cut" name="crate_cut[]" />
                </div>



                <div class="div">
                    <label for="n_weight">N.Weight</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="n_weight" name="n_weight[]" readonly />
                </div>
                <div class="div">
                    <label for="rate_diff">Rate Diff</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="rate_diff" name="rate_diff[]" />
                </div>
                <div class="div">
                    <label for="rate">Rate</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="rate" name="rate[]" />
                </div>
                <div class="div">
                    <label for="amount">Amount</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;width: 90px !important;" step="any" value="0.00" onchange='count()'
                        id="amount" name="amount[]" class="xl-width-inp" />
                </div>
                <div class="div">
                    <label for="pur_dis">Feed Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="pur_feed_cut" name="pur_feed_cut[]"
                        onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <label for="pur_mor_cut">Mor Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" id="pur_mor_cut" name="pur_mor_cut[]" />
                </div>

                <div class="div">
                    <label for="pur_crate_cut">Crate Cut</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="pur_crate_cut" name="pur_crate_cut[]" />
                </div>



                <div class="div">
                    <label for="pur_n_weight">N.Weight</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="pur_n_weight" name="pur_n_weight[]" />
                </div>
                <div class="div">
                    <label for="avg">&nbsp; AVG</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="avg" name="avg[]" />
                </div>
                <div class="div">
                    <label for="pur_rate_diff">Rate Diff</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="pur_rate_diff" name="pur_rate_diff[]" />
                </div>
                <div class="div">
                    <label for="pur_rate">Rate</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;"
                        step="any" value="0.00" onchange='count()' id="pur_rate" name="pur_rate[]" />
                </div>
                <div class="div">
                    <label for="pur_amount">Amount</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00"
                        style="text-align: right;width: 90px !important;" step="any" value="0.00" onchange='count()'
                        id="pur_amount" name="pur_amount[]" class="xl-width-inp" />
                </div>

            </div>
        </div>


        <style>
            .total {
                justify-content: center;
                /* width: 50%; */
                /* align-items: flex-end; */
                display: flex;
            }

            .total .last input {
                margin-top: 9px !important;

            }

            .one {
                display: flex;
                justify-content: space-between;
                margin-top: 5px;
                flex-direction: row;
            }

            .last {
                display: flex;

                flex-direction: column;
            }

            .last .one input {
                margin-top: 5px;
            }

            .options {
                display: flex;
                justify-content: center;
                margin-top: -7%;
            }
        </style>

        <div class="total" style="margin-top: 2.25%;">
            <div class="first">
                <div class="one" style="
                margin-left: -136%;
            ">
                    <label for="mor_cut" style="
        position: fixed;
        top: 95%;
        left: -1%;
    ">Total</label>
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="crate_qty_total"
                        id="crate_qty_total" style="
                            /* margin-left: 2%; */
                            position: fixed;
                            top: 95%;
                            left: 7%;
            "=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="hen_qty_total"
                        id="hen_qty_total" style="
                /* margin-left: 52%; */
                position: fixed;
                top: 95%;
                left: 12.5%;
            "=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="gross_weight_total
                        id=" gross_weight_total" style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: 18%;
            "=""="">



                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="feed_cut_total"
                        id="feed_cut_total" style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: 29%;
            "=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="mor_cut_total"
                        id="mor_cut_total" style="
            /* margin-left: 30%; */
            position: fixed;
            top: 95%;
            left: 34.7%;
        "=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="crate_cut_total"
                        id="crate_cut_total" style="
        /* margin-left: 30%; */
        position: fixed;
        top: 95%;
        left: 40.4%;
    "=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="n_weight_total"
                        id="n_weight_total" style="
    /* margin-left: 30%; */
    position: fixed;
    top: 95%;
    left: 46%;
"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_amount_total"
                        id="pur_amount_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;width: 90px !important;left: 62.4%;"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_feed_cut_total"
                        id="pur_feed_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 70.4%;"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_mor_cut_total"
                        id="pur_mor_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 75.9%;"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_crate_cut_total"
                        id="pur_crate_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 81.3%;"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_n_weight_total"
                        id="pur_n_weight_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 86.9%;"=""="">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="pur_amount_total"
                        id="pur_amount_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 108.8%;width: 90px !important;"=""="">


                </div>


            </div>
        </div>

</div>
<style>
    .options a {
        margin-top: 5px;
    }

    .options button {
        margin-top: 5px;
    }
</style>
<div class="options" style="
display: none;
    /* justify-content: center; */
    margin-top: -21.5%;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" id="btn" style="padding: 2px; margin-left: 19px;">
        submit
    </button>
    <br>

    <button type="submit" class="btn btn-secondary btn-sm  submit" id="btn" style="padding: 2px; margin-left: 19px;"
        onclick="
            var str = $(`[name=\'unique_id\']`).val();
    var parts = str.split('-');
    var firstPart = parts.slice(0, -1).join('-');
    var lastPart = parts[parts.length - 1];
    var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) - 1);
    window.location.href = newUrl">
        Previous
    </button>

    <button type="submit" class="btn btn-secondary btn-sm  submit" id="btn" style="padding: 2px; margin-left: 19px;"
        onclick="
      var str = $(`[name=\'unique_id\']`).val();
    var parts = str.split('-');
    var firstPart = parts.slice(0, -1).join('-');
    var lastPart = parts[parts.length - 1];
    var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) + 1);
    window.location.href = newUrl
    ">
        Next
    </button>

    <a href="/es_med_invoice_id={{ $rand }}" class="edit edit-btn  btn btn-secondary btn-sm"
        style="margin-left: 19px; display:none;">
        Edit
    </a>

    <a href="/s_med_invoice" class="edit add-more  btn btn-secondary btn-sm" style="margin-left: 19px; display:none;">
        Add More
    </a>


    <a href="/sale_invoice_pdf_{{ $rand }}" class="edit pdf btn btn-secondary btn-sm"
        style="margin-left: 19px; display:none;">
        PDF
    </a>


    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;" onclick="
    
    window.location.reload()
    ">
        Revert
    </button>

</div>


</form>
</div>

<div class="img" style="
    position: absolute;
    top: 77%;
    left: 19.5%;
    width: 217px;
    height: 191px;
    ">
    <a href="" target="_blank" class="p-img">
        <img src="g" alt="Product  does not have any img or an error occur" style="
    width: 100%;
    height:100%;
    display:none;
" id="p-img">

    </a>
</div>


<div class="flex justify-center items-center" style="display: none">
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center custom-alert" style="
            position: fixed;
            top: 79%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32%;
            opacity: 0.75;
        ">
        <span class="show1"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
</div>


<script>
    // $("#item option").click(function() {
    //     // Initialize Select2 for the desired select elements
    //     $("select").select2();
    //     $('.select').select2({
    //         theme: 'classic',
    //         width: 'resolve',
    //     });
    //     // Initialize other select elements if necessary
    // });

    $(document).ready(function () {
        // Initialize Select2 for the desired select elements
        $("select").select2({
            maximumSelectionLength: 100,
        });


        // Initialize other select elements if necessary
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });



    $('#form').submit(function (event) {
        event.preventDefault();

        // Get the form data
        var formData = $("#form").serialize();

        // Send an AJAX request
        $.ajax({
            url: '/s_med_invoice_form', // Replace with your Laravel route or endpoint
            method: 'POST',
            data: formData,
            success: function (response) {
                // Handle the response

                Swal.fire({
                    title: 'Send invoice to company email',
                    text: 'Choose an action',
                    icon: 'success',
                    showCancelButton: false,
                    showConfirmButton: true,
                    showDenyButton: true,
                    confirmButtonText: 'Send',
                    denyButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/s_med_invoice_mail', // Replace with your Laravel route or endpoint
                            method: 'POST',
                            data: formData,
                        })
                    }
                });
                // $("#btn").css("display", "none")
                $(".edit").css("display", "block")
                $("#btn").css("display", "none")



            },
            error: function (error) {
                // Handle the error
            },
        });
    })
    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'a')) {
            var link = document.querySelector('.add-more');
            window.location.href = link.href;
        }
    });
    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'p')) {
            var link = document.querySelector('.pdf');
            window.location.href = link.href;
        }
    });
    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'e')) {
            var link = document.querySelector('.edit-btn');
            window.location.href = link.href;
        }
    });

    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 's')) {
            $("#si-search").modal('show');
        }
    });

    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'n')) {
            var str = $('[name=\'unique_id\']').val();
            var parts = str.split('-');
            var firstPart = parts.slice(0, -1).join('-');
            var lastPart = parts[parts.length - 1];
            var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) + 1);
            window.location.href = newUrl;
        }
    });

    $(document).on('keydown', function (e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'b')) {
            var str = $('[name=\'unique_id\']').val();
            var parts = str.split('-');
            var firstPart = parts.slice(0, -1).join('-');
            var lastPart = parts[parts.length - 1];
            var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) - 1);
            window.location.href = newUrl;
        }
    });
</script>



@endsection