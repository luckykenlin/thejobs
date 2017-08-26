<section>
    <div class="container">
        <header class="section-header">
            <span>Past positions</span>
            <h2>Work Experience</h2>
        </header>

        <div class="row">
        @if($resume->experiences->isNotEmpty())
            <!-- Experience -->

                   <!--  Experience item --->
                    @foreach($resume->experiences as $key => $experience)
                    <input type="hidden" name="experience[id][{{$key}}]" value="{{$experience->id}}" >
                       <div class="col-xs-12">
                        <div class="item-block">
                            <div class="item-form">

                                <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <input type="file" class="dropify" value="{{$experience->image}}" name="experience[image][{{$key}}]" data-default-file="{{config('app.url').'/'.$experience->image}}">
                                            <span class="help-block">Please choose a square logo</span>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" value="{{$experience->name}}" name="experience[name][{{$key}}]" class="form-control" placeholder="Company name">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" value="{{$experience->position}}" class="form-control" name="experience[position][{{$key}}]" placeholder="Position, e.g. UI/UX Researcher">
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Date from</span>
                                                <input type="text" value="{{$experience->dateScopeFrom}}" name="experience[dateScopeFrom][{{$key}}]" class="form-control datepicker" placeholder="e.g. 2012">
                                                <span class="input-group-addon">Date to</span>
                                                <input type="text" value="{{$experience->dateScopeEnd}}" name="experience[dateScopeEnd][{{$key}}]" class="form-control datepicker" placeholder="e.g. 2016">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <textarea name="experience[desc][{{$key}}]" class="summernote-editor">{{$experience->desc}}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--  End experience item -->
                <!-- END Education -->
            @endif

            <div class="col-xs-12 duplicateable-content">
                <div class="item-block">
                    <div class="item-form">

                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <input type="file" class="dropify-copy" name="experience[image][]">
                                    <span class="help-block">Please choose a square logo</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="experience[name][]" class="form-control" placeholder="Company name">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="experience[position][]" placeholder="Position, e.g. UI/UX Researcher">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Date from</span>
                                        <input type="text" name="experience[dateScopeFrom][]" class="form-control datepicker" placeholder="e.g. 2012">
                                        <span class="input-group-addon">Date to</span>
                                        <input type="text" name="experience[dateScopeEnd][]" class="form-control datepicker" placeholder="e.g. 2016">
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea name="experience[desc][]" class="summernote-copy"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-xs-12 text-center">
                <br>
                <button class="btn btn-primary btn-duplicator">Add experience</button>
            </div>

        </div>

    </div>
</section>