@extends('master') @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sale Invoice Table</h3>
            <a href="/s_med_invoice" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Sale Invoice</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Invoice No</th>
                        <th>company</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1
                    @endphp
                    @foreach ($sell_invoice as $row)
                    <tr class="tr-shadow table">
                        <td>{{$serial}}</td>
                        <td><a href="/es_med_invoice_id={{$row->unique_id}}"><span class="block-email">{{$row->unique_id}}</span></a></td>
                        <td><span>{{$row->company_name}}</span></td>
                        <td><span class="status--process" style="color: red;">{{$row->qty_total}}</span></td>
                        <td><span class="status--process">{{$row->amount_total}}</span></td>
                        <td class="">{{$row->due_date}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="/es_med_invoice_id={{$row->unique_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/sale_invoice_pdf_{{$row->unique_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="PDF">
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