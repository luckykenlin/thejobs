@extends('layouts.front')
@section('title')
    <title> job </title>
@endsection
@section('content')
    <div role="main" class="main">
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Job</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Job</h1>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                        @include('front.incs.aside')
                </div>
                <div class="col-md-9">
                    <div class="blog-posts">
                        @if(count($jobs)>0)
                            @include('front.job.load')
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '.pagination a', function (e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    getArticles(url);
                    window.history.pushState("", "", url);
                });

                function getArticles(url) {
                    $.ajax({
                        url: url
                    }).done(function (data) {
                        $('.blog-posts').html(data);
                    }).fail(function () {
                        alert('Articles could not be loaded.');
                    });
                }
            });
    </script>
@endsection