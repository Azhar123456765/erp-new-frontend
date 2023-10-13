@include('inc.style')

<body class="{{ request()->is('s_med_invoice*', 'es_med_invoice*','p_med_invoice*','ep_med_invoice*','r_voucher*','p_voucher*') ? 'sidebar-collapse' : '' }}">
    <div class="wrapper">
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