@extends('master') @section('title','Accounts') @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Accounts</h3>
            <a href="" data-toggle="modal" data-target="#login-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> &nbsp; Add Account</a>
        </div>
        <style>
           .card .select2-container--classic {
                width: 295px !important;
                height: 27px !important;
                margin-top: 1%;
                margin-left: 2.5%;
                line-height: 25px !important;
                height: 25px !important;
            }
        </style>
            <select class="form-control account-select" id="account" name="property" onchange="accounts()">
                    <option value="1" {{ $id == 1 ? 'selected' : '' }}>Cash</option>
                    <option value="2" {{ $id == 2 ? 'selected' : '' }}>Accounts Receivable</option>
                    <option value="3" {{ $id == 3 ? 'selected' : '' }}>Accounts Payable</option>
                    <option value="4" {{ $id == 4 ? 'selected' : '' }}>Bank</option>
                    <option value="5" {{ $id == 5 ? 'selected' : '' }}>Expense</option>
                    <option value="6" {{ $id == 6 ? 'selected' : '' }}>Income</option>
                    <option value="7" {{ $id == 7 ? 'selected' : '' }}>Cost Of Sales</option>
                    <option value="8" {{ $id == 8 ? 'selected' : '' }}>Long Term Liabilities</option>
                    <option value="9" {{ $id == 9 ? 'selected' : '' }}>Inventory</option>
                    <option value="10" {{ $id == 10 ? 'selected' : '' }}>Capital</option>
                    <option value="11" {{ $id == 11 ? 'selected' : '' }}>Drawing</option>
                </select>
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>account Name</th>
                        <th>Qty</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1;
                    @endphp
                    @foreach ($users as $row)
                    <tr class="tr-shadow">
                        <td>{{ $serial }}</td>
                        <td>{{ $row->account_name }}</td>
                        <td>{{ $row->account_qty }}</td>
                        <td>{{ $row->account_debit }}</td>
                        <td>{{ $row->account_credit }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->account_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <!-- <a href="/del_user/{{ $row->user_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete User">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                            </div>
                        </td>
                    </tr>
                    <!-- <tr class="spacer"></tr> -->
                    @php
                    $serial++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Add account</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_account">
                        @csrf
                        <div class="form-group">
                            <label for="username">account Name</label>
                            <input type="text" class="form-control" id="account" name="account_name" required>
                            <input type="hidden" name="account_category" value="{{$id}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Qty</label>
                            <input type="number" class="form-control" id="account" name="account_qty">
                        </div>

                        <div class="form-group">
                            <label for="username">Debit</label>
                            <input type="number" class="form-control" id="account" name="account_debit">
                        </div>
                        <div class="form-group">
                            <label for="username">Credit</label>
                            <input type="number" class="form-control" id="account" name="account_credit">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




@foreach ($users as $row)


<div class="modal fade" id="edit_modal{{$row->account_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit account</h4>
                <div class="modal-body">
                    <form method="POST" action="/edit_account{{$row->account_id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">account Name</label>
                            <input type="text" class="form-control" id="account" name="account_name" required value="{{$row->account_name}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Qty</label>
                            <input type="number" class="form-control" id="account" name="account_qty" value="{{$row->account_qty}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Debit</label>
                            <input type="number" class="form-control" id="account" name="account_debit" value="{{$row->account_debit}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Credit</label>
                            <input type="number" class="form-control" id="account" name="account_credit" value="{{$row->account_credit}}">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endforeach
<script>
    function accounts() {

        var selectedOption = $("#account").find('option:selected');

        window.location.href = "/account_account=" + selectedOption.val()

    }
</script>

@extends('master') @section('title','Accounts') @section('content')
@endsection