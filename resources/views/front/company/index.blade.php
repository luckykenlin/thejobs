@extends('layouts.front')
@section('title')
    <title> company </title>
@endsection
@section('header')
    @include('front.company.header')
@endsection
@section('content')
    <main>
        <section class="padding-top-20 bg-alt">
            <div class="container">
                <div class="pull-left padding-top-20">
                    <select class="selectpicker show-menu-arrow" id="numPicker">
                        <option title="10 lines  " value="10">10</option>
                        <option title="25 lines  " value="25">25</option>
                        <option title="50 lines  " value="50">50</option>
                        <option title="100 lines    " value="100">100</option>
                    </select>
                </div>

            </div>
            <div class="container" id="loader">
                <!-- ajax --loader -->
            @include('front.company.load')
            <!-- END loader -->
            </div>
        </section>
    </main>
@endsection
