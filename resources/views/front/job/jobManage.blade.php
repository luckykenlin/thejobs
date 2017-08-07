@extends('layouts.front')
@section('title')
    <title> job - manage </title>
@endsection
@section('header')
    @include('front.job.manageHeader')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt">
            <div class="container">
                <div class="row" id="loader">
                <!-- ajax --loader -->
                     @include('front.job.ownLoad')

                <!-- END loader -->
                </div>
                <div class="loadingdiv" id="load" ><img src="{{asset('assets/img/ajax-loader.gif')}}"  alt="Loading.."/></div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('js/customloader.js')}}"></script>
@endsection
