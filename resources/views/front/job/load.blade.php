<article class="post post-medium">
    @foreach ($jobs as $job)
        <div class="post-content">
            <h2><a href="{{url('job/'.$job->id)}}">{{$job->job_name}}</a>
            </h2>
            <p>{{$job->job_desc}}</p>
        </div>
    @endforeach
</article>
{{$jobs->links()}}