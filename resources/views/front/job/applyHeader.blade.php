<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container no-shadow">
        <h1 class="text-center">Apply for the job</h1>
        <p class="lead text-center">Apply with your online resume, create new resume for the job, or make a custom application.</p>

        <hr>

        <!-- Job detail -->
        <a class="item-block item-block-flat" href="{{url('job', $job->id)}}">
            <header>
                <img src="{{config('app.url') . '/' . $job->companies->image}}" alt="">
                <div class="hgroup">
                    <h4>{{$job->job_name}}</h4>
                    <h5>{{$job->companies->name}}</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$job->job_place}}</span>
                    <time datetime="2016-03-10 20:00">{{\App\Utility\DateUtility::timemaker($job->updated_at)}}</time>
                </div>
            </header>
        </a>
        <!-- END Job detail -->

        <div class="button-group">
            <div class="action-buttons">
                <a class="btn btn-gray" href="#sec-custom">Custom application</a>
                <a class="btn btn-primary" href="#sec-resume">Apply with a resume</a>
            </div>
        </div>

    </div>
</header>