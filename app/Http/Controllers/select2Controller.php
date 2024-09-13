<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use App\Models\Farm;
use App\Models\product_category;
use App\Models\product_company;
use App\Models\sales_officer;
use App\Models\warehouse;
use App\Models\seller;
use App\Models\buyer;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class select2Controller extends Controller
{
    function farm(Request $request)
    {
        $search = $request->get('q');

        $results = Farm::where('name', 'LIKE', "%{$search}%")
            ->get(['id', 'name']);

        return response()->json($results);
    }
    function account(Request $request)
    {
        $search = $request->get('q');

        $results = accounts::where('account_name', 'LIKE', "%{$search}%")
            ->get(['id', 'account_name']);

        // $buyers = buyer::where('company_name', 'LIKE', "%{$search}%")
        //     ->get(['buyer_id', 'company_name']);

        // $combinedResults = [];
        // foreach ($accounts as $account) {
        //     $combinedResults[$account->account_name] = [
        //         'id' => $account->id,
        //         'account_name' => $account->account_name
        //     ];
        // }

        // foreach ($buyers as $buyer) {
        //     $combinedResults = [
        //         'buyer_id' => $buyer->buyer_id,
        //         'company_name' => $buyer->company_name
        //     ];
        // }

        return response()->json($results);
    }
    function assets_account(Request $request)
    {
        $search = $request->get('q');

        $results = accounts::where('account_name', 'LIKE', "%{$search}%")
            ->whereHas('sub_head', function ($query) {
                $query->where('head', 1);
            })
            ->get(['id', 'account_name']);

        return response()->json($results);
    }
    function liability_account(Request $request)
    {
        $search = $request->get('q');

        $results = accounts::where('account_name', 'LIKE', "%{$search}%")
            ->whereHas('sub_head', function ($query) {
                $query->where('head', 2);
            })
            ->get(['id', 'account_name']);

        return response()->json($results);
    }
    function expense_account(Request $request)
    {
        $search = $request->get('q');

        $results = accounts::where('account_name', 'LIKE', "%{$search}%")
            ->whereHas('sub_head', function ($query) {
                $query->where('head', 5);
            })
            ->get(['id', 'account_name']);

        return response()->json($results);
    }
    function warehouse(Request $request)
    {
        $search = $request->get('q');

        $results = warehouse::where('warehouse_name', 'LIKE', "%{$search}%")
            ->get(['warehouse_id', 'warehouse_name']);

        return response()->json($results);
    }

    function sales_officer(Request $request)
    {
        $search = $request->get('q');

        $results = sales_officer::where('sales_officer_name', 'LIKE', "%{$search}%")
            ->get(['sales_officer_id', 'sales_officer_name']);

        return response()->json($results);
    }
    function product_category(Request $request)
    {
        $search = $request->get('q');

        $results = product_category::where('category_name', 'LIKE', "%{$search}%")
            ->get(['product_category_id', 'category_name']);

        return response()->json($results);
    }

    function product_company(Request $request)
    {
        $search = $request->get('q');

        $results = product_company::where('company_name', 'LIKE', "%{$search}%")
            ->get(['product_company_id', 'company_name']);

        return response()->json($results);
    }
    function buyer(Request $request)
    {
        $search = $request->get('q');

        $results = buyer::where('company_name', 'LIKE', "%{$search}%")
            ->get(['buyer_id', 'company_name']);

        return response()->json($results);
    }
    function seller(Request $request)
    {
        $search = $request->get('q');

        $results = seller::where('company_name', 'LIKE', "%{$search}%")
            ->get(['seller_id', 'company_name']);

        return response()->json($results);
    }

    function products(Request $request)
    {
        $search = $request->get('q');

        $results = products::where('product_name', 'LIKE', "%{$search}%")
            ->get();

        return response()->json($results);
    }
    function seller_buyer(Request $request)
    {
        $search = $request->get('q');

        $resultsS = seller::where('company_name', 'LIKE', "%{$search}%")
            ->select('seller_id as id', 'company_name', DB::raw('"S" as comp_ref'))
            ->toBase();

        $results = buyer::where('company_name', 'LIKE', "%{$search}%")
            ->select('buyer_id as id', 'company_name', DB::raw('"B" as comp_ref'))
            ->union($resultsS)
            ->get();

        return response()->json($results);

    }
}
