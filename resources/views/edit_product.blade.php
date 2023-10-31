@extends('master')  @section('title','Panel')  @section('content')

<br>
<h3 style="text-align: center;">Product Management</h3>

<br><br>
<div class="container">
    <div class="card-body card-block">
        <form action="add_user_form" method="post">
            @csrf

            <!-- SQL Fields -->
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="desc">Description</label>
                        <input type="text" id="desc" name="desc" placeholder="Description" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="product_company">Product Company</label>
                        <input type="text" id="product_company" name="product_company" placeholder="Product Company" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="product_type">Product Type</label>
                        <input type="text" id="product_type" name="product_type" placeholder="Product Type" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" placeholder="Category" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="purchase_price">Purchase Price</label>
                        <input type="text" id="purchase_price" name="purchase_price" placeholder="Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" id="sale_price" name="sale_price" placeholder="Sale Price" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="opening_pur_price">Opening Purchase Price</label>
                        <input type="text" id="opening_pur_price" name="opening_pur_price" placeholder="Opening Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="opening_quantity">Opening Quantity</label>
                        <input type="text" id="opening_quantity" name="opening_quantity" placeholder="Opening Quantity" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="avg_pur_price">Average Purchase Price</label>
                        <input type="text" id="avg_pur_price" name="avg_pur_price" placeholder="Average Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="overhead_exp">Overhead Expense</label>
                        <input type="text" id="overhead_exp" name="overhead_exp" placeholder="Overhead Expense" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="overhead_price_pur">Overhead Price Purchase</label>
                        <input type="text" id="overhead_price_pur" name="overhead_price_pur" placeholder="Overhead Price Purchase" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="overhead_price_avg">Overhead Price Average</label>
                        <input type="text" id="overhead_price_avg" name="overhead_price_avg" placeholder="Overhead Price Average" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="pur_price_plus_oh">Purchase Price + Overhead</label>
                        <input type="text" id="pur_price_plus_oh" name="pur_price_plus_oh" placeholder="Purchase Price + Overhead" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="avg_price_plus_oh">Average Price + Overhead</label>
                        <input type="text" id="avg_price_plus_oh" name="avg_price_plus_oh" placeholder="Average Price + Overhead" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="inactive_item">Inactive Item</label>
                        <input type="text" id="inactive_item" name="inactive_item" placeholder="Inactive Item" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="barcode">Barcode</label>
                        <input type="text" id="barcode" name="barcode" placeholder="Barcode" class="form-control " required>
                    </div>
                    <div class="col">
                        <label for="unit">Unit</label>
                        <input type="text"style="text-align:center !important;" readonly   id="unit" name="unit" placeholder="Unit" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="re_order_level">Re-order Level</label>
                        <input type="text" id="re_order_level" name="re_order_level" placeholder="Re-order Level" class="form-control " required>
                    </div>
                </div>
            </div>
            <!-- End of SQL Fields -->

            @error('username')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            @error('email')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            @error('phone_number')
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

@endsection