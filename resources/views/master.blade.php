@php

$org = App\Models\Organization::all();
foreach ($org as $key => $value) {
$organization = $value->organization_name;
$logo = $value->logo;
}

@endphp
@include('inc.style')

<head>
    <title>
        @yield('title')
    </title>
</head>

<body class="{{ request()->is('s_med_invoice*', 'es_med_invoice*','p_med_invoice*','ep_med_invoice*','rp_med_invoice*','rs_med_invoice*','arp_med_invoice*','ars_med_invoice*','r_voucher*','er_voucher_id=*','p_voucher*','ep_voucher_id=*') ? 'sidebar-collapse' : 'sidebar-mini' }}  layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{$logo}}" alt="AdminLTELogo" height="60" width="60" style="border-radius: 50%;" />
        </div>
        @include('inc.navbar')
        @include('inc.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block"><b>Version</b>&nbsp;0.1</div>
            <strong>Copyright &copy; 2023-2023
                <a href="https://www.psofts.online" class="text-success">Psoft</a>.</strong>
            All rights reserved.
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </footer>
    </div>
</body>
@include('inc.modals')
@include('inc.script')