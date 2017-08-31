<div class="row">
@foreach($resumes as $resume)

    <!-- Candidate item -->
    <div class="col-xs-12">
        <div class="item-block">
            <header>
                <a href="{{url('resume' , $resume->id)}}"><img class="resume-avatar" src="{{url($resume->image)}}" alt=""></a>
                <div class="hgroup statuspicker">
                    <h4>
                        <a href="{{url('resume' , $resume->id)}}">{{$resume->name}}</a>
                        <select class="form-control selectpicker label-style">
                            @foreach(\App\Contracts\Constant::RESUME_STATUS as $key => $status)
                                <option value="{{url('job-candidates').'/'.$resume->pivot->job_id.'/'.$resume->id}}"
                                        data-content="<span class='{{\App\Utility\DataUtility::resumeStatus($status)['lable_style']}}'>{{$key}}</span>"
                                        {{$resume->pivot->status == $status? 'selected' : ''}}>
                                         {{$status}}
                                </option>
                            @endforeach
                        </select>
                    </h4>
                    <h5>Java developer</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$resume->location}}</span>
                    <span class="rate">${{$resume->hourly_rate}} per hour</span>
                </div>
            </header>
            <footer>
                <div class="status"><strong>Applied on:</strong>&nbsp;&nbsp;{{$resume->created_at->format('D m, y')}}</div>

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
<script>
        $('.statuspicker').delegate("select","change",function () {
            var page = $('.pagination .active span').text();
            var url = $(this).val();
            var taken = document.querySelector("#token").getAttribute("content");
            var status = $(this).find("option:selected").text();
            jQuery("#load").show();
            $.ajax({
                method: "POST",
                url: url+'?'+'&page='+page,
                data: {_token: taken , status: status}
            }).done(function (data) {
                jQuery("#load").hide();
                $('#loader').html(data);
                $('.selectpicker').selectpicker('refresh');
            }).fail(function () {
                alert('Something wrong!');
            });
        });
    </script>
</div>