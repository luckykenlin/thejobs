<div class="row item-blocks-condensed">
    <div class="col-xs-12">
        <h5>We found <strong>{{$jobs->total()}}</strong> matches, you're watching <i>{{$jobs->firstItem()}}</i> to
            <i>{{$jobs->lastItem()}}</i></h5>
    </div>

@foreach($jobs as $job)
    @if(Session::has('show'))
        @if(session('show') == 'Detail')
            <!-- Job item -->
                <div class="col-xs-12">
                    <a class="item-block" href="{{url('job/'.$job->id)}}">
                        <header>
                            <img src="{{config('app.url')."/assets/img/job.png"}}" alt="job_logo">
                            <div class="hgroup">
                                <h4>{{$job->job_name}}</h4>
                                <h5>{{$job->companies->name}} <span
                                            class="{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "label label-success" : "label label-warning"}}">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "full time" : "part time"}}</span>
                                </h5>
                            </div>
                            <time datetime="2016-03-10 20:00">{{App\Utility\DateUtility::timemaker($job->updated_at)}}</time>
                        </header>

                        <div class="item-body">
                            <p>{{$job->short_desc}}</p>
                        </div>

                        <footer>
                            <ul class="details cols-3">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{$job->job_place}}</span>
                                </li>

                                <li>
                                    <i class="fa fa-money"></i>
                                    <span>{{$job->job_salary}} dollars / month</span>
                                </li>

                                <li>
                                    <i class="fa fa-certificate"></i>
                                    <span>{{$job->job_level}} years experiences</span>
                                </li>
                            </ul>
                        </footer>
                    </a>
                </div>
                <!-- END Job item -->
        @else
            <!-- Job item -->
                <div class="col-xs-12">
                    <div class="item-block" style="cursor: pointer" onclick="window.location.href = '{{url('job/'.$job->id)}}'">
                        <header>
                            <img src="{{config('app.url')."/assets/img/job.png"}}" alt="job_logo">
                            <div class="hgroup">
                                <h4>{{$job->job_name}}</h4>
                                <h5><a href="tel:{{$job->phone}}">{{$job->job_contact}} : {{$job->phone}}</a></h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">{{$job->job_place}}</span>
                                <span class="{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "label label-success" : "label label-warning"}}">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "full time" : "part time"}}</span>
                            </div>
                        </header>
                    </div>
                </div>
                <!-- END Job item -->
            @endif
    @else
        <!-- Job item -->
            <div class="col-xs-12">
                <div class="item-block" style="cursor: pointer" onclick="window.location.href = '{{url('job/'.$job->id)}}'">
                    <header>
                        <img src="{{config('app.url')."/assets/img/job.png"}}"bbbb alt="job_logo">
                        <div class="hgroup">
                            <h4>{{$job->job_name}}</h4>
                            <h5><a href="tel:{{$job->phone}}">{{$job->job_contact}} : {{$job->phone}}</a></h5>
                        </div>
                        <div class="header-meta">
                            <span class="location">{{$job->job_place}}</span>
                            <span class="{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "label label-success" : "label label-warning"}}">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "full time" : "part time"}}</span>
                        </div>
                    </header>
                </div>
            </div>
            <!-- END Job item -->
    @endif
@endforeach
<!-- Page navigation -->
    <nav class="text-center">
        {{$jobs->links()}}
    </nav>
    <!-- END Page navigation -->
</div>

