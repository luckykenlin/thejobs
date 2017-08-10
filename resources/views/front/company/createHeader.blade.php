<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Add your company</h1>
        <p class="lead text-center">Create a profile for your company and put it online.</p>
    </div>

    <div class="container">
        <form role="form" class="editForm" action="{{url('company')}}"
              method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-lg-2">
                            <div class="form-group">
                                <input type="file" class="dropify"
                                       data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
                                <span class="help-block">A square logo</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-lg-10">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Comapny name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="Headline (e.g. Internet and computer software)">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Short description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="row">

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control" placeholder="Location, e.g. Melon Park, CA">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control selectpicker">
                                    <option>0 - 9</option>
                                    <option selected>10 - 99</option>
                                    <option>100 - 999</option>
                                    <option>1,000 - 9,999</option>
                                    <option>10,000 - 99,999</option>
                                    <option>100,000 - 999,999</option>
                                </select>
                                <span class="input-group-addon">Employer</span>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input type="text" class="form-control" placeholder="Website address">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                <input type="text" class="form-control" placeholder="Founded on, e.g. 2013">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email address">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <div class="upload-button">
                        <button class="btn btn-block btn-primary">Choose a cover image</button>
                        <input id="cover_img_file" type="file">
                    </div>
                </div>
            </div>
        </form>
    </div>
</header>
<script src="{{asset("assets/js/thejobs.js")}}"></script>