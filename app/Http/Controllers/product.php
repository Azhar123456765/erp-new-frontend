<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\seller;

use App\Models\product_sub_category;
use App\Models\product_category;
use App\Models\product_company;
use App\Models\product_type;
use App\Models\products;

class product extends Controller
{



    function product_category(Request $request)
    {

        $users = product_category::all();
        $data = compact('users');
        return view('product_category')->with($data);
    }
    function add_product_category(Request $request)
    {


        $add = new product_category();
        $add->category_name = $request['category_name'];
        $add->save();


        session()->flash('message', 'category has been added successfully');


        return redirect()->back();
    }

    function edit_product_category(Request $request, $id)
    {

        $query = product_category::where('product_category_id', $id)->update([

            'category_name' => $request['category_name'],

        ]);

        session()->flash('message', 'category has been updated successfully');


        return redirect()->back();
    }

    function product_category_delete(Request $request, $id)
    {

        $query = product_category::where('product_category_id', $id)->delete();

        session()->flash('message', 'category has been deleted successfully');


        return redirect()->back();
    }













    function product_sub_category(Request $request)
    {

        $users = product_sub_category::leftJoin('product_category', 'main_category', '=', 'product_category.product_category_id')->get();
        $category = product_category::all();
        $data = compact('users', 'category');
        return view('product_sub_category')->with($data);
    }
    function add_product_sub_category(Request $request)
    {


        $add = new product_sub_category();
        $add->sub_category_name = $request['category_name'];
        $add->main_category = $request['main_category'];

        $add->save();


        session()->flash('message', 'Sub-category has been added successfully');


        return redirect()->back();
    }

    function edit_product_sub_category(Request $request, $id)
    {

        $query = product_sub_category::where('product_sub_category_id', $id)->update([

            'sub_category_name' => $request['category_name'],
            'main_category' => $request['main_category'],


        ]);

        session()->flash('message', 'Sub-category has been updated successfully');


        return redirect()->back();
    }

    function product_sub_category_delete(Request $request, $id)
    {

        $query = product_sub_category::where('product_sub_category_id', $id)->delete();

        session()->flash('message', 'Sub-category has been deleted successfully');


        return redirect()->back();
    }










    function product_company(Request $request)
    {

        $users = product_company::all();
        $data = compact('users');
        return view('product_company')->with($data);
    }
    function add_product_company(Request $request)
    {
        $request->validate([
            'company' => 'required|unique:product_company,company_name',
        ]);
     
        $add = new product_company();
        $add->company_name = $request['company'];
        $add->save();


        session()->flash('message', 'Product Company has been added successfully');


        return redirect()->back();
    }

    function edit_product_company(Request $request, $id)
    {
        $request->validate([
            'company' => 'required|unique:product_company,company_name',
        ]);
        $query = product_company::where('product_company_id', $id)->update([

            'company_name' => $request['company'],


        ]);

        session()->flash('message', 'Product Company has been updated successfully');


        return redirect()->back();
    }

    function product_company_delete(Request $request, $id)
    {

        $query = product_company::where('product_company_id', $id)->delete();

        session()->flash('message', 'Product Company has been deleted successfully');


        return redirect()->back();
    }
















    function product_type(Request $request)
    {

        $users = product_type::all();
        $data = compact('users');
        return view('product_type')->with($data);
    }
    function add_product_type(Request $request)
    {


        $add = new product_type();
        $add->type = $request['type'];
        $add->save();


        session()->flash('message', 'Product type has been added successfully');


        return redirect()->back();
    }

    function edit_product_type(Request $request, $id)
    {

        $query = product_type::where('product_type_id', $id)->update([

            'type' => $request['type'],


        ]);

        session()->flash('message', 'Product type has been updated successfully');


        return redirect()->back();
    }

    function product_type_delete(Request $request, $id)
    {

        $query = product_type::where('product_type_id', $id)->delete();

        session()->flash('message', 'Product type has been deleted successfully');


        return redirect()->back();
    }










    function view_product(Request $request)
    {
        $category = product_category::all();
        $sub_category = product_sub_category::all();
        $company = product_company::all();
        $type = product_type::all();


        $users = products::leftJoin('product_company', 'products.company', '=', 'product_company.product_company_id')
        ->leftJoin('product_category', 'category', '=', 'product_category.product_category_id')
        ->leftJoin('product_type', 'products.product_type', '=', 'product_type.product_type_id')
        ->simplepaginate();


        $data = compact('users', 'category', 'sub_category', 'company', 'type');

        return view('products')->with($data);
    }

    function add_product(Request $request)
    {
        // Retrieve the form data
        $productName = $request->input('product_name');
        $desc = $request->input('desc');
        $company = $request->input('company');
        $type = $request->input('type');
        $category = $request->input('category');
        $purchasePrice = $request->input('purchase_price');
        $salePrice = $request->input('sale_price');
        $openingPurPrice = $request->input('opening_pur_price');
        $openingQuantity = $request->input('opening_quantity');
        $avgPurPrice = $request->input('avg_pur_price');
        $overheadExp = $request->input('overhead_exp');
        $overheadPricePur = $request->input('overhead_price_pur');
        $overheadPriceAvg = $request->input('overhead_price_avg');
        $purPricePlusOh = $request->input('pur_price_plus_oh');
        $avgPricePlusOh = $request->input('avg_price_plus_oh');
        $inactiveItem = $request->input('inactive_item');
        $barcode = $request->input('barcode');
        $unit = $request->input('unit');
        $reOrderLevel = $request->input('re_order_level');


        $image = $request->file('image');

        if ($image) {
            $imagePath = $request->file('image')->store('product_img');
        } else {
            $imagePath = null; // Set a default value if no image is uploaded
        }

        // Save the data to the database or perform any other desired operations
        $product = new products;
        $product->product_name = $productName;
        $product->desc = $desc;
        $product->company = $company;
        $product->product_type = $type;
        $product->category = $category;
        $product->purchase_price = $purchasePrice;
        $product->product_sale_price = $salePrice;
        $product->opening_pur_price = $openingPurPrice;
        $product->opening_quantity = $openingQuantity;
        $product->avg_pur_price = $avgPurPrice;
        $product->overhead_exp = $overheadExp;
        $product->overhead_price_pur = $overheadPricePur;
        $product->overhead_price_avg = $overheadPriceAvg;
        $product->pur_price_plus_oh = $purPricePlusOh;
        $product->avg_price_plus_oh = $avgPricePlusOh;
        $product->inactive_item = $inactiveItem;
        $product->barcode = $barcode;
        $product->unit = $unit;
        $product->re_order_level = $reOrderLevel;
        $product->image = $imagePath;
        $product->save();

        // Redirect to a success page or return a response
        session()->flash('message', 'product has been added successfully');
        return redirect()->back();
    }



    function product_delete(Request $request, $id)
    {

        $image = products::where('product_id', $id)->get();
        
        foreach ($image as $key => $row) {
        
            
        if ($image != null) {
            unlink($row->image);
        }
        
    }
    
    $query = products::where('product_id', $id)->delete();

        session()->flash('message', 'Product has been deleted successfully');


        return redirect()->back();
    }


    function edit_product($id, Request $request)
    {
        // Retrieve the form data
        $productName = $request->input('product_name');
        $desc = $request->input('desc');
        $company = $request->input('company');
        $type = $request->input('type');
        $category = $request->input('category');
        $purchasePrice = $request->input('purchase_price');
        $salePrice = $request->input('sale_price');
        $openingPurPrice = $request->input('opening_pur_price');
        $openingQuantity = $request->input('opening_quantity');
        $avgPurPrice = $request->input('avg_pur_price');
        $overheadExp = $request->input('overhead_exp');
        $overheadPricePur = $request->input('overhead_price_pur');
        $overheadPriceAvg = $request->input('overhead_price_avg');
        $purPricePlusOh = $request->input('pur_price_plus_oh');
        $avgPricePlusOh = $request->input('avg_price_plus_oh');
        $inactiveItem = $request->input('inactive_item');
        $barcode = $request->input('barcode');
        $unit = $request->input('unit');
        $reOrderLevel = $request->input('re_order_level');
        $image = $request->file('image');


        $old_img = $request->input('old_image');


        if ($image != '') {
            $imagePath = $request->file('image')->store('product_img', 'public');
            if ($old_img != '' && $image != '') {
                unlink($old_img);
            }
        } else {
            $imagePath = $old_img; // Set a default value if no image is uploaded
        }

        // Update the product in the database

        products::where('product_id', $id)->update([
            'product_name' => $productName,
            'desc' => $desc,
            'company' => $company,
            'product_type' => $type,
            'category' => $category,
            'purchase_price' => $purchasePrice,
            'product_sale_price' => $salePrice,
            'opening_pur_price' => $openingPurPrice,
            'opening_quantity' => $openingQuantity,
            'avg_pur_price' => $avgPurPrice,
            'overhead_exp' => $overheadExp,
            'overhead_price_pur' => $overheadPricePur,
            'overhead_price_avg' => $overheadPriceAvg,
            'pur_price_plus_oh' => $purPricePlusOh,
            'avg_price_plus_oh' => $avgPricePlusOh,
            'inactive_item' => $inactiveItem,
            'barcode' => $barcode,
            'unit' => $unit,
            're_order_level' => $reOrderLevel,
            'image' => $imagePath // Only update if an image is provided
        ]);


        // Redirect to a success page or return a response
        session()->flash('message', 'Product has been updated successfully');
        return redirect()->back();
    }
}
