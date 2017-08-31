@extends('layouts.front')
@section('title')
    <title> Job - apply </title>
@endsection
@section('header')
    @include('front.job.applyHeader')
@endsection
@section('content')
    <main>
        <!-- Apply with resume -->
        <section id="sec-resume">
            <div class="container" id="loader">

                    <!-- Resume item -->
                        @include('front.job.resumeLoad')
                    <!-- END Resume item -->

            </div>
        </section>
        <!-- END Apply with resume -->

        <!-- Custom application -->
        <section id="sec-custom" class="bg-alt">
            <div class="container">
                <header class="section-header">
                    <span>Custom application</span>
                    <h2>Apply now</h2>
                </header>

                <form role="form" class="editForm" action="{{url('job-apply',$job->id)}}"
                      method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-xs-12 col-md-6">
                            <input type="text" name="name" class="form-control input-lg" placeholder="Name">
                        </div>

                        <div class="form-group col-xs-12 col-md-6">
                            <input type="email" name="email" class="form-control input-lg" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                    </div>

                    <div class="form-group">

                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <div class="upload-button upload-button-block">
                                <button class="btn btn-block btn-success">Attach your CV</button>
                                <input name="cv_url" type="file">
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <button type="submit" class="btn btn-block btn-primary">Submit application</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
        <!-- END Custom application -->

    </main>
@endsection