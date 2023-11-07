@extends('master') @section('title','Payment Voucher (EDIT)') @section('content')

<head>

    <head>
        <!-- Include other necessary scripts and stylesheets -->
        <!-- Include Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <!-- Include jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    </head>
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
        font-weight: bolder;
    }

    .top label {
        margin: 5px;
    }

    .dup_invoice label {
        width: 71px;
        text-align: center;
        height: 55px;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
    }


    .dup_invoice input {
        border: 1px solid;
        width: 71px;
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
        width: 181px !important;
        height: 27px !important;
    }

    select {
        width: 181px !important;
        height: 27px !important;
    }

    #form {
        width: 140%;
        margin-left: -22%;
    }

    .select2-container--classic {
        width: 191px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
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
        /* Remove the default focus outline */
    }



    .remark .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 219px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }



    .label {
        text-align: center;
        height: 50px;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
        width: 67%;
        justify-content: space-evenly;
        margin-left: 300px;
    }

    .label label {
        width: 71px;

    }

    /* .fields input{
    padding-left: 25%;
  }
  .one select{
    padding-left: 25%;
      } */
</style>
<div class="container" style="margin-top: -37px; padding-top: 5px;        overflow-x: visible;
">
    <form id="form">
        <h3 style="text-align: center;">Payment Voucher (EDIT)</h3>

        <h5 style="text-align: end;">Medician</h5>
        @foreach ($sp_voucher as $sinvoice_row)

        <div class="top">
            <div class="fields">
                <div class="one">
                    <label for="Invoice">GR#</label>
                    <input onkeydown="handleKeyPress(event)" style="border: none !important;" type="text" id="invoice#" name="unique_id" readonly value="{{$sinvoice_row->unique_id}}" />
                </div>
                <div class="one">
                    <label for="date">Date</label>
                    <input onkeydown="handleKeyPress(event)" style="border: none !important;" type="date" id="date" name="date" value="{{$sinvoice_row->date}}" />
                </div>



            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="seller">Company</label>
                    <select name="company" class="company" required>
                        <option></option>
                        @foreach ($seller as $row)
                        <option value="{{ $row->seller_id }}S" data-debit="{{ $row->debit }}" {{ $row->seller_id .'S' == $sinvoice_row->company  ? 'selected' : '' }}>
                            {{ $row->company_name }} (Supplier)
                        </option>
                        @endforeach
                        @foreach ($buyer as $row)
                        <option value="{{ $row->buyer_id }}B" data-debit="{{ $row->debit }}" {{ $row->buyer_id .'B' == $sinvoice_row->company ? 'selected' : '' }}>
                            {{ $row->company_name }} (Customer)
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="one  remark">
                    <label for="seller">Sales Ofiicer</label>
                    <select name="sales_officer" id="sales_officer" class="sales_officer" required>
                        <option></option>
                        @foreach ($sales_officer as $row)
                        <option value="{{ $row->sales_officer_id }}" {{ $row->sales_officer_id == $sinvoice_row->sales_officer ? 'selected' : '' }}>
                            {{ $row->sales_officer_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="fields">


                <div class="one">
                    <label for="Invoice">Ref No</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="ref_no" name="ref_no" value="{{$sinvoice_row->ref_no}}" />
                </div>
                <div class="one  remark">
                    <label for="remark">Remarks</label>
                    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="remark" name="remark" value="{{$sinvoice_row->remark}}" />
                </div>
            </div>
        </div>
        @endforeach

        <br />

        <div class="invoice">
            @csrf
            <div class="label">
                <label for="item" style="padding-right: 91px;">Narration</label>
                <label for="unit">Cheque No</label>
                <label for="batch_no">Cheque Date</label>
                <label>Cash/Bank Account</label>
                <label for="amount">Amount</label>



            </div>
            @php
            $counter = 1;
            @endphp
            @foreach ($p_voucher as $invoice_row)

            @php
            $rand = $invoice_row->unique_id;
            @endphp

            <div class="dup_invoice" onchange="addInvoice()">


                <div class="div">
                    <input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration" name="narration[]" value="{{$invoice_row->narration}}" />
                </div>


                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no" name="cheque_no[]" value="{{$invoice_row->cheque_no}}" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="{{$invoice_row->cheque_date}}" id="cheque_date" name="cheque_date[]" onchange='total_amount()' />
                </div>
                <div class="div">
                    <select class="cash_bank" name="cash_bank[]" style="height: 28px">
                        <option></option>

                        @foreach ($account as $row)
                        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>amount" onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="{{$invoice_row->amount}}" onchange='total_amount()' id="amount" name="amount[]" />
                </div>
            </div>



            @php
            $counter++;
            @endphp
            @endforeach

            <div class="dup_invoice" onchange="addInvoice2()">


                <div class="div">
                    <input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration" name="narration[]" />
                </div>


                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no" name="cheque_no[]" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="0.00" id="cheque_date" name="cheque_date[]" onchange='  total_amount()' />
                </div>
                <div class="div">
                    <select class="cash_bank" name="cash_bank[]" style="height: 28px">
                        <option></option>

                        @foreach ($account as $row)
                        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='total_amount()' id="amount1" name="amount[]" />
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

        </div>
        @foreach ($sp_voucher as $sinvoice_row)

        <div class="total" style="margin-top: 2.25%;">
            <div class="first">
                <div class="one" style="
margin-left: 0%;
">

                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="amount_total" id="amount_total" style="
margin-left: 185%;
text-align:end;
" readonly value="{{$sinvoice_row->amount_total}}">

                </div>

                <br>
            </div>
            @endforeach

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
display: flex;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;">
        Update
    </button>


    <a href="/p_voucher" class="edit add-more btn btn-secondary btn-sm" style="margin-left: 19px;">
        Add More
    </a>

    <a href="/pv_pdf_{{$rand}}" class="edit pdf btn btn-secondary btn-sm" style="margin-left: 19px;">
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
    $(document).change(function() {
        total_amount();
        $('select').select2({
            theme: 'classic',
            width: 'resolve',
        });
        5
    })













    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent the default behavior (e.g., form submission)
            const currentElement = event.target;
            const focusableElements = getFocusableElements();
            const currentIndex = focusableElements.indexOf(currentElement);
            const nextIndex = (currentIndex + 1) % focusableElements.length;
            focusableElements[nextIndex].focus();
        }
    }




    var counter = 2
    var countera = 1
    var stop = 0

    function addInvoice(one) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
            <div class="dup_invoice" >


<div class="div">
    <input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter + `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
</div>


<div class="div">
    <input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no` + counter + `" name="cheque_no[]"  onchange="addInvoice2(` + counter + `)"/>
</div>
<div class="div">
    <input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="0.00" id="cheque_date` + counter + `" name="cheque_date[]"  />
</div>
<div class="div">
    <select class="cash_bank" name="cash_bank[]" style="height: 28px">
        <option></option>

        @foreach ($account as $row)
        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
        @endforeach

    </select>
</div>

<div class="div">
    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='total_amount()' id="amount` + counter + `"  style="text-align:end;" name="amount[]" />
</div>
</div>


  `;



        }

        let amount = $("#cheque_no").val()
        let narration = $("#narration").val()
        if (!$("#narration").hasClass('check')) {


            if (amount > 0 && narration != '') {

                $("#narration").addClass("check")
                console.log(counter + "first");


                counter++
                countera++


                $(".invoice").append(clonedFields);

            }
        }

        // let amount2 = $("#amount" + counter).val()
        // let narration2 = $("#narration" + counter).val()

        // if (!$("#narration" + counter).hasClass('check')&& $("#narration").hasClass('check') && $("#narration").val() != '') {


        //     if (narration2 != '') {

        //         $("#narration" + counter).addClass("check")



        //         counter++
        //         countera++


        //         $(".invoice").append(clonedFields);

        //     }

        // }



    }









    function addInvoice2(one) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
    <div class="dup_invoice" >


<div class="div">
<input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter + `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
</div>


<div class="div">
<input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no` + counter + `" name="cheque_no[]" onchange="addInvoice2(` + counter + `)" />
</div>
<div class="div">
<input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="0.00" id="cheque_date` + counter + `" name="cheque_date[]"  />
</div>
<div class="div">
<select class="cash_bank" name="cash_bank[]" style="height: 28px">
<option></option>

@foreach ($account as $row)
<option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
@endforeach

</select>
</div>

<div class="div">
<input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='total_amount()' id="amount` + counter + `"  style="text-align:end;" name="amount[]" />
</div>
</div>


`;

        }

        counter = counter - 1
        let amount2 = $("#cheque_no" + counter).val()
        console.log(counter);
        let narration2 = $("#narration" + counter).val()
        if (!$("#narration" + counter).hasClass('check')) {


            if (amount2 != '' && narration2 != '') {

                $("#narration" + countera).addClass("check")

                console.log(counter);
                console.log(countera);

                counter++
                countera++


                $(".invoice").append(clonedFields);

            }
        }

        counter = counter + 1
    }

















    function total_amount() {
        let count = <?php echo $counter; ?> - 1;
        var atotal = 0;
        for (let i = 1; i <= count; i++) {
            let amount1 = parseInt($("." + i + "amount").val());
            atotal += amount1;
        }

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseFloat($("#amount" + i).val());
            atotal += amount1;
        }

        $("#amount_total").val(atotal);
    }
</script>
<script>
    $(".cash_bank option").click(function() {
        // Initialize Select2 for the desired select elements
        $("select").select2();

        // Initialize other select elements if necessary
    });

    $(document).ready(function() {
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



    $('#form').submit(function(event) {
        event.preventDefault();

        // Get the form data
        var formData = $("#form").serialize();

        // Send an AJAX request
        $.ajax({
            url: '/ep_voucher_form_id=<?php foreach ($sp_voucher as $key => $row) {
                                                echo $row->unique_id;
                                            } ?>', // Replace with your Laravel route or endpoint
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the response

                Swal.fire({
                    icon: 'success',
                    title: response,
                    timer: 1900 // Automatically close after 3 seconds
                });

            },
            error: function(error) {
                // Handle the error
            },
        });
    })
    $(document).on('keydown', function(e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'a')) {
            var link = document.querySelector('.add-more');
            window.location.href = link.href;
        }
    });
    $(document).on('keydown', function(e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'p')) {
            var link = document.querySelector('.pdf');
            window.location.href = link.href;
        }
    });


    $(document).on('keydown', function(e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'n')) {
            var str = $('[name=\'unique_id\']').val();
    var parts = str.split('-');
    var firstPart = parts.slice(0, -1).join('-');
    var lastPart = parts[parts.length - 1];
    var newUrl = '/ep_voucher_id=' + firstPart + '-' + (parseInt(lastPart) + 1);
    window.location.href = newUrl;
        }
    });

    $(document).on('keydown', function(e) {
        if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'b')) {
            var str = $('[name=\'unique_id\']').val();
    var parts = str.split('-');
    var firstPart = parts.slice(0, -1).join('-');
    var lastPart = parts[parts.length - 1];
    var newUrl = '/ep_voucher_id=' + firstPart + '-' + (parseInt(lastPart) - 1);
    window.location.href = newUrl;
        }
    });

</script>

@endsection