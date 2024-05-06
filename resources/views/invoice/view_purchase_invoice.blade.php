@extends('master')  @section('title','Purchase Invoice Table')  @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Purchase Invoice Table</h3>
            <a href="/p_med_invoice" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Purchase Invoice</a>
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>GR No</th>
                        <th>Invoice No</th>
                        <th>company</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1
                    @endphp
                    @foreach ($purchase_invoice as $row)
                        <tr class="tr-shadow table">
                            <td>{{$serial}}</td>
                            <td><a href="/ep_med_invoice_id={{$row->unique_id}}"><span class="block-email">{{$row->unique_id}}</span></a></td>
                            <td><a href="/ep_med_invoice_id={{$row->unique_id}}"><span class="block-email">{{$row->invoice_no}}</span></a></td>
                            <td><span>{{$row->company_name}}</span></td>
                            <td><span class="status--process" style="color: red;">{{$row->qty_total}}</span></td>
                            <td><span class="status--process">{{$row->amount_total}}</span></td>
                            <td>{{$row->created_at}}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="/ep_med_invoice_id={{$row->unique_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="/rp_med_invoice_id={{$row->unique_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="fa fa-retweet"></i>
                                    </a>
                                    <a href="/purchase_invoice_pdf_{{$row->unique_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF">
                                        <i class="fa fa-solid fa-file-pdf"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                        $serial++;
                        @endphp
                        @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>


</div>

@endsection