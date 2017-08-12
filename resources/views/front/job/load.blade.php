<div class="row item-blocks-condensed">
    <div class="col-xs-12">
        <h5>We found <strong>{{$jobs->total()}}</strong> matches, you're watching <i>{{$jobs->firstItem()}}</i> to
            <i>{{$jobs->lastItem()}}</i></h5>
    </div>
@foreach($jobs as $job)
    <!-- Job item -->
        <div class="col-xs-12">
            <div class="item-block" style="cursor: pointer" onclick="window.location.href = '{{url('job/'.$job->id)}}'">
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
            </div>
        </div>
        <!-- END Job item -->
@endforeach
<!-- Page navigation -->
    <nav class="text-center">
        {{$jobs->links()}}
    </nav>
    <!-- END Page navigation -->
</div>
