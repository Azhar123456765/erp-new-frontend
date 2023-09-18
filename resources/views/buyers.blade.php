@extends('master') @section('content')
<br><br><br><br><br>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Customer table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <!-- <div class="rs-select2--light rs-select2--md">
          <select class="js-select2" name="property">
            <option selected="selected">All Properties</option>
            <option value="">Option 1</option>
            <option value="">Option 2</option>
          </select>
          <div class="dropDownSelect2"></div>
        </div> -->

                    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="">
                        <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                        <input class="form-control  form-control-sm ml-3 w-75" type="search" name="search" id="search" placeholder="Search" aria-label="Search" value="{{$search}}">
                    </form>

                </div>
                <div class="table-data__tool-right">
                    <a a href="" data-toggle="modal" data-target="#add-modal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add Customer</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <button href="" data-toggle="modal" data-target="#p-buyer" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2" id="table">
                    <thead>
                        <tr>

                            <th>S.NO</th>
                            <th>Customer name</th>
                            <th>Contact Person</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>no.records</th>
                            <th>Customer Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = ($buyer->currentPage() - 1) * $buyer->perPage() + 1;;
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
                                        <i class="zmdi zmdi-edit"></i>
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
            <br>
            <div class="container">
                {{$buyer->appends(['search' => $search])->links()}}
            </div>

            <!-- END DATA TABLE -->
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
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="username2" name="company_name" placeholder="Customer" class="form-control " required>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control ">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="company_phone_number" placeholder="Customer Phone Number" class="form-control">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="username2" name="contact_person" placeholder="contact person" class="form-control ">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control ">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">City</label>
                            <select name="city" id="" style="text-transform: capitalize;" class="form-control ">
                                @foreach($zone as $row)
                                <option value=""></option>
                                <option value="{{$row->zone_id}}">{{$row->zone_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            <label for="">Debit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="0.00">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Credit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="0.00">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Customer Address"></textarea>

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
                        <div class="form-group">
                            <label for="">Customer</label>
                            <div class="input-group">
                                <input type="text" id="username2" name="company_name" placeholder="Customer" class="form-control " value="{{$row->company_name}}" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="">Customer Email</label>
                            <div class="input-group">
                                <input type="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Customer Phone Number</label>
                            <div class="input-group">
                                <input type="text" id="email2" name="company_phone_number" class="form-control " value="{{$row->company_phone_number}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
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
                            <label for="">City</label>
                            <select name="city" id="" style="text-transform: capitalize;" class="form-control ">
                            <option value=""></option>
                                @foreach($zone as $row2)
                                <option value="{{$row2->zone_id}}" {{$row2->zone_id == $row->city ? 'selected' : ''}}>{{$row2->zone_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            <label for="">Debit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="debit" placeholder="debit" class="form-control " value="{{$row->debit}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <input type="hidden" name="user_id" value="{{$row->buyer_id}}">




                        <div class="form-group">
                            <label for="">Credit</label>
                            <div class="input-group">
                                <input type="number" id="username2" name="credit" placeholder="Credit" class="form-control " value="{{$row->credit}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Customer Address">{{$row->address}}</textarea>

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
                        <div class="form-group">
                            <label for="">Customer</label>
                            <div class="input-group">
                                <p type="text" id="username2" name="company_name" placeholder="Customer" class="form-control " value="" required>
                                    {{$row->company_name}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="">Customer Email</label>

                            <div class="input-group">
                                <p type="email" id="email2" name="company_email" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_email}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Customer Phone Number</label>
                            <div class="input-group">
                            <p type="email" id="email2" name="company_phone_number" placeholder="Customer Email" class="form-control " value="{{$row->company_email}}">
                                    {{$row->company_phone_number}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
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
                                <p type="email" id="email2" name="contact_person_number" placeholder="contact person number" class="form-control " value="{{$row->contact_person_number}}">
                                    {{$row->contact_person_number}}
                                </p>
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">City</label>
                            <select name="city" id="" style="text-transform: capitalize;" class="form-control ">
                                <option value=""></option>
                                @foreach($zone as $row2)
                                <option value="{{$row2->zone_id}}" {{$row2->zone_id == $row->city ? 'selected' : ''}}>{{$row2->zone_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
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


@endsection
<script>
    document.getElementById('generate_pdf').addEventListener('click', function() {


        var data2 = <?php echo session()->put('pdf_data', $pdf);  ?>

        window.location.href = '/pdfbuyer'
    })
</script>