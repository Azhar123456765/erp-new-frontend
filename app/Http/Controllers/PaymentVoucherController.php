<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\accounts;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\p_voucher;
use App\Models\sell_invoice;
use App\Models\seller;
use App\Models\sales_officer;
use App\Models\product_sub_category;
use App\Models\product_category;
use App\Models\product_company;
use App\Models\product_type;
use App\Models\products;
use App\Models\warehouse;

class PaymentVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $seller = seller::limit(1000)->get();
        $buyer = buyer::limit(1000)->get();

        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $account = accounts::all();

        $data = compact('seller', 'sales_officer', 'warehouse', 'account', 'buyer');
        return view('vouchers.payment')->with($data);
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
        $company = substr($invoiceData['company'], 0, -1);

        // Check if the last character is a letter using ctype_alpha

        $amount = $request['amount_total'];

        if ($lastChar === 'S') {
            if ($amount >= 1) {
                seller::where("seller_id", $request['company'])->update([
                    'debit' => DB::raw("debit + " . $amount),
                ]);
            } elseif ($amount <= 1) {
                seller::where("seller_id", $request['company'])->update([
                    'debit' => DB::raw("debit - " . $amount),
                ]);
            }
        } elseif ($lastChar === 'B') {

            if ($amount >= 1) {
                buyer::where("buyer_id", $request['company'])->update([
                    'debit' => DB::raw("debit + " . $amount),
                ]);
            } elseif ($amount <= 1) {
                buyer::where("buyer_id", $request['company'])->update([
                    'debit' => DB::raw("debit - " . $amount),
                ]);
            }
        }



        $arrayLength = count(array_filter($invoiceData['narration']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new p_voucher;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $company;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;
            

            $invoice->narration = $invoiceData['narration']["$i"] ?? null;
            $invoice->cheque_no = $invoiceData['cheque_no']["$i"] ?? null;
            $invoice->cheque_date = $invoiceData['cheque_date']["$i"] ?? null;
            $invoice->cash_bank = $invoiceData['cash_bank']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->ref_no = $invoiceData['ref_no'] ?? null;

            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $seller = seller::limit(1000)->get();
        $buyer = buyer::limit(1000)->get();

        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $p_voucher = p_voucher::where("unique_id", $id)
            ->get();



        $sp_voucher = p_voucher::where([

            "unique_id" => $id
        ])->limit(1)->get();

        $account = accounts::all();

        $data = compact('seller', 'sales_officer', 'warehouse', 'account', 'buyer', 'p_voucher', 'sp_voucher');
        return view('vouchers.e_payment')->with($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        p_voucher::where('unique_id', $id)->delete();

        $invoiceData = $request->all();

        // Assuming all array fields have the same lengthbdnbbh

        $arrayLength = count(array_filter($invoiceData['narration']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new p_voucher;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;





            $invoice->narration = $invoiceData['narration']["$i"] ?? null;
            $invoice->cheque_no = $invoiceData['cheque_no']["$i"] ?? null;
            $invoice->cheque_date = $invoiceData['cheque_date']["$i"] ?? null;
            $invoice->cash_bank = $invoiceData['cash_bank']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->ref_no = $invoiceData['ref_no'] ?? null;



            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
