<section class=" bg-alt">
    <div class="container">

        <header class="section-header">
            <span>Latest degrees</span>
            <h2>Education</h2>
        </header>

        <div class="row">

            <div class="col-xs-12 duplicateable-content">
                <div class="item-block">
                    <div class="item-form">

                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <input type="file" class="dropify-copy" name="education[image][]">
                                    <span class="help-block">Please choose a square logo</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="education[degree][]" class="form-control" placeholder="Degree, e.g. Bachelor">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="education[major][]" class="form-control" placeholder="Major, e.g. Computer Science">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="education[school][]" class="form-control"
                                           placeholder="School name, e.g. Massachusetts Institute of Technology">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Date from</span>
                                        <input type="text" name="education[dateScopeFrom][]" class="form-control datepicker" placeholder="e.g. 2012">
                                        <span class="input-group-addon">Date to</span>
                                        <input type="text" name="education[dateScopeEnd][]" class="form-control datepicker" placeholder="e.g. 2016">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="education[short_desc][]" rows="3" placeholder="Short description"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 text-center">
                <br>
                <button class="btn btn-primary btn-duplicator">Add education</button>
            </div>

        </div>
    </div>
</section>