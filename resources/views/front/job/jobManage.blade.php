@extends('layouts.front')
@section('title')
    <title> job - manage </title>
@endsection
@section('header')
    @include('front.job.manageHeader')
@endsection
@section('content')
    <main>
        <section class="padding-top-20 bg-alt">
            <div class="container">
                <div class=" text-right ">
                    <a class="btn btn-primary btn-sm" href="{{url('job/create')}}">Add new job</a>
                </div>

                <div class="pull-left padding-top-20">
                    <select class="selectpicker show-menu-arrow" id="numPicker">
                        <option title="10 lines  " value="10">10</option>
                        <option title="25 lines  " value="25">25</option>
                        <option title="50 lines  " value="50">50</option>
                        <option title="100 lines    " value="100">100</option>
                    </select>
                </div>
                <div class="pull-right padding-top-20">
                    <select class="selectpicker show-menu-arrow"  id="stylePicker">
                        <option title="Style Simple" value="Simple">Simple</option>
                        <option title="Style Detail" value="Detail">Detail</option>
                    </select>
                </div>
            </div>

            <div class="container">
                <div class="row" id="loader">
                <!-- ajax --loader -->
                     @include('front.job.ownLoad')

                <!-- END loader -->
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script src="{{asset('js/customloader.js')}}"></script>
@endsection
