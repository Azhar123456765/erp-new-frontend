<?php

namespace App\Http\Controllers;

use App\Models\chickenInvoice;
use App\Models\users;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ChickenInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $count = chickenInvoice::whereIn('chicken_invoices.id', function ($query2) {
            $query2->select(DB::raw('MIN(id)'))
                ->from('chicken_invoices')
                ->groupBy('unique_id');
        })->count();

        $data = compact('count');
        return view('invoice.farm.chicken_sale_invoice')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = session()->get('user_id')['user_id'];
        users::where("user_id", $user_id)->update([
            'no_records' => DB::raw("no_records + " . 1)
        ]);
        // $income = new Income;
        // $income->category_id = $request['unique_id'];
        // $income->category = 'Chick Invoice';
        // $income->amount = $request['amount_paid'];
        // $income->save(); 
        // $array = $request['amount'];
        // $filteredArray = array_filter($array, function ($value) {
        //     return $value > 0;
        // });

        $arrayLength = count(array_filter($request['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new chickenInvoice;

            $invoice->unique_id = $request['unique_id'] ?? null;
            $invoice->user_id = $user_id;
            $invoice->item = $request['item']["$i"];
            $invoice->date = $request['date'] ?? null;
            $invoice->seller = $request['seller'];
            $invoice->buyer = $request['buyer'];
            $invoice->sales_officer = $request['sales_officer'] ?? null;
            $invoice->remark = $request['remark'] ?? null;

            $invoice->rate_type = $request['rate_type']["$i"] ?? null;
            $invoice->vehicle_no = $request['vehicle_no']["$i"] ?? null;
            $invoice->crate_type = $request['crate_type']["$i"] ?? null;
            $invoice->crate_qty = $request['crate_qty']["$i"] ?? null;
            $invoice->hen_qty = $request['hen_qty']["$i"] ?? null;
            $invoice->gross_weight = $request['gross_weight']["$i"] ?? null;
            $invoice->actual_rate = $request['actual_rate']["$i"] ?? null;
            $invoice->feed_cut = $request['feed_cut']["$i"] ?? null;
            $invoice->more_cut = $request['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $request['crate_cut']["$i"] ?? null;
            $invoice->net_weight = $request['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $request['rate_diff']["$i"] ?? null;
            $invoice->rate = $request['rate']["$i"] ?? null;
            $invoice->amount = $request['amount']["$i"] ?? null;
            $invoice->sale_feed_cut = $request['sale_feed_cut']["$i"] ?? null;
            $invoice->sale_more_cut = $request['sale_mor_cut']["$i"] ?? null;
            $invoice->sale_crate_cut = $request['sale_crate_cut']["$i"] ?? null;
            $invoice->sale_net_weight = $request['sale_n_weight']["$i"] ?? null;
            $invoice->sale_rate_diff = $request['sale_rate_diff']["$i"] ?? null;
            $invoice->sale_rate = $request['sale_rate']["$i"] ?? null;
            $invoice->sale_amount = $request['sale_amount']["$i"] ?? null;
            $invoice->avg = $request['avg']["$i"] ?? 0;

            $invoice->crate_qty_total = $request['crate_qty_total'] ?? null;
            $invoice->hen_qty_total = $request['hen_qty_total'] ?? null;
            $invoice->gross_weight_total = $request['gross_weight_total'] ?? null;
            $invoice->feed_cut_total = $request['feed_cut_total'] ?? null;
            $invoice->mor_cut_total = $request['mor_cut_total'] ?? null;
            $invoice->crate_cut_total = $request['crate_cut_total'] ?? null;
            $invoice->n_weight_total = $request['n_weight_total'] ?? null;
            $invoice->amount_total = $request['amount_total'] ?? null;
            $invoice->sale_feed_cut_total = $request['sale_feed_cut_total'] ?? null;
            $invoice->sale_mor_cut_total = $request['sale_mor_cut_total'] ?? null;
            $invoice->sale_crate_cut_total = $request['sale_crate_cut_total'] ?? null;
            $invoice->sale_n_weight_total = $request['sale_n_weight_total'] ?? null;
            $invoice->sale_amount_total = $request['sale_amount_total'] ?? null;

            $image = $request->file('attachment');
            if ($image) {
                $attachmentPath = $image->store('attachments');
            } else {
                $attachmentPath = null;
            }

            $invoice->attachment = $attachmentPath;

            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chickenInvoice  $chickenInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(chickenInvoice $chickenInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chickenInvoice  $chickenInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(chickenInvoice $chickenInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chickenInvoice  $chickenInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chickenInvoice $chickenInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chickenInvoice  $chickenInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(chickenInvoice $chickenInvoice)
    {
        //
    }
}
