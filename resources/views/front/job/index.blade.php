@extends('layouts.front')
@section('title')
    <title> job </title>
@endsection
@section('header')
    @include('front.job.header')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt">
            <div class="container" id="loader">
                <!-- ajax --loader -->
                    @include('front.job.load')
                <!-- END loader -->
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('js/customloader.js')}}"></script>
@endsection