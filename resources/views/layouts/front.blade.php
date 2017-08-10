<!DOCTYPE html>
<html lang="{{ config('app.lang') }}" xml:lang="{{ config('app.lang') }}">
<head>
    {{--Site head--}}
    @include('front.incs.head')
    {{--End Site head--}}
    {{--Title--}}
    @yield('title')
    {{--End title--}}
</head>
<body class="nav-on-header smart-nav">
<!-- Navigation bar -->
@include('front.incs.navigation')
<!-- END Navigation bar -->
<!-- Site header -->
{{--@include('front.incs.header')--}}
@yield('header')
<!-- END Site header -->
<!-- Main container -->
@yield('content')
<!-- END Main container -->
<!--       Loading    -->
@include('front.incs.loading')
<!-- END loading -->
{{--Site footer--}}
@include('front.incs.footer')
{{--End Site footer--}}
<!-- Back to top button -->
@include('front.incs.btt')
<!-- END Back to top button -->
{{--Site javascript--}}
@include('front.incs.js')
{{--End Site javascript--}}
{{--Page javascript--}}
@yield('js')
{{--End Page javascript--}}
</body>
</html>
