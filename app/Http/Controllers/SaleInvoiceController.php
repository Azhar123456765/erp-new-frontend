<?php

namespace App\Http\Controllers;

use App\Mail\invoiceMail;
use Illuminate\Http\Request;

use App\Models\accounts;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\buyer;
use App\Models\Income;
use App\Models\sell_invoice;
use App\Models\seller;
use App\Models\sales_officer;
use App\Models\products;
use App\Models\warehouse;
use Illuminate\Support\Facades\Mail;

class SaleInvoiceController extends Controller
{
    public function mail(Request $request)
    {
        $company_id = $request->input('company');
        $company = buyer::where('buyer_id', $company_id)->get();
        foreach ($company as $key => $value) {
            $email = $value['company_email'];
        }

        Mail::to('m.azharalamjawaid@gmail.com')->send(new invoiceMail());
        return $email;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $post)
    {


        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();
        $sales_officer  = sales_officer::limit(1000)->get();


        $invoice_no = $post['invoice_no'] ?? null;
        $company = $post['company'] ?? null;
        $sales_officer2 = $post['sales_officer'] ?? null;
        $date = $post['date'] ?? null;

        if ($post['check'] != null) {
            $query = sell_invoice::query();

            if ($post['invoice_no']) {
                $query->Where("sell_invoice.unique_id", $post['invoice_no']);
            }
            if ($post['company']) {
                $query->Where("sell_invoice.company", $post['company']);
            }
            if ($post['sales_officer']) {
                $query->Where("sales_officer", $post['sales_officer']);
            }
            if ($post['date']) {
                $query->Where("date", $post['date']);
            }
            $query->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
                ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                ->whereIn('sell_invoice.id', function ($query2) {
                    $query2->select(DB::raw('MIN(id)'))
                        ->from('sell_invoice')
                        ->groupBy('unique_id');
                })
                ->orderBy("sell_invoice.id");

            $sell_invoice = $query->simplePaginate(15);

            $account = accounts::all();

            $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'account', 'date', 'invoice_no', 'sales_officer2', 'company');

            return view('invoice.view_sale_invoice')->with($data);
        }

        $sell_invoice = sell_invoice::leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
            ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
            ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
            ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
            ->whereRaw('sell_invoice.id IN (SELECT MIN(id) FROM sell_invoice GROUP BY unique_id)')
            ->orderby("sell_invoice.id")
            ->simplepaginate(15);



        $account = accounts::all();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'account', 'date', 'invoice_no', 'sales_officer2', 'company');

        return view('invoice.view_sale_invoice')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice  = sell_invoice::all();

        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'account');
        return view('invoice.s_med_invoice')->with($data);
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
        $user_id = session()->get('user_id')['user_id'];

        // Assuming all array fields have the same lengthbdnbbh

        users::where("user_id", $user_id)->update([
            'no_records' => DB::raw("no_records + " . 1)
        ]);

        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => $amount,
            ]);
        } elseif ($amount <= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => $amount,
            ]);
        }

        $income =  new Income;
        $income->category_id = $invoiceData['unique_id'];
        $income->category = 'Sale Invoice';
        $income->amount = $request['amount_paid'];
        $income->save();
        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new sell_invoice;

            $user_id = session()->get('user_id')['user_id'];

            $invoice->user_id = $user_id;
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
            $invoice->previous_balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->account = $invoiceData['account'] ?? null;
            $invoice->cash_method = $invoiceData['cash_method'] ?? null;

            $invoice->pr_item = $invoiceData['item']["$i"] ?? null;



            $invoice->previous_stock = $invoiceData['sale_qty']["$i"] ?? null;

            $product = $invoiceData['item']["$i"];

            products::where("product_id", $product)->update([
                'opening_quantity' => DB::raw("opening_quantity - " . $invoiceData['sale_qty']["$i"])
            ]);



            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] ?? null;
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


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
    public function edit($id)
    {
        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice = sell_invoice::where("unique_id", $id)
            ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')

            ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
            ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
            ->get();


        $single_invoice  = sell_invoice::where([

            "unique_id" => $id
        ])->limit(1)->get();



        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'single_invoice', 'account');
        return view('invoice.es_med_invoice')->with($data);
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


        sell_invoice::where('unique_id', $id)->delete();

        $pr_amount = $request['previous_balance_amount'];
        if ($pr_amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit - " . $pr_amount),
            ]);
        }




        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit + " . $amount),
            ]);
        } elseif ($amount <= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit - " . abs($amount)),
            ]);
        }
        $invoiceData = $request->all();

        $income =  Income::where('category_id', $invoiceData['unique_id'])->update([
            'amount' => $request['amount_paid']
        ]);

        // Assuming all array fields have the same length
        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new sell_invoice;
            $invoice->previous_balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->created_at = $invoiceData['created_at'] ?? null;
            $invoice->updated_at = date("Y-m-d H:i:s") ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'];

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->account = $invoiceData['account'] ?? null;
            $invoice->cash_method = $invoiceData['cash_method'] ?? null;

            $invoice->pr_item = $invoiceData['item']["$i"] ?? null;



            $invoice->previous_stock = $invoiceData['sale_qty']["$i"] ?? null;

            $product = $invoiceData['item']["$i"];

            // if ($invoiceData['item']["$i"] != $invoiceData['pr_item']["$i"]) {


            //     products::where("product_id", $invoiceData['pr_item']["$i"])->update([
            //         'opening_quantity' => DB::raw("opening_quantity + " . $invoiceData['previous_stock']["$i"])
            //     ]);

            //     products::where("product_id", $invoiceData['item']["$i"])->update([
            //         'opening_quantity' => DB::raw("opening_quantity - " . $invoiceData['sale_qty']["$i"])
            //     ]);
            // }


            products::where("product_id", $invoiceData['pr_item']["$i"])->update([
                'opening_quantity' => DB::raw("opening_quantity + " . $invoiceData['previous_stock']["$i"])
            ]);

            products::where("product_id", $invoiceData['item']["$i"])->update([
                'opening_quantity' => DB::raw("opening_quantity - " . $invoiceData['sale_qty']["$i"])
            ]);



            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] ?? null;
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


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

    public function r_create(Request $post, $id)
    {

        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer = sales_officer::limit(1000)->get();

        $sell_invoice = sell_invoice::where("unique_id", $id)
            ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
            ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
            ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
            ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
            ->get();


        $single_invoice = sell_invoice::where([

            "unique_id" => $id
        ])->limit(1)->get();



        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'single_invoice', 'account');
        return view('invoice.rs_med_invoice')->with($data);
    }






    function r_update(Request $request, $id)
    {


        sell_invoice::where('unique_id', $id)->delete();


        $pr_amount = $request['previous_balance_amount'];
        if ($pr_amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit - " . $pr_amount),
            ]);
        } elseif ($pr_amount <= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit + " . abs($pr_amount)),
            ]);
        }


        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit + " . $amount),
            ]);
        } elseif ($amount <= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => DB::raw("debit - " . abs($amount)),
            ]);
        }




        $invoiceData = $request->all();

        // Assuming all array fields have the same length
        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {
            $invoice = new sell_invoice;
            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;

            $invoice->previous_balance_amount = $invoiceData['balance_amount'] ?? null;

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

            $invoice->account = $invoiceData['account'] ?? null;
            $invoice->cash_method = $invoiceData['cash_method'] ?? null;

            $invoice->pr_item = $invoiceData['item']["$i"] ?? null;



            $invoice->previous_stock = $invoiceData['sale_qty']["$i"] ?? null;

            $product = $invoiceData['item']["$i"];

            // if ($invoiceData['item']["$i"] != $invoiceData['pr_item']["$i"]) {


            //     products::where("product_id", $invoiceData['pr_item']["$i"])->update([
            //         'opening_quantity' => DB::raw("opening_quantity + " . $invoiceData['previous_stock']["$i"])
            //     ]);

            //     products::where("product_id", $invoiceData['item']["$i"])->update([
            //         'opening_quantity' => DB::raw("opening_quantity - " . $invoiceData['sale_qty']["$i"])
            //     ]);
            // }


            products::where("product_id", $invoiceData['pr_item']["$i"])->update([
                'opening_quantity' => DB::raw("opening_quantity + " . $invoiceData['previous_stock']["$i"])
            ]);

            products::where("product_id", $invoiceData['item']["$i"])->update([
                'opening_quantity' => DB::raw("opening_quantity - " . $invoiceData['sale_qty']["$i"])
            ]);




            products::where("product_id", $invoiceData['item']["$i"])->update([
                'opening_quantity' => DB::raw("opening_quantity + " . $invoiceData['return_qty']["$i"])
            ]);


            $invoice->return_qty = $invoiceData['return_qty']["$i"] ?? null;


            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] - $invoiceData['return_qty']["$i"];
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }
}
