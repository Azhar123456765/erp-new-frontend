    @extends('layout.app') @section('title', 'Add Product') @section('content')
    <br>
    <div class="container">
        <h2>Add Product</h2>
        <div class="card-body card-block">
            <form action="add_product_form" method="post" enctype="multipart/form-data"  class="needs-validation"
            novalidate>
                @csrf

                <!-- SQL Fields -->
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Product Name</label>
                            <input type="text" id="product_name" name="product_name" placeholde="Product Name"
                                class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Description</label>
                            <input type="text" id="desc" name="desc" placeholde="Description"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="company">Product Company</label>
                            <select name="company" id="company" class="form-control select-product_company">

                            </select>
                        </div>

                        <div class="col">
                            <label for="category">Product category</label>
                            <select name="category" id="category" class="form-control select-product_category">

                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label for="type">Type</label>
                                <select name="type" class="form-control select-type">
                                    @foreach ($type as $row)
                                        <option value="{{ $row->type }}">{{ $row->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>Purchase Price</label>
                            <input type="number" step="any" id="purchase_price" name="purchase_price"
                                placeholde="Purchase Price" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Sale Price</label>
                            <input type="number" step="any" id="sale_price" name="sale_price" placeholde="Sale Price"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label>Opening Purchase Price</label>
                            <input type="number" step="any" id="opening_pur_price" name="opening_pur_price"
                                placeholde="Opening Purchase Price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Opening Quantity</label>
                            <input type="number" step="any" id="opening_quantity" name="opening_quantity"
                                placeholde="Opening Quantity" class="form-control">
                        </div>
                        <div class="col">
                            <label>Average Purchase Price</label>
                            <input type="number" step="any" id="avg_pur_price" name="avg_pur_price"
                                placeholde="Average Purchase Price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Overhead Expense</label>
                            <input type="number" step="any" id="overhead_exp" name="overhead_exp"
                                placeholde="Overhead Expense" class="form-control">
                        </div>
                        <div class="col">
                            <label>Overhead Price Purchase</label>
                            <input type="number" step="any" id="overhead_price_pur" name="overhead_price_pur"
                                placeholde="Overhead Price Purchase" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Overhead Price Average</label>
                            <input type="number" step="any" id="overhead_price_avg" name="overhead_price_avg"
                                placeholde="Overhead Price Average" class="form-control">
                        </div>
                        <div class="col">
                            <label>Purchase Price + Overhead</label>
                            <input type="number" step="any" id="pur_price_plus_oh" name="pur_price_plus_oh"
                                placeholde="Purchase Price + Overhead" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Average Price + Overhead</label>
                            <input type="number" step="any" id="avg_price_plus_oh" name="avg_price_plus_oh"
                                placeholde="Average Price + Overhead" class="form-control">
                        </div>
                        <div class="col">
                            <label>Inactive Item</label>
                            <input type="text" id="inactive_item" name="inactive_item" placeholde=""
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Barcode</label>
                            <input type="text" id="barcode" name="barcode" placeholde="" class="form-control"
                            >
                        </div>
                        <div class="col">
                            <label>unit</label>
                            <input type="text"style="text-align:center !important;" id="unit" name="unit"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Re-order Level</label>

                            <input style="width: 49%;" type="text" id="re_order_level" name="re_order_level"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Product Image</label>
                            <input style="width: 49%;" type="file" id="image" name="image"
                                class="form-control">
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

    @endsection
