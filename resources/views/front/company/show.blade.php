@extends('layouts.front')
@section('title')
    <title> Company detail </title>
@endsection
@section('header')
    @include('front.company.detailHeader')
@endsection
@section('content')
    <main>

        <!-- Company detail -->
        <section>
            <div class="container">

                <header class="section-header">
                    <span>About</span>
                    <h2>Company detail</h2>
                </header>
                {!! html_entity_decode($company->detail) !!}
            </div>
        </section>
        <!-- END Company detail -->

        <!-- Open positions -->
        <section id="open-positions" class="bg-alt">
            <div class="container" id="loader">
                @include('front.company.jobload')
            </div>
        </section>
        <!-- END Open positions -->

    </main>
@include('front.contact.message')
@endsection
