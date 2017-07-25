<!DOCTYPE html>
<html lang="{{ config('app.local') }}">
<head>
    @include('front.incs.head')
    @yield('title')
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body>
<div class="body">

    @include('front.incs.header')

    @yield('content')

    @include('front.incs.footer')
</div>

@include('front.incs.js')

</body>
</html>
