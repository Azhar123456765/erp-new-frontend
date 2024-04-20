@php
$serial = $serial ?? 1
                    @endphp
                    @foreach ($seller as $row)
                    <tr class="tr-shadow table">
                        <td>{{$serial}}</td>
                        <td><a href="" data-toggle="modal" data-target="#view_modal{{$row->seller_id}}"><span class="block-email">{{$row->company_name}}</span></a></td>
                        <td><span>{{$row->contact_person ?? 'NULL'}}</span></td>
                        <td><span class="status--process">{{$row->debit}}</span></td>
                        <td><span class="status--process" style="color: red;">{{$row->credit}}</span></td>
                        <td class="">{{$row->total_records}}</td>
                        <td>{{$row->seller_type}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="" data-toggle="modal" data-target="#edit_modal{{$row->seller_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" data-toggle="modal" data-target="#view_modal{{$row->seller_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                    <i class="fa fa-light fa-eye"></i>
                                </a>
                            </div>
                        </td>
                        <td>
<div class="modal fade" id="edit_modal{{$row->seller_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit Supplier</h4>
                <div class="modal-body">
                    <form action="edit_seller_form" method="post">


                        @csrf
                        <div class="form-group">
                            <label for="">Supplier</label>
                            <div class="input-group">

                                <input type="text" id="username2" name="company_name" placeholder="Supplier" class="form-control " value="{{$row->company_name}}" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="">Supplier Email</label>
                            <div class="input-group">
                                <input type="email" validate="email" id="email2" name="company_email" placeholder="Supplier Email" class="form-control " value="{{$row->company_email}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Supplier Phone number</label>
                            <div class="input-group">
                                <input type="text" name="company_phone_number" placeholder="Supplier Phone number" class="form-control" value="{{$row->company_phone_number}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">contact person</label>

                            <div class="input-group">
                                <input type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control " value="{{$row->contact_person}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">contact person number</label>
                            <div class="input-group">
                                <input type="text" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control " value="{{$row->contact_person_number}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">city</label>
                            <div class="input-group">
                                <input type="text" id="username2" name="city" placeholder="city" class="form-control " value="{{$row->city}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Seller Type</label>
                            <select name="seller_type" id="" style="text-transform: capitalize;" class="form-control " value="{{$row->company_name}}">
                                <option <?php        if ($row->seller_type == 'supplier') {
            echo "selected";
        }  ?> value="supplier">supplier</option>
                                <option <?php        if ($row->seller_type == 'medical') {
            echo "selected";
        }  ?> value="medical">medical</option>
                                <option <?php        if ($row->seller_type == 'layer farm') {
            echo "selected";
        }  ?> value="layer farm">layer farm</option>
                                <option <?php        if ($row->seller_type == 'control') {
            echo "selected";
        }  ?> value="control">control</option>
                                <option <?php        if ($row->seller_type == 'farmer') {
            echo "selected";
        }  ?> value="farmer">farmer</option>
                                <option <?php        if ($row->seller_type == 'doctor') {
            echo "selected";
        }  ?> value="doctor">doctor</option>
                                <option <?php        if ($row->seller_type == 'vaccinator') {
            echo "selected";
        }  ?> value="vaccinator">vaccinator</option>
                                <option <?php        if ($row->seller_type == 'customer') {
            echo "selected";
        }  ?> value="customer">customer</option>
                                <option <?php        if ($row->seller_type == 'corporate') {
            echo "selected";
        }  ?> value="corporate">corporate</option>
                                <option <?php        if ($row->seller_type == 'institution') {
            echo "selected";
        }  ?> value="institution">institution</option>

                            </select>


                        </div>

                        <div class="form-group">
                            <label for="">Debit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="{{$row->debit}}" value="0.00">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <input type="hidden" name="user_id" value="{{$row->seller_id}}">




                        <div class="form-group">
                            <label for="">Credit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="{{$row->credit}}" value="0.00">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Supplier Address">{{$row->address}}</textarea>

                            </div>
                        </div>






                        @error('company_name')

                        <div class="alert alert-danger" role="alert">
                            {{$message}}



                        </div>
                        @enderror

                        @error('company_email')

                        <div class="alert alert-danger" role="alert">
                            {{$message}}



                        </div>
                        @enderror


                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="view_modal{{$row->seller_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>View Supplier</h4>
                <div class="modal-body">
                    <form action="edit_seller_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Supplier</label>
                            <div class="input-group">
                                <p type="text" id="username2" name="company_name" placeholder="Supplier" class="form-control " value="" required>
                                    {{$row->company_name}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="">Supplier Email</label>

                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="company_email" placeholder="Supplier Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_email}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier Phone number</label>
                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="company_email" placeholder="Supplier Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_phone_number}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">contact person</label>

                            <div class="input-group">
                                <p type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control " value="{{$row->contact_person}}">
                                    {{$row->contact_person}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">contact person number</label>

                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control " value="{{$row->contact_person_number}}">
                                    {{$row->contact_person_number}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">City</label>

                            <div class="input-group">
                                <p type="text" id="username2" name="city" placeholder="city" class="form-control " value="{{$row->city}}">
                                    {{$row->city}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Seller Type</label>
                            <select name="seller_type" id="" style="text-transform: capitalize;" class="form-control " value="{{$row->company_name}}">
                                <option <?php        if ($row->seller_type == 'supplier') {
            echo "selected";
        }  ?> value="supplier">supplier</option>
                                <option <?php        if ($row->seller_type == 'medical') {
            echo "selected";
        }  ?> value="medical">medical</option>
                                <option <?php        if ($row->seller_type == 'layer farm') {
            echo "selected";
        }  ?> value="layer farm">layer farm</option>
                                <option <?php        if ($row->seller_type == 'control') {
            echo "selected";
        }  ?> value="control">control</option>
                                <option <?php        if ($row->seller_type == 'farmer') {
            echo "selected";
        }  ?> value="farmer">farmer</option>
                                <option <?php        if ($row->seller_type == 'doctor') {
            echo "selected";
        }  ?> value="doctor">doctor</option>
                                <option <?php        if ($row->seller_type == 'vaccinator') {
            echo "selected";
        }  ?> value="vaccinator">vaccinator</option>
                                <option <?php        if ($row->seller_type == 'customer') {
            echo "selected";
        }  ?> value="customer">customer</option>
                                <option <?php        if ($row->seller_type == 'corporate') {
            echo "selected";
        }  ?> value="corporate">corporate</option>
                                <option <?php        if ($row->seller_type == 'institution') {
            echo "selected";
        }  ?> value="institution">institution</option>
                            </select>


                        </div>

                        <div class="form-group">
                            <label for="">Debit</label>
                            <div class="input-group">
                                <p type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="{{$row->debit}}" value="0.00">
                                    {{$row->debit}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>







                        <div class="form-group">
                            <label for="">Credit</label>
                            <div class="input-group">
                                <p type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="0.00">
                                    {{$row->credit}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea readonly name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Supplier Address">{{$row->address}}</textarea>

                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
                        </td>
                    </tr>
                    @php
    $serial++;
                    @endphp
                    @endforeach

                    <script>
var serial = {{$serial}}
</script>