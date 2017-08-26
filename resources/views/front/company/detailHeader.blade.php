<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container">
        <div class="header-detail">
            <img class="logo" src="{{config('app.url').'/'.$company->image}}" alt="logo">
            <div class="hgroup">
                <h1>{{$company->name}}</h1>
                <h3>{{$company->categories->name}}</h3>
            </div>
            <hr>
            <p class="lead">{{$company->short_desc}}</p>

            <ul class="details cols-3">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>{{$company->location}}</span>
                </li>

                <li>
                    <i class="fa fa-globe"></i>
                    <a href="{{$company->website_url}}">{{$company->website_url}}</a>
                </li>

                <li>
                    <i class="fa fa-users"></i>
                    <span>{{$company->employer_num}} employer</span>
                </li>

                <li>
                    <i class="fa fa-birthday-cake"></i>
                    <span>{{$company->founded_on}}</span>
                </li>

                <li>
                    <i class="fa fa-phone"></i>
                    <span>{{$company->phone}}</span>
                </li>

                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#">{{$company->email}}</a>
                </li>
            </ul>

            <div class="button-group">
                <ul class="social-icons">
                    @foreach($company->medias as $media)
                        <li><a class="{{$media->name}}" href="{{$media->url}}"><i class="fa fa-{{$media->name}}"></i></a></li>
                    @endforeach
                </ul>

                <div class="action-buttons">
                    <a class="btn btn-gray" href="#">Favorite</a>
                    <a class="btn btn-success" href="#">Contact</a>
                </div>
            </div>

        </div>
    </div>
</header>