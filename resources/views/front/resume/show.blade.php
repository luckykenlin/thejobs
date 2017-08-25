@extends('layouts.front')
@section('title')
    <title> Resume detail </title>
@endsection
@section('header')
    @include('front.resume.detailHeader')
@endsection
@section('content')
    <main>

    @if($resume->educations->isNotEmpty())
        <!-- Education -->
            <section>
                <div class="container">

                    <header class="section-header">
                        <span>Latest degrees</span>
                        <h2>Education</h2>
                    </header>
                    <div class="row">

                    @foreach($resume->educations as $education)
                        <!-- Education item -->
                            <div class="col-xs-12">
                                <div class="item-block">
                                    <header>
                                        <img src="{{config('app.url')."/".$education->image}}" alt="">
                                        <div class="hgroup">
                                            <h4>{{$education->degree}}
                                                <small>{{$education->major}}</small>
                                            </h4>
                                            <h5>{{$education->school}}</h5>
                                        </div>
                                        <h6 class="time">{{$education->dateScopeFrom}} - {{$education->dateScopeEnd}}</h6>
                                    </header>
                                    <div class="item-body">
                                        <p>{{$education->short_desc}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--  End Education item -->
                        @endforeach

                    </div>
                </div>
            </section>
            <!-- END Education -->
    @endif

    @if($resume->experiences->isNotEmpty())
        <!-- Work Experience -->
            <section class="bg-alt">
                <div class="container">
                    <header class="section-header">
                        <span>Past positions</span>
                        <h2>Work Experience</h2>
                    </header>
                    <div class="row">

                    @foreach($resume->experiences as $experience)
                        <!-- Work item -->
                            <div class="col-xs-12">
                                <div class="item-block">
                                    <header>
                                        <img src="{{config('app.url')."/".$experience->image}}" alt="">
                                        <div class="hgroup">
                                            <h4>{{$experience->name}}</h4>
                                            <h5>{{$experience->positon}}</h5>
                                        </div>
                                        <h6 class="time">{{$experience->dateScopeFrom}} - {{$experience->dateScopeEnd}}</h6>
                                    </header>
                                    <div class="item-body">
                                        {{$experience->desc}}
                                    </div>
                                </div>
                            </div>
                        <!-- END Work item -->
                    @endforeach

                    </div>

                </div>
            </section>
            <!-- END Work Experience -->
    @endif

    @if($resume->skills->isNotEmpty())
        <!-- Skills -->
            <section>
                <div class="container">
                    <header class="section-header">
                        <span>Expertise Areas</span>
                        <h2>Skills</h2>
                    </header>

                    <br>
                    <ul class="skills cols-3">

                        @foreach($resume->skills as $skill)
                            <!--     Skill item   ---->
                            <li>
                                <div>
                                    <span class="skill-name">{{$skill->name}}</span>
                                    <span class="skill-value">{{$skill->rate}}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{$skill->rate}}%;"></div>
                                </div>
                            </li>
                            <!--  End Skill item   ---->
                        @endforeach
                    </ul>

                </div>
            </section>
            <!-- END Skills -->
        @endif

    </main>
@include('front.contact.message')
@endsection