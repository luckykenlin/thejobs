@extends('layouts.front')
@section('title')
    <title>Post job </title>
@endsection
@section('header')
    <form role="form" class="editForm" action="{{url('job')}}"
          method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('front.job.createHeader')

        @endsection
        @section('content')
            <main>


                <!-- Job detail -->
                <section>
                    <div class="container">

                        <header class="section-header">
                            <span>Description</span>
                            <h2>Job detail</h2>
                            <p>Write about your company, job description, skills required, benefits, etc.</p>
                        </header>

                        <textarea class="summernote-editor" style="display: none;" name="job_desc"></textarea>
                    </div>
                </section>
                <!-- END Job detail -->
                <!-- Submit -->
                <section class="bg-alt">
                    <div class="container">
                        <header class="section-header">
                            <span>Are you done?</span>
                            <h2>Submit Job</h2>
                            <p>Please review your information once more and press the below button to put your job
                                online.</p>
                        </header>

                        <p class="text-center">
                            <button type="submit" class="btn btn-success btn-xl btn-round">Submit your job</button>
                        </p>

                    </div>
                </section>
                <!-- END Submit -->
            </main>
    </form>
@endsection

@section('js')
    <script src="{{asset("assets/vendors/summernote/summernote.js")}}"></script>
@endsection