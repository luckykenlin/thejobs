<form role="form" class="editForm" action="{{url('job')}}"
      method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Add a new job</h1>
        <p class="lead text-center">Create a new vacancy for your company and put it online.</p>
    </div>

    <div class="container">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-6">
                    <input type="text" class="form-control input-lg" name="job_name"
                           placeholder="Job title, e.g. Front-end developer">
                </div>

                <div class="form-group col-xs-12 col-sm-6">
                    <select title="Choose one of the following..." class="form-control selectpicker" id="company_id" name="company_id">
                        @foreach(Auth::user()->companies as $company)
                            <option value="{{$company->id}}">
                                {{$company->name}}
                            </option>
                        @endforeach
                    </select>
                    <a class="help-block" href="{{url('company/create')}}">Add new company</a>
                </div>

                <div class="form-group col-xs-12">
                    <textarea class="form-control" name="short_desc" id="job_desc" rows="3"
                              placeholder="Short description"></textarea>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="job_place" id="job_place" class="form-control"
                               placeholder="Location, e.g. Melon Park, CA">
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                        <select class="form-control" id="job_type" name="job_type">
                            <option value="{{\App\Contracts\Constant::FULL_TIME}}">
                                Full time
                            </option>
                            <option value="{{\App\Contracts\Constant::PART_TIME}}">
                                Part time
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                        <input type="text" name="job_salary" id="job_salary" class="form-control" placeholder="Salary">
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        <input type="text" class="form-control" name="working_days" placeholder="Working days, e.g. 6">
                        <span class="input-group-addon">days / week</span>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                        <input type="text" name="job_level" id="job_level" class="form-control"
                               placeholder="Experience, e.g. 5">
                        <span class="input-group-addon">Years</span>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-6 col-md-4">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="phone" id="phone" class="form-control"
                               placeholder="Phone">
                    </div>
                </div>
                <input type="hidden" name="user_id" id="user_id" class="form-control"
                    value="{{Auth::user()->id}}">

            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-flat btn-primary">Quick Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</header>