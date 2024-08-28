@extends('master') @section('title', 'Sale Invoice') @section('content')
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
        font-size: large;
    }

    h6 {
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
        width: 103%;
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

    .select2-dropdown {
        width: 300px !important;
    }

    .select2-container--classic .select2-search--dropdown .select2-search__field {
        width: 100% !important;
    }

    .select2-dropdown {
        width: 300px !important;
    }

    .select2-container--classic .select2-search--dropdown .select2-search__field {
        width: 100% !important;
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

    .items .select2-container--classic {
        width: 125px !important;
    }

    /* .fields input{
    padding-left: 25%;
  }
  .one select{
    padding-left: 25%;
      } */

    .dup_invoice input {
        border: 1px solid;
        width: 62px !important;
    }

    .dup_invoice select {
        border: 1px solid;
        width: 83px !important;
    }

    .dup_invoice input[id="amount"] {
        width: 90px !important;
    }

    .total input {
        width: 62px !important;
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
<h5 style="text-align: center;">ChickenInvoice (FARM MODULE)</h5>

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
                    <input style="border: none !important; width: 219px !important;" type="text" id=""
                        name="" value="<?php $year = date('Y');
                        $lastTwoWords = substr($year, -2);
                        echo $rand = 'SI' . '-' . $year . '-' . $count + 1; ?>" />
                    <input type="hidden" id="unique_id" name="unique_id" value="{{ $rand = $count + 1 }}" />
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

                <div class="one  remark">
                    <label for="remark">Remarks</label>
                    <input style="width: 219px !important;" type="text" id="remark" name="remark" />
                </div>
                <div class="one  remark">
                    <label for="buyer">Customer</label>
                    <select name="buyer" class="select-buyer" required>

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
                    <label for="rate_type">Rate Type</label>
                    <input type="text" style="text-align:center !important;" id="rate_type" name="rate_type[]" />
                </div>

                <div class="div">
                    <label for="vehicle_no">Vehicle No.</label>
                    <input type="text" id="vehicle_no" name="vehicle_no[]" />
                </div>

                <div class="div">
                    <label for="crate_type">Crate Type</label>
                    <input type="text" id="crate_type" name="crate_type[]" />
                </div>



                <div class="div">
                    <label for="price">Crate Qty</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        placeholder="0.00" id="crate_qty" name="crate_qty[]" required />
                </div>

                <div class="div">
                    <label for="sale_qty">Hen Qty</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="hen_qty" name="hen_qty[]" />
                </div>

                <div class="div">
                    <label for="sale_qty">Gross Weight</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="gross_weight" name="gross_weight[]" />
                </div>

                <div class="div">
                    <label for="dis">Actual Rate</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="actual_rate" name="actual_rate[]" />
                </div>
                <div class="div">
                    <label for="dis">Feed Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="feed_cut" name="feed_cut[]" />
                </div>
                <div class="div">
                    <label for="mor_cut">Mor Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="mor_cut" name="mor_cut[]" />
                </div>

                <div class="div">
                    <label for="crate_cut">Crate Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="crate_cut" name="crate_cut[]" />
                </div>



                <div class="div">
                    <label for="n_weight">N.Weight</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="n_weight" name="n_weight[]" readonly />
                </div>
                <div class="div">
                    <label for="rate_diff">Rate Diff</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="rate_diff" name="rate_diff[]" />
                </div>
                <div class="div">
                    <label for="rate">Rate</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="rate" name="rate[]" />
                </div>
                <div class="div">
                    <label for="amount">Amount</label>
                    <input type="number" step="any" min="0.00"
                        style="text-align: right;width: 90px !important;" step="any" value="0.00"
                        id="amount" name="amount[]" class="xl-width-inp" />
                </div>
                <div class="div">
                    <label for="sale_dis">Feed Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_feed_cut" name="sale_feed_cut[]" />
                </div>
                <div class="div">
                    <label for="sale_mor_cut">Mor Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_mor_cut" name="sale_mor_cut[]" />
                </div>

                <div class="div">
                    <label for="sale_crate_cut">Crate Cut</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_crate_cut" name="sale_crate_cut[]" />
                </div>



                <div class="div">
                    <label for="sale_n_weight">N.Weight</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_n_weight" name="sale_n_weight[]" />
                </div>
                <div class="div">
                    <label for="avg">&nbsp; AVG</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="avg" name="avg[]" />
                </div>
                <div class="div">
                    <label for="sale_rate_diff">Rate Diff</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_rate_diff" name="sale_rate_diff[]" />
                </div>
                <div class="div">
                    <label for="sale_rate">Rate</label>
                    <input type="number" step="any" min="0.00" style="text-align: right;" step="any"
                        value="0.00" id="sale_rate" name="sale_rate[]" />
                </div>
                <div class="div">
                    <label for="sale_amount">Amount</label>
                    <input type="number" step="any" min="0.00"
                        style="text-align: right;width: 90px !important;" step="any" value="0.00"
                        id="sale_amount" name="sale_amount[]" class="xl-width-inp" />
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
        left: -1%;
    ">Total</label>
                    <input type="number" step="any" step="any" name="crate_qty_total" id="crate_qty_total"
                        style="
                            /* margin-left: 2%; */
                            position: fixed;
                            top: 95%;
                            left: 7%;
            "=""="">
                    <input type="number" step="any" step="any" name="hen_qty_total" id="hen_qty_total"
                        style="
                /* margin-left: 52%; */
                position: fixed;
                top: 95%;
                left: 12.5%;
            "=""="">
                    <input type="number" step="any" step="any" name="gross_weight_total"
                        id="gross_weight_total"
                        style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: 18%;
            "=""="">



                    <input type="number" step="any" step="any" name="feed_cut_total" id="feed_cut_total"
                        style="
                /* margin-left: 30%; */
                position: fixed;
                top: 95%;
                left: 29%;
            "=""="">
                    <input type="number" step="any" step="any" name="mor_cut_total" id="mor_cut_total"
                        style="
            /* margin-left: 30%; */
            position: fixed;
            top: 95%;
            left: 34.7%;
        "=""="">
                    <input type="number" step="any" step="any" name="crate_cut_total" id="crate_cut_total"
                        style="
        /* margin-left: 30%; */
        position: fixed;
        top: 95%;
        left: 40.4%;
    "=""="">
                    <input type="number" step="any" step="any" name="n_weight_total" id="n_weight_total"
                        style="
    /* margin-left: 30%; */
    position: fixed;
    top: 95%;
    left: 46%;
"=""="">
                    <input type="number" step="any" step="any" name="amount_total" id="amount_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;width: 90px !important;left: 62.4%;"=""="">
                    <input type="number" step="any" step="any" name="sale_feed_cut_total"
                        id="sale_feed_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 70.4%;"=""="">
                    <input type="number" step="any" step="any" name="sale_mor_cut_total"
                        id="sale_mor_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 75.9%;"=""="">
                    <input type="number" step="any" step="any" name="sale_crate_cut_total"
                        id="sale_crate_cut_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 81.3%;"=""="">
                    <input type="number" step="any" step="any" name="sale_n_weight_total"
                        id="sale_n_weight_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 86.9%;"=""="">
                    <input type="number" step="any" step="any" name="sale_amount_total"
                        id="sale_amount_total"
                        style="/* margin-left: 30%; */position: fixed;top: 95%;left: 108.8%;width: 90px !important;"=""="">


                </div>


            </div>
        </div>

</div>
<button type="button" class="mx-5 px-3 p-1 btn btn-secondary btn-sm" data-bs-toggle="modal"
    data-bs-target="#imageModal">
    Attachment
</button>
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
                        <a href="#" id="imageAnchor" target="_blank"><img src="" alt="img"
                                class="img-fluid" id="imagePreview" style="object-fit: fill; display:none;">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="row justify-content-start">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="attachment" id="attachment"
                                    style="
    height: max-content !important;
" />
                            </div>
                            <button type="button" class="btn px-3 p-1 btn-secondary btn-sm"
                                onclick="document.getElementById('attachment').value = ''; 
                  document.getElementById('attachment').value = 'none';
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

<div class="row m-5 justify-content-center align-items-center" style="gap: 30px; margin-top: 140px !important;">

    <button type="submit" class="btn px-3 p-1 btn-secondary btn-sm submit" id="submit" style="">
        submit
    </button>
    <a href="{{ Route('edit_invoice_chicken', $rand - 1) }}" class="btn px-3 p-1 btn-secondary btn-sm  submit">
        Previous
    </a>
    <a href="{{ Route('edit_invoice_chicken', $rand + 1) }}" class="btn px-3 p-1 btn-secondary btn-sm  submit">
        Next
    </a>

    <a href="{{ Route('edit_invoice_chicken', $rand) }}"
        class="edit edit-btn  btn px-3 p-1 btn-secondary btn-sm disabled" id="edit">
        Edit
    </a>
    <a href="{{ Route('invoice_chicken') }}" class="edit add-more  btn px-3 p-1 btn-secondary btn-sm disabled"
        id="add_more">
        Add More
    </a>

    <button type="button" class="btn px-3 p-1 btn-secondary btn-sm disabled" id="sale_pdf">
        SALE PDF
    </button>

    <button type="button" class="btn px-3 p-1 btn-secondary btn-sm disabled" id="purchase_pdf">
        PURCHASE PDF
    </button>



    <button class="btn px-3 p-1 btn-secondary btn-sm  submit" style=""
        onclick="
        
        window.location.reload()
        ">
        Revert
    </button>
</div>


</form>
</div>

@push('s_script')
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


        var counter = 1
        var countera = 0


        function addInvoice(one) {

            for (let i = 1; i <= counter; i++) {


                var clonedFields = `
    <div class="dup_invoice" onchange="addInvoice2(` + counter + `)">
 <div class="div   items">
                    <select name="item[]" id="item` + counter + ` style="height: 28px" onchange="addInvoice2()" 
                        class="item0 select-products">
                    </select>
                </div>
        <div class="div">
            <input    type="text"style="text-align:center !important;"    id="rate_type` +
                    counter + `" name="rate_type[]" />
            <input  style="display: none "  id="previous_stock` + counter + `" name="previous_stock[]" />
            <input  style="display: none "  id="avail_stock2` + counter +
                    `" name="avail_stock[]" />
        </div>

        <div class="div">
            <input    type="text" id="vehicle_no` + counter + `" name="vehicle_no[]" />
        </div>

        <div class="div">
            <input    type="text" id="crate_type` + counter +
                    `" name="crate_type[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="crate_qty` +
                    counter +
                    `" name="crate_qty[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="hen_qty` +
                    counter +
                    `" name="hen_qty[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="gross_weight` +
                    counter +
                    `" name="gross_weight[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="actual_rate` +
                    counter +
                    `" name="actual_rate[]"  />
        </div>

        <div class="div">
            <input  type="number" step="any" min="0.00" style="text-align: right;" step="any"  value="0.00" id="feed_cut` +
                    counter +
                    `"name="feed_cut[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="mor_cut` +
                    counter +
                    `" name="mor_cut[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="crate_cut` +
                    counter + `" name="crate_cut[]"/>
        </div>


<div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="n_weight` + counter + `"
                 name="n_weight[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="rate_diff` +
                    counter + `"
                 name="rate_diff[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="rate` + counter +
                    `"
                 name="rate[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;width: 90px !important;" step="any" value="0.00" id="amount` +
                    counter + `"
                 name="amount[]"  class="xl-width-inp"/>
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_feed_cut` + counter + `"
                name="sale_feed_cut[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_mor_cut` + counter + `"
                name="sale_mor_cut[]" />
        </div>

        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_crate_cut` + counter + `"  name="sale_crate_cut[]" />
        </div>



        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_n_weight` + counter + `"  name="sale_n_weight[]" />
        </div>
         <div class="div">
            <input  type="number" step="any" min="0.00" style="text-align: right;"
                step="any" value="0.00" id="avg` + counter + `" name="avg[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_rate_diff` + counter + `"  name="sale_rate_diff[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_rate` + counter +
                    `"
                 name="sale_rate[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;width: 90px !important;" step="any" value="0.00" id="sale_amount` +
                    counter + `"
                 name="sale_amount[]" class="xl-width-inp"/>
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
                $(document).on('click', function() {
                    total_calc();
                });
                // Initialize Select2 for the desired select elements
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


                var pInput = $('#sale_price');
                pInput.val(selectedOption.data('sale_price'));


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
    <div class="dup_invoice" onchange="addInvoice2(` + counter + `)">
 <div class="div   items">
                    <select name="item[]" id="item` + counter + ` style="height: 28px" onchange="addInvoice2()" 
                        class="item0 select-products">
                    </select>
                </div>
        <div class="div">
            <input    type="text"style="text-align:center !important;"    id="rate_type` +
                    counter + `" name="rate_type[]" />
            <input  style="display: none "  id="previous_stock` + counter + `" name="previous_stock[]" />
            <input  style="display: none "  id="avail_stock2` + counter +
                    `" name="avail_stock[]" />
        </div>

        <div class="div">
            <input    type="text" id="vehicle_no` + counter + `" name="vehicle_no[]" />
        </div>

        <div class="div">
            <input    type="text" id="crate_type` + counter +
                    `" name="crate_type[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="crate_qty` +
                    counter +
                    `" name="crate_qty[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="hen_qty` +
                    counter +
                    `" name="hen_qty[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="gross_weight` +
                    counter +
                    `" name="gross_weight[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="actual_rate` +
                    counter +
                    `" name="actual_rate[]"  />
        </div>

        <div class="div">
            <input  type="number" step="any" min="0.00" style="text-align: right;" step="any"  value="0.00" id="feed_cut` +
                    counter +
                    `"name="feed_cut[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00' id="mor_cut` +
                    counter +
                    `" name="mor_cut[]" />
        </div>

        <div class="div">
            <input    type="number" step="any" min="0.00" style="text-align: right;" step="any"  value='0.00'   total_amount();' id="crate_cut` +
                    counter + `" name="crate_cut[]"/>
        </div>


<div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="n_weight` + counter + `"
                 name="n_weight[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="rate_diff` +
                    counter + `"
                 name="rate_diff[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="rate` + counter +
                    `"
                 name="rate[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;width: 90px !important;" step="any" value="0.00" id="amount` +
                    counter + `"
                 name="amount[]"  class="xl-width-inp"/>
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_feed_cut` + counter + `"
                name="sale_feed_cut[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_mor_cut` + counter + `"
                name="sale_mor_cut[]" />
        </div>

        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_crate_cut` + counter + `"  name="sale_crate_cut[]" />
        </div>



        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_n_weight` + counter + `"  name="sale_n_weight[]" />
        </div>
         <div class="div">
            <input  type="number" step="any" min="0.00" style="text-align: right;"
                step="any" value="0.00" id="avg` + counter + `" name="avg[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00"
                id="sale_rate_diff` + counter + `"  name="sale_rate_diff[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;" step="any" value="0.00" id="sale_rate` + counter +
                    `"
                 name="sale_rate[]" />
        </div>
        <div class="div">
            <input  type="number" step="any" min="0.00"
                style="text-align: right;width: 90px !important;" step="any" value="0.00" id="sale_amount` +
                    counter + `"
                 name="sale_amount[]" class="xl-width-inp"/>
        </div>
        
</div>

`;



            }


            counter = counter - 1
            let amount2 = $("#amount" + counter).val()
            // console.log('counter' + counter);
            let narration2 = $("#amount" + counter).val()
            if (!$("#amount" + counter).hasClass('check')) {


                if (narration2 > 0) {

                    $("#amount" + countera).addClass("check")

                    // console.log(counter);
                    // console.log(countera);

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
                $(document).on('click', function() {
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

                var selectedOption = $("#item").find('option:selected');
                var unitInput = $('#unit');
                unitInput.val(selectedOption.data(
                    'unit')); // Set the value of the unit input field to the data-unit value of the selected option


                var pInput = $('#sale_price');
                pInput.val(selectedOption.data('sale_price'));




                var st = $('#avail_stock2');
                st.val(selectedOption.data('stock'));
                var pst = $('#previous_stock');
                pst.val(selectedOption.data('stock'));

                $('#p-img').css("display", "block")
                var imgInput = $('#p-img');
                var imgSrc = selectedOption.data('img');
                imgInput.attr('src', imgSrc);

                $(".p-img").attr('href', imgSrc)
                // Initialize other select elements if necessary


                var stInput = $('#avail_stock');
                var select = $(".clone_item" + one).find('option:selected');

                let s = select.data('stock');
                let t = select.data('name');
                var st_val2 = '  ' + t + ',  ' + s;
                if (st_val2 != null) {

                    // console.log(st_val2);
                    stInput.val(st_val2);
                }


                for (let index = 1; index <= countera; index++) {

                    var selectedOption2 = $(".clone_item" + index).find('option:selected');
                    var unitInput = $('#unit' + index);
                    unitInput.val(selectedOption2.data(
                        'unit'
                    )); // Set the value of the unit input field to the data-unit value of the selected option
                    var pInput = $('#sale_price' + index);
                    pInput.val(selectedOption2.data(
                        'sale_price'
                    )); // Set the value of the unit input field to the data-unit value of the selected option

                    imgSrc = selectedOption2.data('img');
                    imgInput.attr('src', imgSrc);
                    $(".p-img").attr('href', imgSrc)

                }
            });

        }



        $(document).ready(function() {

            $('.item').change(function() {
                // Set the value of the unit input field to the data-unit value of the selected option

            });
            $('.clone_item').change(function() {

                for (let index = 1; index <= countera; index++) {
                    var selectedOption = $(".clone_item" + index).find('option:selected');


                    var unitInput = $('#unit' + index);
                    unitInput.val(selectedOption.data(
                        'unit'
                    )); // Set the value of the unit input field to the data-unit value of the selected option


                    var pInput = $('#sale_price' + index);
                    pInput.val(selectedOption.data(
                        'sale_price'
                    )); // Set the value of the unit input field to the data-unit value of the selected option

                }
            })
        });



        function total_calc() {
            // GENERAL
            let crate_qty = +$("#crate_qty").val();
            let actual_rate = +$("#actual_rate").val();
            let rate_diff = +$("#rate_diff").val();
            let rate = actual_rate - rate_diff;

            let sale_rate_diff = +$("#sale_rate_diff").val();
            let sale_rate = actual_rate - sale_rate_diff;

            let feed_cut = +$("#feed_cut").val();
            let mor_cut = +$("#mor_cut").val();


            let crate_cut_val = +crate_qty / 2;
            let crate_cut = crate_cut_val;

            let gross_weight = +$("#gross_weight").val();
            let total_cut = feed_cut + mor_cut + crate_cut;
            let n_weight = gross_weight - total_cut;

            let sale_feed_cut = +$("#sale_feed_cut").val();
            let sale_mor_cut = +$("#sale_mor_cut").val();
            let sale_crate_cut = +$("#sale_crate_cut").val();
            let sale_total_cut = sale_feed_cut + sale_mor_cut + sale_crate_cut;
            let sale_n_weight = gross_weight - sale_total_cut;

            let hen_qty = +$("#hen_qty").val();
            let avg = gross_weight / hen_qty;

            let amount = n_weight * rate;
            let sale_amount = sale_n_weight * sale_rate;

            $("#rate").val(rate);
            $("#sale_rate").val(sale_rate);
            $("#crate_cut").val(crate_cut_val);
            $("#sale_crate_cut").val(crate_cut_val);
            $("#n_weight").val(n_weight);
            $("#sale_n_weight").val(sale_n_weight);
            $("#avg").val(avg);
            $("#amount").val(amount);
            $("#sale_amount").val(sale_amount);

            // CLONE
            for (let i = 1; i <= countera; i++) {
                let crate_qty = +$("#crate_qty" + i).val();
                let actual_rate = +$("#actual_rate" + i).val();
                let rate_diff = +$("#rate_diff" + i).val();
                let rate = actual_rate - rate_diff;

                let sale_rate_diff = +$("#sale_rate_diff" + i).val();
                let sale_rate = actual_rate - sale_rate_diff;

                let feed_cut = +$("#feed_cut" + i).val();
                let mor_cut = +$("#mor_cut" + i).val();

                let crate_cut_val = +crate_qty / 2
                $("#crate_cut" + i).val(crate_cut_val);

                let crate_cut = +$("#crate_cut" + i).val();
                let gross_weight = +$("#gross_weight" + i).val();
                let total_cut = feed_cut + mor_cut + crate_cut;
                let n_weight = gross_weight - total_cut;

                let sale_feed_cut = +$("#sale_feed_cut" + i).val();
                let sale_mor_cut = +$("#sale_mor_cut" + i).val();
                let sale_crate_cut = +$("#sale_crate_cut" + i).val();
                let sale_total_cut = sale_feed_cut + sale_mor_cut + sale_crate_cut;
                let sale_n_weight = gross_weight - sale_total_cut;

                let hen_qty = +$("#hen_qty" + i).val();
                let avg = gross_weight / hen_qty;

                let amount = n_weight * rate;
                let sale_amount = sale_n_weight * sale_rate;

                $("#rate" + i).val(rate);
                $("#sale_rate" + i).val(sale_rate);
                $("#n_weight" + i).val(n_weight);
                $("#sale_n_weight" + i).val(sale_n_weight);
                $("#avg" + i).val(avg);
                $("#amount" + i).val(amount);
                $("#sale_amount" + i).val(sale_amount);
            }

            // TOTAL
            let crate_qty_total = +$("#crate_qty").val();
            let hen_qty_total = +$("#hen_qty").val();
            let gross_weight_total = +$("#gross_weight").val();
            let feed_cut_total = +$("#feed_cut").val();
            let mor_cut_total = +$("#mor_cut").val();
            let crate_cut_total = +$("#crate_cut").val();
            let n_weight_total = +$("#n_weight").val();
            let amount_total = +$("#amount").val();
            let sale_feed_cut_total = +$("#sale_feed_cut").val();
            let sale_mor_cut_total = +$("#sale_mor_cut").val();
            let sale_crate_cut_total = +$("#sale_crate_cut").val();
            let sale_n_weight_total = +$("#sale_n_weight").val();
            let sale_amount_total = +$("#sale_amount").val();

            for (let i = 1; i <= countera; i++) {
                crate_qty_total += +$("#crate_qty" + i).val();
                hen_qty_total += +$("#hen_qty" + i).val();
                gross_weight_total += +$("#gross_weight" + i).val();
                feed_cut_total += +$("#feed_cut" + i).val();
                mor_cut_total += +$("#mor_cut" + i).val();
                crate_cut_total += +$("#crate_cut" + i).val();
                n_weight_total += +$("#n_weight" + i).val();
                amount_total += +$("#amount" + i).val();
                sale_feed_cut_total += +$("#sale_feed_cut" + i).val();
                sale_mor_cut_total += +$("#sale_mor_cut" + i).val();
                sale_crate_cut_total += +$("#sale_crate_cut" + i).val();
                sale_n_weight_total += +$("#sale_n_weight" + i).val();
                sale_amount_total += +$("#sale_amount" + i).val();

            }
            $("#crate_qty_total").val(crate_qty_total);
            $("#hen_qty_total").val(hen_qty_total);
            $("#gross_weight_total").val(gross_weight_total);
            $("#feed_cut_total").val(feed_cut_total);
            $("#mor_cut_total").val(mor_cut_total);
            $("#crate_cut_total").val(crate_cut_total);
            $("#n_weight_total").val(n_weight_total);
            $("#amount_total").val(amount_total);
            $("#sale_feed_cut_total").val(sale_feed_cut_total);
            $("#sale_mor_cut_total").val(sale_mor_cut_total);
            $("#sale_crate_cut_total").val(sale_crate_cut_total);
            $("#sale_n_weight_total").val(sale_n_weight_total);
            $("#sale_amount_total").val(sale_amount_total);

        }
    </script>

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


        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });


        $('#form').submit(function(event) {
            event.preventDefault();

            // Create a FormData object
            var formData = new FormData(this);

            // Send an AJAX request
            $.ajax({
                url: '{{ Route('store_invoice_chicken') }}',
                method: 'POST',
                data: formData,
                contentType: false, // Prevent jQuery from setting the content type
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting the content type
                processData: false, // Prevent jQuery from processing the data
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
                                url: '/s_med_invoice_mail',
                                method: 'POST',
                                data: formData,
                                contentType: false, // Prevent jQuery from setting the content type
                                processData: false, // Prevent jQuery from processing the data
                                contentType: false, // Ensure these are set for the second AJAX call
                                processData: false,
                                success: function(mailResponse) {
                                    // Handle the success of sending the email
                                },
                                error: function(mailError) {
                                    // Handle the error of sending the email
                                }
                            });
                        }
                    });

                    // Show or hide elements as needed
                    $("#submit").addClass("disabled");
                    $(".edit").css("display", "block");
                    $("#btn").css("display", "none");
                    $("#edit").removeClass("disabled");
                    $("#add_more").removeClass("disabled");
                    $("#sale_pdf").removeClass("disabled");
                    $("#purchase_pdf").removeClass("disabled");
                },
                error: function(error) {
                    // Handle the error
                }
            });
        });


        $('#sale_pdf').click(function(event) {
            if (!$(this).hasClass('disabled')) {

                event.preventDefault();
                // var formData = new FormData(this);
                var unique_id = $("#unique_id").val();
                var url = '{{ route('pdf_invoice_chicken', [':unique_id', 0]) }}'.replace(':unique_id', unique_id);

                window.open(url, '__blank')
            }
        });
        $('#purchase_pdf').click(function(event) {
            if (!$(this).hasClass('disabled')) {

                event.preventDefault();
                // var formData = new FormData(this);
                var unique_id = $("#unique_id").val();
                var url = '{{ route('pdf_invoice_chicken', [':unique_id', 1]) }}'.replace(':unique_id', unique_id);

                window.open(url, '__blank')
            }
        });


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
@endsection
