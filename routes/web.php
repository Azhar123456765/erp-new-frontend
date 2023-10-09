<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\invoicecontroller;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\product;
use App\Http\Controllers\ReceiptVoucherController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentVoucherController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\SaleInvoiceController;
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

Route::middleware(['roleAuth', 'userAuth', 'setupPermission'])->group(function () {
    Route::get('/organization', [OrganizationController::class, 'index']);
    Route::post('/organization', [OrganizationController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add_user_form', [UserController::class, 'store']);
    Route::get('/edit-user-{id}', [UserController::class, 'edit']);
    Route::post('/edit_user_form-{id}', [UserController::class, 'update']);
    Route::get('/user-records-{id}', [UserController::class, 'user_records']);
    Route::get('/user-rights-{id}', [UserController::class, 'user_rights']);
    Route::post('/user_right_form-{id}', [UserController::class, 'user_right_form']);
});

Route::middleware(['userAuth', 'setupPermission'])->group(function () {

    Route::get('/warehouse', [maincontroller::class, 'warehouse']);
    Route::post('/add_warehouse', [maincontroller::class, 'add_warehouse']);
    Route::post('/edit_warehouse{id}', [maincontroller::class, 'edit_warehouse']);

    Route::get('/zone', [maincontroller::class, 'zone']);
    Route::post('/add_zone', [maincontroller::class, 'add_zone']);
    Route::post('/edit_zone{id}', [maincontroller::class, 'edit_zone']);

    Route::get('/sales_officer', [maincontroller::class, 'sales_officer']);
    Route::post('/add_sales_officer', [maincontroller::class, 'add_sales_officer']);
    Route::post('/edit_sales_officer{id}', [maincontroller::class, 'edit_sales_officer']);

    Route::get('/edit_buyer{id}', [maincontroller::class, 'view_edit_buyer']);
    Route::get('/buyers', [maincontroller::class, 'view_buyers']);
    Route::get('/add-buyer', [maincontroller::class, 'view_add_buyer']);
    Route::get('/view-buyer{id}', [maincontroller::class, 'view_single_buyer']);
    Route::get('/view_single_buyer{id}', [maincontroller::class, 'view_single_buyer']);

    Route::get('/edit_seller{id}', [maincontroller::class, 'view_edit_seller']);
    Route::get('/sellers', [maincontroller::class, 'view_sellers']);
    Route::get('/add-seller', [maincontroller::class, 'view_add_seller']);
    Route::get('/view-seller{id}', [maincontroller::class, 'view_single_seller']);
    Route::get('/view_single_seller{id}', [maincontroller::class, 'view_single_seller']);

    Route::post('/add_buyer_form', [maincontroller::class, 'add_buyer_form']);
    Route::post('/edit_buyer_form', [maincontroller::class, 'edit_buyer_form']);
    Route::post('/add_seller_form', [maincontroller::class, 'add_seller_form']);
    Route::post('/edit_seller_form', [maincontroller::class, 'edit_seller_form']);

    Route::get('/account_account={id}', [maincontroller::class, 'account']);
    Route::get('/get-data/account', [maincontroller::class, 'get_data_account']);
    Route::post('/add_account', [maincontroller::class, 'add_account']);
    Route::post('/edit_account{id}', [maincontroller::class, 'edit_account']);
});

Route::middleware(['userAuth', 'financePermission'])->group(function () {
    // VOUCHERS
    Route::get('/p_voucher', [PaymentVoucherController::class, 'create']);
    Route::post('/p_voucher_form', [PaymentVoucherController::class, 'store']);
    Route::get('/ep_voucher_id={id}', [PaymentVoucherController::class, 'edit']);
    Route::post('/ep_voucher_form_id={id}', [PaymentVoucherController::class, 'update']);
    Route::get('/r_voucher', [ReceiptVoucherController::class, 'index']);
    Route::post('/r_voucher_form', [ReceiptVoucherController::class, 'store']);
    Route::get('/get-data', [ReceiptVoucherController::class, 'get_data']);
    Route::get('/er_voucher_id={id}', [ReceiptVoucherController::class, 'edit']);
    Route::post('/er_voucher_form_id={id}', [ReceiptVoucherController::class, 'update']);

    // INVOICES
    Route::get('/sale-invoice', [SaleInvoiceController::class, 'index']);
    Route::get('/purchase-invoice', [PurchaseInvoiceController::class, 'index']);
    Route::get('/s_med_invoice', [SaleInvoiceController::class, 'create']);
    Route::post('/s_med_invoice_form', [SaleInvoiceController::class, 'store']);
    Route::get('/es_med_invoice_id={id}', [SaleInvoiceController::class, 'edit']);
    Route::post('/es_med_invoice_form_id={id}', [SaleInvoiceController::class, 'update']);
    Route::get('/rs_med_invoice_id={id}', [SaleInvoiceController::class, 'r_edit']);
    Route::post('/rs_med_invoice_form_id={id}', [SaleInvoiceController::class, 'r_update']);
    Route::get('/p_med_invoice', [PurchaseInvoiceController::class, 'create']);
    Route::post('/p_med_invoice_form', [PurchaseInvoiceController::class, 'store']);
    Route::get('/ep_med_invoice_id={id}', [PurchaseInvoiceController::class, 'edit']);
    Route::post('/ep_med_invoice_form_id={id}', [PurchaseInvoiceController::class, 'update']);
    Route::get('/rp_med_invoice_id={id}', [PurchaseInvoiceController::class, 'r_edit']);
    Route::post('/rp_med_invoice_form_id={id}', [PurchaseInvoiceController::class, 'r_update']);
});

Route::middleware(['userAuth', 'productPermission'])->group(function () {
    // PRODUCT
    Route::get('/product_category', [product::class, 'product_category']);
    Route::post('/add_product_category', [product::class, 'add_product_category']);
    Route::post('/edit_product_category{id}', [product::class, 'edit_product_category']);
    Route::post('/add_product_sub_category', [product::class, 'add_product_sub_category']);
    Route::post('/edit_product_sub_category{id}', [product::class, 'edit_product_sub_category']);
    Route::get('/product_company', [product::class, 'product_company']);
    Route::post('/add_product_company', [product::class, 'add_product_company']);
    Route::post('/edit_product_company{id}', [product::class, 'edit_product_company']);
    Route::get('/product_type', [product::class, 'product_type']);
    Route::post('/add_product_type', [product::class, 'add_product_type']);
    Route::post('/edit_product_type{id}', [product::class, 'edit_product_type']);
    Route::get('/products', [product::class, 'view_product']);
    Route::post('/add_product_form', [product::class, 'add_product']);
    Route::post('/edit_product{id}', [product::class, 'edit_product']);
});

Route::middleware(['userAuth', 'reportPermission'])->group(function () {
    // PDF
    Route::get('/pdf_field={view}', [pdfController::class, 'pdf']);
    Route::get('/pdf_limit{view}', [pdfController::class, 'pdf_limit']);
    Route::get('/pdf', [pdfController::class, 'test_pdf']);
    Route::get('/sale_invoice_pdf_{id}', [pdfController::class, 'sale_invoice_pdf']);
    Route::get('/purchase_invoice_pdf_{id}', [pdfController::class, 'purchase_invoice_pdf']);
    Route::get('/gen-led', [pdfController::class, 'gen_led']);
    Route::get('/cus-led', [pdfController::class, 'cus_led']);
    Route::get('/supplier-led', [pdfController::class, 'supplier_led']);
    Route::get('/profit-led', [pdfController::class, 'profit_rep']);
    Route::get('/stock-report', [pdfController::class, 'stock_rep']);
    Route::get('/warehouse-report', [pdfController::class, 'warehouse_rep']);
});



// GENERAL
Route::post('/customize-form', [maincontroller::class, 'customize_form']);
Route::post('/login-check', [maincontroller::class, 'logincheck']);
Route::post('/user-access', [maincontroller::class, 'user_acces']);
Route::get('/logout', [maincontroller::class, 'logout']);
Route::get('/get_week_data', [maincontroller::class, 'get_week_data']);
