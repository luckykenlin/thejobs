<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Add your resume</h1>
        <p class="lead text-center">Create your resume and put it online.</p>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="file" class="dropify" name="image" data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                    <span class="help-block">Please choose a 4:6 profile picture.</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <input type="text" name="name" class="form-control input-lg" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" name="job_title" class="form-control" placeholder="Headline (e.g. Front-end developer)">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="short_desc" rows="3" placeholder="Short description about you"></textarea>
                </div>

                <hr class="hr-lg">

                <h6>Basic information</h6>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" name="location" class="form-control" placeholder="Location, e.g. Melon Park, CA">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" name="website_url" class="form-control" placeholder="Website address">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                            <input type="text" name="hourly_rate" class="form-control" placeholder="Salary, e.g. 85">
                            <span class="input-group-addon">Per hour</span>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                            <input type="text" name="age" class="form-control" placeholder="Age">
                            <span class="input-group-addon">Years old</span>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="Phone number">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Email address">
                        </div>
                    </div>

                </div>

                <hr class="hr-lg">

                <h6>Tags list</h6>
                <div class="form-group">
                    <input type="text" name="tags" value="HTML,CSS,Javascript" data-role="tagsinput" placeholder="Tag name">
                    <span class="help-block" >Write tag name and press enter</span>
                </div>

            </div>
        </div>

        <div class="button-group">
            <div class="action-buttons">

                <div class="upload-button">
                    <button class="btn btn-block btn-primary">Choose a resume file</button>
                    <input type="file" name="cv_url">
                </div>

            </div>
        </div>
    </div>
</header>