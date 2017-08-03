<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="index.html"><img src="{{config('app.url')."/assets/img/logo.png"}}" alt="logo"></a>
                <a class="logo-alt" href="index.html"><img src="{{config('app.url')."/assets/img/logo-alt.png"}}" alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <div class="pull-right user-login-custom ">
        <div class="dropdown pull-left">
            <button  class="btn  btn-primary btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></button>
            @include('front.auth.login')
        </div>
        <div class="dropdown pull-right">
              &nbsp; or &nbsp;&nbsp;
            <button  class="btn  btn-primary btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></button>
            @include('front.auth.register')
        </div>
        </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
            <li>
                <a class="active" href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('job')}}">Job</a>
                <ul>
                    <li><a href="job-add.html">Post a job</a></li>
                    <li><a href="job-apply.html">Apply for job</a></li>
                    @if(Auth::check())
                        <li><a href="job-manage.html">Manage jobs</a></li>
                    @endif
                    <li><a href="job-candidates.html">Candidates</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Resume</a>
                <ul>
                    <li><a href="resume-list.html">Browse resumes</a></li>
                    <li><a href="resume-add.html">Create a resume</a></li>
                    @if(Auth::check())
                        <li><a href="resume-manage.html">Manage resumes</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#">Company</a>
                <ul>
                    <li><a href="company-list.html">Browse companies</a></li>
                    <li><a href="company-add.html">Create a company</a></li>
                    @if(Auth::check())
                        <li><a href="company-manage.html">Manage companies</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#">Contact us</a>
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