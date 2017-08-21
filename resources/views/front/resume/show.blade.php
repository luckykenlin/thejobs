@extends('layouts.front')
@section('title')
    <title> Resume detail </title>
@endsection
@section('header')
    @include('front.resume.detailHeader')
@endsection
@section('content')
    <main>


        <!-- Education -->
        <section>
            <div class="container">

                <header class="section-header">
                    <span>Latest degrees</span>
                    <h2>Education</h2>
                </header>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>
                                <img src="assets/img/logo-mit.png" alt="">
                                <div class="hgroup">
                                    <h4>Master <small>Computer Science</small></h4>
                                    <h5>Massachusetts Institute of Technology</h5>
                                </div>
                                <h6 class="time">2012 - 2014</h6>
                            </header>
                            <div class="item-body">
                                <p>The Massachusetts Institute of Technology (MIT) is a private research university in Cambridge, Massachusetts. Founded in 1861 in response to the increasing industrialization of the United States, MIT adopted a European polytechnic university model and stressed laboratory instruction in applied science and engineering.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>
                                <img src="assets/img/logo-berkeley.png" alt="">
                                <div class="hgroup">
                                    <h4>Bachelor <small>Computer Science</small></h4>
                                    <h5>University of California, Berkeley</h5>
                                </div>
                                <h6 class="time">2008 - 2012</h6>
                            </header>
                            <div class="item-body">
                                <p>The University of California, Berkeley is a public research university located in Berkeley, California. It is the flagship campus of the University of California system, one of three parts in the state's public higher education plan, which also includes the California State University system and the California Community Colleges System.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- END Education -->


        <!-- Work Experience -->
        <section class="bg-alt">
            <div class="container">
                <header class="section-header">
                    <span>Past positions</span>
                    <h2>Work Experience</h2>
                </header>

                <div class="row">

                    <!-- Work item -->
                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>
                                <img src="assets/img/logo-google.jpg" alt="">
                                <div class="hgroup">
                                    <h4>Google</h4>
                                    <h5>Senior front-end developer</h5>
                                </div>
                                <h6 class="time">Jan 2016 - Present</h6>
                            </header>
                            <div class="item-body">
                                <p>Responsibilities:</p>
                                <ul>
                                    <li>Developed front-end for world-class online social viewing video and chat platform using xHTML, CSS, ActionScript 2-3, Javascript, and XML.</li>
                                    <li>Developed built-in chat application into Flash video player in ActionScript 3.</li>
                                    <li>Built and developed sites for ABC Family properties such as Gilmore Girls, The Middleman, Secret Life of an American Teenager, Greek, and Kyle XY. </li>
                                    <li>Translate designs into responsive web interfaces </li>
                                    <li>Collaboration with the graphic designer on the front-end aspect of development. </li>
                                    <li>Cross-platform cross-browser development. </li>
                                    <li>Some back-end development in collaboration with senior developer.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Work item -->


                    <!-- Work item -->
                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>
                                <img src="assets/img/logo-facebook.png" alt="">
                                <div class="hgroup">
                                    <h4>Facebook</h4>
                                    <h5>Interface developer</h5>
                                </div>
                                <h6 class="time">Aug 2014 - Jan 2016</h6>
                            </header>
                            <div class="item-body">
                                <p>Responsibilities:</p>
                                <ul>
                                    <li>Work as a part of a large team on a major corporate project</li>
                                    <li>Responsible for all aspects of presentation layer development including developing templates using HTML, DHTML, Javascript, XML, and XSL.</li>
                                    <li>Rapid-prototyping for usability studies and new business development.</li>
                                    <li>Collaboration with the graphic designer on the front-end aspect of development.</li>
                                    <li>Some back-end development in collaboration with senior developer.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Work item -->


                    <!-- Work item -->
                    <div class="col-xs-12">
                        <div class="item-block">
                            <header>
                                <img src="assets/img/logo-envato.png" alt="">
                                <div class="hgroup">
                                    <h4>Envato</h4>
                                    <h5>Quality assurance engineer</h5>
                                </div>
                                <h6 class="time">Mar 2012 - Jun 2014</h6>
                            </header>
                            <div class="item-body">
                                <p>Responsibilities:</p>
                                <ul>
                                    <li>Software testing in a Web Applications/Mobile environment.</li>
                                    <li>Software Test Plans from Business Requirement Specifications for test engineering group.</li>
                                    <li>Run production tests as part of software implementation; Create, deliver and support test plans for testing group to execute.</li>
                                    <li>Software testing in a Web Applications environment.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Work item -->


                </div>

            </div>
        </section>
        <!-- END Work Experience -->


        <!-- Skills -->
        <section>
            <div class="container">
                <header class="section-header">
                    <span>Expertise Areas</span>
                    <h2>Skills</h2>
                </header>

                <br>
                <ul class="skills cols-3">
                    <li>
                        <div>
                            <span class="skill-name">HTML</span>
                            <span class="skill-value">100%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </li>

                    <li>
                        <div>
                            <span class="skill-name">CSS</span>
                            <span class="skill-value">95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 95%;"></div>
                        </div>
                    </li>

                    <li>
                        <div>
                            <span class="skill-name">Javascript</span>
                            <span class="skill-value">80%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 80%;"></div>
                        </div>
                    </li>

                    <li>
                        <div>
                            <span class="skill-name">Photoshop</span>
                            <span class="skill-value">60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 60%;"></div>
                        </div>
                    </li>

                    <li>
                        <div>
                            <span class="skill-name">ReactJS</span>
                            <span class="skill-value">70%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%;"></div>
                        </div>
                    </li>

                    <li>
                        <div>
                            <span class="skill-name">Team work</span>
                            <span class="skill-value">90%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 90%;"></div>
                        </div>
                    </li>
                </ul>

            </div>
        </section>
        <!-- END Skills -->


    </main>
@endsection