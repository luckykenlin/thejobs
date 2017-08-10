<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="index.html"><img src="{{config('app.url')."/assets/img/logo.png"}}"
                                                       alt="logo"></a>
                <a class="logo-alt" href="index.html"><img src="{{config('app.url')."/assets/img/logo-alt.png"}}"
                                                           alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        @if(!Auth::check())
            <div class="pull-right user-login-custom ">

                <div class="dropdown pull-left">
                    <button class="btn  btn-primary btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></button>
                    @include('front.auth.login')
                </div>
                <div class="dropdown pull-right">
                    &nbsp; or &nbsp;&nbsp;
                    <button class="btn  btn-primary btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></button>
                    @include('front.auth.register')
                </div>
            </div>
    @endif

    <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            @if(Auth::check())
                <li class="pull-right">
                    <a href="#">{{Auth::user()->name}}</a>
                    <img src="{{asset(Auth::user()->image)}}" class="user-image"
                         alt="User Image">
                    <ul>
                        <li><a href="{{url('job-manage')}}">Manage jobs</a></li>
                        <li><a href="{{url('company-manage')}}">Manage companies</a></li>
                        <li><a href="{{url('resume-manage')}}">Manage resumes</a></li>
                        <li><a href="{{url('post-manage')}}">Manage Posts</a></li>
                        <li><a href="#">Setting</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a class="{{ (Request::is('/') or  Request::is('home')) ? 'active' : '' }}" href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a class="{{ Request::is('job') ? 'active' : '' }}" href="{{url('job')}}">Job</a>
                <ul>
                    <li><a href="{{url('job')}}">Browse jobs</a></li>
                    <li><a href="{{url('job/create')}}">Post a job</a></li>
                    <li><a href="job-apply.html">Apply for job</a></li>
                    @if(Auth::check())
                        <li><a href="{{url('job-manage')}}">Manage jobs</a></li>
                    @endif
                    <li><a href="job-candidates.html">Candidates</a></li>
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('resume') ? 'active' : '' }}" href="#">Resume</a>
                <ul>
                    <li><a href="resume-list.html">Browse resumes</a></li>
                    <li><a href="resume-add.html">Create a resume</a></li>
                    @if(Auth::check())
                        <li><a href="resume-manage.html">Manage resumes</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('company') ? 'active' : '' }}" href="{{url('company')}}">Company</a>
                <ul>
                    <li><a href="{{url('company')}}">Browse companies</a></li>
                    <li><a href="{{url('company/create')}}">Create a company</a></li>
                    @if(Auth::check())
                        <li><a href="{{url('company-manage')}}">Manage companies</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('contact') ? 'active' : '' }}" href="#">Contact us</a>
                <ul>
                    <li><a href="page-blog.html">Blog</a></li>
                    <li><a href="page-about.html">About</a></li>
                    <li><a href="page-contact.html">Contact</a></li>
                    <li><a href="page-faq.html">FAQ</a></li>
                    <li><a href="page-pricing.html">Pricing</a></li>
                </ul>
            </li>
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>