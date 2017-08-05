@extends('layouts.front')
@section('title')
    <title> job - manage </title>
@endsection
@section('header')
    @include('front.job.manageHeader')
@endsection
@section('content')
    <main>
        <section class="no-padding-top bg-alt">
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
