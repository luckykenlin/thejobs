@extends('layouts.front')
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
                                        <input type="text" name="medias[facebook]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                        <input type="text" name="medias[google]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                        <input type="text" name="medias[dribbble]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                                        <input type="text" name="medias[pinterest]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="text" name="medias[twitter]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                        <input type="text" name="medias[github]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" name="medias[instagram]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="text" name="medias[youtube]" class="form-control" placeholder="Profile URL">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Social media -->


                <!-- Education -->
                <section class=" bg-alt">
                    <div class="container">

                        <header class="section-header">
                            <span>Latest degrees</span>
                            <h2>Education</h2>
                        </header>

                        <div class="row">

                            <div class="col-xs-12">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="dropify" name="education[image][]" data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                                                    <span class="help-block">Please choose a square logo</span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" name="education[degree][]" class="form-control" placeholder="Degree, e.g. Bachelor">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="education[major][]" class="form-control" placeholder="Major, e.g. Computer Science">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="education[school][]" class="form-control"
                                                           placeholder="School name, e.g. Massachusetts Institute of Technology">
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Date from</span>
                                                        <input type="text" name="education[dateScopeFrom][]" class="form-control" placeholder="e.g. 2012">
                                                        <span class="input-group-addon">Date to</span>
                                                        <input type="text" name="education[dateScopeEnd][]" class="form-control" placeholder="e.g. 2016">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="form-control" name="education[short_desc][]" rows="3" placeholder="Short description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 duplicateable-content">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="dropify" name="education[image][]" data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                                                    <span class="help-block">Please choose a square logo</span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" name="education[degree][]" class="form-control" placeholder="Degree, e.g. Bachelor">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="education[major][]" class="form-control" placeholder="Major, e.g. Computer Science">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="education[school][]" class="form-control"
                                                           placeholder="School name, e.g. Massachusetts Institute of Technology">
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Date from</span>
                                                        <input type="text" name="education[dateScopeFrom][]" class="form-control" placeholder="e.g. 2012">
                                                        <span class="input-group-addon">Date to</span>
                                                        <input type="text" name="education[dateScopeEnd][]" class="form-control" placeholder="e.g. 2016">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="form-control" name="education[short_desc][]" rows="3" placeholder="Short description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center">
                                <br>
                                <button class="btn btn-primary btn-duplicator">Add education</button>
                            </div>


                        </div>
                    </div>
                </section>
                <!-- END Education -->


                <!-- Work Experience -->
                <section>
                    <div class="container">
                        <header class="section-header">
                            <span>Past positions</span>
                            <h2>Work Experience</h2>
                        </header>

                        <div class="row">

                            <div class="col-xs-12">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="dropify" name="experience[image][]" data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                                                    <span class="help-block">Please choose a square logo</span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" name="experience[name][]" class="form-control" placeholder="Company name">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="experience[positon][]" placeholder="Position, e.g. UI/UX Researcher">
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Date from</span>
                                                        <input type="text" name="experience[dateScopeFrom][]" class="form-control" placeholder="e.g. 2012">
                                                        <span class="input-group-addon">Date to</span>
                                                        <input type="text" name="experience[dateScopeEnd][]" class="form-control" placeholder="e.g. 2016">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <textarea name="experience[desc][]" class="summernote-editor"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 duplicateable-content">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <input type="file" class="dropify" name="experience[image][]" data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                                                    <span class="help-block">Please choose a square logo</span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" name="experience[name][]" class="form-control" placeholder="Company name">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="experience[positon][]" placeholder="Position, e.g. UI/UX Researcher">
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Date from</span>
                                                        <input type="text" name="experience[dateScopeFrom][]" class="form-control" placeholder="e.g. 2012">
                                                        <span class="input-group-addon">Date to</span>
                                                        <input type="text" name="experience[dateScopeEnd][]" class="form-control" placeholder="e.g. 2016">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <textarea name="experience[desc][]" class="summernote-editor"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center">
                                <br>
                                <button class="btn btn-primary btn-duplicator">Add experience</button>
                            </div>


                        </div>

                    </div>
                </section>
                <!-- END Work Experience -->


                <!-- Skills -->
                <section class=" bg-alt">
                    <div class="container">
                        <header class="section-header">
                            <span>Expertise Areas</span>
                            <h2>Skills</h2>
                        </header>

                        <div class="row">

                            <div class="col-xs-12">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="skill[name][]" class="form-control" placeholder="Skill name, e.g. HTML">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-6">

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" name="skill[rate][]" class="form-control" placeholder="Skill proficiency, e.g. 90">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 duplicateable-content">
                                <div class="item-block">
                                    <div class="item-form">

                                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="skill[name][]" class="form-control" placeholder="Skill name, e.g. HTML">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-6">

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" name="skill[rate][]" class="form-control" placeholder="Skill proficiency, e.g. 90">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center">
                                <br>
                                <button class="btn btn-primary btn-duplicator">Add skills</button>
                            </div>


                        </div>

                    </div>
                </section>
                <!-- END Skills -->


                <!-- Submit -->
                <section class=" bg-img" style="background-image: url(assets/img/bg-facts.jpg);">
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
        @endsection
    </form>

@section('js')
    <script src="{{asset("assets/vendors/summernote/summernote.js")}}"></script>
@endsection