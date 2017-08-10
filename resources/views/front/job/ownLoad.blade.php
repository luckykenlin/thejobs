<div class="col-xs-12 text-right">
    <br>
    <a class="btn btn-primary btn-sm" href="{{url('job/create')}}">Add new job</a>
</div>

@foreach($jobs as $job)
    <!-- Job item -->
    <a href="{{url('job/'.$job->id).'/edit'}}">
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
                    <p class="status"><strong>Status:</strong> Expires on 14 April</p>

                    <div class="action-btn">
                        <a class="btn btn-xs btn-gray" href="#">Edit</a>
                        <a class="btn btn-xs btn-success" href="#">Mark filled</a>
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
    {{$jobs->links()}}
</nav>
<!-- END Page navigation -->
<script src="{{asset('js/datadelete.js')}}"></script>