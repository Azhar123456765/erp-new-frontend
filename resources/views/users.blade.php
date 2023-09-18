@extends('master') @section('content')

<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">User table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                        <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                        <input class="form-control  form-control-sm ml-3 w-75" type="search" name="search" id="search" placeholder="Search" aria-label="Search" value="{{$search ?? ''}}">
                    </form>
                    

                </div>
                <div class="table-data__tool-right">
                    <a href="/add-user" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add user</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <button href="" data-toggle="modal" data-target="#p-user" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>name</th>
                            <th>role</th>
                            <th>Access</th>
                            <th>no.records</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = ($users->currentPage() - 1) * $users->perPage() + 1;;
                        @endphp
                        @foreach ($users as $row )


                        <tr class="tr-shadow">
                            <td>
                                {{$serial}}
                            </td>
                            <td>{{$row->username}}</td>
                            <td>
                                <span class="status--process">{{$row->role}}</span>
                            </td>
                            @if ($row->access != 'access')
                            <td>
                                <span class="badge badge-danger">{{$row->access}}</span>
                            </td>

                            @else
                            <td>
                                <span class="badge badge-success">{{$row->access}}</span>
                            </td>
                            @endif

                            <td><a href="/user-records-{{$row->user_id}}"><span class="block-email">{{$row->no_records}}</span></a></td>
                            <td>{{$row->created_at}}</td>

                            <td>
                                <div class="table-data-feature">

                                    <a href="/edit-user-{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/user-rights-{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage rights">
                                        <i class="fa fa-universal-access"></i>
                                    </a>

                                    <!-- <a href="/del_user{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User">
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
            <div class="container">
                {{$users->appends(['search' => $search])->links()}}
            </div>

            <!-- END DATA TABLE -->
        </div>
    </div>
</div>
@endsection