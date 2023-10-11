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





<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/" class="brand-link">
    <img src="{{$logo}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
    <span class="brand-text font-weight-light">{{$organization}}</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="images/avatar011.png" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="#" class="d-block">{{session()->get('user_id')['username']}}&nbsp;&nbsp;({{session()->get('user_id')['user_id'] == 1 ? 'Super Admin' : session()->get('user_id')['role']}})</a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ request()->is('organization*', 'account_account=1*', 'users*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('organization*', 'account_account=1*', 'users*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Setup
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/organization" class="nav-link{{ request()->is('organization*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Organization</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/account_account=1" class="nav-link{{ request()->is('account_account=1*') ? ' active' : '' }}">
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
              <a href="/sales_officer" class="nav-link{{ request()->is('sales_officer*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sales Officer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/warehouse" class="nav-link{{ request()->is('warehouse*') ? ' active' : '' }}">
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

        </li>

        <li class="nav-item {{ request()->is('sale-invoice*', 'purchase-invoice*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('sale-invoice*', 'purchase-invoice*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Invoice
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/sale-invoice" class="nav-link{{ request()->is('sale-invoice*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Sale Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/purchase-invoice" class="nav-link{{ request()->is('purchase-invoice*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Purchase Invoice</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item {{ request()->is('p_voucher*', 'r_voucher*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('p_voucher*', 'r_voucher*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>
              Voucher
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/p_voucher" class="nav-link{{ request()->is('p_voucher*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Payment Voucher</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/r_voucher" class="nav-link{{ request()->is('r_voucher*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Reciept Voucher</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item {{ request()->is('product_category*', 'product_sub_category*', 'product_company*', 'products*', 'product_type*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('product_category*', 'product_sub_category*', 'product_company*', 'products*', 'product_type*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/product_company" class="nav-link{{ request()->is('product_company*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Company</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/product_category" class="nav-link{{ request()->is('product_category*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/product_sub_category" class="nav-link{{ request()->is('product_sub_category*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Sub Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/product_type" class="nav-link{{ request()->is('product_type*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/products" class="nav-link{{ request()->is('products*') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Products</p>
              </a>
            </li>
          </ul>

        </li>




        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Standard Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-user" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-supplier" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>supplier</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-buyer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buyer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-zone" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>zone</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-warehouse" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>warehouse</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#p-sales_officer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>sales officer</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Legder Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#gen-led" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Ledger</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#cus-led" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Customer Ledger</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="" data-toggle="modal" data-target="#supplier-led" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Supllier Ledger</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Other Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
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
            </li>

          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>