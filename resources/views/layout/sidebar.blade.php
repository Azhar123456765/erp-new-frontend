<?php
// use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\maincontroller;

$org = App\Models\Organization::all();

foreach ($org as $key => $value) {
    $organization = $value->organization_name;
    $logo = $value->logo;
}
$id = session()->get('user_id')['user_id'];
$role = session()->get('user_id')['role'];
$theme_colors = App\Models\users::where('user_id', $id)->get();

foreach ($theme_colors as $key => $value2) {
    $theme_color = $value2->theme;
}

$target = null;

?>
<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('../assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li
                    class="nav-item {{ request()->is('organization*', 'account_account=1*', 'users*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>Main</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('organization*', 'account_account=1*', 'users*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'show' : '' }}"
                        id="dashboard">
                        <ul class="nav nav-collapse">
                            <li class="nav-item {{ request()->is('organization*') ? ' active' : '' }}">
                                <a href="/organization" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Organization</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('account.index', [1, 1]) }}"
                                    class="nav-link{{ request()->is('account_account=1*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Accounts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users" class="nav-link{{ request()->is('users*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/buyers" class="nav-link{{ request()->is('buyers*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sellers" class="nav-link{{ request()->is('seller*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/sales_officer"
                                    class="nav-link{{ request()->is('sales_officer*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sales Officer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/warehouse"
                                    class="nav-link{{ request()->is('warehouse*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Warehouse</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/zone" class="nav-link{{ request()->is('zone*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Zone</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li
                    class="nav-item {{ request()->routeIs('payment_voucher*', 'receipt_voucher*', 'expense_voucher*') ? ' active' : '' }}">
                    <a data-bs-toggle="collapse" href="#Voucher" class="collapsed" aria-expanded="false">
                        <i class="fas fa-money-check"></i>
                        <p>Voucher</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('payment_voucher*', 'receipt_voucher*', 'expense_voucher*') ? 'show' : '' }}"
                        id="Voucher">
                        <ul class="nav nav-collapse">
                            <li class="nav-item">
                                <a href="{{ Route('payment_voucher.create_first') }}"
                                    class="nav-link{{ request()->routeIs('payment_voucher*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payment Voucher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('receipt_voucher.create_first') }}"
                                    class="nav-link{{ request()->is('receipt_voucher*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Reciept Voucher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('expense_voucher.create_first') }}"
                                    class="nav-link{{ request()->routeIs('expense_voucher*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Voucher</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li
                    class="nav-item {{ request()->is('product_category*', 'product_sub_category*', 'product_company*', 'products*', 'product_type*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#Products" class="collapsed" aria-expanded="false">
                        <i class="fas fa-prescription-bottle"></i>
                        <p>Products</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('product_category*', 'product_sub_category*', 'product_company*', 'products*', 'product_type*') ? 'show' : '' }}"
                        id="Products">
                        <ul class="nav nav-collapse">
                            <li class="nav-item">
                                <a href="/product_company"
                                    class="nav-link{{ request()->is('product_company*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Company</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/product_category"
                                    class="nav-link{{ request()->is('product_category*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/product_sub_category"
                                    class="nav-link{{ request()->is('product_sub_category*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Sub Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/product_type"
                                    class="nav-link{{ request()->is('product_type*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/products"
                                    class="nav-link{{ request()->is('products*') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Products</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#Reports" class="collapsed" aria-expanded="false">
                        <i class="fas fa-chart-line"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Reports">
                        <ul class="nav nav-collapse">
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#farm-report" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Farm Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#gen-led" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General Ledger</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#sale-pur-report"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sale+Supplier Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#sale-report" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer Report</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#sale-r-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale Return Report</p>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#pur-report" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier Report</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#pur-r-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchase Return Report</p>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#p-voucher-report"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payment Voucher Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#r-voucher-report"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Receipt Voucher Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#e-voucher-report"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Voucher Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#profit-led" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profit Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-toggle="modal" data-target="#stock-report" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stock Report</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#Farm" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>Farm Module</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('organization*', 'account_account=1*', 'users*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'show' : '' }}"
                        id="Farm">
                        <ul class="nav nav-collapse">
                            <li class="nav-item">
                                <a href="{{ Route('invoice_chicken') }}"
                                    class="nav-link {{ request()->routeIs('invoice_chicken') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Chicken Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('invoice_chick') }}"
                                    class="nav-link {{ request()->routeIs('invoice_chick') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Chick Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('invoice_feed') }}"
                                    class="nav-link {{ request()->routeIs('invoice_feed') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Feed Invoice</p>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ Route('farm.index') }}"
                                    class="nav-link{{ request()->routeIs('farm') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Farms</p>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ Route('farming_period.index') }}"
                                    class="nav-link{{ request()->routeIs('farming_period') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Farming Periods</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ Route('daily_reports') }}"
                                    class="nav-link{{ request()->routeIs('daily_reports') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Farm Daily Report</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
