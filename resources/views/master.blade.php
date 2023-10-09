@include('inc.style')
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
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
@include('inc.modals')
@include('inc.script')