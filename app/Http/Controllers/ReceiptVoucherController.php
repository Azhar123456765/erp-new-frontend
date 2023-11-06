<?php

namespace App\Http\Controllers;

use App\Models\ReceiptVoucher;
use Illuminate\Http\Request;

use App\Models\accounts;
use Illuminate\Support\Facades\DB;

use App\Models\buyer;
use App\Models\Income;
use App\Models\sell_invoice;
use App\Models\seller;
use App\Models\sales_officer;


use App\Models\warehouse;

class ReceiptVoucherController extends Controller
{
    function get_data(Request $post)
    {
        $id = $post->input('id'); // Use input() to retrieve data from the request
        $data = sell_invoice::where('company', $id)
            ->whereIn('sell_invoice.id', function ($subQuery) {
                $subQuery->select(DB::raw('MIN(id)'))
                    ->from('sell_invoice')
                    ->groupBy('unique_id');
            })->get();


        return response()->json($data);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $seller = seller::limit(1000)->get();
        $buyer = buyer::limit(1000)->get();

        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice  = sell_invoice::all();

        $account = accounts::all();
        $count = ReceiptVoucher::whereIn('receipt_vouchers.id', function ($query2) {
            $query2->select(DB::raw('MIN(id)'))
                ->from('receipt_vouchers')
                ->groupBy('unique_id');
        })->count();

        $data = compact('seller', 'sales_officer', 'warehouse', 'account', 'buyer', 'sell_invoice', 'count');
        return view('vouchers.receipt')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoiceData = $request->all();

        $lastChar = substr($request['company'], -1);

        // Check if the last character is a letter using ctype_alpha
        $income =  new Income;
        $income->category_id = $invoiceData['unique_id'];
        $income->category = 'Receipt Voucher';
        $income->amount = $request['amount_total'];
        $income->save();



        $arrayLength = count($invoiceData['narration']);

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new ReceiptVoucher;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $company = substr($invoiceData['company'], 0, -1);
            $invoice->company = $company;

            $lastChar = substr($request['company'], -1);

            $invoice_no = $invoiceData['invoice_no']["$i"] ?? null;
            $amount = $request['amount']["$i"];
            $amount_total = $request['amount_total'];
            if ($lastChar === 'S') {
                $invoice->company_ref = "S";
            } elseif ($lastChar === 'B') {
                $invoice->company_ref = "B";
            }
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->narration = $invoiceData['narration']["$i"] ?? null;
            $invoice->invoice_no = $invoiceData['invoice_no']["$i"] ?? null;
            $invoice->cheque_no = $invoiceData['cheque_no']["$i"] ?? null;
            $invoice->cheque_date = $invoiceData['cheque_date']["$i"] ?? null;
            $invoice->cash_bank = $invoiceData['cash_bank']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->ref_no = $invoiceData['ref_no'] ?? null;


            if ($invoice_no != null) {
                sell_invoice::where("id", $invoice_no)->update([
                    'amount_paid' => DB::raw("amount_paid + " . $amount),
                    'previous_balance_amount' => DB::raw("previous_balance_amount - " . $amount),
                    'balance_amount' => DB::raw("balance_amount - " . $amount),
                ]);
            }


            $invoice->save();
        }

        $data = 'Voucher added successfully!';
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptVoucher  $receiptVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(ReceiptVoucher $receiptVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReceiptVoucher  $receiptVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $seller = seller::limit(1000)->get();
        $buyer = buyer::limit(1000)->get();

        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $ReceiptVoucher = ReceiptVoucher::where("unique_id", $id)->get();

        $sReceiptVoucher = ReceiptVoucher::where([
            "unique_id" => $id
        ])->limit(1)->get();

        foreach ($ReceiptVoucher as $key => $value) {
            $company = $value->company;
        }

        $account = accounts::all();
        $invoices = sell_invoice::where('company', $company)->get();
        $data = compact('seller', 'sales_officer', 'warehouse', 'account', 'buyer', 'ReceiptVoucher', 'sReceiptVoucher','invoices');
        return view('vouchers.e_reciept')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReceiptVoucher  $receiptVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ReceiptVoucher::where('unique_id', $id)->delete();

        Income::where('category_id', $id)->update([
            'amount' => $request['amount_total']
        ]);
      
        $invoiceData = $request->all();

        $arrayLength = count(array_filter($invoiceData['narration']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new ReceiptVoucher;

            $invoice->unique_id = $invoiceData['unique_id'] ?? null;
            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->narration = $invoiceData['narration']["$i"] ?? null;
            $invoice->invoice_no = $invoiceData['invoice_no']["$i"] ?? null;
            $invoice->cheque_no = $invoiceData['cheque_no']["$i"] ?? null;
            $invoice->cheque_date = $invoiceData['cheque_date']["$i"] ?? null;
            $invoice->cash_bank = $invoiceData['cash_bank']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->ref_no = $invoiceData['ref_no'] ?? null;

            $invoice->amount_total = $invoiceData['amount_total'] ?? null;


            $invoice->save();
        }

        $data = 'Voucher added successfully!';
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReceiptVoucher  $receiptVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceiptVoucher $receiptVoucher)
    {
        //
    }
}
