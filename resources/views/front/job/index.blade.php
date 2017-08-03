@extends('layouts.front')
@section('title')
    <title> job </title>
@endsection
@section('header')
    @include('front.job.header')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt">
            <div class="container" id="loader">
                <!-- ajax --loader -->
                    @include('front.job.load')
                <!-- END loader -->
            </div>
        </section>
    </main>
@endsection
@section('js')
    <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '.pagination a', function (e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    getJobs(url);
//                    window.history.pushState("", "", url);
                });

                function getJobs(url) {
                    $.ajax({
                        url: url
                    }).done(function (data) {
                        $('#loader').html(data);
                    }).fail(function () {
                        alert('Jobs could not be loaded.');
                    });
                }
            });
    </script>
@endsection