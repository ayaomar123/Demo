
@include('dashboard.sider')

<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

    @include('dashboard.header')



<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @yield('content')

</div>
<!--end::Content-->


@include('dashboard.footer')
