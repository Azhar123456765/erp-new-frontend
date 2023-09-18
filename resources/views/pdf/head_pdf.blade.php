<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 120px;
        /* Adjust the logo width as needed */
    }

    .address {
        font-weight: normal;
        text-align: right;
        margin-bottom: 78px;
   
    }

    .pdf-time {
        position: fixed;
        bottom: 20px;
        left: 20px;
        font-size: 12px;
        color: #999;
    }

    * {
        font-family: "Poppins", sans-serif !important;
    }
</style>
@php

$org = App\Models\Organization::all();
foreach ($org as $key => $value) {

$logo = $value->logo;
$address = $value->address;


}
@endphp
<div id="pdf_table">
    <div class="header">
        <div>
            <img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path($logo))) }}" alt="Organization Logo" class="logo">

        </div>
        <div class="address">

            <p>Head Office Address:</p>
            <br>
            <p>{{$address}}</p>
        </div>
    </div>

    <h2 style="text-align: center;">{{session("pdf_title")}}</h2>