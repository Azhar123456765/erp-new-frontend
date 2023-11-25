<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;

use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\seller;

use App\Models\sales_officer;
use App\Models\accounts;
use App\Models\p_voucher;
use App\Models\products;
use App\Models\ReceiptVoucher;
use App\Models\purchase_invoice;
use App\Models\sell_invoice;
use App\Models\zone;
use App\Models\warehouse;
use Illuminate\Support\Facades\DB;

class pdfController extends Controller
{

        public function test_pdf(Request $post)
        {

                return view('pdf.head_pdf');
        }




        public function gen_led(Request $request)
        {


                if (!session()->exists('gen-led-si')) {

                        $start_date = $request->input('start_date');
                        $end_date = $request->input('end_date');


                        // Retrieve form data
                        $account = $request->input('account');
                        $salesOfficer = $request->input('sales_officer');
                        $companyType = $request->input('company_type');
                        $zone = $request->input('warehouse');
                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');


                        // Start building the query
                        $query = sell_invoice::query();

                        if ($account) {
                                $query->where('account', $account);
                        }

                        if ($salesOfficer) {
                                $query->where('sales_officer', $salesOfficer);
                        }

                        if ($zone) {
                                $query->where('warehouse', $zone);
                        }

                        $query->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                                ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                                ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
                                ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                                ->leftJoin('accounts', 'sell_invoice.sales_officer', '=', 'accounts.account_id');

                        if ($startDate && $endDate) {
                                $query->whereBetween('sell_invoice.created_at', [$startDate, $endDate]); // Specify the table alias
                        }




                        $rc = ReceiptVoucher::query();

                        $rc->leftJoin('buyer', 'receipt_vouchers.company', '=', 'buyer.buyer_id');


                        if ($account) {
                                $rc->where('cash_bank', $account);
                        }

                        if ($salesOfficer) {
                                $rc->where('sales_officer', $salesOfficer);
                        }

                        if ($startDate && $endDate) {
                                $rc->whereBetween('receipt_vouchers.created_at', [$startDate, $endDate]); // Specify the table alias
                        }



                        $ledgerDatasi = $query->get();
                        $ledgerDatarc = $rc->get();

                        $credit = $query->sum('amount_paid') + $rc->sum('credit');
                        $debit = $query->sum('previous_balance');
                        $amount = $query->sum('amount_total') + $rc->sum('amount_total');




                        session()->put('gen-led-si', $ledgerDatasi);
                        session()->put('gen-led-rc', $ledgerDatarc);
                        $account_id = $request->input('account');

                        $data = compact('startDate', 'endDate', 'credit', 'debit', 'amount', 'account_id');
                        session()->put('otherData', $data);
                }


                if (session()->has('gen-led-si')) {

                        $views = 'General Ledger';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.gen_led')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget('gen-led-si');
                        session()->forget('gen-led-rc');
                        session()->forget('otherData');

                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }



        public function cus_led(Request $request)
        {

                if (!session()->exists('Data')) {
                        $type = $request->input('type');
                        if ($type == 1) {
                                # code...


                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $customer = $request->input('customer');
                                $salesOfficer = $request->input('sales_officer');
                                $warehouse = $request->input('warehouse');
                                $product_category = $request->input('product_category');
                                $product_company = $request->input('product_company');
                                $product = $request->input('product');



                                $query = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])
                                        ->whereIn('sell_invoice.id', function ($subQuery) {
                                                $subQuery->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        });

                                if ($customer) {
                                        $query->where('company', $customer);
                                }

                                if ($salesOfficer) {
                                        $query->where('sales_officer', $salesOfficer);
                                }
                                
                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }
                                
                                
                                if ($product_category) {
                                        $pr = products::where('category', $product_category)->get();
                                        foreach ($pr as $key => $value) {
                                                $query->where('item', $value->product_id);
                                        }
                                }
                                
                                if ($product_company) {
                                        $pr = products::where('company', $product_company)->get();
                                        foreach ($pr as $key => $value) {
                                                $query->where('item', $value->product_id);
                                        }
                                }
                                if ($product) {
                                        $query->where('item', $product);
                                }

                                $ledgerDatasi = $query->get();
                                $customerData = buyer::where('buyer_id', $customer)->get();
                                foreach ($customerData as $key => $value) {
                                        $customerName = $value->company_name;
                                }


                                $debit1 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_paid');

                                $debit2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('receipt_vouchers')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $debit = $debit1 ?? 0 + $debit2 ?? 0;

                                $credit1 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.created_at)'), [$startDate, $endDate])
                                        ->whereIn('payment_voucher.id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('payment_voucher')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $credit2 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('grand_total');
                                $credit = $credit1 + $credit2;
                                $balance = $debit ?? 0 - $credit ?? 0;

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' =>  $ledgerDatasi->sum('amount_paid'),
                                        'grand_total' =>  $balance,
                                        'total_amount' =>  $ledgerDatasi->sum('amount_total'),
                                        'debit' =>  $ledgerDatasi->sum('previous_balance'),
                                        'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'customerName' => $customerName ?? '',
                                        'type' => $type,

                                ];

                                session()->put('Data', $data);
                        }

                        if ($type == 2) {

                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $customer = $request->input('customer');

                                // Start building the query
                                $query = ReceiptVoucher::query()
                                        ->whereBetween(DB::raw('DATE(receipt_vouchers.created_at)'), [$startDate, $endDate])
                                        ->where('receipt_vouchers.company', $customer)  // Specify 'receipt_vouchers.company'
                                ;

                                $ledgerDatasi = $query->leftJoin('buyer', 'buyer.buyer_id', '=', DB::raw('LEFT(receipt_vouchers.company, LENGTH(receipt_vouchers.company) - 1)'))
                                        ->get();

                                $customerData = buyer::where('buyer_id', $customer)->get();
                                foreach ($customerData as $key => $value) {
                                        $customerName = $value->company_name;
                                        $customerDebit = $value->debit;
                                }

                                $debit1 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_paid');

                                $debit2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('receipt_vouchers')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $debit = $debit1 ?? 0 + $debit2 ?? 0;

                                $credit1 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.created_at)'), [$startDate, $endDate])
                                        ->whereIn('payment_voucher.id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('payment_voucher')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $credit2 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('grand_total');
                                $credit = $credit1 + $credit2;
                                $balance = $debit ?? 0 - $credit ?? 0;

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' =>  $ledgerDatasi->sum('invoice.balance_amount') - $ledgerDatasi->sum('amount'),
                                        'total_amount' =>  $ledgerDatasi->sum('amount'),
                                        'debit' =>  $balance,
                                        'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'customerName' => $customerName,
                                        'type' => $type,

                                ];

                                session()->put('Data', $data);
                        }
                }


                if (session()->has('Data')) {

                        $views = 'Customer Ledger';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.cus_led')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();;
                        session()->forget('Data');

                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }


        public function supplier_led(Request $request)
        {

                if (!session()->exists('Data')) {
                        $type = $request->input('type');

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $supplier = $request->input('supplier');

                        // Start building the query
                        $query = purchase_invoice::whereBetween(DB::raw('DATE(purchase_invoice.created_at)'), [$startDate, $endDate])
                                ->where('company', $supplier)
                                ->whereIn('purchase_invoice.id', function ($subQuery) {
                                        $subQuery->select(DB::raw('MIN(id)'))
                                                ->from('purchase_invoice')
                                                ->groupBy('unique_id');
                                });

                        $ledgerDatasi = $query->get();
                        $supplierData = seller::where('seller_id', $supplier)->get();
                        foreach ($supplierData as $key => $value) {
                                $supplierName = $value->company_name;
                        }

                        $credit1 = purchase_invoice::where('company', $supplier)->whereBetween(DB::raw('DATE(purchase_invoice.created_at)'), [$startDate, $endDate])
                                ->whereIn('id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('purchase_invoice')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');


                        $credit2 = p_voucher::where('company', $supplier)->where('company_ref', 'S')->whereBetween(DB::raw('DATE(payment_voucher.created_at)'), [$startDate, $endDate])
                                ->whereIn('payment_voucher.id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('payment_voucher')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');

                        $debit = ReceiptVoucher::where('company', $supplier)->where('company_ref', 'S')->whereBetween(DB::raw('DATE(receipt_vouchers.created_at)'), [$startDate, $endDate])
                                ->whereIn('receipt_vouchers.id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('receipt_vouchers')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');

                        $balance = $credit1 + $credit2 - $debit;

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' =>  $ledgerDatasi->sum('amount_paid'),
                                'total_amount' =>  $ledgerDatasi->sum('amount_total'),
                                'debit' =>  $balance,
                                'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'supplierName' => $supplierName,
                                'type' => $type,

                        ];

                        session()->put('Data', $data);
                }


                if (session()->has('Data')) {

                        $views = 'Supplier Ledger';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.supplier_led')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();;
                        session()->forget('Data');

                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }


        public function pdf_limit(Request  $post, $view)
        {

                if (!session()->exists('pdf_data')) {
                        if ($post['limit'] >= 500) {
                                $limit = 500;
                        } else {
                                $limit = $post['limit'];
                        }
                        if ($view == 'users') {

                                $pdf = users::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Suppliers");
                        } elseif ($view == 'buyer') {

                                $pdf = buyer::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Buyers");
                        } elseif ($view == 'zone') {

                                $pdf = zone::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "zones");
                        } elseif ($view == 'warehouse') {

                                $pdf = warehouse::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Warehouses");
                        } elseif ($view == 'sales_officer') {

                                $pdf = sales_officer::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "sales officers");
                        } elseif ($view == 'account') {

                                $pdf = accounts::limit($limit)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Accounts");
                        }
                }

                if (session()->has('pdf_data')) {

                        $views = $view;

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.main')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget("pdf_data");
                        session()->forget("pdf_title");
                        return $pdf->stream($views . '-' . rand(1111, 9999));
                }
        }



        public function pdf(Request  $post, $view)
        {

                if (!session()->has('pdf_data')) {

                        if ($view == 'users') {

                                $pdf = users::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Suppliers");
                        } elseif ($view == 'buyer') {

                                $pdf = buyer::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Buyers");
                        } elseif ($view == 'zone') {

                                $pdf = zone::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "zones");
                        } elseif ($view == 'warehouse') {

                                $pdf = warehouse::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Warehouses");
                        } elseif ($view == 'sales_officer') {

                                $pdf = sales_officer::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "sales officers");
                        } elseif ($view == 'account') {

                                $pdf = accounts::limit(500)->get();

                                session()->put("pdf_data", $pdf);
                                session()->put("pdf_title", "Accounts");
                        }
                }

                if (session()->has('pdf_data')) {

                        $views = $view;

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.main')->with($data)->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget("pdf_data");
                        session()->forget("pdf_title");
                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }




        public function profit_rep(Request $request)
        {


                if (!session()->exists('Data')) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Start building the query
                        $query1 = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate])->whereIn('sell_invoice.id', function ($subQuery) {
                                $subQuery->select(DB::raw('MIN(id)'))
                                        ->from('sell_invoice')
                                        ->groupBy('unique_id');
                        })->get();
                        $query2 = purchase_invoice::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])->whereIn('purchase_invoice.id', function ($subQuery) {
                                $subQuery->select(DB::raw('MIN(id)'))
                                        ->from('purchase_invoice')
                                        ->groupBy('unique_id');
                        })->get();
                        $query3 = ReceiptVoucher::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
                                ->whereIn('receipt_vouchers.id', function ($subQuery) {
                                        $subQuery->select(DB::raw('MIN(id)'))
                                                ->from('receipt_vouchers')
                                                ->groupBy('unique_id');
                                })->get();
                        $query4 = p_voucher::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])->whereIn('payment_voucher.id', function ($subQuery) {
                                $subQuery->select(DB::raw('MIN(id)'))
                                        ->from('payment_voucher')
                                        ->groupBy('unique_id');
                        })->get();


                        // $credit = $query->sum('amount_paid') + $rc->sum('credit');
                        // $debit = $query->sum('previous_balance');
                        // $amount = $query->sum('amount_total') + $rc->sum('amount_total');


                        $data = [
                                'query1' => $query1,
                                'query2' => $query2,
                                'query3' => $query3,
                                'query4' => $query4,
                                'debit' => $query3->sum('amount_total') + $query1->sum('amount_paid'),
                                'credit' => $query2->sum('amount_total') + $query4->sum('amount_total'),
                                '' => $query4,
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                        ];
                        session()->put('Data', $data);
                }


                if (session()->has('Data')) {

                        $views = 'Profit Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.profit')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget('Data');
                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }

        public function stock_rep(Request $request)
        {


                if (!session()->exists('Data')) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');
                        $product = $request->input('product');
                        $warehouse = $request->input('warehouse');

                        if ($product != null) {
                                $query = sell_invoice::query();

                                if ($product) {
                                        $query->where('item', $product);
                                }
                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }

                                $query->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate]);


                                $query2 = purchase_invoice::query();

                                if ($product) {
                                        $query2->where('item', $product);
                                }
                                if ($warehouse) {
                                        $query2->where('warehouse', $warehouse);
                                }

                                $query2->whereBetween(DB::raw('DATE(purchase_invoice.created_at)'), [$startDate, $endDate]);
                                $data1 = $query->get();
                                $data2 = $query2->get();

                                $products = products::where('product_id', $product)->get();
                                foreach ($products as $key => $value) {
                                        $product_name = $value->product_name;
                                }
                                $warehouses = warehouse::where('warehouse_id', $warehouse)->get();
                                foreach ($warehouses as $key => $value) {
                                        $warehouse_name = $value->warehouse_name;
                                }
                                $data = [
                                        'query' => $data1,
                                        'query2' => $data2,
                                        'sale_qty' => $data1->sum('sale_qty'),
                                        'pur_qty' => $data2->sum('pur_qty'),
                                        'avail_qty' => $data2->sum('pur_qty') - $data1->sum('sale_qty'),
                                        'warehouse' => $warehouse_name ?? 'All',
                                        'product' => $product_name,
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => 1,
                                ];
                                session()->put('Data', $data);
                        } else {

                                $query = sell_invoice::query();

                                if ($product) {
                                        $query->where('item', $product);
                                }
                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }

                                $query->whereBetween(DB::raw('DATE(sell_invoice.created_at)'), [$startDate, $endDate]);

                                $query2 = purchase_invoice::query();

                                if ($product) {
                                        $query2->where('item', $product);
                                }
                                if ($warehouse) {
                                        $query2->where('warehouse', $warehouse);
                                }

                                $query2->whereBetween(DB::raw('DATE(purchase_invoice.created_at)'), [$startDate, $endDate]);

                                $data1 = $query->get();
                                $data2 = $query2->get();

                                $products = products::where('product_id', $product)->get();
                                foreach ($products as $key => $value) {
                                        $product_name = $value->product_name;
                                }
                                $warehouses = warehouse::where('warehouse_id', $warehouse)->get();
                                foreach ($warehouses as $key => $value) {
                                        $warehouse_name = $value->warehouse_name;
                                }
                                $data = [
                                        'query' => $data1,
                                        'query2' => $data2,
                                        'sale_qty' => $data1->sum('sale_qty'),
                                        'pur_qty' => $data2->sum('pur_qty'),
                                        'avail_qty' => $data2->sum('pur_qty') - $data1->sum('sale_qty'),
                                        'warehouse' => $warehouse_name ?? 'All',
                                        'product' => $product_name ?? 'All',
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => 2,
                                ];
                                session()->put('Data', $data);
                        }
                }


                if (session()->has('Data')) {

                        $views = 'Stock Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.stock')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget('Data');
                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }



        public function warehouse_rep(Request $request)
        {


                if (!session()->exists('Data')) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');
                        $warehouse = $request->input('warehouse');

                        $query = purchase_invoice::query();
                        $query->whereBetween(DB::raw('DATE(purchase_invoice.created_at)'), [$startDate, $endDate]);
                        $data1 = $query->get();

                        $warehouses = warehouse::where('warehouse_id', $warehouse)->get();
                        foreach ($warehouses as $key => $value) {
                                $warehouse_name = $value->warehouse_name;
                        }
                        $data = [
                                'query' => $data1,
                                'qty' => $data1->sum('pur_qty'),
                                'warehouse' => $warehouse_name ?? '',
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                        ];
                        session()->put('Data', $data);
                }


                if (session()->has('Data')) {

                        $views = 'Warehouse Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.warehouse_rep')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget('Data');
                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }


        public function pdf_check(Request $request)
        {
                $pdf = users::limit(10)->get();

                return response()->json($pdf);
        }



        public function pdf_all(Request  $post)
        {


                if (session()->has('pdf_data')) {

                        $pdf = new Dompdf();

                        $html = view('pdf.main')->render();

                        $pdf->loadHtml($html);
                        $pdf->setPaper('A4', 'portrait');

                        $pdf->render();

                        return $pdf->stream("P" . '-' . rand(1111, 9999) . '.pdf');
                        session()->forget('pdf_data');
                }
        }


        function sale_invoice_pdf(Request $post, $id)
        {


                $sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->get();

                $s_sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->put("sale_invoice_pdf_data", $sell_invoice);
                session()->put("s_sale_invoice_pdf_data", $s_sell_invoice);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.sale_pdf')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
        }


        function purchase_invoice_pdf(Request $post, $id)
        {


                $purchase_invoice = purchase_invoice::where("unique_id", $id)
                        ->leftJoin('seller', 'purchase_invoice.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'purchase_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'purchase_invoice.item', '=', 'products.product_id')
                        ->get();

                $s_purchase_invoice = purchase_invoice::where("unique_id", $id)
                        ->leftJoin('seller', 'purchase_invoice.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'purchase_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'purchase_invoice.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->put("purchase_invoice_pdf_data", $purchase_invoice);
                session()->put("s_purchase_invoice_pdf_data", $s_purchase_invoice);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.purchase_pdf')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
        }








        function pv_pdf(Request $post, $id)
        {


                $p_voucher = p_voucher::where("unique_id", $id)
                        ->leftJoin('seller', 'payment_voucher.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'payment_voucher.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'payment_voucher.item', '=', 'products.product_id')
                        ->get();

                $s_p_voucher = p_voucher::where("unique_id", $id)
                        ->leftJoin('seller', 'payment_voucher.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'payment_voucher.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'payment_voucher.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->put("p_voucher_pdf_data", $p_voucher);
                session()->put("s_p_voucher_pdf_data", $s_p_voucher);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.p_voucher')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
        }



        function rv_pdf(Request $post, $id)
        {


                $receipt_vouchers = ReceiptVoucher::where("unique_id", $id)
                        ->leftJoin('seller', 'receipt_vouchers.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'receipt_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->get();

                $s_receipt_vouchers = ReceiptVoucher::where("unique_id", $id)
                        ->leftJoin('seller', 'receipt_vouchers.company', '=', 'seller.seller_id')
                        ->leftJoin('sales_officer', 'receipt_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->limit(1)->get();

                session()->put("receipt_vouchers_pdf_data", $receipt_vouchers);
                session()->put("s_receipt_vouchers_pdf_data", $s_receipt_vouchers);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.r_voucher')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
        }
}
