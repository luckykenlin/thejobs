@extends('layouts.front')

@section('title')
    <title> Home </title>
@endsection
@section('header')
    @include('front.home.header')
@endsection
@section('content')
    <main>


        <!-- Recent jobs -->
        <section>
            <div class="container">
                <header class="section-header">
                    <span>Latest</span>
                    <h2>Recent jobs</h2>
                </header>

                <div class="row item-blocks-connected">
                @foreach($jobs as $job)
                    <!-- Job item -->
                        <div class="col-xs-12">
                            <div class="item-block" onclick="window.location.href = '{{url('job/'.$job->id)}}'">
                                <header>
                                    <img src="{{config('app.url')."/assets/img/job.png"}}" alt="">
                                    <div class="hgroup">
                                        <h4>{{$job->job_name}}</h4>
                                        <h5><a href="tel:{{$job->phone}}">{{$job->job_contact}} : {{$job->phone}}</a>
                                        </h5>
                                    </div>
                                    <div class="header-meta">
                                        <span class="location">{{$job->job_place}}</span>
                                        <span class="{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "label label-success" : "label label-warning"}}">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "full time" : "part time"}}</span>
                                    </div>
                                </header>
                            </div>
                        </div>
                        <!-- END Job item -->
                    @endforeach
                </div>
                <br><br>
                <p class="text-center"><a class="btn btn-info" href="{{url('job')}}">Browse all jobs</a></p>
            </div>
        </section>
        <!-- END Recent jobs -->


        <!-- Facts -->
        <section class="bg-img bg-repeat no-overlay section-sm">
            <div class="container">

                <div class="row">
                    <div class="counter col-md-3 col-sm-6">
                        <p><span data-from="0" data-to="6890" class="counted-before">6890</span>+</p>
                        <h6>Jobs</h6>
                    </div>

                    <div class="counter col-md-3 col-sm-6">
                        <p><span data-from="0" data-to="1200" class="counted-before">1200</span>+</p>
                        <h6>Members</h6>
                    </div>

                    <div class="counter col-md-3 col-sm-6">
                        <p><span data-from="0" data-to="36800" class="counted-before">36800</span>+</p>
                        <h6>Resume</h6>
                    </div>

                    <div class="counter col-md-3 col-sm-6">
                        <p><span data-from="0" data-to="15400" class="counted-before">15400</span>+</p>
                        <h6>Company</h6>
                    </div>
                </div>

            </div>
        </section>
        <!-- END Facts -->


        <!-- How it works -->
        <section>
            <div class="container">

                <div class="col-sm-12 col-md-6">
                    <header class="section-header text-left">
                        <span>Workflow</span>
                        <h2>How it works</h2>
                    </header>

                    <p class="lead">Pellentesque et pulvinar orci. Suspendisse sed euismod purus. Pellentesque nunc ex,
                        ultrices eu enim non, consectetur interdum nisl. Nam congue interdum mauris, sed ultrices augue
                        lacinia in. Praesent turpis purus, faucibus in tempor vel, dictum ac eros.</p>
                    <p>Nulla quis felis et orci luctus semper sit amet id dui. Aenean ultricies lectus nunc, vel rhoncus
                        odio sagittis eu. Sed at felis eu tortor mattis imperdiet et sed tortor. Nullam ac porttitor
                        arcu. Vivamus tristique elit id tempor lacinia. Donec auctor at nibh eget tincidunt. Nulla
                        facilisi. Nunc condimentum dictum mattis.</p>


                    <br><br>
                    <a class="btn btn-primary" href="page-typography.html">Learn more</a>
                </div>

                <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
                    <br>
                    <img class="center-block" src="assets/img/how-it-works.png" alt="how it works">
                </div>

            </div>
        </section>
        <!-- END How it works -->


        <!-- Categories -->
        <section class="bg-alt">
            <div class="container">
                <header class="section-header">
                    <span>Categories</span>
                    <h2>Popular categories</h2>
                    <p>Here's the most popular categories</p>
                </header>

                <div class="category-grid">
                    <a href="job-list-1.html" style="height: 295px;">
                        <i class="fa fa-laptop"></i>
                        <h6>Technology</h6>
                        <p>Designer, Developer, IT Service, Front-end developer, Project management</p>
                    </a>

                    <a href="job-list-2.html" style="height: 295px;">
                        <i class="fa fa-line-chart"></i>
                        <h6>Accounting</h6>
                        <p>Finance, Tax service, Payroll manager, Book keeper, Human resource</p>
                    </a>

                    <a href="job-list-3.html" style="height: 295px;">
                        <i class="fa fa-medkit"></i>
                        <h6>Medical</h6>
                        <p>Doctor, Nurse, Hospotal, Dental service, Massagist</p>
                    </a>

                    <a href="job-list-1.html" style="height: 295px;">
                        <i class="fa fa-cutlery"></i>
                        <h6>Food</h6>
                        <p>Restaurant, Food service, Coffe shop, Cashier, Waitress</p>
                    </a>

                    <a href="job-list-2.html" style="height: 295px;">
                        <i class="fa fa-newspaper-o"></i>
                        <h6>Media</h6>
                        <p>Journalism, Newspaper, Reporter, Writer, Cameraman</p>
                    </a>

                    <a href="job-list-3.html" style="height: 295px;">
                        <i class="fa fa-institution"></i>
                        <h6>Government</h6>
                        <p>Federal, Law, Human resource, Manager, Biologist</p>
                    </a>
                </div>

            </div>
        </section>
        <!-- END Categories -->


        <!-- Newsletter -->
        <section class="bg-img text-center" style="background-image: url({{asset("assets/img/bg-facts.jpg")}})">

            <div class="container">
                <h2><strong>Subscribe</strong></h2>
                <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
                <br><br>
                <form class="form-subscribe" action="#">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Your eamil address">
                        <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
                    </div>
                </form>
            </div>
        </section>
        <!-- END Newsletter -->


    </main>
@endsection
