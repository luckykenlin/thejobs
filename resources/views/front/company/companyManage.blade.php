@extends('layouts.front')
@section('title')
    <title> company - manage </title>
@endsection
@section('header')
    @include('front.company.manageHeader')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt">
            <div class="container">
                <div class="row item-blocks-condensed" id="loader">
                    <!-- ajax --loader -->
                       @include('front.company.ownLoad')
                    <!-- END loader -->
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('js/customloader.js')}}"></script>
@endsection
