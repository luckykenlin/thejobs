@extends('layouts.front')
@section('title')
    <title> messages </title>
@endsection
@section('header')
    @include('front.message.header')
@endsection
@section('content')
    <main id="scroll-mian">
        <section>
            <div class="container">
                <div class="container" id="loader">
                    <!-- ajax --loader -->
                        @include('front.message.load')
                    <!-- END loader -->
                </div>
            </div>
        </section>
    </main>
@endsection
