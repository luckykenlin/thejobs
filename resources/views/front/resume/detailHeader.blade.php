<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <img src="{{config('app.url').'/'.$resume->image}}" alt="profile picture">
            </div>

            <div class="col-xs-12 col-sm-8 header-detail">
                <div class="hgroup">
                    <h1>{{$resume->name}}</h1>
                    <h3>{{$resume->job_title}}</h3>
                </div>
                <hr>
                <p class="lead">{{$resume->short_desc}}</p>

                <ul class="details cols-2">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <span>{{$resume->location}}</span>
                    </li>

                    <li>
                        <i class="fa fa-globe"></i>
                        <a href="{{$resume->website_url}}">{{$resume->website_url}}</a>
                    </li>

                    <li>
                        <i class="fa fa-money"></i>
                        <span>${{$resume->hourly_rate}} / hour</span>
                    </li>

                    <li>
                        <i class="fa fa-birthday-cake"></i>
                        <span>{{$resume->age}} years-old</span>
                    </li>

                    <li>
                        <i class="fa fa-phone"></i>
                        <span>{{$resume->phone}}</span>
                    </li>

                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="#">{{$resume->email}}</a>
                    </li>
                </ul>

                <div class="tag-list">
                    @foreach($resume->tags as $tag)
                        <span>{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="button-group">
            <ul class="social-icons">
                @foreach($resume->medias as $media)
                    <li><a class="{{$media->name}}" href="{{$media->url}}"><i class="fa fa-{{$media->name}}"></i></a></li>
                @endforeach
            </ul>

            <div class="action-buttons">
                <a class="btn btn-gray" href="{{$resume->cv_url? url('download' ,urlencode($resume->cv_url)) : '#'}}">Download CV</a>
                <a class="btn btn-success" data-toggle="modal" data-target="#modal-contact" href="#">Contact me</a>
            </div>
        </div>
    </div>
</header>