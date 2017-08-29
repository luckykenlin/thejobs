@foreach($resumes as $resume)

    <!-- Candidate item -->
    <div class="col-xs-12">
        <div class="item-block">
            <header>
                <a href="{{url('resume' , $resume->id)}}"><img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt=""></a>
                <div class="hgroup">
                    <h4>
                        <a href="{{url('resume' , $resume->id)}}">{{$resume->name}}</a>
                        <select class="form-control selectpicker label-style">
                            <option data-content="<span class='label label-default'>New</span>" selected>New</option>
                            <option data-content="<span class='label label-warning'>Contacted</span>">Contacted</option>
                            <option data-content="<span class='label label-info'>Interviewed</span>">Interviewed</option>
                            <option data-content="<span class='label label-success'>Hired</span>">Hired</option>
                            <option data-content="<span class='label label-danger'>Archived</span>">Archived</option>
                        </select>
                    </h4>
                    <h5>{{$resume->job_title}}</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$resume->pivot->resume_id}}</span>
                    <span class="rate">${{$resume->hourly_rate}} per hour</span>
                </div>
            </header>

            <footer>
                <div class="status"><strong>Applied on:</strong> July 16, 2016</div>

                <div class="action-btn">
                    <a class="btn btn-xs btn-gray" href="{{$resume->cv_url? url('download' ,urlencode($resume->cv_url)) : '#'}}">Download CV</a>
                    <a class="btn btn-xs btn-gray" data-toggle="modal" data-target="#modal-contact" href="#">Contact</a>
                    <a class="btn btn-xs btn-danger" href="{{url('job-delete').'/'.$resume->pivot->job_id.'/'.$resume->pivot->id}}">Delete</a>
                </div>
            </footer>
        </div>
    </div>
    <!-- END Candidate item -->

@endforeach
<!-- Page navigation -->
<nav class="text-center">
    {{$resumes->fragment('sec-resume')->links()}}
</nav>
<!-- End page navigation -->
<script src="{{asset('js/dataUtility.js')}}"></script>