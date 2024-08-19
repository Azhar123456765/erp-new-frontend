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
        transform: scale(0.78);
    }

    input[type="number"] {
        text-align: right !important;
    }

    * input {
        border: 1px solid gray !important;
        width: 71px;
    }

label {
        margin: 3px;
        font-weight: bolder;
        font-size: large;
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
        width: 120px !important;
        text-align: right !important;
    }

    .dup_invoice input[id="amount"] {
        width: 90px !important;
    }

    .total input {
        width: 120px !important;
    }

    .xl-width-inp {
        width: 90px !important;
    }

    .dup_invoice .div {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .dup_invoice .div label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>
<h5 style="text-align: center;">Feed Invoice (FARM MODULE)</h5>

<div class="container" style="margin-top: -40px; padding-top: 5px;        overflow-x: visible;
">
<h6 style="
position: absolute;
top: 35%;
left: 15%;
">Supplier</h6>
<h6 style="
position: absolute;
top: 35%;
right: 15%;
">Customer</h6>
    <form id="form">
        <div class="top">
            <div class="fields">
                <div class="one">
                    <label for="Invoice">Invoice#</label>
                    <input style="border: none !important; width: 219px !important;" type="text" id="invoice#"
                        name="unique_id" value="<?php $year = date('Y');
                        $lastTwoWords = substr($year, -2);
                        echo $rand = 'SI' . '-' . $year . '-' . $count + 1; ?>" />
                </div>
                <div class="one">
                    <label for="date">Date</label>
                    <input style="border: none !important; width: 219px !important; text-align:center;        "
                        type="date" id="date" name="date" value="<?php
                        $currentDate = date('Y-m-d');
                        echo $currentDate;
                        ?>" />
                </div>
                <div class="one  remark">
                    <label for="seller">Supplier</label>
                    <select name="seller" class="company select-buyer" required>

                    </select>
                </div>

            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="sales_officer">Sales Officer</label>
                    <select name="sales_officer" id="sales_officer" class="select-sales_officer">
                    </select>

                </div>
                <input type="hidden" name="unique_id" value="<?php echo $rand; ?>">
                <div class="one  remark">
                    <label for="remark">Remarks</label>
                    <input style="width: 219px !important;" type="text" id="remark" name="remark" />
                </div>
                <div class="one  remark">
                    <label for="seller">Customer</label>
                    <select name="buyer" class="select-seller-buyer-sec" required>

                    </select>
                </div>
            </div>
        </div>

        <br />

        <div class="invoice">
            @csrf
            <div class="dup_invoice" onchange="addInvoice()">
                <div class="div   items">
                    <label for="item">Item</label>
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice()" required
                        class="item0 select-products">
                    </select>
                </div>
                <div class="div">
                    <label for="qty">Quantity</label>
                    <input type="number" id="qty" name="qty[]" />
                </div>

                <div class="div">
                    <label for="rate">Rate</label>
                    <input type="number" id="rate" name="rate[]" />
                </div>

                <div class="div">
                    <label for="crate_type">Discount(%)</label>
                    <input type="number" id="discount" name="discount[]" />
                </div>
                <div class="div">
                    <label for="bonus">Bonus</label>
                    <input type="number" min="0.00" step="any" placeholder="0.00" id="bonus" name="bonus[]"
                        required />
                </div>
                <div class="div">
                    <label for="amount">Amount</label>
                    <input type="number" min="0.00" style="text-align: right;width: 190px !important;"
                        step="any" value="0.00" onchange='count()' id="amount" name="amount[]"
                        class="xl-width-inp" />
                </div>


                <div class="div">
                    <label for="pur_qty">Quantity</label>
                    <input type="number" id="pur_qty" name="pur_qty[]" />
                </div>
                <div class="div">
                    <label for="pur_rate">Rate</label>
                    <input type="number" id="pur_rate" name="pur_rate[]" />
                </div>
                <div class="div">
                    <label for="pur_crate_type">Discount(%)</label>
                    <input type="number" id="pur_discount" name="pur_discount[]" />
                </div>
                <div class="div">
                    <label for="pur_bonus">Bonus(%)</label>
                    <input type="number" min="0.00" step="any" placeholder="0.00" id="pur_bonus"
                        name="pur_bonus[]" required />
                </div>
                <div class="div">
                    <label for="pur_amount">Amount</label>
                    <input type="number" min="0.00" style="text-align: right;width: 190px !important;"
                        step="any" value="0.00" onchange='count()' id="pur_amount" name="pur_amount[]"
                        class="xl-width-inp" />
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
                    <label for="mor_cut"
                        style="
        position: fixed;
        top: 95%;
        left: -20%;
    ">Total</label>


                    <input type="number" step="any" name="qty_total" id="qty_total"
                        style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: -11%;
            "=""="">
                    <input type="number" step="any" name="amount_total" id="amount_total"
                        style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: 31%;
                width: 190px !important;
            "=""="">

                    <input type="number" step="any" name="pur_qty_total" id="pur_qty_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 47.7%;"=""="">
                    <input type="number" step="any" name="pur_amount_total" id="pur_amount_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 89.55%;width: 190px !important;"=""="">

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
<div class="options"
    style="
display: flex;
    /* justify-content: center; */
    margin-top: -4%;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" id="bt"
        style="padding: 2px; margin-left: 19px;">
        submit
    </button>
    <br>

    <button class="btn btn-secondary btn-sm  submit" id="btn" style="padding: 2px; margin-left: 19px;"
        onclick="
            var str = $(`[name=\'unique_id\']`).val();
    var parts = str.split('-');
    var firstPart = parts.slice(0, -1).join('-');
    var lastPart = parts[parts.length - 1];
    var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) - 1);
    window.location.href = newUrl">
        Previous
    </button>

    <button class="btn btn-secondary btn-sm  submit" id="btn" style="padding: 2px; margin-left: 19px;"
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

    <a href="/s_med_invoice" class="edit add-more  btn btn-secondary btn-sm"
        style="margin-left: 19px; display:none;">
        Add More
    </a>


    <a href="/sale_invoice_pdf_{{ $rand }}" class="edit pdf btn btn-secondary btn-sm"
        style="margin-left: 19px; display:none;">
        PDF
    </a>


    <button class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;"
        onclick="
    
    window.location.reload()
    ">
        Revert
    </button>

</div>


</form>
</div>




<div class="flex justify-center items-center" style="display: none">
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center custom-alert"
        style="
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





@push('s_script')
    <script>
        var counter = 1
        var countera = 0


        function addInvoice(one) {

            for (let i = 1; i <= counter; i++) {


                var clonedFields = `
    <div class="dup_invoice" onchange="addInvoice2()">
         <div class="div   items">
                    <select name="item[]" id="item` + counter + ` style="height: 28px" onchange="addInvoice2()" required
                        class="item0 select-products">
                    </select>
                </div>
                <div class="div">
                    <input  type="number" id="qty` + counter + `"
                        name="qty[]" />
                </div>

                <div class="div">
                    <input  type="number" id="rate` + counter + `" name="rate[]" />
                </div>

                <div class="div">
                    <input  type="number" id="discount` + counter + `" name="discount[]" />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        step="any" placeholder="0.00" id="bonus` + counter + `" name="bonus[]" required />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        style="text-align: right;width: 190px !important;" step="any" value="0.00" onchange='count()'
                        id="amount` + counter + `" name="amount[]" class="xl-width-inp" />
                </div>
                
                <div class="div">
                    <input  type="number" id="pur_qty` + counter + `"
                        name="pur_qty[]" />
                </div>
                <div class="div">
                    <input  type="number" id="pur_rate` + counter + `" name="pur_rate[]" />
                </div>

                <div class="div">
                    <input  type="number" id="pur_discount` + counter + `" name="pur_discount[]" />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        step="any" placeholder="0.00" id="pur_bonus` + counter + `" name="pur_bonus[]" required />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        style="text-align: right;width: 190px !important;" step="any" value="0.00" onchange='count()'
                        id="pur_amount` + counter + `" name="pur_amount[]" class="xl-width-inp" />
                </div>
            </div>

`;


            }


            let amount = $("#amount").val()
            let narration = $("#sale_price").val()
            if (!$("#amount").hasClass('check')) {



                $("#amount").addClass("check")
                // console.log(counter + "first");

                counter++
                countera++


                $(".invoice").append(clonedFields);

            }

            $(document).ready(function() {
                $("input").on('input', function() {
                    total_calc();
                });
                $('.select-products').select2({
                    ajax: {
                        url: '{{ route('select2.products') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.product_name,
                                        id: item.product_id,
                                    };
                                })
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 2,
                    theme: 'classic',
                    width: '100%'
                });
                $(".select2-container--open .select2-search__field").focus();

                var selectedOption = $("#item").find('option:selected');
                var unitInput = $('#unit');
                unitInput.val(selectedOption.data(
                    'unit')); // Set the value of the unit input field to the data-unit value of the selected option


                var pInput = $('#pur_price');
                pInput.val(selectedOption.data('pur_price'));


                $('.avail_stock').css("display", "block")
                var stInput = $('#avail_stock');
                let s = selectedOption.data('stock');
                let t = selectedOption.data('name');
                let = st_val2 = '  ' + t + ',  ' + s;
                if (st_val2 != null) {

                    // console.log(st_val2);
                    stInput.val(st_val2);
                }

                // var st = $('#avail_stock2');
                // st.val(selectedOption.data('stock'));
                // var pst = $('#previous_stock');
                // pst.val(selectedOption.data('stock'));

                $('#p-img').css("display", "block")
                var imgInput = $('#p-img');
                var imgSrc = selectedOption.data('img');
                imgInput.attr('src', imgSrc);

                $(".p-img").attr('href', imgSrc)
                // Initialize other select elements if necessary
            });
        }






        function addInvoice2(one) {

            for (let i = 1; i <= counter; i++) {
                var clonedFields = `
    <div class="dup_invoice" onchange="addInvoice2()">
         <div class="div   items">
                    <select name="item[]" id="item` + counter + ` style="height: 28px" onchange="addInvoice2()" required
                        class="item0 select-products">
                    </select>
                </div>
                <div class="div">
                    <input  type="number" id="qty` + counter + `"
                        name="qty[]" />
                </div>

                <div class="div">
                    <input  type="number" id="rate` + counter + `" name="rate[]" />
                </div>

                <div class="div">
                    <input  type="number" id="discount` + counter + `" name="discount[]" />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        step="any" placeholder="0.00" id="bonus` + counter + `" name="bonus[]" required />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        style="text-align: right;width: 190px !important;" step="any" value="0.00" onchange='count()'
                        id="amount` + counter + `" name="amount[]" class="xl-width-inp" />
                </div>


                <div class="div">
                    <input  type="number" id="pur_qty` + counter + `"
                        name="pur_qty[]" />
                </div>
                <div class="div">
                    <input  type="number" id="pur_rate` + counter + `" name="pur_rate[]" />
                </div>

                <div class="div">
                    <input  type="number" id="pur_discount` + counter + `" name="pur_discount[]" />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        step="any" placeholder="0.00" id="pur_bonus` + counter + `" name="pur_bonus[]" required />
                </div>
                <div class="div">
                    <input  type="number" min="0.00"
                        style="text-align: right;width: 190px !important;" step="any" value="0.00" onchange='count()'
                        id="pur_amount` + counter + `" name="pur_amount[]" class="xl-width-inp" />
                </div>
            </div>

`;
            }
            counter = counter - 1
            let amount2 = $("#amount" + counter).val()
            let narration2 = $("#amount" + counter).val()
            if (!$("#amount" + counter).hasClass('check')) {
                if (narration2 > 0) {
                    $("#amount" + countera).addClass("check")
                    counter++
                    countera++
                    $(".invoice").append(clonedFields);
                }
            }
            var one = one
            counter = counter + 1
            $(document).ready(function() {
                $("input").on('input', function() {
                    total_calc();
                });

                $('.select-products').select2({
                    ajax: {
                        url: '{{ route('select2.products') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.product_name,
                                        id: item.product_id,
                                    };
                                })
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 2,
                    theme: 'classic',
                    width: '100%'
                });
            });
        }

        function total_calc() {
            // GENERAL
            let qty = +$('#qty').val();
            let rate = +$('#rate').val();
            let discount = +$('#discount').val();
            let bonus = +$('#bonus').val();
            let amount = qty * rate;
            let discountAmount = (qty * rate) * (discount / 100);
            amount -= discountAmount;
            // let bonusAmount = (qty * rate) * (bonus / 100);
            amount -= bonus;

            let pur_qty = +$('#pur_qty').val();
            let pur_rate = +$('#pur_rate').val();
            let pur_discount = +$('#pur_discount').val();
            let pur_bonus = +$('#pur_bonus').val();
            let pur_amount = pur_qty * pur_rate;
            let pur_discountAmount = (pur_qty * pur_rate) * (pur_discount / 100);
            pur_amount -= pur_discountAmount;
            // let pur_bonusAmount = (pur_qty * rate) * (bonus / 100);
            pur_amount -= pur_bonus;
            $('#amount').val(amount);
            $('#pur_amount').val(pur_amount);

            // CLONE
            for (let i = 1; i <= countera; i++) {
                let qty = +$('#qty' + i).val();
                let rate = +$('#rate' + i).val();
                let discount = +$('#discount' + i).val();
                let bonus = +$('#bonus' + i).val();
                let amount = qty * rate;
                let discountAmount = (qty * rate) * (discount / 100);
                amount -= discountAmount;
                // let bonusAmount = (qty * rate) * (bonus / 100);
                amount -= bonus;

                let pur_qty = +$('#pur_qty' + i).val();
                let pur_rate = +$('#pur_rate' + i).val();
                let pur_discount = +$('#pur_discount' + i).val();
                let pur_bonus = +$('#pur_bonus' + i).val();
                let pur_amount = pur_qty * pur_rate;
                let pur_discountAmount = (pur_qty * pur_rate) * (pur_discount / 100);
                pur_amount -= pur_discountAmount;
                // let pur_bonusAmount = (pur_qty * rate) * (bonus / 100);
                pur_amount -= pur_bonus;
                $('#amount' + i).val(amount);
                $('#pur_amount' + i).val(pur_amount);
            }

            // TOTAL
            let qty_total = +$('#qty').val();
            let amount_total = +$('#amount').val();
            let pur_qty_total = +$('#pur_qty').val();
            let pur_amount_total = +$('#pur_amount').val();
            for (let i = 1; i <= countera; i++) {
                qty_total += +$('#qty' + i).val();
                amount_total += +$('#amount' + i).val();
                pur_qty_total += +$('#pur_qty' + i).val();
                pur_amount_total += +$('#pur_amount' + i).val();
            }
            $('#qty_total').val(qty_total);
            $('#amount_total').val(amount_total);
            $('#pur_qty_total').val(pur_qty_total);
            $('#pur_amount_total').val(pur_amount_total);

        }

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
                url: '/farm/add-sale-invoice', // Replace with your Laravel route or endpoint
                method: 'POST',
                data: formData,
                success: function(response) {
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
            if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'e')) {
                var link = document.querySelector('.edit-btn');
                window.location.href = link.href;
            }
        });

        $(document).on('keydown', function(e) {
            if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 's')) {
                $("#si-search").modal('show');
            }
        });

        $(document).on('keydown', function(e) {
            if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'n')) {
                var str = $('[name=\'unique_id\']').val();
                var parts = str.split('-');
                var firstPart = parts.slice(0, -1).join('-');
                var lastPart = parts[parts.length - 1];
                var newUrl = '/es_med_invoice_id=' + firstPart + '-' + (parseInt(lastPart) + 1);
                window.location.href = newUrl;
            }
        });

        $(document).on('keydown', function(e) {
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
@endpush
@endsection
