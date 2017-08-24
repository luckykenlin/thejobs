<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Edit job infomation</h1>
        <p class="lead text-center">Edit a vacancy for your company and put it online.</p>
    </div>

    <div class="container">

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <input type="text" class="form-control input-lg" name="job_name"
                       value="{{$job->job_name}}" placeholder="Job title, e.g. Front-end developer">
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <select class="form-control" id="company_id" name="company_id">
                    @foreach(Auth::user()->companies as $company)
                        <option value="{{$company->id}}" {{$company->id == $job->company_id? 'selected' : ''}}>
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>
                <a class="help-block" href="{{url('company/create')}}">Add new company</a>
            </div>

            <div class="form-group col-xs-12">
                    <textarea class="form-control" name="short_desc" id="job_desc" rows="3"
                              placeholder="Short description">{{$job->short_desc}}</textarea>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="job_place" id="job_place" class="form-control"
                           value="{{$job->job_place}}" placeholder="Location, e.g. Melon Park, CA">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                    <select class="form-control" id="job_type" name="job_type">
                        @foreach(\App\Contracts\Constant::JOB_TYPE as $key => $jobType)
                            <option value="{{$jobType}}" {{($job->job_type == $jobType)? 'selected' : ''}}>
                                {{$key}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input type="text" name="job_salary" id="job_salary" class="form-control"
                           value="{{$job->job_salary}}" placeholder="Salary">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" class="form-control" value="{{$job->working_days}}"
                           name="working_days" placeholder="Working days, e.g. 6">
                    <span class="input-group-addon">days / week</span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                    <input type="text" name="job_level" id="job_level" class="form-control"
                           value="{{$job->job_level}}" placeholder="Experience, e.g. 5">
                    <span class="input-group-addon">Years</span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="{{$job->phone}}" placeholder="Phone">
                </div>
            </div>


        </div>

        <div class="button-group">
            <div class="action-buttons">
                <div class="box-footer">
                    <button type="submit" class="btn btn-flat btn-primary">Quick Submit</button>
                </div>
            </div>
        </div>

    </div>
</header>