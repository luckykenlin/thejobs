@extends('layouts.front')
@section('title')
    <title> Job </title>
@endsection
@section('header')
    @include('front.job.header')
@endsection
@section('content')
    <main id="scroll-mian">
        <section class="padding-top-20 bg-alt">
            <div class="container">
                <div class="pull-left ">
                    <select class="selectpicker show-menu-arrow" id="numPicker">
                        <option title="10 lines  " value="10">10</option>
                        <option title="25 lines  " value="25">25</option>
                        <option title="50 lines  " value="50">50</option>
                        <option title="100 lines    " value="100">100</option>
                    </select>
                </div>
                <div class="pull-right ">
                    <select class="selectpicker show-menu-arrow"  id="stylePicker">
                        <option title="Style Simple" value="Simple">Simple</option>
                        <option title="Style Detail" value="Detail">Detail</option>
                    </select>
                </div>
            </div>

            <div class="container" id="loader">
                <!-- ajax --loader -->
                    @include('front.job.load')
                <!-- END loader -->
            </div>
        </section>
    </main>
@endsection