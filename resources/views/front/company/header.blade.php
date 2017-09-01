<header class="page-header bg-img" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container page-name">
        <h1 class="text-center">Browse companies</h1>
        <p class="lead text-center">Use following search box to find companies that fits you better</p>
    </div>

    <div class="container">
        <form action="#">

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Keyword">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <input type="text" class="form-control" placeholder="Location">
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    <div class="btn-group bootstrap-select show-tick form-control">
                        <select title="Category:&nbsp;&nbsp; Choose one of the following..."
                                class="form-control selectpicker" id="category_id"
                                name="category_id">
                            @foreach($categories->getDescendants() as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
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