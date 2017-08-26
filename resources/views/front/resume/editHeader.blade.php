<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Edit your resume</h1>
        <p class="lead text-center">Edit your resume and update it online.</p>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="file" class="dropify" name="image" data-default-file="{{config('app.url').'/'.$resume->image}}">
                    <span class="help-block">Please choose a 4:6 profile picture.</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <input type="text" value="{{$resume->name}}" name="name" class="form-control input-lg" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" value="{{$resume->job_title}}" name="job_title" class="form-control" placeholder="Headline (e.g. Front-end developer)">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="short_desc" rows="3" placeholder="Short description about you">{{$resume->short_desc}}</textarea>
                </div>

                <hr class="hr-lg">

                <h6>Basic information</h6>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" value="{{$resume->location}}" name="location" class="form-control" placeholder="Location, e.g. Melon Park, CA">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" value="{{$resume->website_url}}" name="website_url" class="form-control" placeholder="Website address">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                            <input type="text" value="{{$resume->hourly_rate}}" name="hourly_rate" class="form-control" placeholder="Salary, e.g. 85">
                            <span class="input-group-addon">Per hour</span>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                            <input type="text" name="age" value="{{$resume->age}}" class="form-control" placeholder="Age">
                            <span class="input-group-addon">Years old</span>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" value="{{$resume->phone}}" name="phone" class="form-control" placeholder="Phone number">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" value="{{$resume->email}}" name="email" class="form-control" placeholder="Email address">
                        </div>
                    </div>

                </div>

                <hr class="hr-lg">

                <h6>Tags list</h6>
                <div class="form-group">
                    <input type="text" name="tags" value="{{$resume->tag}}" data-role="tagsinput" placeholder="Tag name">
                    <span class="help-block">Write tag name and press enter</span>
                </div>

            </div>
        </div>

        <div class="button-group">
            <div class="action-buttons">

                <div class="upload-button">
                    <button class="btn btn-block btn-primary" >Choose a resume file</button>
                    <input type="file" name="cv_url">
                </div>

            </div>
        </div>
    </div>
</header>