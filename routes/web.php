<?php

use App\Http\Controllers\ChickenInvoiceController;
use App\Http\Controllers\ChickInvoiceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseVoucherController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmDailyReportController;
use App\Http\Controllers\FarmingPeriodController;
use App\Http\Controllers\FeedInvoiceController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\JournalVoucherController;
use App\Http\Controllers\NarrationController;
use App\Http\Controllers\select2Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\product;
use App\Http\Controllers\ReceiptVoucherController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentVoucherController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\SaleReturnController;
use App\Models\purchase_invoice;
use App\Models\sell_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ADMIN PANEL


Route::get('/', [maincontroller::class, 'viewhome']);
Route::get('/403', function () {
    return view('403');
});
Route::post('/user-access', [maincontroller::class, 'user_acces']);
Route::get('/logout', [maincontroller::class, 'logout']);
Route::middleware('userAuth')->group(function () {

    Route::middleware(['roleAuth', 'setupPermission'])->group(function () {


        Route::post('/dashboard', [maincontroller::class, 'dashboard_data']);
        Route::get('/expense', [ExpenseController::class, 'index']);
        Route::get('/income', [IncomeController::class, 'index']);
        Route::get('/organization', [OrganizationController::class, 'index']);
        Route::post('/organization', [OrganizationController::class, 'store']);
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/add-user', [UserController::class, 'create']);
        Route::post('/add_user_form', [UserController::class, 'store']);
        Route::get('/edit-user-{id?}', [UserController::class, 'edit']);
        Route::post('/edit_user_form-{id?}', [UserController::class, 'update']);
        Route::get('/user-records-{id?}', [UserController::class, 'user_records']);
        Route::get('/user-rights-{id?}', [UserController::class, 'user_rights']);
        Route::post('/user_right_form-{id?}', [UserController::class, 'user_right_form']);
    });
    Route::middleware('userRoleAuth')->group(function () {
        Route::middleware(['setupPermission'])->group(function () {

            Route::get('/warehouse', [maincontroller::class, 'warehouse']);
            Route::post('/add_warehouse', [maincontroller::class, 'add_warehouse']);
            Route::post('/edit_warehouse{id?}', [maincontroller::class, 'edit_warehouse']);

            Route::get('/zone', [maincontroller::class, 'zone']);
            Route::post('/add_zone', [maincontroller::class, 'add_zone']);
            Route::post('/edit_zone{id?}', [maincontroller::class, 'edit_zone']);

            Route::get('/sales_officer', [maincontroller::class, 'sales_officer']);
            Route::post('/add_sales_officer', [maincontroller::class, 'add_sales_officer']);
            Route::post('/edit_sales_officer{id?}', [maincontroller::class, 'edit_sales_officer']);

            Route::get('/edit_buyer{id?}', [maincontroller::class, 'view_edit_buyer']);
            Route::get('/buyers', [maincontroller::class, 'view_buyers']);
            Route::get('/data-buyers', [maincontroller::class, 'data_buyer']);
            Route::get('/add-buyer', [maincontroller::class, 'view_add_buyer']);
            Route::get('/view-buyer{id?}', [maincontroller::class, 'view_single_buyer']);
            Route::get('/view_single_buyer{id?}', [maincontroller::class, 'view_single_buyer']);

            Route::get('/edit_seller{id?}', [maincontroller::class, 'view_edit_seller']);
            Route::get('/sellers', [maincontroller::class, 'view_sellers']);
            Route::get('/data-sellers', [maincontroller::class, 'data_seller']);
            Route::get('/add-seller', [maincontroller::class, 'view_add_seller']);
            Route::get('/view-seller{id?}', [maincontroller::class, 'view_single_seller']);
            Route::get('/view_single_seller{id?}', [maincontroller::class, 'view_single_seller']);

            Route::post('/add_buyer_form', [maincontroller::class, 'add_buyer_form']);
            Route::post('/edit_buyer_form', [maincontroller::class, 'edit_buyer_form']);
            Route::post('/add_seller_form', [maincontroller::class, 'add_seller_form']);
            Route::post('/edit_seller_form', [maincontroller::class, 'edit_seller_form']);

            Route::get('/account/{head}/{sub_head}', [maincontroller::class, 'account'])->name('account.index');
            Route::get('/get-data/account', [maincontroller::class, 'get_data_account']);
            Route::post('/add_account', [maincontroller::class, 'add_account']);
            Route::post('/edit_account{id?}', [maincontroller::class, 'edit_account']);

            Route::get('/data-account/{head}/{sub_head}', [maincontroller::class, 'data_account'])->name('account.data');

        });

        Route::middleware(['financePermission'])->group(function () {
            Route::prefix('finance')->group(function () {

                // VOUCHERS
                Route::get('/first-payment-voucher', [PaymentVoucherController::class, 'create_first'])->name("payment_voucher.create_first");
                Route::get('/last-payment-voucher', [PaymentVoucherController::class, 'create_last'])->name("payment_voucher.create_last");
                Route::get('/payment-voucher', [PaymentVoucherController::class, 'create'])->name('payment_voucher.create');
                Route::post('/payment-voucher', [PaymentVoucherController::class, 'store'])->name('payment_voucher.store');
                Route::get('/payment-voucher/{id?}', [PaymentVoucherController::class, 'edit'])->name('payment_voucher.edit');
                Route::post('/payment-voucher/{id?}', [PaymentVoucherController::class, 'update'])->name('payment_voucher.update');

                Route::get('/first-receipt-voucher', [ReceiptVoucherController::class, 'create_first'])->name("receipt_voucher.create_first");
                Route::get('/last-receipt-voucher', [ReceiptVoucherController::class, 'create_last'])->name("receipt_voucher.create_last");
                Route::get('/receipt-voucher', [ReceiptVoucherController::class, 'create'])->name('receipt_voucher.create');
                Route::post('/receipt-voucher', [ReceiptVoucherController::class, 'store'])->name('receipt_voucher.store');
                Route::get('/receipt-voucher/{id?}', [ReceiptVoucherController::class, 'edit'])->name('receipt_voucher.edit');
                Route::post('/receipt-voucher/{id?}', [ReceiptVoucherController::class, 'update'])->name('receipt_voucher.update');

                Route::controller(ExpenseVoucherController::class)->group(function () {
                    Route::get('/first-expense-voucher', 'create_first')->name("expense_voucher.create_first");
                    Route::get('/last-expense-voucher', 'create_last')->name("expense_voucher.create_last");
                    Route::get('/expense-voucher', 'create')->name('expense_voucher.create');
                    Route::post('/expense-voucher', 'store')->name('expense_voucher.store');
                    Route::get('/expense-voucher/{id?}', 'edit')->name('expense_voucher.edit');
                    Route::post('/expense-voucher/{id?}', 'update')->name('expense_voucher.update');
                });
                Route::get('/first-journal-voucher', [JournalVoucherController::class, 'create_first'])->name("journal-voucher.create_first");
                Route::get('/last-journal-voucher', [JournalVoucherController::class, 'create_last'])->name("journal-voucher.create_last");
                Route::resource('journal-voucher', JournalVoucherController::class);

                Route::prefix('get-invoice-no')->group(function () {

                    // Route::get('receipt_voucher', [ReceiptVoucherController::class, 'get_invoice_no'])->name('receipt_voucher.invoice_no');

                });
            });

            // INVOICES
            //     Route::get('/sale-invoice', [SaleInvoiceController::class, 'index']);
            //     Route::get('/data-invoice', [SaleInvoiceController::class, 'data']);
            //     Route::get('/purchase-invoice', [PurchaseInvoiceController::class, 'index']);
            //     Route::get('/ars_med_invoice', [SaleReturnController::class, 'create']);
            //     Route::post('/ars_med_invoice_form', [SaleReturnController::class, 'store']);
            //     Route::get('/arp_med_invoice', [PurchaseReturnController::class, 'create']);
            //     Route::post('/arp_med_invoice_form', [PurchaseReturnController::class, 'store']);

            //     Route::get('/s_med_invoice', [SaleInvoiceController::class, 'create']);
            //     Route::get('/get-previous-balance', [SaleInvoiceController::class, 'get_previous_balance']);
            //     Route::post('/s_med_invoice_form', [SaleInvoiceController::class, 'store']);
            //     Route::post('/s_med_invoice_mail', [SaleInvoiceController::class, 'mail']);
            //     Route::get('/es_med_invoice_id={id?}', [SaleInvoiceController::class, 'edit']);
            //     Route::get('/saleInvoice-search', function (Request $request) {
            //         $invoice_no = $request->input('invoice_no'); // Access the input using the input method
            //         $sale_invoice = sell_invoice::where('unique_id', $invoice_no)->first(); // Use first() instead of get() to get a single instance
            //         if ($sale_invoice) {
            //             $id = $sale_invoice->unique_id;
            //             if ($id === $invoice_no) {
            //                 return redirect('/es_med_invoice_id=' . $invoice_no); // Fix the redirect URL format
            //             }
            //         }
            //         session()->put('not_found', 'Invoice not found');
            //         return redirect()->back();
            //     });
            //     Route::post('/es_med_invoice_form_id={id?}', [SaleInvoiceController::class, 'update']);
            //     Route::get('/rs_med_invoice_id={id?}', [SaleInvoiceController::class, 'r_edit']);
            //     Route::post('/rs_med_invoice_form_id={id?}', [SaleInvoiceController::class, 'r_update']);
            //     Route::get('/p_med_invoice', [PurchaseInvoiceController::class, 'create']);
            //     Route::post('/p_med_invoice_form', [PurchaseInvoiceController::class, 'store']);
            //     Route::get('/ep_med_invoice_id={id?}', [PurchaseInvoiceController::class, 'edit']);
            //     Route::get('/purchaseInvoice-search', function (Request $request) {
            //         $invoice_no = $request->input('invoice_no'); // Access the input using the input method
            //         $purchase_invoice = purchase_invoice::where('unique_id', $invoice_no)->first(); // Use first() instead of get() to get a single instance
            //         if ($purchase_invoice) {
            //             $id = $purchase_invoice->unique_id;
            //             if ($id === $invoice_no) {
            //                 return redirect('/ep_med_invoice_id=' . $invoice_no); // Fix the redirect URL format
            //             }
            //         }
            //         session()->flash('something_error', 'Invoice not found');
            //         return redirect()->back();
            //     });
            //     Route::post('/ep_med_invoice_form_id={id?}', [PurchaseInvoiceController::class, 'update']);
            //     Route::get('/rp_med_invoice_id={id?}', [PurchaseInvoiceController::class, 'r_edit']);
            //     Route::post('/rp_med_invoice_form_id={id?}', [PurchaseInvoiceController::class, 'r_update']);
        });

        Route::middleware(['productPermission'])->group(function () {
            // PRODUCT
            Route::get('/product_category', [product::class, 'product_category']);
            Route::post('/add_product_category', [product::class, 'add_product_category']);
            Route::post('/edit_product_category{id?}', [product::class, 'edit_product_category']);
            Route::post('/add_product_sub_category', [product::class, 'add_product_sub_category']);
            Route::post('/edit_product_sub_category{id?}', [product::class, 'edit_product_sub_category']);
            Route::get('/product_company', [product::class, 'product_company']);
            Route::get('/data-product-company', [product::class, 'data_product_company']);
            Route::post('/add_product_company', [product::class, 'add_product_company']);
            Route::post('/edit_product_company{id?}', [product::class, 'edit_product_company']);
            Route::get('/product_type', [product::class, 'product_type']);
            Route::post('/add_product_type', [product::class, 'add_product_type']);
            Route::post('/edit_product_type{id?}', [product::class, 'edit_product_type']);
            Route::get('/products', [product::class, 'index']);
            // Route::get('/tmp', [product::class, 'tmp']);
            Route::get('/data-product', [product::class, 'data_product']);
            Route::post('/add_product_form', [product::class, 'add_product']);
            // Route::get('/edit_product/{id?}', [product::class, 'edit'])->name('edit.product');
            Route::get('/edit_product/{id?}', [product::class, 'edit_product'])->name('product.edit');
            Route::post('/edit_product{id?}', [product::class, 'update_product']);
        });

        Route::middleware(['reportPermission'])->group(function () {
            // PDF
            Route::get('/pdf_field={view}', [pdfController::class, 'pdf']);
            Route::get('/pdf_limit{view}', [pdfController::class, 'pdf_limit']);
            Route::get('/product_pdf_id={id?}', [pdfController::class, 'product_detail']);
            Route::get('/sale_invoice_pdf_{id?}', [pdfController::class, 'sale_invoice_pdf']);
            Route::get('/purchase_invoice_pdf_{id?}', [pdfController::class, 'purchase_invoice_pdf']);

            Route::get('/p-voucher-report', [pdfController::class, 'p_voucher_report'])->name('p_voucher.report');
            Route::get('/r-voucher-report', [pdfController::class, 'r_voucher_report'])->name('r_voucher.report');
            Route::get('/e-voucher-report', [pdfController::class, 'e_voucher_report'])->name('e_voucher.report');
            Route::get('/gen-led', [pdfController::class, 'gen_led']);
            Route::get('/cus-led', [pdfController::class, 'cus_led']);
            Route::get('/supplier-led', [pdfController::class, 'supplier_led']);
            Route::get('/sale-r-report', [pdfController::class, 'sale_r_report']);
            Route::get('/sale-report', [pdfController::class, 'sale_report']);
            Route::get('/pur-report', [pdfController::class, 'pur_report']);
            Route::get('/pur-r-report', [pdfController::class, 'pur_r_report']);
            Route::get('/profit-led', [pdfController::class, 'profit_rep']);
            Route::get('/stock-report', [pdfController::class, 'stock_rep']);
            Route::get('/warehouse-report', [pdfController::class, 'warehouse_rep']);

            // NEW
            Route::prefix('pdf')->group(function () {
                Route::get('/sale-purchase-report', [pdfController::class, 'sale_pur_report'])->name('sale_pur.report');
                Route::get('/farm-report', [pdfController::class, 'farm_report'])->name('farm.report');

                Route::get('/payment-voucher/{id?}', [pdfController::class, 'pv_pdf'])->name('payment_voucher.report');
                Route::get('/receipt-voucher/{id?}', [pdfController::class, 'rv_pdf'])->name('receipt_voucher.report');
                Route::get('/expense-voucher/{id?}', [pdfController::class, 'ev_pdf'])->name('expense_voucher.report');
                // Route::get('/rv_pdf_{id?}', [pdfController::class, 'rv_pdf'])->name('farm.report');
                // Route::get('/ev_pdf_{id?}', [pdfController::class, 'ev_pdf'])->name('farm.report');
            });
        });

        Route::middleware(['selectPermission'])->group(function () {
            // SELECT
            Route::get('/select-farm', [select2Controller::class, 'farm'])->name('select2.farm');
            Route::get('/select-account', [select2Controller::class, 'account'])->name('select2.account');
            Route::get('/select-assets-account', [select2Controller::class, 'assets_account'])->name('select2.assets_account');
            Route::get('/select-liability-account', [select2Controller::class, 'liability_account'])->name('select2.liability_account');
            Route::get('/select-expense-account', [select2Controller::class, 'expense_account'])->name('select2.expense_account');
            Route::get('/select-warehouse', [select2Controller::class, 'warehouse'])->name('select2.warehouse');
            Route::get('/select-sales_officer', [select2Controller::class, 'sales_officer'])->name('select2.sales_officer');
            Route::get('/select-product_category', [select2Controller::class, 'product_category'])->name('select2.product_category');
            Route::get('/select-product_company', [select2Controller::class, 'product_company'])->name('select2.product_company');
            Route::get('/select-buyer', [select2Controller::class, 'buyer'])->name('select2.buyer');
            Route::get('/select-seller', [select2Controller::class, 'seller'])->name('select2.seller');
            Route::get('/select-products', [select2Controller::class, 'products'])->name('select2.products');
            Route::get('/select-seller-buyer', [select2Controller::class, 'seller_buyer'])->name('select2.seller-buyer');
            Route::get('buyer-invoice_no', [select2Controller::class, 'buyer_invoice_no'])->name('select2.buyer_invoice_no');
            Route::get('seller-invoice_no', [select2Controller::class, 'seller_invoice_no'])->name('select2.seller_invoice_no');


        });



        // Route::get('/pdf2', [pdfController::class, 'test_pdf']);

        // GENERAL
        // Route::post('/customize-form', [maincontroller::class, 'customize_form']);

        // Route::get('/get_week_data', [maincontroller::class, 'get_week_data']);

        Route::prefix('farm-module')->group(function () {
            Route::get('/add-invoice-chicken', [ChickenInvoiceController::class, 'create_first'])->name("invoice_chicken");
            Route::get('/last-invoice-chicken', [ChickenInvoiceController::class, 'create_last'])->name("last_invoice_chicken");

            Route::get('/invoice-chicken', [ChickenInvoiceController::class, 'create'])->name("new_invoice_chicken");
            Route::post('/add-invoice-chicken', [ChickenInvoiceController::class, 'store'])->name("store_invoice_chicken");
            Route::get('/edit-invoice-chicken/{id?}', [ChickenInvoiceController::class, 'edit'])->name("edit_invoice_chicken");
            Route::post('/edit-invoice-chicken/{id?}', [ChickenInvoiceController::class, 'update'])->name("update_invoice_chicken");

            Route::get('/add-invoice-chick', [ChickInvoiceController::class, 'create_first'])->name("invoice_chick");
            Route::get('/last-invoice-chick', [ChickInvoiceController::class, 'create_last'])->name("last_invoice_chick");
            Route::get('/invoice-chick', [ChickInvoiceController::class, 'create'])->name("new_invoice_chick");
            Route::post('/add-invoice-chick', [ChickInvoiceController::class, 'store'])->name("store_invoice_chick");
            Route::get('/edit-invoice-chick/{id?}', [ChickInvoiceController::class, 'edit'])->name("edit_invoice_chick");
            Route::post('/update-invoice-chick/{id?}', [ChickInvoiceController::class, 'update'])->name("update_invoice_chick");

            Route::get('/add-invoice-feed', [FeedInvoiceController::class, 'create_first'])->name("invoice_feed");
            Route::get('/last-invoice-feed', [FeedInvoiceController::class, 'create_last'])->name("last_invoice_feed");
            Route::get('/invoice-feed', [FeedInvoiceController::class, 'create'])->name("new_invoice_feed");
            Route::post('/add-invoice-feed', [FeedInvoiceController::class, 'store'])->name("store_invoice_feed");
            Route::get('/edit-invoice-feed/{id?}', [FeedInvoiceController::class, 'edit'])->name("edit_invoice_feed");
            Route::post('/update-invoice-feed/{id?}', [FeedInvoiceController::class, 'update'])->name("update_invoice_feed");


            Route::get('/narrations', [NarrationController::class, 'index'])->name("narrations");
            Route::post('/narration', [NarrationController::class, 'store'])->name("store_narration");
            Route::post('/update-narration/id={id?}', [NarrationController::class, 'update'])->name("update_narration");



            Route::prefix('pdf')->group(function () {
                Route::get('/invoice-chicken/{id?}/{method?}', [pdfController::class, 'invoice_chicken'])->name("pdf_invoice_chicken");
                Route::get('/invoice-chick/{id?}/{method?}', [pdfController::class, 'invoice_chick'])->name("pdf_invoice_chick");
                Route::get('/invoice-feed/{id?}/{method?}', [pdfController::class, 'invoice_feed'])->name("pdf_invoice_feed");
            });

        });
        Route::resource('farm', FarmController::class)->except([
            'create',
            'edit'
        ]);
        Route::resource('farming_period', FarmingPeriodController::class)->except([
            'create',
            'edit'
        ]);
    });
    Route::prefix('farm-module')->group(function () {
        Route::get('/daily-reports', [FarmDailyReportController::class, 'index'])->name("daily_reports");
        Route::post('/daily-reports', [FarmDailyReportController::class, 'store'])->name("store_daily_report");
        Route::put('/daily-report/{id?}', [FarmDailyReportController::class, 'update'])->name("update_daily_report");
    });
});


Route::post('/login-check', [maincontroller::class, 'logincheck']);
