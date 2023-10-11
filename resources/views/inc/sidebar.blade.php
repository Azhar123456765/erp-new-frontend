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
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
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
        <li class="nav-item {{ request()->is('organization*', 'account_account=1*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('organization*', 'account_account=1*', 'buyers*', 'seller*', 'sales_officer*', 'warehouse*', 'zone*') ? 'active' : '' }}">
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
      </ul>
    </nav>
  </div>
</aside>