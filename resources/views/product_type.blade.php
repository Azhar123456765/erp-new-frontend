@extends('master') @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product type Table</h3>
            <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Product type</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>S.NO</th>
                        <th>type Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1
                    @endphp
                    @foreach ($users as $row)
                    <tr class="tr-shadow">
                        <td>{{ $serial }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->product_type_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/product_type_delete{{ $row->product_type_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
    </div>
</div>


</div>



<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Add type</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_product_type">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control " id="type" name="type" placeholder="type" required>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




@foreach ($users as $row)


<div class="modal fade" id="edit_modal{{$row->product_type_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/edit_product_type{{$row->product_type_id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control " id="type" name="type" placeholder="type" required value="{{$row->type}}">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endforeach

@endsection