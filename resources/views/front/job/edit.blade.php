@extends('layouts.front')
@section('title')
    <title>Edit job </title>
@endsection
@section('header')
    <form role="form" class="editForm" action="{{url('job')."/".$job->id}}"
          method="post" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        @include('front.job.editHeader')
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

                        <textarea class="summernote-editor" name="job_desc" style="display: none;">{{$job->job_desc}}</textarea>
                    </div>
                </section>
                <!-- END Job detail -->
                <!-- Submit -->
                <section class="bg-alt">
                    <div class="container">
                        <header class="section-header">
                            <span>Are you done?</span>
                            <h2>Submit Job</h2>
                            <p>Please review your information once more and press the below button to put your job online.</p>
                        </header>

                        <p class="text-center">
                            <button class="btn btn-success btn-xl btn-round">Submit your job</button>
                        </p>

                    </div>
                </section>
                <!-- END Submit -->
            </main>

        @endsection
    </form>
@section('js')
    <script src="{{asset("assets/vendors/summernote/summernote.js")}}"></script>
@endsection