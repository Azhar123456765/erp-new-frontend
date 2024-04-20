@extends('master')  @section('title','Product Company')  @section('content')

<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Company</h3>
            <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Product company</a>
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
                        <th>company Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @include('load.product.company')
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
                <h4>Add company</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_product_company">
                        @csrf
                        <div class="form-group">
                            <label for="username">company Name</label>
                            <input type="text" class="form-control " id="company" name="company" placeholder="company" required>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

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

        let nextPageUrl = '{{ $users->nextPageUrl() }}';

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