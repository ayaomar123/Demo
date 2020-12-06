
@include('dashboard.sider')
@yield('title')
@yield('style')
@include('dashboard.header')
@if(Session::has('message'))
<p class="alert
{{ Session::get('alert-class', 'alert-secondary') }}">{{Session::get('message') }}</p>
@endif
@yield('content')
@include('dashboard.footer')
@yield('script')
