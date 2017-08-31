@extends('layouts.front')
@section('title')
    <title> Job - candidates </title>
@endsection
@section('header')
    @include('front.job.candidateHeader')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt" id="sec-resume">
            <div class="container" id="loader">
                <!-- ajax --loader -->
                    @include('front.job.candidateLoad')
                <!-- END loader -->
            </div>
        </section>
    </main>
    @include('front.contact.message')
@endsection
