@extends('layouts.front')
@section('title')
    <title> job </title>
@endsection
@section('content')
    <div role="main" class="main">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar">

                        <h4 class="heading-primary"><strong>Filter</strong> By</h4>

                        <ul class="nav nav-list mb-xlg sort-source" data-sort-id="portfolio" data-option-key="filter"
                            data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
                            <li data-option-value="*" class="active"><a href="#">Show All</a></li>
                            <li data-option-value=".websites"><a href="#">Websites</a></li>
                            <li data-option-value=".logos"><a href="#">Logos</a></li>
                            <li data-option-value=".brands"><a href="#">Brands</a></li>
                            <li data-option-value=".medias"><a href="#">Medias</a></li>
                        </ul>

                        <hr class="invisible mt-xl mb-sm">

                        <h4 class="heading-primary">Contact <strong>Us</strong></h4>
                        <p>Contact us or give us a call to discover how we can help.</p>

                        <form id="contactForm" action="php/contact-form.php" method="POST" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Your name *</label>
                                        <input type="text" value="" data-msg-required="Please enter your name."
                                               maxlength="100" class="form-control" name="name" id="name" required=""
                                               aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Your email address *</label>
                                        <input type="email" value=""
                                               data-msg-required="Please enter your email address."
                                               data-msg-email="Please enter a valid email address." maxlength="100"
                                               class="form-control" name="email" id="email" required=""
                                               aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Subject</label>
                                        <input type="text" value="" data-msg-required="Please enter the subject."
                                               maxlength="100" class="form-control" name="subject" id="subject"
                                               required="" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Message *</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message."
                                                  rows="3" class="form-control" name="message" id="message" required=""
                                                  aria-required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary mb-xl"
                                           data-loading-text="Loading...">

                                    <div class="alert alert-success hidden" id="contactSuccess">
                                        Message has been sent to us.
                                    </div>

                                    <div class="alert alert-danger hidden" id="contactError">
                                        Error sending your message.
                                    </div>
                                </div>
                            </div>
                        </form>

                        <ul class="list list-icons list-icons-style-3 mt-xlg">
                            <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name,
                                United States
                            </li>
                            <li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
                            <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a
                                        href="mailto:mail@example.com">mail@example.com</a></li>
                        </ul>

                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="blog-posts">
                        <article class="post post-medium">
                            @foreach ($jobs as $job)
                                <div class="post-content">
                                    <h2><a href="{{url('job/'.$job->id)}}">{{$job->job_name}}</a>
                                    </h2>
                                    <p>{{$job->job_desc}}</p>
                                </div>
                            @endforeach
                        </article>
                        {{$jobs->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection