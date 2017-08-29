<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container">
        <div class="header-detail">
            <img class="logo" src="{{config('app.url').'/'.$job->companies->image}}" alt="logo">
            <div class="hgroup">
                <h1>{{$job->job_name}}</h1>
                <h3><a href="{{url('company' , $job->companies->id)}}">{{$job->companies->name}}</a></h3>
            </div>
            <time datetime="{{$job->updated_at}}">{{$job->time}}</time>
            <hr>
            <p class="lead">{{$job->short_desc}}</p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>{{$job->job_place}}</span>
                </li>

                <li>
                    <i class="fa fa-briefcase"></i>
                    <span>{{  \App\Utility\DataUtility::jobType($job->job_type)['lable']}}</span>
                </li>

                <li>
                    <i class="fa fa-money"></i>
                    <span>{{$job->job_salary}} dollars</span>
                </li>

                <li>
                    <i class="fa fa-child"></i>
                    <span>{{$job->job_contact}}</span>
                </li>

                <li>
                    <i class="fa fa-flask"></i>
                    <span>{{$job->job_level}} years experiences</span>
                </li>

                <li>
                    <i class="fa fa-phone"></i>
                    <a href="tel:{{$job->phone}}">{{$job->phone}}</a>
                </li>
            </ul>

            <div class="button-group">
                <ul class="social-icons">
                    <li class="title">Share on</li>
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>

                <div class="action-buttons">
                    <a class="btn btn-primary" href="#">Apply with linkedin</a>
                    <a class="btn btn-success" href="{{url('job-apply' , $job->id)}}">Apply now</a>
                </div>
            </div>

        </div>
    </div>
</header>