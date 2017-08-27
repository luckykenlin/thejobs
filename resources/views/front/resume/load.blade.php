<div class="row">
    <div class="col-xs-12">
        <h5>We found <strong>{{$resumes->total()}}</strong> matches, you're watching <i>{{$resumes->firstItem()}}</i> to <i>{{$resumes->lastItem()}}</i></h5>
    </div>
    @if(Session::has('show') and session('show') == 'Grid') </div> @endif
@foreach($resumes as $key => $resume)

        @if(Session::has('show'))
            @if(session('show') == 'Grid')
                @if($key%2 != 1)
                    <div class="row">@endif
                <!-- Resume detail -->
                    <div class="col-sm-12 col-md-6">
                        <a class="item-block" href="{{url('resume', $resume->id)}}">
                            <header>
                                <img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt="">
                                <div class="hgroup">
                                    <h4>{{$resume->name}}</h4>
                                    <h5>{{$resume->job_title}}</h5>
                                </div>
                            </header>

                            <div class="item-body equal_height">
                                <p>{{$resume->short_desc}}</p>

                                <div class="tag-list">
                                    {{--<span>SKILL</span>--}}
                                    {{--<span>SKILL</span>--}}
                                    {{--<span>SKILL</span>--}}
                                    {{--<span>SKILL</span>--}}
                                </div>
                            </div>

                            <footer>
                                <ul class="details cols-2">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span>{{$resume->location}}</span>
                                    </li>

                                    <li>
                                        <i class="fa fa-money"></i>
                                        <span>${{$resume->hourly_rate}} / hour</span>
                                    </li>
                                </ul>
                            </footer>
                        </a>
                    </div>
                    <!-- END Resume detail -->
                    @if($key%2  or  $key+1 == $resumes->count()) </div> @endif
    @else
        <!-- Resume detail -->
        <div class="col-xs-12">
            <a class="item-block" href="{{url('resume', $resume->id)}}">
                <header>
                    <img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt="">
                    <div class="hgroup">
                        <h4>{{$resume->name}}</h4>
                        <h5>{{$resume->job_title}}</h5>
                    </div>
                </header>

                <div class="item-body">
                    <p>{{$resume->short_desc}}</p>

                    <div class="tag-list">
                        <span>SKILL</span>
                        <span>SKILL</span>
                        <span>SKILL</span>
                        <span>SKILL</span>
                    </div>
                </div>

                <footer>
                    <ul class="details cols-3">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>{{$resume->location}}</span>
                        </li>

                        <li>
                            <i class="fa fa-money"></i>
                            <span>${{$resume->hourly_rate}} / hour</span>
                        </li>

                        <li>
                            <i class="fa fa-certificate"></i>
                            <span>学位</span>
                        </li>
                    </ul>
                </footer>
            </a>
        </div>
        <!-- END Resume detail -->
    @endif
    @else
        <!-- Resume detail -->
        <div class="col-xs-12">
            <a class="item-block" href="{{url('resume', $resume->id)}}">
                <header>
                    <img class="resume-avatar" src="{{config('app.url').'/'.$resume->image}}" alt="">
                    <div class="hgroup">
                        <h4>{{$resume->name}}</h4>
                        <h5>{{$resume->job_title}}</h5>
                    </div>
                </header>

                <div class="item-body">
                    <p>{{$resume->short_desc}}</p>

                    <div class="tag-list">
                        <span>SKILL</span>
                        <span>SKILL</span>
                        <span>SKILL</span>
                        <span>SKILL</span>
                    </div>
                </div>

                <footer>
                    <ul class="details cols-3">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>{{$resume->location}}</span>
                        </li>

                        <li>
                            <i class="fa fa-money"></i>
                            <span>${{$resume->hourly_rate}} / hour</span>
                        </li>

                        <li>
                            <i class="fa fa-certificate"></i>
                            <span>学位</span>
                        </li>
                    </ul>
                </footer>
            </a>
        </div>
        <!-- END Resume detail -->
    @endif
@endforeach




<!-- Page navigation -->
<nav class="text-center">
    {{$resumes->fragment('scroll-mian')->links()}}
</nav>
<!-- END Page navigation -->

</div>