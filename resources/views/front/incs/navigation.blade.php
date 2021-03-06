<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="{{route('front.home')}}"><img src="{{config('app.url')."/assets/img/logo.png"}}"
                                                                    alt="logo"></a>
                <a class="logo-alt" href="{{route('front.home')}}"><img src="{{config('app.url')."/assets/img/logo-alt.png"}}"
                                                                        alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->
        @if(Auth::check())
            <div class="pull-right">
                <ul class="nav-menu">
                    <li>
                    <a href="#">{{Auth::user()->name}}</a>
                    <img src="{{asset(Auth::user()->image)}}" class="user-image"
                         alt="User Image">
                    <ul>
                        <li><a href="{{url('job-manage')}}">Manage jobs</a></li>
                        <li><a href="{{url('company-manage')}}">Manage companies</a></li>
                        <li><a href="{{url('resume-manage')}}">Manage resumes</a></li>
                        <li><a href="{{url('message')}}">Manage messages</a></li>

                        {{--<li><a href="{{url('post-manage')}}">Manage Posts</a></li>--}}
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
                </ul>
            </div>

        @endif
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
            <li>
                <a class="{{ (Request::is('/') or  Request::is('home')) ? 'active' : '' }}" href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a class="{{ Request::is('job') ? 'active' : '' }}" href="{{url('job')}}">Job</a>
                <ul>
                    <li><a href="{{url('job')}}">Browse jobs</a></li>
                    <li><a href="{{url('job/create')}}">Post a job</a></li>
                    @if(Auth::check())
                        <li><a href="{{url('job-manage')}}">Manage jobs</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a class="{{ Request::is('resume') ? 'active' : '' }}" href="{{url('resume')}}">Resume</a>
                <ul>
                    <li><a href="{{url('resume')}}">Browse resumes</a></li>
                    <li><a href="{{url('resume/create')}}">Create a resume</a></li>
                    @if(Auth::check())
                        <li><a href="{{url('resume-manage')}}">Manage resumes</a></li>
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
                <a class="{{ Request::is('contact') ? 'active' : '' }}" href="{{url('contact/about')}}">Contact us</a>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="{{url('contact/about')}}">About</a></li>
                    <li><a href="{{url('contact')}}">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </li>
        </ul>
        <!-- END Navigation menu -->

    </div>
</nav>