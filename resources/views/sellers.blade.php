@extends('master')  @section('title', 'Supplier Table')  @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Supplier table</h3>
            <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Supplier Customer</a>
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
                        <th>S.No</th>
                        <th>Supplier name</th>
                        <th>Contact Person</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>no.records</th>
                        <th>Supplier Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @include('load.supplier')
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
                <h4>Add Supplier</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_seller_form">
                        @csrf


                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="username2" name="company_name" placeholder="Supplier" class="form-control " required>
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" validate="email" id="email2" name="company_email" placeholder="Supplier Email" class="form-control ">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="company_phone_number" placeholder="Supplier Phone number" class="form-control ">
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
                            <div class="input-group">
                                <input type="text" id="username2" name="city" placeholder="city" class="form-control ">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Seller Type</label>
                            <select name="seller_type" id="" style="text-transform: capitalize;" class="form-control ">
                                <option value="supplier">supplier</option>
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
                                <textarea name="address" id="" cols="30" rows="10" style="border: 0.5px solid lightgray; width: 100%; padding:3px 3px 3px 3px" placeholder="Supplier Address"></textarea>

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

        let nextPageUrl = '{{ $seller->nextPageUrl() }}';

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

@endsection