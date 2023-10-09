@extends('master') @section('content')
<br><br><br><br><br>
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Invoice table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">

                    <button data-toggle="modal" data-target="#search-modal" class="btn btn-primary" role="button" style="background-color: black;">Filter</button>


                </div>
                <div class="table-data__tool-right">
                    <a href="/s_med_invoice" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="fa fa-plus"></i>add Invoice</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <button href="" data-toggle="modal" data-target="#p-Invoice" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2 ">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Invoice No</th>
                            <th>company</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = ($sell_invoice->currentPage() - 1) * $sell_invoice->perPage() + 1;
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
                        <div>
                            {{ $sell_invoice->links() }}
                        </div>
                        @php
                        $serial++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>

            </div>
            <br>
            <div class="container">

            </div>

            <!-- END DATA TABLE -->

        </div>
    </div>
</div>








@endsection

<div class="modal fade" id="search-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Search Invoice</h4>
                <div class="modal-body">

                    <form method="GET" action="/sale-invoice">
                        @csrf
                        <div class="form-group">
                            <label for="username">Invoice No</label>
                            <input type="text" class="form-control " name="invoice_no" value="{{$invoice_no ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Company</label>
                            <select name="company" id="s" class="form-control " data-live-search="true">
                                <option></option>
                                @foreach ($seller as $row2)
                                <option value="{{$row2->buyer_id}}" {{$row2->buyer_id == $company ? 'selected' : ''}}>{{$row2->company_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="sales_officer">Sales Officer</label>
                            <select name="sales_officer" class="form-control " id="sales_officer" data-live-search="true">
                                <option></option>
                                @foreach ($sales_officer as $row)
                                <option value="{{ $row->sales_officer_id }}" {{$row->sales_officer_id == $sales_officer2 ? 'selected' : ''}}>{{ $row->sales_officer_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="username">Date</label>
                            <input type="date" class="form-control " name="date" value="{{$date ?? ''}}">
                            <input type="hidden" name="check" value="1">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>