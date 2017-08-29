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
                <div class="row">

                    @include('front.job.candidateLoad')

                </div>
            </div>
        </section>
    </main>
@endsection
@include('front.contact.message')