<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Job Candidates</h1>
        <p class="lead text-center">Use following search box to find best candidates for your openning position</p>
    </div>

    <div class="container">
        <h5>Applicants for</h5>
        <a class="item-block item-block-flat" href="{{url('job',$job->id)}}">
            <header>
                <img src="{{config('app.url').'/'.$job->companies->image}}" alt="job_logo">
                <div class="hgroup">
                    <h4>{{$job->job_name}}</h4>
                    <h5>{{$job->companies->name}}</h5>
                </div>
                <div class="header-meta">
                    <span class="location">{{$job->job_place}}</span>
                    <span class="{{   \App\Utility\DataUtility::jobType($job->job_type)['lable_style'] }}">
                                        {{  \App\Utility\DataUtility::jobType($job->job_type)['lable']}}</span>
                </div>
            </header>
        </a>

        <hr>

        <h5>Search</h5>
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker" multiple>
                        <option selected>All statuses</option>
                        <option>New</option>
                        <option>Contacted</option>
                        <option>Interviewed</option>
                        <option>Hired</option>
                        <option>Archived</option>
                    </select>
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker">
                        <option selected>Newest first</option>
                        <option>Oldest first</option>
                        <option>Low salary first</option>
                        <option>High salary first</option>
                        <option>Sort by name</option>
                    </select>
                </div>

            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-success">Download CSV</button>
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>

        </form>
    </div>
</header>