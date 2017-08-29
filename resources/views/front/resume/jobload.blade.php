<header class="section-header">
    <span>vacancies</span>
    <h2>Open positions</h2>
</header>

<div class="row">
    <!-- Job item -->

    <!-- END Job item -->

@foreach($jobs as $job)
    <!-- Job item -->
        @if(Auth::check() and $job->companies->user_id == Auth::user()->id)
            <a href="{{url('job/'.$job->id)}}">
                <div class="col-xs-12">

                    <div class="item-block">
                        <header>
                            <img src="{{config('app.url')."/assets/img/job.png"}}" alt="">
                            <div class="hgroup">
                                <h4>{{$job->job_name}}</h4>
                                <h5><a href="tel:{{$job->phone}}">{{$job->job_contact}} : {{$job->phone}}</a></h5>
                            </div>
                            <div class="header-meta">
                                <span class="location">{{$job->job_place}}</span>
                                <span class="{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "label label-success" : "label label-warning"}}">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "full time" : "part time"}}</span>
                            </div>
                        </header>

                        <footer>
                            <p class="status"><strong>Published:</strong>{{$job->updated_at}}</p>

                            <div class="action-btn">
                                <a class="btn btn-xs btn-gray" href="{{url('job/'.$job->id).'/edit'}}">Edit</a>
                                <a class="btn btn-xs btn-success" href="#">Mark filled</a>
                                <a class="btn btn-xs btn-danger" href="{{route('job.delete', $job->id)}}"
                                >Delete</a>
                            </div>
                        </footer>
                    </div>

                </div>
            </a>
        @else
            <div class="col-xs-12">
                <a class="item-block" href="{{url('job'.'/'.$job->id)}}">
                    <header>
                        <img src="{{config('app.url').'/'.$job->companies->image}}" alt="logo">
                        <div class="hgroup">
                            <h4>{{$job->job_name}}</h4>
                            <h5>{{$job->companies->name}} <span
                                        class="label label-success">{{$job->job_type == \App\Contracts\Constant::FULL_TIME? "FULL TIME" : "PART TIME"}}</span>
                            </h5>
                        </div>
                        <time datetime="2016-03-10 20:00">34 min ago</time>
                    </header>

                    <div class="item-body">
                        {{$job->short_desc}}
                    </div>

                    <footer>
                        <ul class="details cols-3">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>{{$job->job_place}}</span>
                            </li>

                            <li>
                                <i class="fa fa-money"></i>
                                <span>${{$job->job_salary}} / month</span>
                            </li>

                            <li>
                                <i class="fa fa-certificate"></i>
                                <span>{{$job->job_level}} years experiences</span>
                            </li>
                        </ul>

                    </footer>
                </a>
            </div>
        @endif
    <!-- END Job item -->

    @endforeach
    <nav class="text-center">
        {{$jobs->links()}}
    </nav>
</div>
<script src="{{asset('js/dataUtility.js')}}"></script>