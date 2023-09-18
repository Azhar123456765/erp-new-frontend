@extends('master') @section('content')

<br><br><br><br><br>
<style>
    @media (max-width: 755px) {
        .modal-dialog {

            margin-right: 1% !important;
        }

        .modal-content {
            width: 100% !important;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Product Table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">All Properties</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Today</option>
                            <option value="">3 Days</option>
                            <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="table-data__tool-right">
                    <a href="" data-toggle="modal" data-target="#login-modal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add product</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <button href="" data-toggle="modal" data-target="#p-seller" class="btn btn-primary" role="button" style="background-color: #666;border:1px solid gray; outline:1px solid gray;">Export</button>


                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>product Name</th>
                            <th>product company</th>
                            <th>product type</th>
                            <th>product category</th>
                            <th>purchase Price</th>
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
                            <td>{{ $row->product_name }}</td>
                            <td>{{ $row->company_name }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->purchase_price }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->product_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/product_delete{{ $row->product_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#view_modal{{$row->product_id}}" class="item" data-toggle="tooltip" data-placement="top" title="View">
                                        <i class="fa fa-eye"></i>
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
            <br>
            <div class="container">
                {{$users->links()}}
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>



<div class="modal fade" id="login-modal">
    <div class="modal-dialog" style="margin-right: 42%;">
        <div class="modal-content" style="width: 150%; ">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Add product</h4>
                <div class="container">
                    <div class="card-body card-block">
                        <form action="add_product_form" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- SQL Fields -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control " required>
                                    </div>
                                    <div class="col">
                                        <input type="text" id="desc" name="desc" placeholder="Description" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="company">Product Company</label>
                                        <select name="company" id="company" class="form-control select">
                                            @foreach ($company as $row)

                                            <option value="{{$row->product_company_id}}">{{$row->company_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control ">
                                            @foreach ($type as $row2)

                                            <option value="{{$row2->product_type_id}}">{{$row2->type}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="category">Product category</label>
                                        <select name="category" id="category" class="form-control ">
                                            @foreach ($category as $row3)

                                            <option value="{{$row3->product_category_id}}">{{$row3->category_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="purchase_price">Purchase Price</label>
                                        <input type="number" id="purchase_price" name="purchase_price" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="number" id="sale_price" name="sale_price" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="opening_pur_price">Opening Purchase Price</label>
                                        <input type="number" id="opening_pur_price" name="opening_pur_price" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="opening_quantity">Opening Quantity</label>
                                        <input type="number" id="opening_quantity" name="opening_quantity" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="avg_pur_price">Average Purchase Price</label>
                                        <input type="number" id="avg_pur_price" name="avg_pur_price" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="overhead_exp">Overhead Expense</label>
                                        <input type="number" id="overhead_exp" name="overhead_exp" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="overhead_price_pur">Overhead Price Purchase</label>
                                        <input type="number" id="overhead_price_pur" name="overhead_price_pur" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="overhead_price_avg">Overhead Price Average</label>
                                        <input type="number" id="overhead_price_avg" name="overhead_price_avg" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="pur_price_plus_oh">Purchase Price + Overhead</label>
                                        <input type="number" id="pur_price_plus_oh" name="pur_price_plus_oh" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="avg_price_plus_oh">Average Price + Overhead</label>
                                        <input type="number" id="avg_price_plus_oh" name="avg_price_plus_oh" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="inactive_item">Inactive Item</label>
                                        <input type="text" id="inactive_item" name="inactive_item" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" id="barcode" name="barcode" class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="unit">Unit</label>
                                        <input type="text" style="text-align:center !important;" id="unit" name="unit" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="re_order_level">Re-order Level</label>
                                        <input style="width: 49%;" type="text" id="re_order_level" name="re_order_level" class="form-control ">
                                    </div>
                                    <div class="col">
                                        <label for="image">Product Image</label>
                                        <input style="width: 49%;" type="file" id="image" name="image" class="form-control ">
                                        <input type="hidden" name="old_image">
                                    </div>
                                </div>
                            </div>

                            <!-- End of SQL Fields -->

                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




@foreach ($users as $row)


<div class="modal fade" id="edit_modal{{$row->product_id}}">
    <div class="modal-dialog" style="margin-right: 42%;">
        <div class="modal-content" style="width: 150%; ">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit product</h4>
                <div class="modal-body">
                    <div class="container">
                        <style>
                            .card-body label {
                                width: 222px;
                            }
                        </style>
                        <div class="card-body card-block">
                            <form action="edit_product{{$row->product_id}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- SQL Fields -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" id="product_name" name="product_name" class="form-control " value="{{ $row->product_name ?? '' }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="desc">Description</label>
                                            <input type="text" id="desc" name="desc" class="form-control " value="{{ $row->desc ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="company">Product Company</label>
                                            <select name="company" id="company" class="form-control ">
                                                @foreach ($company as $companyRow)
                                                <option value="{{ $companyRow->product_company_id }}" {{ ($companyRow->product_company_id == $row->product_company_id) ? 'selected' : '' }}>{{ $companyRow->company_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="type">Type</label>
                                            <select name="type" id="type" class="form-control ">
                                                @foreach ($type as $typeRow)
                                                <option value="{{ $typeRow->product_type_id }}" {{ ($row->product_type_id == $typeRow->product_type_id) ? 'selected' : '' }}>{{ $typeRow->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="category">Product Category</label>
                                            <select name="category" id="category" class="form-control ">
                                                @foreach ($category as $categoryRow)
                                                <option value="{{ $categoryRow->product_category_id }}" {{ ($row->product_category_id == $categoryRow->product_category_id) ? 'selected' : '' }}>{{ $categoryRow->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="purchase_price">Purchase Price</label>
                                            <input type="number" id="purchase_price" name="purchase_price" class="form-control " value="{{ $row->purchase_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" id="sale_price" name="sale_price" class="form-control " value="{{ $row->product_sale_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="opening_pur_price">Opening Purchase Price</label>
                                            <input type="number" id="opening_pur_price" name="opening_pur_price" class="form-control " value="{{ $row->opening_pur_price ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="opening_quantity">Opening Quantity</label>
                                            <input type="number" id="opening_quantity" name="opening_quantity" class="form-control " value="{{ $row->opening_quantity ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="avg_pur_price">Average Purchase Price</label>
                                            <input type="number" id="avg_pur_price" name="avg_pur_price" class="form-control " value="{{ $row->avg_pur_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="overhead_exp">Overhead Expense</label>
                                            <input type="number" id="overhead_exp" name="overhead_exp" class="form-control " value="{{ $row->overhead_exp ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="overhead_price_pur">Overhead Price Purchase</label>
                                            <input type="number" id="overhead_price_pur" name="overhead_price_pur" class="form-control " value="{{ $row->overhead_price_pur ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="overhead_price_avg">Overhead Price Average</label>
                                            <input type="number" id="overhead_price_avg" name="overhead_price_avg" class="form-control " value="{{ $row->overhead_price_avg ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="pur_price_plus_oh">Purchase Price + Overhead</label>
                                            <input type="number" id="pur_price_plus_oh" name="pur_price_plus_oh" class="form-control " value="{{ $row->pur_price_plus_oh ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="avg_price_plus_oh">Average Price + Overhead</label>
                                            <input type="number" id="avg_price_plus_oh" name="avg_price_plus_oh" class="form-control " value="{{ $row->avg_price_plus_oh ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="inactive_item">Inactive Item</label>
                                            <input type="text" id="inactive_item" name="inactive_item" class="form-control " value="{{ $row->inactive_item ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" id="barcode" name="barcode" class="form-control " value="{{ $row->barcode ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="unit">Unit</label>
                                            <input type="text" style="text-align:center !important;" id="unit" name="unit" class="form-control " value="{{ $row->unit ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="re_order_level">Re-order Level</label>
                                            <input style="width: 49%;" type="text" id="re_order_level" name="re_order_level" class="form-control " value="{{ $row->re_order_level ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="image">Product Image</label>
                                            <input style="width: 49%;" type="file" id="image" name="image" class="form-control ">
                                            <input type="hidden" name="old_image" value="{{$row->image}}">
                                        </div>
                                    </div>
                                </div>
                                <img src="{{$row->image}}" alt="No image" width="75%" height="75%">

                                <!-- End of SQL Fields -->

                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endforeach








@foreach ($users as $row)


<div class="modal fade" id="view_modal{{$row->product_id}}">
    <div class="modal-dialog" style="margin-right: 42%;">
        <div class="modal-content" style="width: 150%; ">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>View product</h4>
                <div class="modal-body">
                    <div class="container">
                        <style>
                            .card-body label {
                                width: 222px;
                            }
                        </style>
                        <div class="card-body card-block">
                            <div>
                                @csrf

                                <!-- SQL Fields -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="product_name">Product Name</label>
                                            <input readonly type="text" id="product_name" name="product_name" class="form-control " value="{{ $row->product_name ?? '' }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="desc">Description</label>
                                            <input readonly type="text" id="desc" name="desc" class="form-control " value="{{ $row->desc ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="company">Product Company</label>
                                            <input readonly type="text" id="" name="" class="form-control " value="{{ $row->company_name ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="type">Type</label>
                                            <input readonly type="text" id="" name="" class="form-control " value="{{ $row->type ?? '' }}">

                                        </div>
                                        <div class="col">
                                            <label for="category">Product Category</label>
                                            <input readonly type="text" id="" name="" class="form-control " value="{{ $row->category_name ?? '' }}">

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="purchase_price">Purchase Price</label>
                                            <input readonly type="number" id="purchase_price" name="purchase_price" class="form-control " value="{{ $row->purchase_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="sale_price">Sale Price</label>
                                            <input readonly type="number" id="sale_price" name="sale_price" class="form-control " value="{{ $row->product_sale_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="opening_pur_price">Opening Purchase Price</label>
                                            <input readonly type="number" id="opening_pur_price" name="opening_pur_price" class="form-control " value="{{ $row->opening_pur_price ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="opening_quantity">Opening Quantity</label>
                                            <input readonly type="number" id="opening_quantity" name="opening_quantity" class="form-control " value="{{ $row->opening_quantity ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="avg_pur_price">Average Purchase Price</label>
                                            <input readonly type="number" id="avg_pur_price" name="avg_pur_price" class="form-control " value="{{ $row->avg_pur_price ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="overhead_exp">Overhead Expense</label>
                                            <input readonly type="number" id="overhead_exp" name="overhead_exp" class="form-control " value="{{ $row->overhead_exp ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="overhead_price_pur">Overhead Price Purchase</label>
                                            <input readonly type="number" id="overhead_price_pur" name="overhead_price_pur" class="form-control " value="{{ $row->overhead_price_pur ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="overhead_price_avg">Overhead Price Average</label>
                                            <input readonly type="number" id="overhead_price_avg" name="overhead_price_avg" class="form-control " value="{{ $row->overhead_price_avg ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="pur_price_plus_oh">Purchase Price + Overhead</label>
                                            <input readonly type="number" id="pur_price_plus_oh" name="pur_price_plus_oh" class="form-control " value="{{ $row->pur_price_plus_oh ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="avg_price_plus_oh">Average Price + Overhead</label>
                                            <input readonly type="number" id="avg_price_plus_oh" name="avg_price_plus_oh" class="form-control " value="{{ $row->avg_price_plus_oh ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="inactive_item">Inactive Item</label>
                                            <input readonly type="text" id="inactive_item" name="inactive_item" class="form-control " value="{{ $row->inactive_item ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="barcode">Barcode</label>
                                            <input readonly type="text" id="barcode" name="barcode" class="form-control " value="{{ $row->barcode ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="unit">Unit</label>
                                            <input readonly type="text" style="text-align:center !important;" readonly id="unit" name="unit" class="form-control " value="{{ $row->unit ?? '' }}">
                                        </div>
                                        <div class="col">
                                            <label for="re_order_level">Re-order Level</label>
                                            <input readonly style="width: 49%;" type="text" id="re_order_level" name="re_order_level" class="form-control " value="{{ $row->re_order_level ?? '' }}">
                                        </div>

                                    </div>
                                </div>
                                <img src="{{$row->image}}" alt="image" width="75%" height="75%">
                                <!-- End of SQL Fields -->


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endforeach




<!-- <script>

$("#btn").click(function(){


        var productName = document.getElementById("product-name").value;
        var data = { product: productName };

        fetch("/add_product_product", {
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