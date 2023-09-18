@extends('master') @section('content')

<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Zone</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                            <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                            <input class="form-control  form-control-sm ml-3 w-75" type="search" name="search" id="search" placeholder="Search" aria-label="Search" value="{{$search ?? ''}}">
                        </form>
                    </div>

                </div>
                <div class="table-data__tool-right">
                    <a href="" data-toggle="modal" data-target="#login-modal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add zone</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <button href="" data-toggle="modal" data-target="#p-zone" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>


                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Zone Name</th>
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
                            <td>{{ $row->zone_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->zone_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/zone_delete{{ $row->zone_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
                <h4>Add zone</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_zone">
                        @csrf
                        <div class="form-group">
                            <label for="username">Zone Name</label>
                            <input type="text" class="form-control " id="zone" name="zone_name" placeholder="zone" required>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




@foreach ($users as $row)


<div class="modal fade" id="edit_modal{{$row->zone_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit zone</h4>
                <div class="modal-body">
                    <form method="POST" action="/edit_zone{{$row->zone_id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Zone Name</label>
                            <input type="text" class="form-control " id="zone" name="zone_name" placeholder="zone" required value="{{$row->zone_name}}">
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


        var zoneName = document.getElementById("zone-name").value;
        var data = { zone: zoneName };

        fetch("/add_zone", {
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