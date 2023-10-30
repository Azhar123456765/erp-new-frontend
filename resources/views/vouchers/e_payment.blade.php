 @section('content')

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
        width: 100%;

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

    .invoice input {
        width: 131px !important;
        height: 27px !important;
    }

    select {
        width: 131px !important;
        height: 27px !important;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
        width: 91 !important;
        height: 27px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 131px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
        margin-right: -3%;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        margin: 3px;
        width: 91% !important;
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




    .label {
        text-align: center;
        height: 55px;
        width: 49%;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
        justify-content: space-evenly;
        margin-left: 475px;
    }

    .label label {
        width: 71px;

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


    #form {
        width: 140%;
        margin-left: -22%;
    }

    .items .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 191px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }


    .remark .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 219px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }


    .cash .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 159px !important;
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
        <h3 style="text-align: center;">Payment Voucher</h3>
        @foreach ($sp_voucher as $sinvoice_row)

        <h5 style="text-align: end;">Medician</h5>
        <div class="top">
            <div class="fields">
                <div class="one">
                    <input onkeydown="handleKeyPress(event)" style="border: none !important;" style="border: none !important;" readonly type="date" id="date" name="date" value="<?php
                                                                                                                                                                                    $currentDate = date('Y-m-d');
                                                                                                                                                                                    echo $currentDate;
                                                                                                                                                                                    ?>" />
                </div>
                <div class="one">
                    <label for="Invoice">GR#</label>
                    <input onkeydown="handleKeyPress(event)" style="border: none !important;" type="text" id="invoice#" name="unique_id" readonly value="{{$sinvoice_row->unique_id}}" />
                </div>
                <div class="one">
                    <label for="Invoice">Ref No</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="ref_no" name="ref_no" value="{{$sinvoice_row->ref_no}}" />
                </div>


            </div>

            <div class="fields">
                <div class="one">
                    <label for="date">Date</label>
                    <input onkeydown="handleKeyPress(event)" style="width: 219px !important; border: none !important;" type="date" id="date" name="date" value="{{$sinvoice_row->date}}" />
                </div>

            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="seller">Company</label>
                    <select name="company" id="seller" class="company" required>
                        <option></option>
                        @foreach ($seller as $row)
                        <option value="{{ $row->seller_id }}S" {{ $row->seller_id == $sinvoice_row->company . 'S' ? 'selected' : '' }} data-debit="{{ $row->debit }}">{{ $row->company_name }}</option>
                        @endforeach
                        @foreach ($buyer as $row)
                        @if ($row->buyer_id == $sinvoice_row->company)
                        <option value="{{ $row->buyer_id }}B" {{ $row->buyer_id == $sinvoice_row->company . 'B' ? 'selected' : '' }} data-debit="{{ $row->debit }}">{{ $row->company_name }}</option>
                        @endif
                        @endforeach
                    </select>

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
                <label for="unit">Cheque No (s)</label>
                <label for="batch_no">Cheque Date</label>
                <label for="expiry">Cash/Bank Account</label>
                <label for="price">Amount</label>
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
                    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="<?php echo $counter; ?>narration" name="narration[]" value="{{$invoice_row->narration}}" />
                </div>


                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="<?php echo $counter; ?>cheque_no" name="cheque_no[]" value="{{$invoice_row->cheque_no}}" />
                </div>
                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" id="<?php echo $counter; ?>cheque_date" name="cheque_date[]" value="{{$invoice_row->cheque_date}}" />
                </div>
                <div class="div">
                    <select class="cash_bank" name="cash_bank[]" style="height: 28px">
                        <option></option>

                        @foreach ($account as $row)
                        <option value="{{ $row->account_id }}" {{ $row->account_id == $invoice_row->cash_bank ? 'selected' : '' }}>{{ $row->account_name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" onchange='total_amount()' id="<?php echo $counter; ?>amount" name="amount[]" value="{{$invoice_row->amount}}" />
                </div>
            </div>


            @php
            $counter++;
            @endphp
            @endforeach

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
        @foreach ($sp_voucher as $sinvoice_row)

        <div class="total" style="margin-top: 2.25%;">
            <div class="first">
                <div class="one" style="
            margin-left: 0%;
        ">

                    <input onkeydown="handleKeyPress(event)" type="number" step="any" name="amount_total" id="amount_total" style="
            margin-left: 220%;
            text-align:end;
        " readonly value="{{$sinvoice_row->amount_total}}">


                </div>
                @endforeach
                <br>










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
display: flex;
    /* justify-content: center; */
    margin-top: -5.5%;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;">
        submit
    </button>


    <a href="/p_voucher" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px;">
        Add More
    </a>

    <a href="p_voucher_pdf_{{$rand}}" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px;">
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
        addInvoice();
        addInvoice2(` + counter + `);
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




    var counter = 1
    var countera = 0
    var stop = 0

    function addInvoice(one) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
            <div class="dup_invoice" >


<div class="div">
    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter + `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
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


        //     if (amount2 > 0 && narration2 != '') {

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
<input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter + `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
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
        // let amount2 = $("#amount" + counter).val()
        // let narration2 = $("#narration" + counter).val()

        // if (!$("#narration" + counter).hasClass('check')&& $("#narration").hasClass('check') && $("#narration").val() != '') {


        //     if (amount2 > 0 && narration2 != '') {

        //         $("#narration" + counter).addClass("check")



        //         counter++
        //         countera++


        //         $(".invoice").append(clonedFields);

        //     }

        // }


    }

















    function total_amount() {
        let count = <?php echo $counter; ?> - 1;

        var atotal = 0; // Initialize atotal outside the loops.

        for (let i = 1; i <= count; i++) {
            let amount1 = parseFloat($("#" + i + "amount").val());
            atotal += amount1; // Add amount1 to atotal in each iteration.
        }

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseFloat($("#amount" + i).val());
            atotal += amount1; // Add amount1 to atotal in each iteration.
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
            url: "/ep_voucher_form_id=<?php foreach ($sp_voucher as $key => $row) {
                                            echo $row->unique_id;
                                        } ?>",
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the response

                Swal.fire({
                    icon: 'success',
                    title: response,
                    timer: 1900 // Automatically close after 3 seconds
                });
                $(".submit").css("display", "none")
                $(".edit").css("display", "block")



            },
            error: function(error) {
                // Handle the error
            },
        });
    })
    $(document).on('keydown', function(e) {
        if ((e.shiftKey) && (String.fromCharCode(e.which).toLowerCase() === 'a')) {
            var link = document.querySelector('.add-more');
            window.location.href = link.href;
        }
    });
    $(document).on('keydown', function(e) {
        if ((e.shiftKey) && (String.fromCharCode(e.which).toLowerCase() === 'p')) {
            var link = document.querySelector('.pdf');
            window.location.href = link.href;
        }
    });</script>

@endsection