<?php

namespace App\Http\Controllers;

use App\Models\chickenInvoice;
use App\Models\ChickInvoice;
use App\Models\ExpenseVoucher;
use App\Models\feedInvoice;
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
use App\Models\purchase_return;
use App\Models\sale_return;
use App\Models\sell_invoice;
use App\Models\zone;
use App\Models\warehouse;
use Illuminate\Support\Facades\DB;
use PurchaseInvoice;

class pdfController extends Controller
{


        public function test_pdf(Request $post)
        {

                return view('pdf.head_pdf');
        }




        public function gen_led(Request $request)
        {


                if (!session()->exists('Data')) {

                        $start_date = $request->input('start_date');
                        $end_date = $request->input('end_date');

                        $account_id = $request->input('account');
                        $account = accounts::where('account_id', $account_id)->first();
                        $salesOfficer = $request->input('sales_officer');
                        // $accountType = $request->input('account_type');
                        // $zone = $request->input('warehouse');
                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        $type = $request->input('type');

                        if ($type == 1) {
                                $chickenInvoice = chickenInvoice::query();

                                if ($account) {
                                        $chickenInvoice->where('buyer', $account->reference_id)->orWhere('seller', $account->reference_id);
                                }
                                if ($salesOfficer) {
                                        $chickenInvoice->where('sales_officer', $salesOfficer);
                                }

                                // dd($chickenInvoice->get());
                                $chickInvoice = chickInvoice::query();

                                if ($account) {
                                        $chickInvoice->where('buyer', $account->reference_id)->orWhere('seller', $account->reference_id);
                                }
                                if ($salesOfficer) {
                                        $chickInvoice->where('sales_officer', $salesOfficer);
                                }

                                $feedInvoice = feedInvoice::query();

                                if ($account) {
                                        $feedInvoice->where('buyer', $account->reference_id)->orWhere('seller', $account->reference_id);
                                }
                                if ($salesOfficer) {
                                        $feedInvoice->where('sales_officer', $salesOfficer);
                                }

                                $payment_voucher = p_voucher::query();

                                if ($account) {
                                        $payment_voucher->where('cash_bank', $account_id)->orWhere('company', $account->reference_id);
                                }
                                if ($salesOfficer) {
                                        $payment_voucher->where('sales_officer', $salesOfficer);
                                }


                                $receipt_voucher = ReceiptVoucher::query();

                                if ($account) {
                                        $receipt_voucher->where('cash_bank', $account_id);
                                }
                                if ($salesOfficer) {
                                        $receipt_voucher->where('sales_officer', $salesOfficer);
                                }

                                $expense_voucher = ExpenseVoucher::query();

                                if ($account) {
                                        $expense_voucher->where('cash_bank', $account_id);
                                }
                                if ($salesOfficer) {
                                        $expense_voucher->where('sales_officer', $salesOfficer);
                                }
                                $single_data = accounts::where('account_id', $account_id)->first();

                                $chickenInvoice = $chickenInvoice->orderBy('date', 'asc')->get();
                                $chickInvoice = $chickInvoice->orderBy('date', 'asc')->get();
                                $feedInvoice = $feedInvoice->orderBy('date', 'asc')->get();
                                $payment_voucher = $payment_voucher->orderBy('date', 'asc')->get();
                                $receipt_voucher = $receipt_voucher->orderBy('date', 'asc')->get();
                                $expense_voucher = $expense_voucher->orderBy('date', 'asc')->get();

                                $chickenInvoice = $chickenInvoice->groupBy('unique_id')->map(function ($group) {
                                        $description = $group->map(function ($item) {
                                                return $item->product->product_name;
                                        })->join(', ');

                                        $groupedData = new \stdClass();
                                        $groupedData->date = $group->first()->date;
                                        $groupedData->unique_id = $group->first()->unique_id;
                                        $groupedData->description = $description;
                                        $groupedData->seller = $group->first()->seller;
                                        $groupedData->buyer = $group->first()->buyer;
                                        $groupedData->sale_amount_total = $group->first()->sale_amount_total;
                                        $groupedData->amount_total = $group->first()->amount_total;

                                        return $groupedData;
                                });
                                $chickInvoice = $chickInvoice->groupBy('unique_id')->map(function ($group) {
                                        $description = $group->map(function ($item) {
                                                return $item->product->product_name;
                                        })->join(', ');

                                        $groupedData = new \stdClass();
                                        $groupedData->date = $group->first()->date;
                                        $groupedData->unique_id = $group->first()->unique_id;
                                        $groupedData->description = $description;
                                        $groupedData->seller = $group->first()->seller;
                                        $groupedData->buyer = $group->first()->buyer;
                                        $groupedData->sale_amount_total = $group->first()->sale_amount_total;
                                        $groupedData->amount_total = $group->first()->amount_total;

                                        return $groupedData;
                                });
                                $feedInvoice = $feedInvoice->groupBy('unique_id')->map(function ($group) {
                                        $description = $group->map(function ($item) {
                                                return $item->product->product_name;
                                        })->join(', ');

                                        $groupedData = new \stdClass();
                                        $groupedData->date = $group->first()->date;
                                        $groupedData->unique_id = $group->first()->unique_id;
                                        $groupedData->description = $description;
                                        $groupedData->seller = $group->first()->seller;
                                        $groupedData->buyer = $group->first()->buyer;
                                        $groupedData->sale_amount_total = $group->first()->sale_amount_total;
                                        $groupedData->amount_total = $group->first()->amount_total;

                                        return $groupedData;
                                });
                                // $payment_voucher = $payment_voucher->groupBy('unique_id')->map(function ($group) {
                                //         $description = $group->map(function ($item) {
                                //                 return $item->narration;
                                //         })->join(', ');

                                //         $groupedData = new \stdClass();
                                //         $groupedData->date = $group->first()->date;
                                //         $groupedData->unique_id = $group->first()->unique_id;
                                //         $groupedData->narration = $description;
                                //         $groupedData->company = $group->first()->company;
                                //         $groupedData->amount_total = $group->first()->amount;

                                //         return $groupedData;
                                // });

                                // dd($feedInvoiceGrouped);
                                $data = [
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'single_data' => $single_data,
                                        'chickenInvoice' => $chickenInvoice,
                                        'chickInvoice' => $chickInvoice,
                                        'feedInvoice' => $feedInvoice,
                                        'payment_voucher' => $payment_voucher,
                                        'receipt_voucher' => $receipt_voucher,
                                        'expense_voucher' => $expense_voucher,
                                        'account' => $account->reference_id,
                                        'type' => $type
                                ];
                                session()->flash('Data', $data);
                        }
                        //    elseif ($type == 2) {
                        //         $query = sell_invoice::whereBetween('sell_invoice.created_at', [$startDate, $endDate]);

                        //         if ($account) {
                        //                 $query->where('account', $account);
                        //         }

                        //         if ($salesOfficer) {
                        //                 $query->where('sales_officer', $salesOfficer);
                        //         }

                        //         if ($zone) {
                        //                 $query->where('warehouse', $zone);
                        //         }


                        //         $query2 = ReceiptVoucher::whereBetween('receipt_vouchers.created_at', [$startDate, $endDate]);


                        //         if ($account) {
                        //                 $query2->where('cash_bank', $account);
                        //         }

                        //         if ($salesOfficer) {
                        //                 $query2->where('sales_officer', $salesOfficer);
                        //         }

                        //         if ($zone) {
                        //                 $query2->where('warehouse', $zone);
                        //         }

                        //         $query3 = purchase_invoice::whereBetween('purchase_invoice.created_at', [$startDate, $endDate]);

                        //         if ($account) {
                        //                 $query3->where('freighta', $account);
                        //                 $query3->where('sales_taxa', $account);
                        //                 $query3->where('ad_sales_taxa', $account);
                        //                 $query3->where('banka', $account);
                        //                 $query3->where('other_expensea', $account);
                        //         }

                        //         if ($salesOfficer) {
                        //                 $query3->where('sales_officer', $salesOfficer);
                        //         }

                        //         if ($zone) {
                        //                 $query3->where('warehouse', $zone);
                        //         }

                        //         $query4 = p_voucher::whereBetween('payment_voucher.created_at', [$startDate, $endDate]);


                        //         if ($account) {
                        //                 $query4->where('cash_bank', $account);
                        //         }

                        //         if ($salesOfficer) {
                        //                 $query4->where('sales_officer', $salesOfficer);
                        //         }

                        //         if ($zone) {
                        //                 $query4->where('warehouse', $zone);
                        //         }

                        //         $ledgerDatasi = $query->get();
                        //         $ledgerDatarv = $query2->get();
                        //         $ledgerDatapi = $query3->get();
                        //         $ledgerDatapv = $query4->get();


                        //         $data = [
                        //                 'startDate' => $startDate,
                        //                 'endDate' => $endDate,
                        //                 'account' => $account,
                        //                 'ledgerDatasi' => $ledgerDatasi,
                        //                 'ledgerDatarv' => $ledgerDatarv,
                        //                 'ledgerDatapi' => $ledgerDatapi,
                        //                 'ledgerDatapv' => $ledgerDatapv,
                        //                 'type' => $type
                        //         ];
                        //         session()->flash('Data', $data);
                        // }
                }


                if (session()->has('Data')) {

                        $views = 'General Ledger';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.ledger.gen_led')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();

                        session()->forget('Data');

                        return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
                }
        }


        public function sale_report(Request $request)
        {
                $type = $request['type'];
                if ($type == 1) {
                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;



                        $chickenInvoice = chickenInvoice::query();
                        if ($customer) {
                                $chickenInvoice->where('buyer', $customer);
                        }

                        if ($salesOfficer) {
                                $chickenInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $chickenInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $chickenInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $chickenInvoice->where('item', $product);
                        }

                        $chickInvoice = ChickInvoice::query();
                        if ($customer) {
                                $chickInvoice->where('buyer', $customer);
                        }

                        if ($salesOfficer) {
                                $chickInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $chickInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $chickInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $chickInvoice->where('item', $product);
                        }

                        $feedInvoice = feedInvoice::query();
                        if ($customer) {
                                $feedInvoice->where('buyer', $customer);
                        }

                        if ($salesOfficer) {
                                $feedInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $feedInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $feedInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $feedInvoice->where('item', $product);
                        }

                        $chickenData = $chickenInvoice->orderBy('date', 'asc')->get();
                        $chickData = $chickInvoice->orderBy('date', 'asc')->get();
                        $feedData = $feedInvoice->orderBy('date', 'asc')->get();

                        $data = [
                                'chickenData' => $chickenData,
                                'chickData' => $chickData,
                                'feedData' => $feedData,
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                } elseif ($type == 2) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;

                        $query = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate]);

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
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $query->where('item', $product);
                        }

                        $query->orderBy('created_at'); // Order by date within each group


                        $ledgerDatasi = $query->get();
                        foreach ($ledgerDatasi as $key => $row) {

                                $columnValues[] = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])->where('unique_id', $row->unique_id)->pluck('unique_id');
                        }

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' => $ledgerDatasi->sum('amount_paid'),
                                'total_amount' => $ledgerDatasi->sum('amount_total'),
                                'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                'qty_total' => $ledgerDatasi->sum('qty_total'),
                                'dis_total' => $ledgerDatasi->sum('dis_total'),
                                'amount_total' => $ledgerDatasi->sum('amount_total'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                } elseif ($type == 3) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;

                        $query = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate]);

                        if ($customer) {
                                $query->where('sell_invoice.company', $customer);
                        }

                        if ($salesOfficer) {
                                $query->where('sales_officer', $salesOfficer);
                        }

                        if ($warehouse) {
                                $query->where('warehouse', $warehouse);
                        }

                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $product_data = Products::where('category', $product_category)->get();
                                $query->whereIn('item', $productIds)->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id');
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds)->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id');
                        }
                        if ($product) {
                                $query->where('item', $product);
                        }

                        $query->orderBy('products.product_id'); // Order by date within each group


                        $ledgerDatasi = $query->get();

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' => $ledgerDatasi->sum('amount_paid'),
                                'total_amount' => $ledgerDatasi->sum('amount_total'),
                                'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                'qty_total' => $ledgerDatasi->sum('qty_total'),
                                'dis_total' => $ledgerDatasi->sum('dis_total'),
                                'amount_total' => $ledgerDatasi->sum('amount_total'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                }


                if (session()->has('Data')) {

                        $views = 'Customer Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.sale_report')->render();

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







        public function sale_r_report(Request $request)
        {

                $type = $request['type'];
                if ($type == 1) {
                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;



                        $query = sale_return::whereBetween(DB::raw('DATE(sale_returns.updated_at)'), [$startDate, $endDate])
                                ->whereIn('sale_returns.id', function ($subQuery) {
                                        $subQuery->select(DB::raw('MIN(id)'))
                                                ->from('sale_returns')
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
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $query->where('item', $product);
                        }

                        $ledgerDatasi = $query->get();

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' => $ledgerDatasi->sum('amount_paid'),
                                'total_amount' => $ledgerDatasi->sum('amount_total'),
                                'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                } elseif ($type == 2) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;

                        $query = sale_return::whereBetween(DB::raw('DATE(sale_returns.updated_at)'), [$startDate, $endDate]);

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
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $query->where('item', $product);
                        }

                        $query->orderBy('created_at'); // Order by date within each group


                        $ledgerDatasi = $query->get();

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' => $ledgerDatasi->sum('amount_paid'),
                                'total_amount' => $ledgerDatasi->sum('amount_total'),
                                'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                'qty_total' => $ledgerDatasi->sum('qty_total'),
                                'dis_total' => $ledgerDatasi->sum('dis_total'),
                                'amount_total' => $ledgerDatasi->sum('amount_total'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                }


                if (session()->has('Data')) {

                        $views = 'Sale Return Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.sale_r_report')->render();

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

        public function pur_report(Request $request)
        {

                if (!session()->exists('Data')) {
                        $type = $request['type'];
                        if ($type == 1) {
                                # code...

                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $supplier = $request->input('customer');
                                $salesOfficer = $request->input('sales_officer');
                                $warehouse = $request->input('warehouse');
                                $product_category = $request->input('product_category');
                                $product_company = $request->input('product_company');
                                $product = $request->input('product');
                                $product_id = [];




                                $chickenInvoice = chickenInvoice::query();
                                if ($supplier) {
                                        $chickenInvoice->where('seller', $supplier);
                                }

                                if ($salesOfficer) {
                                        $chickenInvoice->where('sales_officer', $salesOfficer);
                                }
                                if ($product_category) {
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $chickenInvoice->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $chickenInvoice->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $chickenInvoice->where('item', $product);
                                }

                                $chickInvoice = ChickInvoice::query();
                                if ($supplier) {
                                        $chickInvoice->where('seller', $supplier);
                                }

                                if ($salesOfficer) {
                                        $chickInvoice->where('sales_officer', $salesOfficer);
                                }
                                if ($product_category) {
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $chickInvoice->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $chickInvoice->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $chickInvoice->where('item', $product);
                                }

                                $feedInvoice = feedInvoice::query();
                                if ($supplier) {
                                        $feedInvoice->where('seller', $supplier);
                                }

                                if ($salesOfficer) {
                                        $feedInvoice->where('sales_officer', $salesOfficer);
                                }
                                if ($product_category) {
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $feedInvoice->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $feedInvoice->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $feedInvoice->where('item', $product);
                                }

                                $chickenData = $chickenInvoice->orderBy('date', 'asc')->get();
                                $chickData = $chickInvoice->orderBy('date', 'asc')->get();
                                $feedData = $feedInvoice->orderBy('date', 'asc')->get();

                                $data = [
                                        'chickenData' => $chickenData,
                                        'chickData' => $chickData,
                                        'feedData' => $feedData,
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => $type,
                                ];

                                session()->flash('Data', $data);
                        } elseif ($type == 2) {
                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $supplier = $request->input('supplier');
                                $salesOfficer = $request->input('sales_officer');
                                $warehouse = $request->input('warehouse');
                                $product_category = $request->input('product_category');
                                $product_company = $request->input('product_company');
                                $product = $request->input('product');
                                $product_id = [];




                                $query = purchase_invoice::whereBetween(DB::raw('DATE(purchase_invoice.updated_at)'), [$startDate, $endDate]);

                                if ($supplier) {
                                        $query->where('company', $supplier);
                                }

                                if ($salesOfficer) {
                                        $query->where('sales_officer', $salesOfficer);
                                }

                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }

                                if ($product_category) {
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $query->where('item', $product);
                                }

                                $query->orderBy('created_at');
                                $ledgerDatasi = $query->get();

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' => $ledgerDatasi->sum('amount_paid'),
                                        'total_amount' => $ledgerDatasi->sum('amount_total'),
                                        'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => $type,
                                ];

                                session()->flash('Data', $data);
                        }
                }


                if (session()->has('Data')) {

                        $views = 'Supplier Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.pur_report')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();
                        ;
                        session()->forget('Data');

                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }


        public function pur_r_report(Request $request)
        {

                if (!session()->exists('Data')) {
                        $type = $request['type'];
                        if ($type == 1) {
                                # code...

                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $supplier = $request->input('supplier');
                                $salesOfficer = $request->input('sales_officer');
                                $warehouse = $request->input('warehouse');
                                $product_category = $request->input('product_category');
                                $product_company = $request->input('product_company');
                                $product = $request->input('product');
                                $product_id = [];




                                $query = purchase_return::whereBetween(DB::raw('DATE(purchase_returns.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('purchase_returns.id', function ($subQuery) {
                                                $subQuery->select(DB::raw('MIN(id)'))
                                                        ->from('purchase_returns')
                                                        ->groupBy('unique_id');
                                        });

                                if ($supplier) {
                                        $query->where('company', $supplier);
                                }

                                if ($salesOfficer) {
                                        $query->where('sales_officer', $salesOfficer);
                                }

                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }

                                if ($product_category) {
                                        //I want to get data where category
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $query->where('item', $product);
                                }

                                $ledgerDatasi = $query->get();

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' => $ledgerDatasi->sum('amount_paid'),
                                        'total_amount' => $ledgerDatasi->sum('amount_total'),
                                        'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => $type,
                                ];

                                session()->flash('Data', $data);
                        } elseif ($type == 2) {
                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $supplier = $request->input('supplier');
                                $salesOfficer = $request->input('sales_officer');
                                $warehouse = $request->input('warehouse');
                                $product_category = $request->input('product_category');
                                $product_company = $request->input('product_company');
                                $product = $request->input('product');
                                $product_id = [];




                                $query = purchase_return::whereBetween(DB::raw('DATE(purchase_returns.updated_at)'), [$startDate, $endDate]);

                                if ($supplier) {
                                        $query->where('company', $supplier);
                                }

                                if ($salesOfficer) {
                                        $query->where('sales_officer', $salesOfficer);
                                }

                                if ($warehouse) {
                                        $query->where('warehouse', $warehouse);
                                }

                                if ($product_category) {
                                        $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }

                                if ($product_company) {
                                        $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                        $query->whereIn('item', $productIds);
                                }
                                if ($product) {
                                        $query->where('item', $product);
                                }

                                $query->orderBy('created_at');
                                $ledgerDatasi = $query->get();

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' => $ledgerDatasi->sum('amount_paid'),
                                        'total_amount' => $ledgerDatasi->sum('amount_total'),
                                        'balance_amount' => $ledgerDatasi->sum('amount_total'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'type' => $type,
                                ];

                                session()->flash('Data', $data);
                        }
                }


                if (session()->has('Data')) {

                        $views = 'Purchase Return Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.pur_r_report')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'portrait');
                        } else {
                                $pdf->setPaper('A4', 'portrait');
                        }
                        $pdf->render();
                        ;
                        session()->forget('Data');

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
                                $product_id = null;



                                $query = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
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
                                                $product_id = $value->product_id;
                                        }
                                        $query->where('item', $product_id);
                                }

                                if ($product_company) {
                                        $pr = products::where('company', $product_company)->get();
                                        foreach ($pr as $key => $value) {
                                                $product_id = $value->product_id;
                                        }
                                        $query->where('item', $product_id);
                                }
                                if ($product) {
                                        $query->where('item', $product);
                                }

                                $ledgerDatasi = $query->get();
                                $customerData = buyer::where('buyer_id', $customer)->get();
                                foreach ($customerData as $key => $value) {
                                        $customerName = $value->company_name;
                                }


                                // $debit1 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                //         ->whereIn('id', function ($query2) {
                                //                 $query2->select(DB::raw('MIN(id)'))
                                //                         ->from('sell_invoice')
                                //                         ->groupBy('unique_id');
                                //         })->sum('amount_paid');

                                // $debit2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                //         ->whereIn('id', function ($query2) {
                                //                 $query2->select(DB::raw('MIN(id)'))
                                //                         ->from('receipt_vouchers')
                                //                         ->groupBy('unique_id');
                                //         })->sum('amount_total');

                                // $debit = $debit1 ?? 0 + $debit2 ?? 0;

                                // $credit1 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.updated_at)'), [$startDate, $endDate])
                                //         ->whereIn('payment_voucher.id', function ($query2) {
                                //                 $query2->select(DB::raw('MIN(id)'))
                                //                         ->from('payment_voucher')
                                //                         ->groupBy('unique_id');
                                //         })->sum('amount_total');

                                // $credit2 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                //         ->whereIn('id', function ($query2) {
                                //                 $query2->select(DB::raw('MIN(id)'))
                                //                         ->from('sell_invoice')
                                //                         ->groupBy('unique_id');
                                //         })->sum('grand_total');
                                // $credit = $credit1 + $credit2;
                                // $balance = $debit ?? 0 - $credit ?? 0;

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' => $ledgerDatasi->sum('amount_paid'),
                                        'total_amount' => $ledgerDatasi->sum('amount_total'),
                                        'debit' => $ledgerDatasi->sum('previous_balance'),
                                        'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'customerName' => $customerName ?? 'Not Selected',
                                        'type' => $type,

                                ];

                                session()->flash('Data', $data);
                        }

                        if ($type == 2) {

                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');

                                // Retrieve form data
                                $customer = $request->input('customer');

                                // Start building the query
                                $query = ReceiptVoucher::query()
                                        ->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                        ->where('receipt_vouchers.company', $customer)  // Specify 'receipt_vouchers.company'
                                ;

                                $ledgerDatasi = $query->leftJoin('buyer', 'buyer.buyer_id', '=', DB::raw('LEFT(receipt_vouchers.company, LENGTH(receipt_vouchers.company) - 1)'))
                                        ->get();

                                $customerData = buyer::where('buyer_id', $customer)->get();
                                foreach ($customerData as $key => $value) {
                                        $customerName = $value->company_name;
                                        $customerDebit = $value->debit;
                                }

                                $debit1 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_paid');

                                $debit2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('receipt_vouchers')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $debit = $debit1 ?? 0 + $debit2 ?? 0;

                                $credit1 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('payment_voucher.id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('payment_voucher')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $credit2 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('grand_total');
                                $credit = $credit1 + $credit2;
                                $balance = $debit ?? 0 - $credit ?? 0;

                                $data = [
                                        'invoice' => $ledgerDatasi,
                                        'credit' => $ledgerDatasi->sum('invoice.balance_amount') - $ledgerDatasi->sum('amount'),
                                        'total_amount' => $ledgerDatasi->sum('amount'),
                                        'debit' => $balance,
                                        'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'customerName' => $customerName,
                                        'type' => $type,

                                ];

                                session()->flash('Data', $data);
                        }

                        $type = $request->input('type');
                        if ($type == 3) {

                                $startDate = $request->input('start_date');
                                $endDate = $request->input('end_date');
                                $customer = $request->input('customer');

                                $query = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                        ->where('company', $customer)
                                        ->whereIn('sell_invoice.id', function ($subQuery) {
                                                $subQuery->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        });

                                $query2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('receipt_vouchers')
                                                        ->groupBy('unique_id');
                                        });

                                $query3 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('payment_voucher.id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('payment_voucher')
                                                        ->groupBy('unique_id');
                                        });

                                $ledgerDatasi = $query->get();
                                $ledgerDatarv = $query2->get();
                                $ledgerDatapv = $query3->get();
                                $customerData = buyer::where('buyer_id', $customer)->get();
                                foreach ($customerData as $key => $value) {
                                        $customerName = $value->company_name;
                                }


                                $debit1 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('grand_total');

                                $debit2 = ReceiptVoucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('receipt_vouchers')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $debit = $debit1 ?? 0 + $debit2 ?? 0;

                                $credit1 = p_voucher::where('company', $customer)->where('company_ref', 'B')->whereBetween(DB::raw('DATE(payment_voucher.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('payment_voucher.id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('payment_voucher')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_total');

                                $credit2 = sell_invoice::where('company', $customer)->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])
                                        ->whereIn('id', function ($query2) {
                                                $query2->select(DB::raw('MIN(id)'))
                                                        ->from('sell_invoice')
                                                        ->groupBy('unique_id');
                                        })->sum('amount_paid');

                                $credit = $credit1 + $credit2;

                                $data = [
                                        'ledgerDatasi' => $ledgerDatasi,
                                        'ledgerDatarv' => $ledgerDatarv,
                                        'ledgerDatapv' => $ledgerDatapv,
                                        'credit' => $credit,
                                        'debit' => $debit,
                                        'total_amount' => $ledgerDatasi->sum('amount_total'),
                                        'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                        'startDate' => $startDate,
                                        'endDate' => $endDate,
                                        'customerName' => $customerName ?? 'Not Selected',
                                        'type' => $type,
                                ];

                                session()->flash('Data', $data);
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
                        $pdf->render();
                        ;
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
                        $query = purchase_invoice::whereBetween(DB::raw('DATE(purchase_invoice.updated_at)'), [$startDate, $endDate])
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

                        $credit1 = purchase_invoice::where('company', $supplier)->whereBetween(DB::raw('DATE(purchase_invoice.updated_at)'), [$startDate, $endDate])
                                ->whereIn('id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('purchase_invoice')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');


                        $credit2 = p_voucher::where('company', $supplier)->where('company_ref', 'S')->whereBetween(DB::raw('DATE(payment_voucher.updated_at)'), [$startDate, $endDate])
                                ->whereIn('payment_voucher.id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('payment_voucher')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');

                        $debit = ReceiptVoucher::where('company', $supplier)->where('company_ref', 'S')->whereBetween(DB::raw('DATE(receipt_vouchers.updated_at)'), [$startDate, $endDate])
                                ->whereIn('receipt_vouchers.id', function ($query2) {
                                        $query2->select(DB::raw('MIN(id)'))
                                                ->from('receipt_vouchers')
                                                ->groupBy('unique_id');
                                })->sum('amount_total');

                        $balance = $credit1 + $credit2 - $debit;

                        $data = [
                                'invoice' => $ledgerDatasi,
                                'credit' => $ledgerDatasi->sum('amount_paid'),
                                'total_amount' => $ledgerDatasi->sum('amount_total'),
                                'debit' => $balance,
                                'balance_amount' => $ledgerDatasi->sum('balance_amount'),
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'supplierName' => $supplierName,
                                'type' => $type,

                        ];

                        session()->flash('Data', $data);
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
                        $pdf->render();
                        ;
                        session()->forget('Data');

                        return view('pdf.pdf_view', ['pdf' => $pdf->output()]);
                }
        }


        public function pdf_limit(Request $post, $view)
        {

                if (!session()->exists('pdf_data')) {
                        if ($post['limit'] >= 500) {
                                $limit = 500;
                        } else {
                                $limit = $post['limit'];
                        }
                        if ($view == 'users') {

                                $pdf = users::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Suppliers");
                        } elseif ($view == 'buyer') {

                                $pdf = buyer::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Buyers");
                        } elseif ($view == 'zone') {

                                $pdf = zone::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "zones");
                        } elseif ($view == 'warehouse') {

                                $pdf = warehouse::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Warehouses");
                        } elseif ($view == 'sales_officer') {

                                $pdf = sales_officer::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "sales officers");
                        } elseif ($view == 'account') {

                                $pdf = accounts::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Accounts");
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



        public function pdf(Request $post, $view)
        {

                if (!session()->has('pdf_data')) {

                        if ($view == 'users') {

                                $pdf = users::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Suppliers");
                        } elseif ($view == 'buyer') {

                                $pdf = buyer::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Buyers");
                        } elseif ($view == 'zone') {

                                $pdf = zone::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "zones");
                        } elseif ($view == 'warehouse') {

                                $pdf = warehouse::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Warehouses");
                        } elseif ($view == 'sales_officer') {

                                $pdf = sales_officer::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "sales officers");
                        } elseif ($view == 'account') {

                                $pdf = accounts::limit(500)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Accounts");
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
                        $query1 = sell_invoice::whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate])->whereIn('sell_invoice.id', function ($subQuery) {
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
                        session()->flash('Data', $data);
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
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');


                        $query = $sellInvoices = sell_invoice::select('item')
                                ->whereBetween(DB::raw('DATE(sell_invoice.updated_at)'), [$startDate, $endDate]);

                        if ($product) {
                                $sellInvoices->where('item', $product);
                        }

                        if ($warehouse) {
                                $sellInvoices->where('warehouse', $warehouse);
                        }

                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query->whereIn('item', $productIds);
                        }




                        $query2 = $purchaseInvoices = purchase_invoice::select('item')->whereBetween(DB::raw('DATE(purchase_invoice.updated_at)'), [$startDate, $endDate]);

                        if ($product) {
                                $purchaseInvoices->where('item', $product);
                        }

                        if ($warehouse) {
                                $purchaseInvoices->where('warehouse', $warehouse);
                        }

                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $query2->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $query2->whereIn('item', $productIds);
                        }

                        $si = $query->groupBy('item')->get();
                        $pi = $query2->groupBy('item')->get();

                        $data = [
                                'si' => $si,
                                'pi' => $pi,
                                'sale_qty' => $si->sum('sale_qty'),
                                'pur_qty' => $pi->sum('pur_qty'),
                                'avail_qty' => $pi->sum('pur_qty') - $si->sum('sale_qty'),
                                'product' => $product_name ?? null,
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => 1,
                        ];

                        session()->flash('Data', $data);
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
                        $query->whereBetween(DB::raw('DATE(purchase_invoice.updated_at)'), [$startDate, $endDate]);
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
                        session()->flash('Data', $data);
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



        public function pdf_all(Request $post)
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

                session()->flash("sale_invoice_pdf_data", $sell_invoice);
                session()->flash("s_sale_invoice_pdf_data", $s_sell_invoice);




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

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
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

                session()->flash("purchase_invoice_pdf_data", $purchase_invoice);
                session()->flash("s_purchase_invoice_pdf_data", $s_purchase_invoice);




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

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }








        function pv_pdf(Request $post, $id)
        {


                $p_voucher = p_voucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'payment_voucher.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'payment_voucher.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'payment_voucher.item', '=', 'products.product_id')
                        ->get();

                $s_p_voucher = p_voucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'payment_voucher.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'payment_voucher.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'payment_voucher.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->flash("p_voucher_pdf_data", $p_voucher);
                session()->flash("s_p_voucher_pdf_data", $s_p_voucher);




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

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }



        function rv_pdf(Request $post, $id)
        {


                $receipt_vouchers = ReceiptVoucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'receipt_vouchers.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'receipt_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->get();

                $s_receipt_vouchers = ReceiptVoucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'receipt_vouchers.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'receipt_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->limit(1)->get();

                session()->flash("receipt_vouchers_pdf_data", $receipt_vouchers);
                session()->flash("s_receipt_vouchers_pdf_data", $s_receipt_vouchers);




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

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }


        function ev_pdf(Request $post, $id)
        {


                $expense_vouchers = ExpenseVoucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'expense_vouchers.buyer', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'expense_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->get();

                $s_expense_vouchers = ExpenseVoucher::where("unique_id", $id)
                        ->leftJoin('buyer', 'expense_vouchers.buyer', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'expense_vouchers.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->limit(1)->get();

                session()->flash("expense_vouchers_pdf_data", $expense_vouchers);
                session()->flash("s_expense_vouchers_pdf_data", $s_expense_vouchers);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.e_voucher')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }


        function product_detail(Request $request, $id)
        {
                $product = products::where("product_id", $id)->get();

                session()->flash("product", $product);

                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.product_detail')->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }


        function p_voucher_report(Request $request)
        {
                if (!session()->exists('Data')) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        $contra_account = $request->input('contra_account');
                        $salesOfficer = $request->input('sales_officer');

                        $company = substr($request->input('company'), 0, -1);
                        $lastChar = substr($request->input('company'), -1);


                        $type = $request->input('type');


                        $query = p_voucher::whereBetween('payment_voucher.created_at', [$startDate, $endDate]);

                        if ($contra_account) {
                                $query->where('cash_bank', $contra_account);
                        }

                        if ($salesOfficer) {
                                $query->where('sales_officer', $salesOfficer);
                        }

                        if ($company) {
                                $query->where('company', $company)->where('company_ref', $lastChar);
                        }

                        $p_voucher = $query->get();

                        $data = [
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'contra_account' => $contra_account,
                                'p_voucher' => $p_voucher,
                                'company' => $lastChar,
                                'type' => $type ?? null
                        ];

                        session()->flash('Data', $data);
                }


                if (session()->has('Data')) {

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.p_voucher_rep')->render();

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




        function r_voucher_report(Request $request)
        {
                if (!session()->exists('Data')) {

                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        $contra_account = $request->input('contra_account');
                        $salesOfficer = $request->input('sales_officer');

                        $company = substr($request->input('company'), 0, -1);
                        $lastChar = substr($request->input('company'), -1);


                        $type = $request->input('type');


                        $query = ReceiptVoucher::whereBetween('receipt_vouchers.created_at', [$startDate, $endDate]);

                        if ($company) {
                                $query->where('company', $company)->where('company_ref', $lastChar);
                        }
                        if ($contra_account) {
                                $query->where('cash_bank', $contra_account);
                        }

                        if ($salesOfficer) {
                                $query->where('sales_officer', $salesOfficer);
                        }


                        $r_voucher = $query->get();

                        $data = [
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'contra_account' => $contra_account,
                                'r_voucher' => $r_voucher,
                                'company' => $lastChar,
                                'type' => $type ?? null
                        ];

                        session()->flash('Data', $data);
                }


                if (session()->has('Data')) {

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.r_voucher_rep')->render();

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




        function invoice_chicken(Request $request, $id, $method)
        {
                $single_data = ChickenInvoice::where('unique_id', $id)->first();
                $data = ChickenInvoice::where('unique_id', $id)->get();
                session()->flash("pdf_data", $data);
                session()->flash("single_pdf_data", $single_data);

                $pdf = new Dompdf();

                $html = view('pdf.farm.invoice_chicken', compact('method'))->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }
        function invoice_chick(Request $request, $id, $method)
        {
                $single_data = ChickInvoice::where('unique_id', $id)->first();
                $data = ChickInvoice::where('unique_id', $id)->get();
                session()->flash("pdf_data", $data);
                session()->flash("single_pdf_data", $single_data);

                $pdf = new Dompdf();

                $html = view('pdf.farm.invoice_chick', compact('method'))->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }
        function invoice_feed(Request $request, $id, $method)
        {
                $single_data = feedInvoice::where('unique_id', $id)->first();
                $data = feedInvoice::where('unique_id', $id)->get();
                session()->flash("pdf_data", $data);
                session()->flash("single_pdf_data", $single_data);

                $pdf = new Dompdf();

                $html = view('pdf.farm.invoice_feed', compact('method'))->render();

                $pdf->loadHtml($html);

                $contentLength = strlen($html);
                if ($contentLength > 5000) {
                        $pdf->setPaper('A3', 'portrait');
                } else {
                        $pdf->setPaper('A4', 'portrait');
                }

                $pdf->render();

                return view('pdf.pdf_view_bootstrap', ['pdf' => $html]);
        }


        public function sale_pur_report(Request $request)
        {
                $type = $request['type'];
                if ($type == 1) {
                        $startDate = $request->input('start_date');
                        $endDate = $request->input('end_date');

                        // Retrieve form data
                        $customer = $request->input('customer');
                        $supplier = $request->input('supplier');
                        $salesOfficer = $request->input('sales_officer');
                        $warehouse = $request->input('warehouse');
                        $product_category = $request->input('product_category');
                        $product_company = $request->input('product_company');
                        $product = $request->input('product');
                        $product_id = null;



                        $chickenInvoice = chickenInvoice::query();
                        if ($customer) {
                                $chickenInvoice->where('buyer', $customer);
                        }
                        if ($supplier) {
                                $chickenInvoice->where('seller', $supplier);
                        }

                        if ($salesOfficer) {
                                $chickenInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $chickenInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $chickenInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $chickenInvoice->where('item', $product);
                        }

                        $chickInvoice = ChickInvoice::query();
                        if ($customer) {
                                $chickInvoice->where('buyer', $customer);
                        }

                        if ($salesOfficer) {
                                $chickInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $chickInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $chickInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $chickInvoice->where('item', $product);
                        }

                        $feedInvoice = feedInvoice::query();
                        if ($customer) {
                                $feedInvoice->where('buyer', $customer);
                        }

                        if ($salesOfficer) {
                                $feedInvoice->where('sales_officer', $salesOfficer);
                        }
                        if ($product_category) {
                                $productIds = Products::where('category', $product_category)->pluck('product_id')->toArray();
                                $feedInvoice->whereIn('item', $productIds);
                        }

                        if ($product_company) {
                                $productIds = Products::where('company', $product_company)->pluck('product_id')->toArray();
                                $feedInvoice->whereIn('item', $productIds);
                        }
                        if ($product) {
                                $feedInvoice->where('item', $product);
                        }

                        $chickenData = $chickenInvoice->orderBy('date', 'asc')->get();
                        $chickData = $chickInvoice->orderBy('date', 'asc')->get();
                        $feedData = $feedInvoice->orderBy('date', 'asc')->get();

                        $data = [
                                'chickenData' => $chickenData,
                                'chickData' => $chickData,
                                'feedData' => $feedData,
                                'startDate' => $startDate,
                                'endDate' => $endDate,
                                'type' => $type,
                        ];

                        session()->flash('Data', $data);
                }

                if (session()->has('Data')) {

                        $views = 'Sale + Supplier Report';

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.sale_pur_report')->render();

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

}
