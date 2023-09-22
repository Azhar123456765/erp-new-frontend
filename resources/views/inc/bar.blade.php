<?php
// use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\maincontroller;

$org =  App\Models\Organization::all();

foreach ($org as $key => $value) {

    $organization =  $value->organization_name;
    $logo =  $value->logo;
}
$id = session()->get("user_id")['user_id'];
$theme_colors = App\Models\users::where("user_id", $id)->get();

foreach ($theme_colors as $key => $value2) {

    $theme_color = $value2->theme;
}

?>

<style>
    .li li {
        width: 100%;
        text-align: center;
    }
</style>
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="/organization" class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image" style="    width: 50px;
    height: 50px;">
                        <img src="{{ asset($logo) }}" alt="John Doe">
                    </div>
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="#">
                            <i class="fa fa-gear"></i>Setup
                            <span class="bot-line"></span>
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="/">
                                    Dashboard</a>
                            </li>
                            @if(session()->get('user_id')['role'] == 'admin')
                            <li>
                                <a href="/organization">
                                    Organization</a>
                            </li>
                            @endif
                            <li>
                                <a href="" data-toggle="modal" data-target="#customize">
                                    Customize</a>
                            </li>
                            <li>
                                <a href="/account_account=1">Accounts</a>
                            </li>
                            @if(session()->get('user_id')['role'] == 'admin')

                            <li>
                                <a href="/users">
                                    Users</a>
                            </li>
                            @endif
                            <li>
                                <a href="/buyers">
                                    Customers</a>
                            </li>
                            <li>
                                <a href="/sellers">
                                    Suppliers</a>
                            </li>
                            <li>
                                <a href="/warehouse">
                                    warehouse</a>
                            </li>
                            <li>
                                <a href="/zone">
                                    zone</a>
                            </li>
                            <li>
                                <a href="/sales_officer">
                                    Sales Officer</a>
                            </li>
                        </ul>



                    </li>

                    <style>
                        .dropdown-menu {
                            display: none !important;
                        }

                        .dropdown:hover .dropdown-menu {
                            display: block !important;
                        }
                    </style>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fa-solid fa-file-invoice"></i>Invoice
                            <span class="bot-line"></span>
                        </a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="/sale-invoice">
                                    Manage Sale invoices
                                </a>
                            </li>

                            <!-- <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    Manage Sell Invoice
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list   li" style="display: none;
    flex-direction: column;">
                                    <li><a href="/s_med_invoice">Medician &nbsp;&nbsp;ADD</a></li>



                                    <li><a href="/s_chick_invoice">Chicken &nbsp;&nbsp;ADD</a></li>

                                </ul>
                            </li> -->

                            <li>
                                <a href="/purchase-invoice">
                                    Manage purchase invoices
                                </a>
                            </li>


                            <!-- <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    Manage Purchase Invoice
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list   li" style="display: none;
    flex-direction: column;">
                                    <li><a href="/p_med_invoice">Medician &nbsp;&nbsp;ADD</a></li>
                                    <li><a href="/p_med_invoice">Chicken &nbsp;&nbsp;ADD</a></li>

                                </ul>
                            </li> -->
                        </ul>
                    </li>


                    <li class="has-sub">
                        <a href="#">
                            <i class="fa-solid fa-chart-line"></i>Reports
                            <span class="bot-line"></span>
                        </a>
                        <ul class="header3-sub-list list-unstyled" style="text-transform: capitalize">
                            <li class="has-sub">
                                <a style="text-align: start" class="js-arrow" href="#">
                                    Standard Reports
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list li" style="display: none; flex-direction: column">
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-user">
                                            Users</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-supplier">
                                            supplier</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-buyer">
                                            Buyer</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-zone">
                                            zone</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-warehouse">
                                            warehouse</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#p-sales_officer">
                                            sales officer</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#"> Legder Reports </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list li" style="display: none; flex-direction: column">
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#gen-led">
                                            General Ledger</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#cus-led">
                                            Customer Ledger</a>
                                    </li>
                                    <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#supplier-led">
                                        Supplier Ledger</a>
                                </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">Other Reports</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list li" style="display: none; flex-direction: column">
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#profit-led">
                                            Profit Report</a>
                                    </li>
                                    <li>
                                        <a style="text-align: start" href="" data-toggle="modal" data-target="#stock-report">
                                            Stock Report</a>
                                    </li>
                                </ul>
                            </li>
                            <li></li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Vouchers</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="/p_voucher">Payment Voucher</a>
                            </li>
                            <li>
                                <a href="/r_voucher">Receipt Voucher</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fa-solid fa-box-archive"></i>
                            <span class="bot-line"></span>Products</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="/product_category">Product Category</a>
                            </li>
                            <li>
                                <a href="/product_sub_category">Product Sub-Category</a>
                            </li>
                            <li>
                                <a href="/product_company">Product Company</a>
                            </li>
                            <li>
                                <a href="/product_type">Product Type</a>
                            </li>
                            <li>
                                <a href="/products">Manage Product</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header__tool">

                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="images/icon/avatar011.png" alt="John Doe">
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{session('user_id')['username']}}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="images/icon/avatar011.png" alt="John Doe">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        {{session('user_id')['username']}}
                                    </h5>
                                    <span class="email">Role: {{session('user_id')['role']}}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="/logout">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>






























<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a href="/organization" class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image" style="    width: 50px;
    height: 50px;">
                        <img src="{{ asset($logo) }}" alt="John Doe">
                    </div>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-gear"></i>Setup
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/">
                                Dashboard</a>
                        </li>
                        @if(session()->get('user_id')['role'] == 'admin')
                        <li>
                            <a href="/organization">
                                Organization</a>
                        </li>
                        @endif
                        <li>
                            <a href="" data-toggle="modal" data-target="#customize">
                                Customize</a>
                        </li>
                        <li>
                            <a href="/account_account=1">Accounts</a>
                        </li>
                        @if(session()->get('user_id')['role'] == 'admin')
                        <li>
                            <a href="/users">
                                Users</a>
                        </li>
                        @endif
                        <li>
                            <a href="/buyers">
                                Customers</a>
                        </li>
                        <li>
                            <a href="/sellers">
                                Suppliers</a>
                        </li>
                        <li>
                            <a href="/warehouse">
                                warehouse</a>
                        </li>
                        <li>
                            <a href="/zone">
                                zone</a>
                        </li>
                        <li>
                            <a href="/sales_officer">
                                Sales Officer</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa-solid fa-file-invoice"></i>Invoice</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/sale-invoice">
                                Manage Sale invoices
                            </a>
                        </li>
                        <li>
                            <a href="/purchase-invoice">
                                Manage Purchase invoices
                            </a>
                        </li>


                        <!-- <li class="has-sub">
                            <a class="js-arrow2" href="#">
                                Manage Purchase Invoice
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list2   li" style="display: none;
    flex-direction: column;">
                                <li><a href="/p_med_invoice">Medician &nbsp;&nbsp;ADD</a></li>
                                <li><a href="/p_med_invoice">Chicken &nbsp;&nbsp;ADD</a></li>

                            </ul>
                        </li> -->
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa-solid fa-chart-line"></i>Reports</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="has-sub">
                            <a style="text-align: start" class="js-arrow2" href="#">
                                Standard Reports
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list2">
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-user">
                                        Users</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-supplier">
                                        supplier</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-buyer">
                                        Buyer</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-zone">
                                        zone</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-warehouse">
                                        warehouse</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#p-sales_officer">
                                        sales officer</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow2" href="#"> Legder Reports </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list2 li" style="display: none; flex-direction: column">
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#gen-led">
                                        General Ledger</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#cus-led">
                                        Customer Ledger</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#supplier-led">
                                        Supplier Ledger</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow2" href="#"> Other Reports </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list2 li" style="display: none; flex-direction: column">

                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#profit-led">
                                        Profit Report</a>
                                </li>
                                <li>
                                    <a style="text-align: start" href="" data-toggle="modal" data-target="#stock-report">
                                        Stock Report</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa-solid fa-box-archive"></i>Product</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/product_category">Product Category</a>
                        </li>
                        <li>
                            <a href="/product_sub_category">Product Sub-Category</a>
                        </li>
                        <li>
                            <a href="/product_company">Product Company</a>
                        </li>
                        <li>
                            <a href="/product_type">Product Type</a>
                        </li>
                        <li>
                            <a href="/products">Manage Product</a>
                        </li>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Vouchers</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="/p_voucher">Payment Voucher</a>
                        </li>
                        <li>
                            <a href="/r_voucher">Receipt Voucher</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>





<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="images/icon/avatar011.png" alt="John Doe">
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{session('user_id')['username']}}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="images/icon/avatar011.png" alt="ADMIN">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                {{session('user_id')['username']}}
                            </h5>
                            <span class="email">Role: {{session('user_id')['role']}}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                            <a href="#">
                                <i class="zmdi zmdi-account"></i>Account</a>
                        </div>
                        <div class="account-dropdown__item">
                            <a href="#">
                                <i class="zmdi zmdi-settings"></i>Setting</a>
                        </div>

                    </div>
                    <div class="account-dropdown__footer">
                        <a href="/logout">
                            <i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>