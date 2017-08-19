<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Browse resumes</h1>
        <p class="lead text-center">Use following search box to find resumes that fits your position better</p>
    </div>

    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword: name, skills, or tags">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Location: city, state or zip">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <select class="form-control selectpicker" multiple>
                        <option selected>All categories</option>
                        <option>Developer</option>
                        <option>Designer</option>
                        <option>Customer service</option>
                        <option>Finance</option>
                        <option>Healthcare</option>
                        <option>Sale</option>
                        <option>Marketing</option>
                        <option>Information technology</option>
                        <option>Others</option>
                    </select>
                </div>


                <div class="form-group col-xs-12 col-sm-4">
                    <h6>Hourly rate</h6>
                    <div class="checkall-group">
                        <div class="checkbox">
                            <input type="checkbox" id="rate1" name="rate" checked>
                            <label for="rate1">All rates</label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="rate2" name="rate">
                            <label for="rate2">$0 - $50 <small>(364)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="rate3" name="rate">
                            <label for="rate3">$50 - $100 <small>(684)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="rate4" name="rate">
                            <label for="rate4">$100 - $200 <small>(195)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="rate5" name="rate">
                            <label for="rate5">$200+ <small>(39)</small></label>
                        </div>
                    </div>
                </div>


                <div class="form-group col-xs-12 col-sm-4">
                    <h6>Academic degree</h6>
                    <div class="checkall-group">
                        <div class="checkbox">
                            <input type="checkbox" id="degree1" name="degree" checked>
                            <label for="degree1">All degrees</label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="degree2" name="degree">
                            <label for="degree2">Associate degree <small>(216)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="degree3" name="degree">
                            <label for="degree3">Bachelor's degree <small>(569)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="degree4" name="degree">
                            <label for="degree4">Master's degree <small>(439)</small></label>
                        </div>

                        <div class="checkbox">
                            <input type="checkbox" id="degree5" name="degree">
                            <label for="degree5">Doctoral degree <small>(84)</small></label>
                        </div>
                    </div>
                </div>


                <div class="form-group col-xs-12 col-sm-4">
                    <h6>Sort by</h6>
                    <div class="radio">
                        <input type="radio" name="sortby" id="sortby1" value="option1" checked>
                        <label for="sortby1">Relevance</label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="sortby" id="sortby2" value="option2">
                        <label for="sortby2">Highest rate first</label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="sortby" id="sortby3" value="option3">
                        <label for="sortby3">Lowest rate first</label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="sortby" id="sortby4" value="option4">
                        <label for="sortby4">Highest degree first</label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="sortby" id="sortby5" value="option5">
                        <label for="sortby5">Lowest degree first</label>
                    </div>

                </div>


            </div>

            <div class="button-group">
                <div class="action-buttons">
                    <button class="btn btn-primary">Apply filter</button>
                </div>
            </div>

        </form>

    </div>

</header>