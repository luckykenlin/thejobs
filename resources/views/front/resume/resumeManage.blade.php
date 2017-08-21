@extends('layouts.front')
@section('title')
    <title> resume - manage </title>
@endsection
@section('header')
    @include('front.resume.manageHeader')
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

                <div class="pull-right padding-top-20">
                    <a class="btn btn-primary btn-sm" href="{{url('resume/create')}}">Add new company</a>
                </div>
            </div>
            <div class="container">
                <div class="row item-blocks-condensed" id="loader">
                    <!-- ajax --loader -->
                @include('front.resume.ownLoad')
                <!-- END loader -->
                </div>
            </div>
        </section>
    </main>
@endsection