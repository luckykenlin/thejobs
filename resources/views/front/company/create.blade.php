@extends('layouts.front')
@section('title')
    <title>Post job </title>
@endsection

@section('header')
    <form role="form" class="editForm" action="{{url('company')}}"
          method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('front.company.createHeader')

        @endsection
        @section('content')
            <main>

                <!-- Social media -->
                <section>
                    @include('front.media.create')
                </section>
                <!-- Social media -->

                <!-- Company detail -->
                <section class=" bg-alt">
                    <div class="container">

                        <header class="section-header">
                            <span>About</span>
                            <h2>Company detail</h2>
                            <p>Write about your company, culture, benefits of working there, etc.</p>
                        </header>

                        <textarea class="summernote-editor" name="detail" style="display: none;"></textarea>

                    </div>
                </section>
                <!-- END Company detail -->


                <!-- Submit -->
                <section>
                    <div class="container">
                        <header class="section-header">
                            <span>Are you done?</span>
                            <h2>Submit it</h2>
                            <p>Please review your information once more and press the below button to put your company
                                online.</p>
                        </header>

                        <p class="text-center">
                            <button class="btn btn-success btn-xl btn-round">Submit your company</button>
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