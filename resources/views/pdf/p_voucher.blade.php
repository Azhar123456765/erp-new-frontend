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


  .sign {}
</style>



<?php

$data = session()->get('p_voucher_pdf_data');
$sdata = session()->get('s_p_voucher_pdf_data');

// $product_pdf_data = session()->get('product_pdf_data');
// $sales_officer_pdf_data = session()->get('sales_officer_pdf_data');
// $seller_pdf_data = session()->get('seller_pdf_data');


?>

@include('pdf.head_pdf')

<h1 style="text-align: center; margin-bottom:5%;">Payment Voucher</h1>
@foreach ($sdata as $row)

<table class="ab" style="padding: 5px;">
  <tbody>
    <tr>
      <td>
        Voucher No: &nbsp;&nbsp;&nbsp; {{$row->unique_id}}
      </td>
      <td>
        Date: &nbsp;&nbsp;&nbsp; {{$row->date}}
      </td>
    </tr>
  </tbody>
</table>

<table class="a" style="padding: 5px;">
  <tbody>
    <tr>
      <td>
        Comapny Name: &nbsp;&nbsp;&nbsp; <span>{{$row->company_ref == "B" ? $row->buyer->company_name : $row->supplier->company_name}}</span>
      </td>
      <td>Ref NO.:&nbsp;&nbsp;&nbsp;{{$row->ref_no}}</td>
    </tr>
  </tbody>
</table>

@endforeach
<br>
<table class="c">
  <thead>
    <tr>
      <th>S#</th>
      <th>Narration</th>
      <th>Cheque No</th>
      <th>Cheque Date</th>
      <th>Account</th>
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
        <span>{{$row->narration}}</span>

      </td>
      <td style="text-align: center;">
        <span>{{$row->cheque_no}}</span>
      </td>
      <td style="text-align: center;">
        <span>{{$row->cheque_date}}</span>
      </td>
      <td style="text-align: right;">
        <span>{{$row->account}}</span>
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

  <tfoot>
    <tr>
      <td colspan="5" style="text-align:right; border:none; "><b>Total:</b></td>
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
<!-- ...Existing HTML code... -->

<!-- Receiver Section -->
<div style="text-align: left; margin-top: 200px; " <p>Receiver's Name: ________________________</p>
</div>
<div style="text-align: right; margin-top: -150px;">
  <p>Authorized Signature: _____________________</p>
</div>
<!-- Authorized Signature Section -->


</body>

</html>

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
<div class="pdf-time">
  <?php echo "Generated on:" . ' ' . date('Y-m-d H:i:s'); ?>
</div>

</div>