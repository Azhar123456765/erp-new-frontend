@extends('master') @section('title', 'Receipt Voucher (EDIT)') @section('content')
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

    input[type="number" step="any"] {
        text-align: right !important;
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
        width: 103%;
        justify-content: space-around !important;
    }

    input {
        width: 181px !important;
        height: 27px !important;
    }

    #invoiceForm select {
        width: 181px !important;
        height: 27px !important;
    }

    #form {
        width: 140%;
        margin-left: -22%;
    }

    #invoiceForm .select2-container--classic {
        width: 191px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
    }

    .select2-dropdown {
        width: 200px !important;
    }

    .select2-container--classic .select2-search--dropdown .select2-search__field {
        width: 100% !important;
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
        width: 76%;
        justify-content: space-evenly;
        margin-left: 220px;

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
<div class="container" id="invoiceForm" style="margin-top: -37px; padding-top: 5px;        overflow-x: visible;
">
    <form id="form">
        <h3 style="text-align: center;">Receipt Voucher (EDIT)</h3>

        <h5 style="text-align: end;">Medician</h5>
        @foreach ($sReceiptVoucher as $sinvoice_row)
            <div class="top">
                <div class="fields">
                    <div class="one">
                        <label for="Invoice">GR#</label>
                        <input style="border: none !important;" type="text" id="invoice#" readonly
                            value="<?php $year = date('Y');
                            $lastTwoWords = substr($year, -2);
                            echo $rand = 'RV' . '-' . $year . '-' . $sinvoice_row->unique_id; ?>" />
                        <input type="hidden" id="unique_id" name="unique_id"
                            value="{{ $rand = $sinvoice_row->unique_id }}" />

                    </div>
                    <div class="one">
                        <label for="date">Date</label>
                        <input style="border: none !important;" type="date" id="date" name="date"
                            value="{{ $sinvoice_row->date }}" />
                    </div>
                </div>

                <div class="fields">
                    <div class="one  remark">
                        <label for="seller">Company</label>
                        <select name="company" class="company select-buyer" id="company" required>
                            <option value="{{ $sinvoice_row->customer->buyer_id }}" selected>
                                {{ $sinvoice_row->customer->company_name }}</option>
                        </select>
                    </div>

                    <div class="one  remark">
                        <label for="seller">Sales Ofiicer</label>
                        <select name="sales_officer" id="sales_officer" class="select-sales_officer">
                            <option value="{{ $sinvoice_row->officer->sales_officer_id ?? null }}" selected>
                                {{ $sinvoice_row->officer->sales_officer_name ?? null }}</option>
                        </select>
                    </div>

                </div>

                <div class="fields">


                    <div class="one">
                        <label for="Invoice">Ref No</label>
                        <input type="text" id="ref_no" name="ref_no" value="{{ $sinvoice_row->ref_no }}" />
                    </div>
                    <div class="one  remark">
                        <label for="remark">Remarks</label>
                        <input style="width: 219px !important;" type="text" id="remark" name="remark"
                            value="{{ $sinvoice_row->remark }}" />
                    </div>
                    <div class="one  remark">
                        <label for="sales_officer">Farm</label>
                        <select name="farm" class="select-farm">
                            <option value="{{ $sinvoice_row->farms->id ?? null }}" selected>
                                {{ $sinvoice_row->farms->name ?? null }}</option>
                        </select>

                    </div>
                </div>
            </div>
        @endforeach

        <br />

        <div class="invoice">
            @csrf
            <div class="label">
                <label for="item" style="padding-right: 91px;">Narration</label>
                <label for="dis">Invoice</label>
                <label for="unit">Cheque No</label>
                <label for="batch_no">Cheque Date</label>
                <label>Cash/Bank Account</label>
                <label for="amount">Amount</label>



            </div>
            @php
                $counter = 1;
            @endphp
            @foreach ($ReceiptVoucher as $invoice_row)
                <div class="dup_invoice" onchange="addInvoice()">


                    <div class="div">
                        <input style="width: 289px !important;" type="text" id="narration" name="narration[]"
                            value="{{ $invoice_row->narration }}" />
                    </div>
                    <div class="div">
                        <select class="invoice_no" id="invoice_no" name="invoice_no[]" style="height: 28px">
                        </select>
                    </div>

                    <div class="div">
                        <input type="text" min="0.00" step="any" id="cheque_no" name="cheque_no[]"
                            value="{{ $invoice_row->cheque_no }}" />
                    </div>
                    <div class="div">
                        <input type="date" min="0.00" style="width: 131px !important;" step="any"
                            value="{{ $invoice_row->cheque_date }}" id="cheque_date" name="cheque_date[]"
                            onchange='total_amount()' />
                    </div>
                    <div class="div">
                        <select class="cash_bank  select-assets-account" name="cash_bank[]" style="height: 28px">
                            <option value="{{ $sinvoice_row->accounts->id ?? null }}" selected>
                                {{ $sinvoice_row->accounts->account_name ?? null }}</option>
                        </select>
                    </div>
                    <div class="div">
                        <input class="<?php echo $counter; ?>amount" type="number" step="any" min="0.00"
                            style="text-align: right;" step="any" value="{{ $invoice_row->amount }}"
                            onchange='total_amount()' id="amount" name="amount[]" />
                    </div>
                </div>



                @php
                    $counter++;
                @endphp
            @endforeach

            <div class="dup_invoice" onchange="addInvoice2()">
                <div class="div">
                    <input style="width: 289px !important;" type="text" id="narration" name="narration[]" />
                </div>
                <div class="div">
                    <select class="invoice_no" id="invoice_no2" name="invoice_no[]" style="height: 28px">
                    </select>
                </div>
                <div class="div">
                    <input type="text" min="0.00" step="any" id="cheque_no" name="cheque_no[]" />
                </div>
                <div class="div">
                    <input type="date" min="0.00" style="width: 131px !important;" step="any"
                        value="0.00" id="cheque_date" name="cheque_date[]" onchange='  total_amount()' />
                </div>
                <div class="div">
                    <select class="cash_bank  select-assets-account" name="cash_bank[]" style="height: 28px">

                    </select>
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" step="any" min="0.00"
                        style="text-align: right;" step="any" value="0.00" onchange='total_amount()'
                        id="amount1" name="amount[]" />
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
                    margin-top: -210px;
                }
            </style>

        </div>
        @foreach ($sReceiptVoucher as $sinvoice_row)
            <div class="total" style="margin-top: 2.25%;">
                <div class="first">
                    <div class="one" style="
margin-left: 0%;
">

                        <input onkeydown="handleKeyPress(event)" type="number" step="any" step="any"
                            name="amount_total" id="amount_total" style="
margin-left: 185%;
text-align:end;
"
                            readonly value="{{ $sinvoice_row->amount_total }}">

                    </div>

                    <br>
                </div>
        @endforeach

</div>

</div>

<button type="button" class="mx-5 px-3 p-1 btn btn-secondary btn-sm" data-bs-toggle="modal"
    data-bs-target="#imageModal"style="
">
    Attachment
</button>
@foreach ($sReceiptVoucher as $sinvoice_row)
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row p-2">
                        <div class="col-lg-9 col-md-12 p-2">
                            <a href="#" id="imageAnchor" target="_blank"><img
                                    src="{{ asset($sinvoice_row->attachment) }}" alt="img" class="img-fluid"
                                    id="imagePreview" style="object-fit: fill;">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="row justify-content-start">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="attachment" id="attachment"
                                        value="{{ $sinvoice_row->attachment }}"
                                        style="
    height: max-content !important;
" />
                                    <input type="hidden" class="form-control" name="old_attachment"
                                        id="old_attachment" value="{{ $sinvoice_row->attachment }}" />
                                </div>
                                <button type="button" class="btn px-3 p-1 btn-secondary btn-sm"
                                    onclick=" 
                  document.getElementById('attachment').value = '';
                 document.getElementById('imagePreview').style.display = 'none';
                 document.getElementById('imagePreview').src = '';
                 document.getElementById('imageAnchor').href = '';">
                                    REMOVE
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="row m-5 justify-content-center align-items-center"
    style="position: relative;gap: 30px;margin-top: -110px !important;top: 20%;right: 0%;">

    <button type="submit" class="btn px-3 p-1 btn-secondary btn-sm submit" id="submit" disabled>
        Update
    </button>
    <button type="button" class="btn px-3 p-1 btn-secondary btn-sm submit" id="edit"
        onclick="$('#submit').removeAttr('disabled'); $(this).attr('disabled', 'disabled');">
        Edit
    </button>
    <a href="{{ Route('receipt_voucher.edit', $rand - 1) }}" class="btn px-3 p-1 btn-secondary btn-sm  submit">
        Previous
    </a>
    <a href="{{ Route('receipt_voucher.edit', $rand + 1) }}" class="btn px-3 p-1 btn-secondary btn-sm  submit">
        Next
    </a>
    <a href="/r_voucher" class="edit add-more  btn px-3 p-1 btn-secondary btn-sm" id="add_more">
        Add New
    </a>

    <a href="/rv_pdf_{{ $rand }}" class="edit pdf btn btn-secondary btn-sm" id="pdf">
        PDF
    </a>



    <button class="btn px-3 p-1 btn-secondary btn-sm  submit" style=""
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
        $('#form').submit(function(event) {

            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '{{ Route('receipt_voucher.update', $rand) }}', // Replace with your Laravel route or endpoint
                method: 'POST',
                data: formData,
                contentType: false, // Prevent jQuery from setting the content type
                processData: false, // Prevent jQuery from processing the data
                success: function(response) {
                    // Handle the response

                    Swal.fire({
                        icon: 'success',
                        title: response,
                        timer: 1900
                    });

                    $("#submit").attr('disabled', 'disabled');
                    $('#edit').removeAttr('disabled');


                },
                error: function(error) {
                    // Handle the error
                },
            });
        })
    </script>
    <script>
        document.getElementById('attachment').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the uploaded file
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById('imagePreview');
                const a = document.getElementById('imageAnchor');

                // Set the href of the anchor to the image's data URL
                a.href = e.target.result;

                // Set the src of the img to the image's data URL
                img.src = e.target.result;

                // Show the image
                img.style.display = 'block';
            };

            // Check if a file is selected, then read it
            if (file) {
                reader.readAsDataURL(file);
            }
        });
        $(document).change(function() {
            total_amount();
            // $('.select2').select2({
            //     theme: 'classic',
            //     width: 'resolve',
            // });

            var company = $("#company").find('option:selected');
            var id = company.data('id')
            $.ajax({
                url: '/get-data/r_voucher', // Replace with your Laravel route or endpoint
                method: 'GET',
                dataType: 'json',
                data: {
                    'id': id // Replace with the appropriate data you want to send
                },
                success: function(data) {
                    let select = document.getElementById('invoice_no2');
                    data.forEach(item => {
                        let option = document.createElement('option');
                        option.value = item
                            .unique_id; // Assuming 'id' is the identifier in your data
                        option.text = item
                            .unique_id; // Assuming 'name' is the value you want to display
                        select.appendChild(option);
                    });
                },
                error: function(error) {
                    // Handle the error here, if necessary
                    console.error('Error:', error);
                },
            });
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
    <input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter +
                    `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
</div>

<div class="div">
                    <select class="invoice_no" id="invoice_no2" name="invoice_no[]" style="height: 28px">
                        <option></option>
                        
                        

                    </select>
                </div>
<div class="div">
    <input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no` + counter +
                    `" name="cheque_no[]"  onchange="addInvoice2(` + counter +
                    `)"/>
</div>
<div class="div">
    <input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="0.00" id="cheque_date` +
                    counter +
                    `" name="cheque_date[]"  />
</div>
<div class="div">
    <select class="cash_bank select-assets-account" name="cash_bank[]" style="height: 28px">
     
    </select>
</div>

<div class="div">
    <input onkeydown="handleKeyPress(event)" type="number" step="any" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='total_amount()' id="amount` +
                    counter + `"  style="text-align:end;" name="amount[]" />
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



                    $('.select-assets-account').select2({
                        ajax: {
                            url: '{{ route('select2.account') }}',
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
                                            text: item.account_name,
                                            id: item.id
                                        };
                                    })
                                };
                            },
                            cache: true
                        },
                        minimumInputLength: 2,
                        theme: 'classic',
                        width: '100%',
                    });

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
<input style="width: 289px !important;" onkeydown="handleKeyPress(event)" type="text" id="narration` + counter +
                    `" name="narration[]" onchange="addInvoice2(` + counter + `)"/>
</div>


<div class="div">
                    <select class="invoice_no" id="invoice_no2" name="invoice_no[]" style="height: 28px">
                        <option></option>
                        
                        

                    </select>
                </div>

<div class="div">
<input onkeydown="handleKeyPress(event)" type="text" min="0.00" step="any" id="cheque_no` + counter +
                    `" name="cheque_no[]" onchange="addInvoice2(` + counter +
                    `)" />
</div>
<div class="div">
<input onkeydown="handleKeyPress(event)" type="date" min="0.00" style="width: 131px !important;" step="any" value="0.00" id="cheque_date` +
                    counter +
                    `" name="cheque_date[]"  />
</div>
<div class="div">
<select class="cash_bank select-assets-account" name="cash_bank[]" style="height: 28px">
     
    </select>
</div>

<div class="div">
<input onkeydown="handleKeyPress(event)" type="number" step="any" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='total_amount()' id="amount` +
                    counter + `"  style="text-align:end;" name="amount[]" />
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

                    $('.select-assets-account').select2({
                        ajax: {
                            url: '{{ route('select2.account') }}',
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
                                            text: item.account_name,
                                            id: item.id
                                        };
                                    })
                                };
                            },
                            cache: true
                        },
                        minimumInputLength: 2,
                        theme: 'classic',
                        width: '100%',
                    });

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
            // $("select").select2();

            // Initialize other select elements if necessary
        });

        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
            // $("select").select2({
            //     maximumSelectionLength: 100,
            // });


            // Initialize other select elements if necessary
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });





        function companyInvoice() {
            var company = $("#company").find('option:selected');
            var id = company.data('id')


            let invoice = $("#invoice_no").val('');
            let invoiceText = $("#invoice_no").text('');

            let invoice1 = $("#invoice_no1").val('');
            let invoiceText1 = $("#invoice_no1").text('');

            let invoice2 = $("#invoice_no2").val('');
            let invoiceText2 = $("#invoice_no2").text('');

            $.ajax({
                url: '/get-data/r_voucher', // Replace with your Laravel route or endpoint
                method: 'GET',
                dataType: 'json',
                data: {
                    'id': id // Replace with the appropriate data you want to send
                },
                success: function(data) {
                    alert()
                    let select = document.getElementById('invoice_no');
                    data.forEach(item => {
                        let option = document.createElement('option');
                        option.value = item.unique_id; // Assuming 'id' is the identifier in your data
                        option.text = item
                            .unique_id; // Assuming 'name' is the value you want to display
                        select.appendChild(option);
                    });


                },
                error: function(error) {
                    // Handle the error here, if necessary
                    console.error('Error:', error);
                },
            });
        }

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
                var newUrl = '/er_voucher_id=' + firstPart + '-' + (parseInt(lastPart) + 1);
                window.location.href = newUrl;
            }
        });

        $(document).on('keydown', function(e) {
            if ((e.altKey) && (String.fromCharCode(e.which).toLowerCase() === 'b')) {
                var str = $('[name=\'unique_id\']').val();
                var parts = str.split('-');
                var firstPart = parts.slice(0, -1).join('-');
                var lastPart = parts[parts.length - 1];
                var newUrl = '/er_voucher_id=' + firstPart + '-' + (parseInt(lastPart) - 1);
                window.location.href = newUrl;
            }
        });
    </script>
@endpush
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
@endsection
