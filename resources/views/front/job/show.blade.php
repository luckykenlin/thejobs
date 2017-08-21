@extends('layouts.front')
@section('title')
    <title> Job detail </title>
@endsection
@section('header')
    @include('front.job.detailHeader')
@endsection
@section('content')
    <main>

        <!-- Job detail -->
        <section>
            <div class="container">
                {!! html_entity_decode($job->job_desc) !!}
            </div>
        </section>
        <!-- END Job detail -->

    </main>
@endsection