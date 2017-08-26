<section class=" bg-alt">
    <div class="container">
        <header class="section-header">
            <span>Expertise Areas</span>
            <h2>Skills</h2>
        </header>

        <div class="row">
        @if($resume->skills->isNotEmpty())
            <!-- Skill -->

                <!--  Skill item --->
                 @foreach($resume->skills as $key => $skill)
                    <input type="hidden" name="skill[id][{{$key}}]" value="{{$skill->id}}" >
                     <div class="col-xs-12">
                        <div class="item-block">
                            <div class="item-form">

                                <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" value="{{$skill->name}}" name="skill[name][{{$key}}]" class="form-control" placeholder="Skill name, e.g. HTML">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" value="{{$skill->rate}}" name="skill[rate][{{$key}}]" class="form-control" placeholder="Skill proficiency, e.g. 90">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                 @endforeach
                <!--  End skill item -->

            <!-- END Skill -->
            @endif
            <div class="col-xs-12 duplicateable-content">
                <div class="item-block">
                    <div class="item-form">

                        <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></button>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="skill[name][]" class="form-control" placeholder="Skill name, e.g. HTML">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="skill[rate][]" class="form-control" placeholder="Skill proficiency, e.g. 90">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 text-center">
                <br>
                <button class="btn btn-primary btn-duplicator">Add skills</button>
            </div>


        </div>

    </div>
</section>