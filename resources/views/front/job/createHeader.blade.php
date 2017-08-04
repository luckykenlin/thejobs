<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Add a new job</h1>
        <p class="lead text-center">Create a new vacancy for your company and put it online.</p>
    </div>

    <div class="container">

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <input type="text" class="form-control input-lg" placeholder="Job title, e.g. Front-end developer">
            </div>

            <div class="form-group col-xs-12 col-sm-6">
                <div class="btn-group bootstrap-select form-control">
                    <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                            title="Select a company"><span class="filter-option pull-left">Select a company</span>&nbsp;<span
                                class="bs-caret"><span class="caret"></span></span></button>
                    <div class="dropdown-menu open">
                        <ul class="dropdown-menu inner" role="menu">
                            <li data-original-index="0" class="selected"><a tabindex="0" class="" style=""
                                                                            data-tokens="null"><span class="text">Select a company</span><span
                                            class="fa fa-check check-mark"></span></a></li>
                            <li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span
                                            class="text">Google</span><span class="fa fa-check check-mark"></span></a>
                            </li>
                            <li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span
                                            class="text">Microsoft</span><span
                                            class="fa fa-check check-mark"></span></a></li>
                            <li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span
                                            class="text">Apple</span><span class="fa fa-check check-mark"></span></a>
                            </li>
                            <li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span
                                            class="text">Facebook</span><span class="fa fa-check check-mark"></span></a>
                            </li>
                        </ul>
                    </div>
               </div>
                <a class="help-block" href="company-add.html">Add new company</a>
            </div>

            <div class="form-group col-xs-12">
                <textarea class="form-control" rows="3" placeholder="Short description"></textarea>
            </div>

            <div class="form-group col-xs-12">
                <input type="text" class="form-control" placeholder="Application URL">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" class="form-control" placeholder="Location, e.g. Melon Park, CA">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                    <div class="btn-group bootstrap-select input-group-btn form-control">
                        <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                                title="Full time"><span class="filter-option pull-left">Full time</span>&nbsp;<span
                                    class="bs-caret"><span class="caret"></span></span></button>
                        <div class="dropdown-menu open">
                            <ul class="dropdown-menu inner" role="menu">
                                <li data-original-index="0" class="selected"><a tabindex="0" class="" style=""
                                                                                data-tokens="null"><span class="text">Full time</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Part time</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Internship</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Freelance</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Remote</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                            </ul>
                        </div>
                        <select class="form-control selectpicker" tabindex="-98">
                            <option>Full time</option>
                            <option>Part time</option>
                            <option>Internship</option>
                            <option>Freelance</option>
                            <option>Remote</option>
                        </select></div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input type="text" class="form-control" placeholder="Salary">
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" class="form-control" placeholder="Working hours, e.g. 40">
                    <span class="input-group-addon">hours / week</span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                    <input type="text" class="form-control" placeholder="Experience, e.g. 5">
                    <span class="input-group-addon">Years</span>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                    <div class="btn-group bootstrap-select show-tick input-group-btn form-control">
                        <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                                title="Bachelor"><span class="filter-option pull-left">Bachelor</span>&nbsp;<span
                                    class="bs-caret"><span class="caret"></span></span></button>
                        <div class="dropdown-menu open">
                            <ul class="dropdown-menu inner" role="menu">
                                <li data-original-index="0"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Postdoc</span><span class="fa fa-check check-mark"></span></a>
                                </li>
                                <li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Ph.D.</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span
                                                class="text">Master</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                                <li data-original-index="3" class="selected"><a tabindex="0" class="" style=""
                                                                                data-tokens="null"><span class="text">Bachelor</span><span
                                                class="fa fa-check check-mark"></span></a></li>
                            </ul>
                        </div>
                        <select class="form-control selectpicker" multiple="" tabindex="-98">
                            <option>Postdoc</option>
                            <option>Ph.D.</option>
                            <option>Master</option>
                            <option selected="">Bachelor</option>
                        </select></div>
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

    </div>
</header>