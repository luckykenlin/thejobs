<div class="row">
    <div class="col-xs-12">
        <h5>We found <strong>{{$companies->total()}}</strong> matches, you're watching <i>{{$companies->firstItem()}}</i> to <i>{{$companies->lastItem()}}</i></h5>
    </div>
@foreach($companies as $company)
    <!-- Company detail -->
    <div class="col-xs-12">
        <a class="item-block" href="{{url('company/'.$company->id)}}">
            <header>
                <img src="{{config('app.url')."/".$company->image}}" alt="company">
                <div class="hgroup">
                    <h4>{{$company->name}}</h4>
                    <h5>{{$company->categories->name}}</h5>
                </div>
                <span class="open-position">{{count($company->jobs)}} open position</span>
            </header>

            <div class="item-body">
                <p>Google Inc. is an American multinational technology company specializing in Internet-related services and products. These include online advertising technologies, search, cloud computing, and software. Most of its profits are derived from AdWords, an online advertising service that places advertising near the list of search results.</p>
            </div>
        </a>
    </div>
    <!-- END Company detail -->

@endforeach
<!-- Page navigation -->
    <nav class="text-center">
        {{$companies->links()}}
    </nav>
    <!-- END Page navigation -->

</div>