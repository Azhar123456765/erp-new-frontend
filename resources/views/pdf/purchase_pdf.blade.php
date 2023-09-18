<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>












    
    input {
        border: none !important;
    }


    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 2px solid;
        padding: 3px;
    }


    .c th {
        background-color: #f2f2f2;
        text-align: center;
    }

    .total-amount {
        text-align: right;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 150px;
        /* Adjust the logo width as needed */
    }

    .address {
        font-weight: normal;
        text-align: right;
    }

    .pdf-time {
        position: fixed;
        bottom: 20px;
        left: 20px;
        font-size: 12px;
        color: #999;
    }




    .first {
        width: 100% !important;
        display: flex;
        justify-content: space-between;
        padding: 3px;
        width: 50%;
    }

    .left {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border: 2px solid;
        width: 50%;
    }

    .right {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border: 2px solid;
        width: 50%;
    }

    .form-group {
        flex-direction: row !important;
        display: flex;
    }

    .f .form-group {
        width: 9%;
    }

    .first .form-group p {
        padding-left: 7%;
    }



    .total {
        width: 100%;
        display: flex;
        flex-direction: column;
        border: 2px solid;
        margin-top: 2px;
    }

    .b {
        position: absolute;
        left: 31%;
    }


    h3 {
        font-size: 1.55rem !important;
    }

    input {
        border: none !important;
    }



    th {
        background-color: #f2f2f2;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 150px;
        /* Adjust the logo width as needed */
    }

    .address {
        font-weight: normal;
        text-align: right;
    }

    .pdf-time {
        position: fixed;
        bottom: 20px;
        left: 20px;
        font-size: 12px;
        color: #999;
    }




    .first {
        width: 100% !important;
        display: flex;
        justify-content: space-between;
        padding: 3px;
        width: 50%;
    }

    .left {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border: 2px solid;
        width: 50%;
    }

    .right {
        display: flex;
        flex-direction: column;
        padding: 3px;
        border: 2px solid;
        width: 50%;
    }

    .form-group {
        flex-direction: row !important;
        display: flex;
    }

    .f .form-group {
        width: 33.33%;
    }

    .first .form-group p {
        padding-left: 7%;
    }



    .total {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-top: 2px;
    }

    .b {
        position: absolute;
        left: 31%;
    }


    h3 {
        font-size: 1.55rem !important;
    }


    input {
        border: 1px solid gray !important;
        width: 71px;
    }

    .a td {
        width: 50%;
    }

    .a td {
        width: 33.333%;
    }

    .total-amount {
        background-color: lightgray;
        border: 3px solid;
    }
</style>



<?php

$data = session()->get('purchase_invoice_pdf_data');
$sdata = session()->get('s_purchase_invoice_pdf_data');

// $product_pdf_data = session()->get('product_pdf_data');
// $sales_officer_pdf_data = session()->get('sales_officer_pdf_data');
// $seller_pdf_data = session()->get('seller_pdf_data');


?>
@include('pdf.head_pdf')


    <h1 style="text-align: center; margin-bottom:5%;">Purchase Invoice</h1>
    @foreach ($sdata as $row)

    <table class="ab">
        <tbody>
            <tr>
            <td>
                    GRN No: &nbsp;&nbsp;&nbsp; {{$row->unique_id}}
                </td>
                <td>
                    Date: &nbsp;&nbsp;&nbsp; {{$row->date}}
                </td>
                <td>
                    Invoice No: &nbsp;&nbsp;&nbsp; {{$row->invoice_no}}
                </td>
            </tr>
        </tbody>
    </table>

    <table class="a">
        <tbody>
            <tr>
                <td>
                    Company: &nbsp;&nbsp;&nbsp; {{$row->company_name}} <br><br> Address: &nbsp;&nbsp;&nbsp; {{$row->address}}
                </td>
                <td>Bilty No:&nbsp;{{$row->bilty_no}}</span>
                    <br><br>
                    
                </td>
            </tr>
        </tbody>
    </table>

    @endforeach
    <br>
    <table class="c">
        <thead>
            <tr>
                <th>S#</th>
                <th>Product Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNumber = 1; // Initialize serial number counter
            ?>

            @foreach ($data as $row)

            <tr>
                <td style="text-align: center;">{{$serialNumber}}</td>
                <td>
                    <span>{{$row->product_name}}</span>

                </td>
                <td style="text-align: center;">
                    <span>{{$row->unit}}</span>
                </td>
                <td style="text-align: right;">
                    <span>{{$row->pur_price}}</span>
                </td>
                <td style="text-align: right;">
                    <span>{{$row->pur_qty}}</span>
                </td>
                <td style="text-align: right;">
                    <span>{{$row->dis_amount}}</span>
                </td>
                <td style="text-align: right;">
                    <span>{{$row->amount}}</span>
                </td>



            </tr>
            <?php
            $serialNumber++; // Increment serial number after each ro
            ?>

            @endforeach

        </tbody>
        @foreach ($sdata as $row)

        <tfoot style="text-transform: capitalize;">
            <tr>
                <td colspan="4" style="text-align:right; border:none;"><b>Total:</b></td>
                <td class="total-amount">{{$row->qty_total}}</td>
                <td class="total-amount">{{$row->dis_total}}</td>
                <td class="total-amount">{{$row->amount_total}}</td>



            </tr>
            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>freight:</b></td>
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                <td class="total-amount">{{$row->freight}}</td>
            </tr>

            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>Sales Tax:</b></td>
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                <td class="total-amount">{{$row->sales_tax}}</td>
            </tr>

            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>Ad.Sales Tax:</b></td>
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                <td class="total-amount">{{$row->ad_sales_tax}}</td>
            </tr>

            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>bank:</b></td>
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                <td class="total-amount">{{$row->bank}}</td>
            </tr>

            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>other expense:
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                :</b></td>
                <td class="total-amount">{{$row->other_expense}}</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:right; border:none; "><b>Grand Total:
                <td class="total-amount" style="border:none; background:none;"></td>
                <td class="total-amount" style="border:none; background:none;"></td>

                :</b></td>
                <td class="total-amount">{{$row->amount_total}}</td>
            </tr>
        </tfoot>
        @endforeach
        <!-- <tfoot>
      <tr>
        <td class="total-qty" style="
    position: absolute;
    left: 41.2%;
">1</td>
      </tr>
      <tr style="
    position: absolute;
    left: 68.1%;
">
        <td rowspan="1" class="total-discount">2</td>
      </tr>
      <tr>
        <td class="total-amount" style="
    position: absolute;
    left: 84.5%;
">3</td>
      </tr>
    </tfoot> -->
    </table>

    <!-- <div class="div">
    <p>$row->debit; ?></p>
    <p>$row->debit; ?></p>
    <p>$row->debit; ?></p>
    <p>$row->debit; ?></p>
    <p>$row->debit; ?></p>
  </div> -->
    <!-- <div class="total">
    <div class="b">

      <h3>Previous balance:</h3>
      <h3>Cartage:</h3>
      <h3>Grand Total:</h3>
      <h3>Amount Paid:</h3>
      <h3>Balance Amount:</h3>

    </div> -->
</div>
<br>
<!-- <div class="pdf-time">
      Generated on: date('Y-m-d H:i:s'); ?>
    </div> -->

</div>