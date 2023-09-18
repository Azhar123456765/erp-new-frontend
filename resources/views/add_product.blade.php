@extends('master') @section('content')



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
                        <input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="text" id="desc" name="desc" placeholder="Description" class="form-control " required>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="company">Product Company</label>
                        <select name="company" id="company" class="form-control " required>
                            @foreach ($company as $row)

                            <option value="{{$row->company}}">{{$row->company}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control " required>
                            @foreach ($type as $row2)

                            <option value="{{$row2->type}}">{{$row2->type}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col">
                        <label for="category">Product category</label>
                        <select name="category" id="category" class="form-control " required>
                            @foreach ($category as $row3)

                            <option value="{{$row3->category_name}}">{{$row3->category_name}}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>

            <br>
            <div class="form-group">
                <div class="row">

                    <div class="col">
                        <input style="width: 49%;" type="number" id="purchase_price" name="purchase_price" placeholder="Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" id="sale_price" name="sale_price" placeholder="Sale Price" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="number" id="opening_pur_price" name="opening_pur_price" placeholder="Opening Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" id="opening_quantity" name="opening_quantity" placeholder="Opening Quantity" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="number" id="avg_pur_price" name="avg_pur_price" placeholder="Average Purchase Price" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" id="overhead_exp" name="overhead_exp" placeholder="Overhead Expense" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="number" id="overhead_price_pur" name="overhead_price_pur" placeholder="Overhead Price Purchase" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" id="overhead_price_avg" name="overhead_price_avg" placeholder="Overhead Price Average" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="number" id="pur_price_plus_oh" name="pur_price_plus_oh" placeholder="Purchase Price + Overhead" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" id="avg_price_plus_oh" name="avg_price_plus_oh" placeholder="Average Price + Overhead" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="text" id="inactive_item" name="inactive_item" placeholder="Inactive Item" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" id="barcode" name="barcode" placeholder="Barcode" class="form-control " required>
                    </div>
                    <div class="col">
                        <input type="text"style="text-align:center !important;" readonly   id="unit" name="unit" placeholder="Unit" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input style="width: 49%;" type="text" id="re_order_level" name="re_order_level" placeholder="Re-order Level" class="form-control " required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="">Product Image</label>
                        <input style="width: 49%;" type="file" id="image" name="image" placeholder="image" class="form-control " required>
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