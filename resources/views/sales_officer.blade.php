@extends('layout.app') @section('title', 'Sales Officer Table') @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales Officer table</h3>
                <a href="" data-bs-toggle="modal" data-bs-target="#add-modal" class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Sales Officer</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Sales Officer Name</th>
                        <th>phone number</th>
                        <th>Email Address</th>
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
                            <td>{{ $row->sales_officer_name }}</td>
                            <td>{{ $row->phone_number }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#edit_modal{{ $row->sales_officer_id }}" class="item"
                                        data-bs-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{-- <a href="/sales_officer_delete{{ $row->sales_officer_id }}" class="item"
                                        data-bs-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}
                                    <!-- <a href="/del_user/{{ $row->user_id }}" class="item" data-bs-toggle="tooltip" data-placement="top" title="Delete User">
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
                <div class="modal-header">
                    <h4>Add Sales Officer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add_sales_officer" class="needs-validation"
                    novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="username">Sales Officer Name</label>
                            <input type="text" class="form-control " name="sales_officer_name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Phone Number</label>
                            <input type="text" class="form-control " name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" validate="email" class="form-control " name="email">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




@foreach ($users as $row)
    <div class="modal fade" id="edit_modal{{ $row->sales_officer_id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <h4>Add Sales Officer</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/edit_sales_officer{{ $row->sales_officer_id }}" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="username">Sales Officer Name</label>
                                <input type="text" class="form-control " name="sales_officer_name" required
                                    value="{{ $row->sales_officer_name }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Phone Number</label>
                                <input type="text" class="form-control " name="phone_number"
                                    value="{{ $row->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" validate="email" class="form-control " name="email"
                                    value="{{ $row->email }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endforeach

@endsection
