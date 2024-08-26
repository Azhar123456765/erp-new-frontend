<?php

namespace App\Http\Controllers;

use App\Models\ExpenseVoucher;
use App\Models\accounts;
use App\Models\Narration;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\Expense;
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
use Illuminate\Http\Request;

class ExpenseVoucherController extends Controller
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
        $seller = seller::all();
        $buyer = buyer::all();
        $warehouse = warehouse::all();
        $sales_officer = sales_officer::all();
        $account = accounts::all();
        $narrations = Narration::all();

        $count = 000000;

        $data = compact('seller', 'sales_officer', 'warehouse', 'account', 'buyer', 'count', 'narrations');
        return view('vouchers.expense')->with($data);
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

        $expense = new Expense;
        $expense->category_id = $invoiceData['unique_id'];
        $expense->category = 'Expense Voucher';
        $expense->company_id = $invoiceData['company'];
        $expense->company_ref = $lastChar;
        $expense->amount = $request['amount_total'];
        $expense->save();

        $company = substr($invoiceData['company'], 0, -1);

        $arrayLength = count(array_filter($invoiceData['narration']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new ExpenseVoucher;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $lastChar = substr($request['company'], -1);
            if ($lastChar === 'S') {
                $invoice->seller = $company;
            } elseif ($lastChar === 'B') {
                $invoice->buyer = $company;
            }

            $invoice->narration = $invoiceData['narration']["$i"] ?? null;
            $invoice->cheque_no = $invoiceData['cheque_no']["$i"] ?? null;
            $invoice->cheque_date = $invoiceData['cheque_date']["$i"] ?? null;
            $invoice->cash_bank = $invoiceData['cash_bank']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->ref_no = $invoiceData['ref_no'] ?? null;
            $image = $request->file('attachment');
            if ($image) {
                $attachmentPath = $image->store('attachments');
            } else {
                $attachmentPath = $request->input('old_attachment');
            }

            $invoice->attachment = $attachmentPath;
            $invoice->save();
        }

        $data = 'Voucher added successfully!';
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseVoucher  $expenseVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseVoucher $expenseVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseVoucher  $expenseVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseVoucher $expenseVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseVoucher  $expenseVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseVoucher $expenseVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseVoucher  $expenseVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseVoucher $expenseVoucher)
    {
        //
    }
}
