<header class="section-header">
    <span>Apply with a resume</span>
    <h2>Select a resume</h2>
</header>
@foreach($resumes as $resume)
    <!-- Resume item -->
        <div class="item-block">
            <header>
                <a href="{{url('resume', $resume->id)}}"><img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt=""></a>
                <div class="hgroup">
                    <h4><a href="{{url('resume', $resume->id)}}">{{$resume->name}}</a></h4>
                    <h5>{{$resume->job_title}}@if($resume->status == \App\Contracts\Constant::HIDE) <span class="label label-info">Hidden</span> @endif</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$resume->location}}</span>
                    <span class="rate">${{$resume->hourly_rate}} / hour</span>
                </div>
            </header>

            <footer>
                <p class="status"><strong>Updated on:</strong> {{$resume->updated_at->format('M d ,  Y')}}</p>

                <div class="action-btn">
                    <a class="btn btn-xs btn-gray" href="{{url('resume/'.$resume->id).'/edit'}}">Edit</a>
                    <a class="btn btn-xs btn-success select" href="{{url('job-apply').'/'.$job->id.'/'.$resume->id}}">Select</a>
                </div>
            </footer>
        </div>
    <!-- END Resume item -->
@endforeach

<br>
<div class="row">
    <div class="col-xs-12 col-md-3">
        <a class="btn btn-block btn-primary" href="{{url('resume/create')}}">Add new resume</a>
    </div>
</div>

<!-- Page navigation -->
<nav class="text-center">
    {{$resumes->fragment('sec-resume')->links()}}
</nav>
<!-- End page navigation -->
<script src="{{asset('js/dataUtility.js')}}"></script>