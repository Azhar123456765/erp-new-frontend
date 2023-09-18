@extends('master') @section('content')

<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">accounts</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md" style="min-width: 127%;">
                        <select class="js-select2  " id="account" name="property" onchange="accounts()">
                            <option value="1" {{ $id == 1 ? 'selected' : '' }}>Cash</option>
                            <option value="2" {{ $id == 2 ? 'selected' : '' }}>Accounts Receivable</option>
                            <option value="3" {{ $id == 3 ? 'selected' : '' }}>Accounts Payable</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>

                </div>
                <div class="table-data__tool-right">
                    <a href="" data-toggle="modal" data-target="#login-modal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add account</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                  <button href="" data-toggle="modal" data-target="#p-seller" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>


                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>account Name</th>
                            <th>Qty</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
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
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/account_delete{{ $row->account_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
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
            <!-- END DATA TABLE -->
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
                            <input type="text" class="form-control " id="account" name="account_name"  required>
                            <input type="hidden" name="account_category" value="{{$id}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Qty</label>
                            <input type="number" class="form-control " id="account" name="account_qty">
                        </div>

                        <div class="form-group">
                            <label for="username">Debit</label>
                            <input type="number" class="form-control " id="account" name="account_debit">
                        </div>
                        <div class="form-group">
                            <label for="username">Credit</label>
                            <input type="number" class="form-control " id="account" name="account_credit">
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
                            <input type="text" class="form-control " id="account" name="account_name"  required value="{{$row->account_name}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Qty</label>
                            <input type="number" class="form-control " id="account" name="account_qty" value="{{$row->account_qty}}"> 
                        </div>

                        <div class="form-group">
                            <label for="username">Debit</label>
                            <input type="number" class="form-control " id="account" name="account_debit" value="{{$row->account_debit}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Credit</label>
                            <input type="number" class="form-control " id="account" name="account_credit" value="{{$row->account_credit}}">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endforeach









<!-- <script>

$("#btn").click(function(){


        var accountName = document.getElementById("account-name").value;
        var data = { account: accountName };

        fetch("/add_account", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            // Handle response here
        })
        .catch(error => {
            console.error("Error:", error);
        });

    })
</script> -->





@endsection
<script>
    function accounts (){

        var selectedOption = $("#account").find('option:selected');

        window.location.href="/account_account="+selectedOption.val()

    }
</script>