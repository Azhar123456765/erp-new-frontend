@php
$serial = $serial ?? 1
                    @endphp
                    @foreach ($users as $row)
                        <tr class="tr-shadow">
                            <td>{{ $serial }}</td>
                            <td>{{ $row->company_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->product_company_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="/product_company_delete{{ $row->product_company_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <!-- <a href="/del_user/{{ $row->user_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete User">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                </div>
                            </td>
                            <td>
                                


<div class="modal fade" id="edit_modal{{$row->product_company_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit company</h4>
                <div class="modal-body">
                    <form method="POST" action="/edit_product_company{{$row->product_company_id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">company Name</label>
                            <input type="text" class="form-control " id="company" name="company" placeholder="company" required value="{{$row->company_name}}">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
                            </td>
                        </tr>
                        <!-- <tr class="spacer"></tr> -->
                        @php
    $serial++;
                        @endphp
                        @endforeach
                        
<script>
var serial = {{$serial}}
</script>