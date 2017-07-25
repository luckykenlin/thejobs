<!DOCTYPE html>
<html lang="{{ config('app.local') }}">
<head>
    @include('admin.incs.head')
    @yield("title")
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body class="sidebar-mini wysihtml5-supported skin-black-light" style="height: auto;">
<div id="wrapper">
@include('admin.incs.header')
<!-- Left side column. contains the sidebar -->
@if(!Auth::guest())

    @include('admin.incs.sidebar')


@endif
<!-- Content Wrapper. Contains page content -->
    @if(!Auth::guest())
        <div class="content-wrapper">
            @endif
            @include('admin.incs.session-alert')
            @yield('content')
            @if(!Auth::guest())
        </div>
@endif

<!-- footer -->

    <!-- Control Sidebar -->
</div>
@if(!Auth::guest())
    @include('admin.incs.footer')
@endif

@yield('js')

@include('admin.incs.js')
</body>
</html>
