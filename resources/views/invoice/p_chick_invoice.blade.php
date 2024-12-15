@extends('layout.app')  @section('title','Panel')  @section('content')
<style>
  * input {
    border: 1px solid;
    width: 71px;
  }

  label {
    margin: 3px;
  }

  .top label {
    margin: 5px;

  }

 #invoiceForm select {
    height: 5vh !important;
  }

  .dup_invoice label {
    width: 71px;
    text-align: center;
    height: 55px;
    padding: 15px auto 15px 15px;
    border: 1px solid wheat;
    display: flex;
  }

  .dup_invoice input {
    border: 1px solid;
    width: 71px;
  }

  .total input {
    border: 1px solid;
    width: 71px;
  }

  .dup_invoice {
    margin-top: 39px;
    display: flex;
    width: 100%;
  }


  .invoice input {
    border: 1px solid;
    width: 71px;
  }

  .invoice label {
    text-align: center;
  }

  .total input {
    border: 1px solid;
    width: 71px;
  }

  .top {
    margin-top: 5%;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
  }

  .top#invoiceForm select {
    width: 71px;
  }

  .fields {


    justify-content: space-around;
  }

  .flex {
    display: flex;
    justify-content: space-between;
  }
</style>
<div class="container">
  <h3 style="text-align: center; margin-top: 31px;">Purchase Invoice</h3>

  <br>
<h5>Chicken</h5>

  <div class="top">


    <div class="fields">
      <label>Date</label>
      <input type="date" id="date">
      <label>Sales Officer</label>
      <select name="sales_officer" id="sales_officer" data-live-search="true">

        @foreach ($sales_officer as $row)

        <option value="{{$row->name}}">{{$row->name}}</option>

        @endforeach

      </select>

      <label>Supplier</label>
      <select name="seller" id="seller" class="company">

        @foreach ($seller as $row)

        <option value="{{$row->company_name}}">{{$row->company_name}}</option>

        @endforeach

      </select>

    </div>


    <div class="fields">

      <label>Remarks</label>
      <input type="text" id="remark">
    </div>
    <div class="fields"></div>
    <div class="fields"></div>

  </div>
  <br>

  <div class="invoice" id="form" action="/purchase_invoice_form" method="POST">
    @csrf
    <div class="dup_invoice">
      <div class="div">
        <label for="item">Item</label>
        <select name="item" id="item" style="height: 28px;">

          @foreach ($product as $row)

          <option value="{{$row->product_name}}">{{$row->product_name}}</option>

          @endforeach

        </select>

      </div>

      <div class="div">
        <label for="rateType">Rate Type</label>
        <input type="text" id="rateType">
      </div>

      <div class="div">
        <label for="vehicleNo">Vehicle No</label>
        <input type="text" id="vehicleNo">
      </div>

      <div class="div">
        <label for="crateType">Crate Type</label>
        <input type="text" id="crateType">
      </div>

      <div class="div">
        <label for="crateQty">Crate Qty</label>
        <input type="text" id="crateQty">
      </div>

      <div class="div">
        <label for="henQty">Hen Qty</label>
        <input type="text" id="henQty">
      </div>

      <div class="div">
        <label for="grossWeight">Gross Weight</label>
        <input type="text" id="grossWeight">
      </div>

      <div class="div">
        <label for="actualRate">Actual Rate</label>
        <input type="text" id="actualRate">
      </div>

      <div class="div">
        <label for="feedCut">Feed Cut</label>
        <input type="text" id="feedCut">
      </div>

      <div class="div">
        <label for="morCut">Mor Cut</label>
        <input type="text" id="morCut">
      </div>

      <div class="div">
        <label for="crateCut">Crate Cut</label>
        <input type="text" id="crateCut">
      </div>

      <div class="div">
        <label for="avg">Avg</label>
        <input type="text" id="avg">
      </div>

      <div class="div">
        <label for="nWeight">N.Weight</label>
        <input type="text" id="nWeight">
      </div>

      <div class="div">
        <label for="rateDiff">Rate Diff</label>
        <input type="text" id="rateDiff">
      </div>

      <div class="div">
        <label for="rate">Rate</label>
        <input type="text" id="rate">
      </div>

      <div class="div">
        <label for="amount">Amount</label>
        <input type="text" id="amount">

      </div>

      <button onclick="submit()" class="btn btn-secondary btn-sm">submit</button>

    </div>


  </div>




  <!-- <button onclick="addInvoice()">Add Invoice</button> -->




  <div class="total" style="margin-top: 119px; display: flex; margin-left: 45%;">
    <div class="div">

    </div>

  </div>

  <div class="flex justify-center items-center" style="display:none;">
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center custom-alert" style="position: fixed; top: 79%; left: 50%; transform: translate(-50%, -50%); width: 32%; opacity: 0.75;">
      <span class="show1"></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  </div>
</div>
<script>
  // function addInvoice() {

  //   var invoice = $(".invoice  .dup_invoice:last-child").clone().appendTo(".invoice")

  // }


  function submit() {





    var formData = {
      sales_officer: $('#sales_officer').val(),
      company: $('#seller').val(),
      remark: $('#remark').val(),
      pkr_amount: $('#pkr_amount').val(),
      warehouse: $('#warehouse').val(),
      bilty_no: $('#bilty_no').val(),
      date: $('#date').val(),



      type: 'chick',


      item: $('#item').val(),
      rateType: $('#rateType').val(),
      vehicleNo: $('#vehicleNo').val(),
      crateType: $('#crateType').val(),
      crateQty: $('#crateQty').val(),
      henQty: $('#henQty').val(),
      grossWeight: $('#grossWeight').val(),
      actualRate: $('#actualRate').val(),
      feedCut: $('#feedCut').val(),
      morCut: $('#morCut').val(),
      crateCut: $('#crateCut').val(),
      avg: $('#avg').val(),
      nWeight: $('#nWeight').val(),
      rateDiff: $('#rateDiff').val(),
      rate: $('#rate').val(),
      amount: $('#amount').val()
    };

    // Send the form data in an AJAX request

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: "/p_chick_invoice_form",
      data: formData,
                contentType: false, // Prevent jQuery from setting the content type
                processData: false, // Prevent jQuery from processing the data
      success: function(response) {
        // Handle the response

        $(".items-center").css('display', 'block')
        $(".show1").text(response)

        $(".dup_invoice").find('input').val('');

      },
      error: function(error) {
        // Handle the error
      }
    });






  }
</script>






@endsection

<script>
  $(document).ready(function() {
    $('select').selectpicker('refresh');
  });
</script>