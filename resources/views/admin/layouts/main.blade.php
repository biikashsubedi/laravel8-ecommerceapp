@include('admin.layouts.header')
<!-- Sidebar -->
@include('admin.layouts.sidebar')
<!-- Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
    @include('admin.layouts.navbar')
    <!-- Topbar -->

        <!-- Container Fluid-->
    @yield('content')
    <!---Container Fluid-->
    </div>
    <!-- Footer -->
@include('admin.layouts.footer')
