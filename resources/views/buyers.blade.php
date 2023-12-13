@extends('master')  @section('title','Customers')  @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer table</h3>
            <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Customer</a>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>S.NO</th>
                        <th>Customer name</th>
                        <th>Contact Person</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>no.records</th>
                        <th>Customer Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1
                    @endphp
                    @foreach ($buyer as $row )


                    <tr class="tr-shadow" id="table">

                        <td>{{$serial}}</td>
                        <td id=""> <a href="" data-toggle="modal" data-target="#view_modal{{$row->buyer_id}}"> <span id="company_name" class="block-email">{{$row->company_name}}</span></a></td>
                        <td id="">
                            <span id="contact_person">{{$row->contact_person}}</span>
                        </td>


                        <td id=""><span id="debit" class="status--process">{{$row->debit}}</span></td>

                        <td id="">
                            <span id="credit" class="status--process" style="color: red;">{{$row->credit}}</span>
                        </td>
                        <td id="total_records">{{$row->total_records}}</td>
                        <td id="buyer_type">{{$row->buyer_type}}</td>

                        <td id="">
                            <div class="table-data-feature">

                                <a href="" data-toggle="modal" data-target="#edit_modal{{$row->buyer_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" data-toggle="modal" data-target="#view_modal{{$row->buyer_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                    <i class="fa fa-light fa-eye"></i>
                                </a>

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
                <h4>Add Customer</h4>
                <div class="modal-body">
                    <form action="add_buyer_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" id="username2" name="company_name" placeholder="Customer" class="form-control" oninvalid="this.setCustomValidity('Enter User Name Here')" required data-validation-required-message="Please enter your organization name">
            <p class="help-block"></p>
                                    
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="email" validate="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control ">
                                    <div class="input-group-addon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" name="company_phone_number" placeholder="Customer Phone Number" class="form-control">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control ">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control">
                                    <div class="input-group-addon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">City</label>
                                <select name="city" id="" style="text-transform: capitalize;" class="form-control">
                                    <option value=""></option>
                                    @foreach($zone as $row)
                                    <option value="{{$row->zone_id}}">{{$row->zone_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="">buyer Type</label>
                                <select name="buyer_type" id="" style="text-transform: capitalize;" class="form-control ">
                                    <option value="Customer">Customer</option>
                                    <option value="medical">medical</option>
                                    <option value="layer farm">layer farm</option>
                                    <option value="control">control</option>
                                    <option value="farmer">farmer</option>
                                    <option value="doctor">doctor</option>
                                    <option value="vaccinator">vaccinator</option>
                                    <option value="customer">customer</option>
                                    <option value="corporate">corporate</option>
                                    <option value="institution">institution</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Debit</label>
                                <div class="input-group">
                                    <input type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="0.00">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="">Credit</label>
                                <div class="input-group">
                                    <input type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="0.00">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address"  cols="30" rows="20" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Customer Address"></textarea>
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




                        <div class="form-actions form-group col">
                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@foreach ($buyer as $row)
<div class="modal fade" id="edit_modal{{$row->buyer_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit Customer</h4>
                <div class="modal-body">
                    <form action="edit_buyer_form" method="post">

                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Customer</label>
                                <div class="input-group">
                                    <input type="text" id="username2" name="company_name" placeholder="Customer" class="form-control " value="{{$row->company_name}}" required>
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>



                            <div class="form-group col">
                                <label for="">Customer Email</label>
                                <div class="input-group">
                                    <input type="email" validate="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Customer Phone Number</label>
                                <div class="input-group">
                                    <input type="text" id="email2" name="company_phone_number" class="form-control " value="{{$row->company_phone_number}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="">contact person</label>
                                <div class="input-group">
                                    <input type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control " value="{{$row->contact_person}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">contact person number</label>
                                <div class="input-group">
                                    <input type="text" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control " value="{{$row->contact_person_number}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">City</label>
                                <select name="city" id="" style="text-transform: capitalize;" class="form-control ">
                                    <option value=""></option>
                                    @foreach($zone as $row2)
                                    <option value="{{$row2->zone_id}}" {{$row2->zone_id == $row->city ? 'selected' : ''}}>{{$row2->zone_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="">buyer Type</label>
                                <select name="buyer_type" id="" style="text-transform: capitalize;" class="form-control " value="{{$row->company_name}}">
                                    <option <?php if ($row->buyer_type == 'Customer') {
                                                echo "selected";
                                            }  ?> value="Customer">Customer</option>
                                    <option <?php if ($row->buyer_type == 'medical') {
                                                echo "selected";
                                            }  ?> value="medical">medical</option>
                                    <option <?php if ($row->buyer_type == 'layer farm') {
                                                echo "selected";
                                            }  ?> value="layer farm">layer farm</option>
                                    <option <?php if ($row->buyer_type == 'control') {
                                                echo "selected";
                                            }  ?> value="control">control</option>
                                    <option <?php if ($row->buyer_type == 'farmer') {
                                                echo "selected";
                                            }  ?> value="farmer">farmer</option>
                                    <option <?php if ($row->buyer_type == 'doctor') {
                                                echo "selected";
                                            }  ?> value="doctor">doctor</option>
                                    <option <?php if ($row->buyer_type == 'vaccinator') {
                                                echo "selected";
                                            }  ?> value="vaccinator">vaccinator</option>
                                    <option <?php if ($row->buyer_type == 'customer') {
                                                echo "selected";
                                            }  ?> value="customer">customer</option>
                                    <option <?php if ($row->buyer_type == 'corporate') {
                                                echo "selected";
                                            }  ?> value="corporate">corporate</option>
                                    <option <?php if ($row->buyer_type == 'institution') {
                                                echo "selected";
                                            }  ?> value="institution">institution</option>

                                </select>


                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Debit</label>
                                <div class="input-group">
                                    <input type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="{{$row->debit}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{$row->buyer_id}}">
                            <div class="form-group col">
                                <label for="">Credit</label>
                                <div class="input-group">
                                    <input type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="{{$row->credit}}">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address" class="form-control" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Customer Address">{{$row->address}}</textarea>

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



                        <div class="form-actions form-group col">
                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endforeach


@foreach ($buyer as $row)
<div class="modal fade" id="view_modal{{$row->buyer_id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>View Customer</h4>
                <div class="modal-body">
                    <form action="edit_buyer_form" method="post">


                        @csrf
                        <div class="form-group col">
                            <label for="">Customer</label>
                            <div class="input-group">
                                <p type="text" id="username2" name="company_name" placeholder="Customer" class="form-control " value="" required>
                                    {{$row->company_name}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>



                        <div class="form-group col">
                            <label for="">Customer Email</label>

                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_email}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="">Customer Phone Number</label>
                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="company_phone_number" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_phone_number}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="">contact person</label>

                            <div class="input-group">
                                <p type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control " value="{{$row->contact_person}}">
                                    {{$row->contact_person}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="">contact person number</label>

                            <div class="input-group">
                                <p type="email" validate="email" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control " value="{{$row->contact_person_number}}">
                                    {{$row->contact_person_number}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>


                        <div class="form-group col">
                            <label for="">City</label>
                            <select name="city" id="" style="text-transform: capitalize;" class="form-control ">
                                <option value=""></option>
                                @foreach($zone as $row2)
                                <option value="{{$row2->zone_id}}" {{$row2->zone_id == $row->city ? 'selected' : ''}}>{{$row2->zone_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="">buyer Type</label>
                            <select name="buyer_type" id="" style="text-transform: capitalize;" class="form-control " value="{{$row->company_name}}">
                                <option <?php if ($row->buyer_type == 'Customer') {
                                            echo "selected";
                                        }  ?> value="Customer">Customer</option>
                                <option <?php if ($row->buyer_type == 'medical') {
                                            echo "selected";
                                        }  ?> value="medical">medical</option>
                                <option <?php if ($row->buyer_type == 'layer farm') {
                                            echo "selected";
                                        }  ?> value="layer farm">layer farm</option>
                                <option <?php if ($row->buyer_type == 'control') {
                                            echo "selected";
                                        }  ?> value="control">control</option>
                                <option <?php if ($row->buyer_type == 'farmer') {
                                            echo "selected";
                                        }  ?> value="farmer">farmer</option>
                                <option <?php if ($row->buyer_type == 'doctor') {
                                            echo "selected";
                                        }  ?> value="doctor">doctor</option>
                                <option <?php if ($row->buyer_type == 'vaccinator') {
                                            echo "selected";
                                        }  ?> value="vaccinator">vaccinator</option>
                                <option <?php if ($row->buyer_type == 'customer') {
                                            echo "selected";
                                        }  ?> value="customer">customer</option>
                                <option <?php if ($row->buyer_type == 'corporate') {
                                            echo "selected";
                                        }  ?> value="corporate">corporate</option>
                                <option <?php if ($row->buyer_type == 'institution') {
                                            echo "selected";
                                        }  ?> value="institution">institution</option>
                            </select>


                        </div>

                        <div class="form-group col">
                            <label for="">Debit</label>
                            <div class="input-group">
                                <p type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="{{$row->debit}}" value="0.00">
                                    {{$row->debit}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>







                        <div class="form-group col">
                            <label for="">Credit</label>
                            <div class="input-group">
                                <p type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="0.00">
                                    {{$row->credit}}
                                </p>
                                <div class="input-group-addon">

                                </div>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea readonly name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Customer Address">{{$row->address}}</textarea>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endforeach
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function(e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("This field cannot be left blank");
                }
            };
            elements[i].oninput = function(e) {
                e.target.setCustomValidity("");
            };
        }
    })
</script>
<script>
      $(function(){ $("input,textarea,select").not("[type=submit]").jqbootstrapValidation(); });

    </script>+
@endsection