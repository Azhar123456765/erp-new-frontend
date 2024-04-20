@extends('master') @section('title', 'Customers') @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer table</h3>
            <a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Customer</a>
        </div>
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-md-5">
                <input type="text" class="form-control w-100" id="searchData" placeholder="Search">
            </div>
            <div class="col-md-5">
                <button class="btn btn-primary w-75" id="searchBtn">Search</button>
            </div>
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
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    @include('load.buyer')
                </tbody>

            </table>
        </div>
    </div>
</div>


</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("This field cannot be left blank");
                }
            };
            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    })
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script>
    $(function () { $("input,textarea,select").not("[type=submit]").jqbootstrapValidation(); });
    $("#searchBtn").on('click', function () {
        
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        
        var searchQuery = $('#searchData').val();
        $.ajax({
            url: window.location.href,
            type: 'get',
            data: { "search": searchQuery },
            beforeSend: function () {
            },
            success: function (data) {
                $('tbody tr').hide();
                $('tbody').append(data.view);
            }
        });
    })

    $(document).ready(function () {

        let nextPageUrl = '{{ $buyer->nextPageUrl() }}';

        var prevScrollPos = $(window).scrollTop();

        $(window).scroll(function () {
            var currentScrollPos = $(window).scrollTop();
            var searchQuery = $('#searchData').val();

            if (currentScrollPos > prevScrollPos && // Check for scrolling down
                $(window).scrollTop() + $(window).height() >= $(document).height()) {
                if (nextPageUrl) {
                    loadMorePosts();
                }
            }

            prevScrollPos = currentScrollPos;
        });


        function loadMorePosts() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: nextPageUrl,
                type: 'get',
                data: { "serial": serial },
                beforeSend: function () {
                    nextPageUrl = ''
                },
                success: function (data) {
                    if ($('#searchData').val() == '') {
                        nextPageUrl = data.nextPageUrl;
                        $('tbody').append(data.view);
                    }
                }
            })
        }
    });

</script>
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
                                    <input type="text" id="username2" name="company_name" placeholder="Customer"
                                        class="form-control" oninvalid="this.setCustomValidity('Enter User Name Here')"
                                        required data-validation-required-message="Please enter your organization name">
                                    <p class="help-block"></p>

                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="email" validate="email" id="email2" name="company_email"
                                        placeholder="Customer Email" class="form-control">
                                    <div class="input-group-addon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" name="company_phone_number" placeholder="Customer Phone Number"
                                        class="form-control">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" id="username2" name="contact_person" placeholder="contact person"
                                        class="form-control">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col col">
                                <div class="input-group">
                                    <input type="text" id="email2" name="contact_person_number"
                                        placeholder="contact person number" class="form-control">
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
                                <select name="buyer_type" id="" style="text-transform: capitalize;"
                                    class="form-control ">
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
                                    <input type="number" id="username2" name="debit" placeholder="debit"
                                        class="form-control " value="0.00">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="">Credit</label>
                                <div class="input-group">
                                    <input type="number" id="username2" name="credit" placeholder="Credit"
                                        class="form-control " value="0.00">
                                    <div class="input-group-addon">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea name="address" cols="30" rows="20"
                                    style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px"
                                    placeholder="Customer Address"></textarea>
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

@endsection