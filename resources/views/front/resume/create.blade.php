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
                    <div class="container">

                        <header class="section-header">
                            <span>Get connected</span>
                            <h2>Social media</h2>
                        </header>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="text" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
        @endsection
    </form>

@section('js')
    <script src="{{asset("assets/vendors/summernote/summernote.js")}}"></script>
@endsection