@extends('layout.app')
@section('title', 'Sale Invoice Table')
@section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sale Invoice Table</h3>
            <a href="/s_med_invoice" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Sale Invoice</a>
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Invoice No</th>
                        <th>Company</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table body content goes here -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script>
 $(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        ajax: '/data-sale-invoice',
        columns: [
            { 
                data: null,
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
         },
            { 
                data: null,
                render: function(data, type, row) {
                    return '<a href="/es_med_invoice_id=' + row.unique_id + '"><span class="block-email">' + row.unique_id + '</span></a>';
                }
         },      
            { data: 'company_name', name: 'company_name' },
            { data: 'qty_total', name: 'qty_total' },
            { data: 'amount_total', name: 'amount_total' },
            { data: 'due_date', name: 'due_date' },
            { data: 'created_at', name: 'created_at'},

            { 
                data: null,
                render: function(data, type, row) {
    return `
        <div class="table-data-feature">
            <a href="/es_med_invoice_id=${row.unique_id}" class="item" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                <i class="fa fa-edit"></i>
            </a>
            <a href="/rs_med_invoice_id=${row.unique_id}" class="item" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="PDF">
                <i class="fa fa-solid fa-retweet"></i>
            </a>
            <a href="/sale_invoice_pdf_${row.unique_id}" class="item" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="PDF">
                <i class="fa fa-solid fa-file-pdf"></i>
            </a>
        </div>
    `;
}

         }, 
        ]
    });
});

</script>
@endsection
