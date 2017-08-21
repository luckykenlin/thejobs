@foreach($resumes as $resume)
    <!-- Resume item -->
    <div class="col-xs-12">
        <div class="item-block">
            <header>
                <a href="{{url('resume', $resume->id)}}"><img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt=""></a>
                <div class="hgroup">
                    <h4><a href="resume-detail.html">{{$resume->name}}</a></h4>
                    <h5>{{$resume->job_title}}</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$resume->location}}</span>
                    <span class="rate">${{$resume->hourly_rate}} / hour</span>
                </div>
            </header>

            <footer>
                <p class="status"><strong>Updated on:</strong> {{$resume->updated_at->format('M d ,  Y')}}</p>

                <div class="action-btn">
                    <a class="btn btn-xs btn-gray" href="#">Hide</a>
                    <a class="btn btn-xs btn-gray" href="{{url('resume/'.$resume->id).'/edit'}}">Edit</a>
                    <a class="btn btn-xs btn-danger" href="{{route('resume.delete', $resume->id)}}">Delete</a>
                </div>
            </footer>
        </div>
    </div>
    <!-- END Resume item -->
@endforeach

<!-- Page navigation -->
<nav class="text-center">
    {{$resumes->links()}}
</nav>
<!-- END Page navigation -->
<script src="{{asset('js/dataUtility.js')}}"></script>