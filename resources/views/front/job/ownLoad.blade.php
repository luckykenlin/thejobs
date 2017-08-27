@foreach($jobs as $job)
    <!-- Job item -->
    <a href="{{url('job/'.$job->id)}}">
        <div class="col-xs-12">

            <div class="item-block">
                <header>
                    <img src="{{config('app.url')."/assets/img/job.png"}}" alt="">
                    <div class="hgroup">
                        <h4>{{$job->job_name}}</h4>
                        <h5>
                            <a href="tel:{{$job->phone}}">{{$job->job_contact}} : {{$job->phone}}</a>
                            <span class="
                                {{$job->job_status == \App\Contracts\Constant::JOB_FILLED? "label label-success" : "label label-danger"}}">
                                {{$job->job_status == \App\Contracts\Constant::JOB_FILLED? "FILLED" : "No-one found"}}
                            </span>
                        </h5>

                    </div>
                    <div class="header-meta">
                        <span class="location">{{$job->job_place}}</span>
                        <span class="{{   \App\Utility\DataUtility::jobType($job->job_type)['lable_style'] }}">
                                        {{  \App\Utility\DataUtility::jobType($job->job_type)['lable']}}</span>
                    </div>
                </header>

                <footer>
                    <p class="status"><strong>Published:</strong>{{$job->updated_at}}</p>

                    <div class="action-btn">
                        <a class="btn btn-xs btn-gray" href="{{url('job/'.$job->id).'/edit'}}">Edit</a>
                        <a class="btn btn-xs btn-success mark"
                           href="{{url('job-mark', $job->id)}}">{{$job->job_status == \App\Contracts\Constant::JOB_FILLED? 'Mark vacated' : 'Mark filled'}}</a>
                        <a class="btn btn-xs btn-danger" href="{{route('job.delete', $job->id)}}"
                        >Delete</a>
                    </div>
                </footer>
            </div>

        </div>
    </a>
    <!-- END Job item -->
@endforeach


<!-- Page navigation -->
<nav class="text-center">
    {{$jobs->fragment('scroll-mian')->links()}}
</nav>
<!-- END Page navigation -->
<script src="{{asset('js/dataUtility.js')}}"></script>