<!doctype html>

<html lang="{{ app()->getLocale() }}">
<head>
    @yield("title")
    <title>Auth | {{ config("app.name") }}</title>
    @include("auth.incs.head")
    @yield("style")
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    @yield("headerScript")
</head>
<body class="hold-transition login-page">
@yield("content")
@include("auth.incs.foot")
@yield("script")
</body>
</html>