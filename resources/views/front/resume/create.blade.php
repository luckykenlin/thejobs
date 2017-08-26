@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
@endsection

@section('title')
    <title>Post resume </title>
@endsection

@section('header')
    <form role="form" class="editForm" action="{{url('resume')}}"
          method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('front.resume.createHeader')

        @endsection
        @section('content')
            <main>

                <!-- Social media -->
                    @include('front.media.create')
                <!-- Social media -->

                <!-- Education -->
                    @include('front.education.create')
                <!-- END Education -->

                <!-- Work Experience -->
                    @include('front.experience.create')
                <!-- END Work Experience -->

                <!-- Skills -->
                    @include('front.skill.create')
                <!-- END Skills -->

                <!-- Submit -->
                <section class="bg-img text-center" style="background-image: url({{asset("assets/img/bg-facts.jpg")}})">
                    <div class="container">
                        <header class="section-header">
                            <span>Are you done?</span>
                            <h2>Submit resume</h2>
                            <p>Please review your information once more and press the below button to put your resume online.</p>
                        </header>
                        <p class="text-center">
                            <button class="btn btn-success btn-xl btn-round">Submit your resume</button>
                        </p>
                    </div>
                </section>
                <!-- END Submit -->

            </main>
    </form>
@endsection

@section('js')
    <script src="{{asset("assets/vendors/summernote/summernote.js")}}"></script>
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
@endsection