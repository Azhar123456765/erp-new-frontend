@extends('master') @section('content')

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




    .label {
        text-align: center;
        height: 55px;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
        justify-content: space-evenly;
        margin-left: 9px;
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
<div class="container" style="margin-top: -85px; padding-top: 5px; overflow-x: visible;" onchange="addInvoice(); addInvoice2(` + counter + `);">
    <form id="form">
        <h3 style="text-align: center;">Purchase Invoice &nbsp; EDIT</h3>

        <h5 style="text-align: right;">Medician</h5>
        @foreach ($single_invoice as $sinvoice_row)
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
                    <label for="Invoice">Invoice No</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="invoice#" name="invoice_no" value="{{$sinvoice_row->invoice_no}}" />
                </div>

                <div class="one  avail_stock" style="display: none">
                    <label for="transporter">Available Stock</label>
                </div>
            </div>

            <div class="fields">
                <div class="one">
                    <label for="date">Date</label>
                    <input type="hidden" id="created_at" name="created_at" value="{{$sinvoice_row->created_at}}" />
                    <input onkeydown="handleKeyPress(event)" style="width: 219px !important; border: none !important;" type="date" id="date" name="date" value="{{$sinvoice_row->date}}" />
                </div>
                <div class="one  remark">
                    <label for="sales_officer">Sales Officer</label>
                    <select name="sales_officer" id="sales_officer" data-live-search="true">
                        <option></option>
                        @foreach ($sales_officer as $row)
                        <option value="{{ $row->sales_officer_id }}" {{ $row->sales_officer_id == $sinvoice_row->sales_officer ? 'selected' : '' }}>{{ $row->sales_officer_name }}
                            @endforeach
                    </select>
                </div>
                <div class="one">
                    <label for="bilty_no">Bilty No.</label>
                    <input onkeydown="handleKeyPress(event)" style="width: 219px !important;" type="text" id="bilty_no" name="bilty_no" value="{{$sinvoice_row->bilty_no}}" />
                </div>
            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="seller">Company</label>
                    <select id="seller" class="company" onchange="seller123()">
                        <option></option>
                        @foreach ($seller as $row)
                        <option value="{{ $row->seller_id }}" {{ $row->seller_id == $sinvoice_row->company ? 'selected' : '' }} data-debit="{{ $row->debit }}">{{ $row->company_name }}
                        </option>
                        @endforeach

                    </select>
                    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="hidden" id="company" name="company" value="{{$sinvoice_row->company}}" />

                </div>

                <div class="one  remark">
                    <label for="warehouse">WRH</label>
                    <select name="warehouse" id="warehouse" required>
                        <option></option>
                        @foreach ($warehouse as $row)
                        <option value="{{ $row->warehouse_id }}" {{ $row->warehouse_id == $sinvoice_row->warehouse ? 'selected' : '' }}>{{ $row->warehouse_name }}

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
                <label for="item" style="padding-right: 91px;">Item</label>
                <label for="unit">Unit</label>
                <label for="batch_no">Batch No</label>
                <label for="expiry">Expire Date</label>
                <label for="price">Purchase Price</label>

                <label for="pur_qty">Pur Qty</label>

                <label for="dis">Dis(%)</label>
                <label for="dis">Dis Amount</label>

                <label for="exp_unit">Exp/Unit</label>

                <label for="amount">Amount</label>



            </div>
            @php
            $counter = 1;
            @endphp
            @foreach ($purchase_invoice as $invoice_row)

            <?php
            $rand = $invoice_row->unique_id
            ?>

            <div class="dup_invoice">

                <div class="div  items">
                    <select name="item[]" id="<?php echo $counter; ?>item" style="height: 28px" onchange="addInvoice(<?php echo $counter; ?>)" required readonly>
                        <option></option>
                        @foreach ($product as $row)
                        <option data-unit="{{$row->unit}}" data-stock="{{$row->opening_quantity}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}" value="{{ $row->product_id }}" {{ $row->product_id == $invoice_row->item ? 'selected' : '' }}>{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="{{$invoice_row->pr_item}}" id="pr_item" name="pr_item[]" />

                </div>


                <div class="div">
                    <input class="<?php echo $counter; ?>unit" type="text" style="text-align:center !important;" readonly id="unit" value="{{$invoice_row->unit}}" name="unit[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="{{$invoice_row->previous_stock}}" id="previous_stock" name="previous_stock[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="{{$invoice_row->previous_stock}}" id="avail_stock2" name="avail_stock[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>batch_no" type="text" id="batch_no" value="{{$invoice_row->batch_no}}" name="batch_no[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>expiry" value="{{$invoice_row->expiry}}" type="date" id="expiry" name="expiry[]" />
                </div>



                <div class="div">
                    <input class="<?php echo $counter; ?>pur_price" type="number" min="0.00" style="text-align:right !important;" step='any' id="pur_price" value="{{$invoice_row->pur_price}}" name="pur_price[]" required onchange="count();  total_amount();" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>pur_qty" type="number" min="0.00" style="text-align:right !important;" step='any' value="{{$invoice_row->pur_qty}}" id="pur_qty" name="pur_qty[]" onchange='qty(); per_unit();' />
                </div>


                <div class="div">
                    <input class="<?php echo $counter; ?>dis_per" type="number" min="0.00" style="text-align:right !important;" step='any' value="{{$invoice_row->discount}}" id="dis_per" name="dis_per[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input class="<?php echo $counter; ?>dis_amount" type="number" min="0.00" style="text-align:right !important;" step='any' id="dis_amount" name="dis_amount[]" value="{{$invoice_row->dis_amount}}" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input class="<?php echo $counter; ?>exp_unit" type="number" min="0.00" style="text-align:right !important;" step='any' value="{{$invoice_row->exp_unit}}" id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>amount" type="number" min="0.00" style="text-align:right !important;" step='any' onchange='count()' id="amount" readonly name="amount[]" value="{{$invoice_row->amount}}" />
                </div>


            </div>



            @php
            $counter++;
            @endphp
            @endforeach
            <!-- 
            @php
            $counter + 1;
            @endphp
            <div class="dup_invoice">

                <div class="div  items">
                    <select name="item[]" id="<?php echo $counter; ?>item" style="height: 28px" onchange="addInvoice2(` + counter + `)" class='clone_item'>
                        <option></option>
                        <option></option>
                        @foreach ($product as $row)
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-stock="{{$row->opening_quantity}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}">{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0" id="pr_item" name="pr_item[]" />

                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>unit" type="text" style="text-align:center !important;" readonly id="unit" name="unit[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0.00" id="previous_stock" name="previous_stock[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0.00" id="avail_stock2" name="avail_stock[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>batch_no" type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>expiry" type="date" id="expiry" name="expiry[]" />
                </div>



                <div class="div">
                    <input class="<?php echo $counter; ?>pur_price" type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_price" name="pur_price[]" required onchange='count2();  total_amount();' />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>pur_qty" type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_qty" name="pur_qty[]" onchange='qty(); per_unit2();' />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>dis_per" type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="dis_per" name="dis_per[]" onchange='discount2();  total_amount();' />
                </div>
                <div class="div">
                    <input class="<?php echo $counter; ?>dis_amount" type="number" min="0.00" style="text-align:right !important;" step='any' value="0.00" id="dis_amount" name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input class="<?php echo $counter; ?>exp_unit" type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input class="<?php echo $counter; ?>amount" type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' onchange='count();  total_amount();' id="amount" name="amount[]" />
                </div>
            </div> -->



            <div class="dup_invoice">

                <div class="div  items">
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice2(1)" class='clone_item1'>
                        <option></option>
                        <option></option>
                        @foreach ($product as $row)
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-stock="{{$row->opening_quantity}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}">{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0" id="pr_item" name="pr_item[]" />

                </div>

                <div class="div">
                    <input type="text" style="text-align:center !important;" readonly id="unit1" name="unit[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0.00" id="previous_stock1" name="previous_stock[]" />
                    <input onkeydown="handleKeyPress(event)" style="display: none " value="0.00" id="avail_stock21" name="avail_stock[]" />
                </div>

                <div class="div">
                    <input type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <input type="date" id="expiry" name="expiry[]" />
                </div>



                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_price1" name="pur_price[]" required onchange='count2();  total_amount();' />
                </div>

                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_qty1" name="pur_qty[]" onchange='qty(); per_unit2();' />
                </div>

                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="dis_per1" name="dis_per[]" onchange='discount2();  total_amount();' />
                </div>
                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value="0.00" id="dis_amount1" name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' onchange='count();  total_amount();' id="amount1" name="amount[]" />
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

        @foreach ($single_invoice as $sinvoice_row)

        <div class="total" style="margin-top: 1.25%;">
            <div class="first">
                <div class="one" style="
            margin-left: 0%;
        ">
                    <label for="exp_unit">Total</label>
                    <input type="number" step="any" id="qty_total" name="qty_total" style="
                        margin-left: 44%;
        " readonly="" value="{{$sinvoice_row->qty_total}}">
                    <input type="number" step="any" id="dis_total" name="dis_total" style="
            margin-left: 30.2%;
        " readonly="" value="{{$sinvoice_row->dis_total}}">
                    <input type="number" step="any" id="amount_total" name="amount_total" style="
                margin-left: 30%;
            " readonly="" value="{{$sinvoice_row->amount_total}}">


                </div>
                <input type="hidden" value="{{$sinvoice_row->previous_balance_amount ?? 0}}" name="previous_balance_amount">

                <br>
                <div class="one">
                    <label for="item">freight</label>
                    <div class="cash">
                        <select class="cash" name="freighta" style="height: 28px">
                            <option></option>

                            @foreach ($account as $row)
                            <option value="{{ $row->account_id }}" {{ $row->account_id == $sinvoice_row->freighta ? 'selected' : '' }}>{{ $row->account_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>





                <div class="one">
                    <label for="item">Sales Tax</label>
                    <div class="cash">
                        <select class="cash" name="sales_taxa" style="height: 28px">
                            <option></option>

                            @foreach ($account as $row)
                            <option value="{{ $row->account_id }}" {{ $row->account_id == $sinvoice_row->sales_taxa ? 'selected' : '' }}>{{ $row->account_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="one">
                    <label for="item">Ad.Sales Tax</label>
                    <div class="cash">
                        <select class="cash" name="ad_sales_taxa" style="height: 28px">
                            <option></option>

                            @foreach ($account as $row)
                            <option value="{{ $row->account_id }}" {{ $row->account_id == $sinvoice_row->ad_sales_taxa ? 'selected' : '' }}>{{ $row->account_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="one  Amount">
                    <label for="item">Bank</label>

                    <div class="cash">
                        <select class="cash" name="banka" style="height: 28px">
                            <option></option>

                            @foreach ($account as $row)
                            <option value="{{ $row->account_id }}" {{ $row->account_id == $sinvoice_row->banka ? 'selected' : '' }}>{{ $row->account_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="one">
                    <label for="item">other expense</label>
                    <div class="cash">
                        <select class="cash" name="other_expensea" style="height: 28px">
                            <option></option>

                            @foreach ($account as $row)
                            <option value="{{ $row->account_id }}" {{ $row->account_id == $sinvoice_row->other_expensea ? 'selected' : '' }}>{{ $row->account_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>



                @foreach ($single_invoice as $row)

                <div class="last">


                    <div class="one" onclick="total_amount()" style="            flex-direction: column;
position: fixed;
bottom: 0.2% !important;
right: 2%;
">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="freight" value="{{$row->freight}}" id="freight">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="0.1" name="sales_tax" value="{{$row->sales_tax}}" id="sales_tax">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="ad_sales_tax" value="{{$row->ad_sales_tax}}" id="ad_sales_tax">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="bank" value="{{$row->bank}}" id="bank">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="other_expense" value="{{$row->other_expense}}" id="other_expense">

                    </div>



                </div>

                @endforeach

            </div>
        </div>

        @endforeach



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
    margin-top: -21.5%;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;">
        Update
    </button>
    <br>
    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;" onclick="
    
    window.location.reload()
    ">
        Revert
    </button>


    <a href="/purchase_invoice_pdf_{{$rand}}" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; ">
        PDF
    </a>

    <a href="/p_med_invoice" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; ">
        Add More
    </a>

</div>


</form>
</div>




<div class="img" style="
    position: absolute;
    top: 70%;
    left: 19.5%;
    width: 217px;
    height: 191px;">
    <a href="" target="_blank" class="p-img">
        <img src="" alt="Product  does not have any img or an error occur" style="
    width: 100%;
    display:none;
    height:100%;
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
    $(document).change(function() {
        // count();
        // count2();
        per_unit();

        qty();
        per_unit2();
        total_amount();
    })



    function per_unit() {
        $(document).ready(function() {
            let count = <?php echo $counter; ?> - 1


            for (let i = 1; i <= count; i++) {


                let amount = $("." + i + "pur_qty").val();

                let sale = $("." + i + "pur_price").val();

                $("." + i + "exp_unit").val(sale / amount);


            }
            count();
            count2();
        })
    }


    function per_unit2() {
        for (let i = 1; i <= countera; i++) {

            let amount = $("#pur_qty" + i).val();

            let sale = $("#pur_price" + i).val();

            $("#exp_unit-notWorking" + i).val(sale / amount);
        }

        count();
        count2();
    }






    function seller123() {

        $(document).ready(function() {

            var selectedOption = $("#seller").find('option:selected');
            var debit = $('#debit');
            var credit = $('#credit');

            debit.val(selectedOption.data('debit')); // Set the value of the unit input field to the data-unit value of the selected option
            // Set the value of the unit input field to the data-unit value of the selected option





            count();
            count2();
            per_unit();

            total_amount();
            qty();
            per_unit2();
        })

    }



    var counter = 2
    var countera = 1


    function addInvoice() {
        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
        <div class="dup_invoice">

        <div class="div  items">
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice2(` + counter + `)"  class='clone_item` + counter + `'>
                    <option></option>
                    <option></option>
                        @foreach ($product as $row)
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-stock="{{$row->opening_quantity}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}"  >{{ $row->product_name }}</option>
                        @endforeach
                        </select>
                        <input onkeydown="handleKeyPress(event)" style="display: none "  value="0" id="pr_item" name="pr_item[]" />

                        </div>

                <div class="div">
                <input   type="text"style="text-align:center !important;" readonly   id="unit` + counter + `" name="unit[]" />
                <input onkeydown="handleKeyPress(event)" style="display: none "  value="0.00" id="previous_stock` + counter + `" name="previous_stock[]" />
                <input onkeydown="handleKeyPress(event)" style="display: none "  value="0.00"   id="avail_stock2` + counter + `" name="avail_stock[]" />
                </div>

                <div class="div">
                <input   type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <input   type="date" id="expiry" name="expiry[]" />
                </div>

                

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_price` + counter + `" name="pur_price[]" required onchange='count2();  total_amount();'/>
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_qty` + counter + `" name="pur_qty[]" onchange='qty(); per_unit2();' />
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="dis_per` + counter + `" name="dis_per[]" onchange='discount2();  total_amount();'  />
                </div>
                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value="0.00" id="dis_amount` + counter + `" name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' onchange='count();  total_amount();' id="amount` + counter + `" name="amount[]"/>
                </div>
    </div>

  `;


        }
        let count = <?php echo $counter; ?> - 1
        let amount = $("#amount" + count).val()
        let narration = $("#pur_price" + count).val()
        if (!$("#amount" + count).hasClass('check')) {


            if (amount > 0 && narration > 0) {

                $("#amount" + count).addClass("check")
                console.log(counter + "first");


                counter++
                countera++


                $(".invoice").append(clonedFields);

            }
        }


        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
             $('select').select2({
            theme: 'classic',
            width: 'resolve',
        });

            let count = <?php echo $counter; ?> - 1
            for (let i = 1; i <= count; i++) {

                var selectedOption = $("#" + i + "item").find('option:selected');
                var unitInput = $("." + i + "unit");
                unitInput.val(selectedOption.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option





                $('.avail_stock').css("display", "block")
                var stInput = $('#avail_stock');
                var st_val = selectedOption.data('stock');
                stInput.val(st_val);


                $('#p-img').css("display", "block")
                var imgInput = $('#p-img');
                var imgSrc1 = selectedOption.data('img');

                console.log(imgSrc1);
                imgInput.attr('src', imgSrc1);

                $(".p-img").attr('href', imgSrc1)
                // Initialize other select elements if necessary

            }






            for (let index = 1; index <= countera; index++) {
                var selectedOption2 = $(".clone_item" + index).find('option:selected');


                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption2.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option

                var st_val2 = selectedOption2.data('stock');
                if (st_val2 != null) {

                    console.log(st_val2);
                    stInput.val(st_val2);
                }




                imgSrc = selectedOption2.data('img');
                imgInput.attr('src', imgSrc);
                $(".p-img").attr('href', imgSrc)


            }
        });

    }








    function addInvoice2() {
        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
        <div class="dup_invoice">

        <div class="div  items">
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice2(` + counter + `)"  class='clone_item` + counter + `'>
                    <option></option>
                    <option></option>
                        @foreach ($product as $row)
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-stock="{{$row->opening_quantity}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}"  >{{ $row->product_name }}</option>
                        @endforeach
                        </select>
                        <input onkeydown="handleKeyPress(event)" style="display: none "  value="0" id="pr_item" name="pr_item[]" />

                        </div>

                <div class="div">
                <input   type="text"style="text-align:center !important;" readonly   id="unit` + counter + `" name="unit[]" />
                <input onkeydown="handleKeyPress(event)" style="display: none "  value="0.00" id="previous_stock` + counter + `" name="previous_stock[]" />
                <input onkeydown="handleKeyPress(event)" style="display: none "  value="0.00"   id="avail_stock2` + counter + `" name="avail_stock[]" />
                </div>

                <div class="div">
                <input   type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <input   type="date" id="expiry" name="expiry[]" />
                </div>

                

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_price` + counter + `" name="pur_price[]" required onchange='count2();  total_amount();'/>
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="pur_qty` + counter + `" name="pur_qty[]" onchange='qty(); per_unit2();' />
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="dis_per` + counter + `" name="dis_per[]" onchange='discount2();  total_amount();'  />
                </div>
                <div class="div">
                    <input type="number" min="0.00" style="text-align:right !important;" step='any' value="0.00" id="dis_amount` + counter + `" name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input   type="number" min="0.00" style="text-align:right !important;" step='any' value='0.00' onchange='count();  total_amount();' id="amount` + counter + `" name="amount[]"/>
                </div>
    </div>

  `;


        }

        counter = counter - 1
        let amount2 = $("#amount" + counter).val()
        console.log('counter' + counter);
        let narration2 = $("#pur_price" + counter).val()
        if (!$("#amount" + counter).hasClass('check')) {


            if (amount2 > 0 && narration2 > 0) {

                $("#amount" + countera).addClass("check")

                console.log(counter);
                console.log(countera);

                counter++
                countera++


                $(".invoice").append(clonedFields);

            }
        }
        counter = counter + 1


        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
             $('select').select2({
            theme: 'classic',
            width: 'resolve',
        });

            let count = <?php echo $counter; ?> - 1
            for (let i = 1; i <= count; i++) {

                var selectedOption = $("#" + i + "item").find('option:selected');
                var unitInput = $("." + i + "unit");
                unitInput.val(selectedOption.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option





                $('.avail_stock').css("display", "block")
                var stInput = $('#avail_stock');
                var st_val = selectedOption.data('stock');
                stInput.val(st_val);


                $('#p-img').css("display", "block")
                var imgInput = $('#p-img');
                var imgSrc1 = selectedOption.data('img');

                console.log(imgSrc1);
                imgInput.attr('src', imgSrc1);

                $(".p-img").attr('href', imgSrc1)
                // Initialize other select elements if necessary

            }






            for (let index = 1; index <= countera; index++) {
                var selectedOption2 = $(".clone_item" + index).find('option:selected');


                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption2.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option

                var st_val2 = selectedOption2.data('stock');
                if (st_val2 != null) {

                    console.log(st_val2);
                    stInput.val(st_val2);
                }




                imgSrc = selectedOption2.data('img');
                imgInput.attr('src', imgSrc);
                $(".p-img").attr('href', imgSrc)


            }
        });

    }











    function count() {
        $(document).ready(function() {
            let count = <?php echo $counter; ?> - 1


            for (let i = 1; i <= count; i++) {

                let amount = $("." + i + "pur_price").val();
                let qty = $("." + i + "pur_qty").val();


                $("." + i + "amount").val(parseFloat(amount * qty));

            }

            total_amount();
            discount();
            discount2();
        })

    }

    function count2() {

        for (let i = 1; i <= countera; i++) {


            let amount = parseFloat($("#pur_price" + i).val() * $("#pur_qty" + i).val());
            let qty = $("#pur_qty" + i).val()

            $("#amount" + i).val(parseFloat(amount * $("#pur_qty" + i).val()));

        }
        discount();
        discount2();
    }





    function discount() {
        $(document).ready(function() {
            let count = <?php echo $counter; ?> - 1;
            let total = 0;

            for (let i = 1; i <= count; i++) {
                let amount1 = parseInt($("." + i + "dis_per").val());
                let amount2 = parseInt($("." + i + "pur_price").val());

                let qty = parseFloat($("." + i + "pur_qty").val())

                amount2 = amount2 * qty

                let discountPercentage = amount1;
                let amount = amount2 - (amount2 * discountPercentage / 100);

                $("." + i + "dis_amount").val(amount2 - amount);
                $("." + i + "amount").val(amount);

                total += amount1;
            }

            // var atotal = 0;

            // for (let i = 1; i <= count; i++) {
            //     let amount1 = parseInt($("." + i + "dis_amount").val());
            //     atotal += amount1;
            // }
            // for (let i = 1; i <= countera; i++) {
            //     let amount1 = parseInt($("#dis_amount" + i).val());
            //     atotal += amount1;
            // }
            // console.log('test2' + atotal);

            // $("#dis_total").val(atotal);

            total_amount();


        });
    }




    function discount2() {

        for (let i = 1; i <= countera; i++) {



            let amount1 = parseFloat($("#dis_per" + i).val());
            let amount2 = parseFloat($("#pur_price" + i).val());

            let discountPercentage = amount1;
            let amount = amount2 - (amount2 * discountPercentage / 100);

            let total = amount2 - amount
            $("#dis_amount" + i).val($("#pur_qty" + i).val() * (amount2 - amount));
            $("#amount" + i).val(amount * $("#pur_qty" + i).val());

            console.log(amount2 - amount + '   ' + i);

        }

        // var total = 0;

        // for (let i = 1; i <= count; i++) {
        //     let amount1 = parseInt($("." + i + "dis_amount").val());
        //     total += amount1;
        // }
        // for (let i = 1; i <= countera; i++) {
        //     let amount1 = parseInt($("#dis_amount" + i).val());
        //     total += amount1;
        // }

        // $("#dis_total").val(total);
        total_amount();


    }







    function total_amount() {
        let count = <?php echo $counter; ?> - 1;

        var atotal = 0; // Initialize atotal outside the loops.

        for (let i = 1; i <= count; i++) {
            let amount1 = parseFloat($("." + i + "amount").val());
            atotal += amount1; // Add amount1 to atotal in each iteration.
        }

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseFloat($("#amount" + i).val());
            atotal += amount1; // Add amount1 to atotal in each iteration.
        }

        let fInput = $("#freight").val();
        let sInput = $("#sales_tax").val();
        let aInput = $("#ad_sales_tax").val();
        let bInput = $("#bank").val();
        let oInput = $("#other_expense").val();

        let f = $.isNumeric(fInput) ? parseFloat(fInput) : 0;
        let s = $.isNumeric(sInput) ? parseFloat(sInput) : 0;
        let b = $.isNumeric(bInput) ? parseFloat(bInput) : 0;
        let o = $.isNumeric(oInput) ? parseFloat(oInput) : 0;

        let percent = $.isNumeric(aInput) ? (parseFloat(aInput)) : 0; // Calculate the percentage of 'a'
        let total = f + b + o;

        percent += s

        let grand = atotal + total
        $("#amount_total").val(grand + (grand * percent / 100)); // Calculate the total and set it to 2 decimal places


        var totalb = 0;

        for (let i = 1; i <= count; i++) {
            let amount1 = parseInt($("." + i + "dis_amount").val());
            totalb += amount1;
        }

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#dis_amount" + i).val());
            totalb += amount1;
        }
        console.log('dis' + totalb);
        $("#dis_total").val(totalb)
    }











    function cartage1() {
        $(document).ready(function() {


            var atotal = parseFloat($("#amount_total").val());


            let p = parseFloat($("#debit").val())
            let credit = parseFloat($("#credit").val())

            let c = parseFloat($("#cartage").val())

            $("#grand_total").val(parseFloat(p + atotal + c));

            let g = $("#grand_total").val()

            $("#balance_amount").val(parseFloat(g - credit));

        })

    }






    function qty() {
        $(document).ready(function() {
            let count = <?php echo $counter; ?> - 1;
            let atotal1 = 0
            for (let i = 1; i <= count; i++) {
                let amount1 = parseInt($("." + i + "pur_qty").val());
                atotal1 += amount1;
            }


            for (let i = 1; i <= countera; i++) {
                let amount1 = parseInt($("#pur_qty" + i).val());
                atotal1 += amount1;
            }

            $("#qty_total").val(atotal1);

        })
    }
</script>
<script>
    $("#item option").click(function() {
        // Initialize Select2 for the desired select elements
        $("select").select2();

        // Initialize other select elements if necessary
    });

    $(document).ready(function() {
        // Initialize Select2 for the desired select elements
         $('select').select2({
            theme: 'classic',
            width: 'resolve',
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

        count();
        count2();
        per_unit();
        discount();
        discount2();
        total_amount();
        qty();
        per_unit2();
        // Get the form data
        var formData = $("#form").serialize();

        // Send an AJAX request
        $.ajax({
            url: "/ep_med_invoice_form_id=<?php foreach ($single_invoice as $key => $row) {
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


                window.location.reload()



            },
            error: function(error) {
                // Handle the error
            },
        });
    })
</script>

@endsection