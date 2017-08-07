<header class="site-header size-lg text-center" style="background-image: url({{asset('assets/img/bg-banner1.jpg')}})">
    <div class="container">
        <div class="col-xs-12">
            <br><br>
            <h2>We offer
                <mark>1,259</mark>
                job vacancies right now!
            </h2>
            <h5 class="font-alt">Find your desire one in a minute</h5>
            <br><br><br>
            <form class="header-job-search">
                <div class="input-keyword">
                    <input type="text"  id="autocomplete-jobtitle" class="form-control" placeholder="Job title, skills, or company">
                </div>

                <div class="input-location">
                    <input type="text"  id="autocomplete-city" name="country" class="form-control" placeholder="City, state or zip">
                </div>

                <div class="btn-search">
                    <button class="btn btn-primary" type="submit">Find jobs</button>
                    <a href="job-list.html">Advanced Job Search</a>
                </div>
            </form>
        </div>
    </div>
</header>
<script src="{{asset('plugins/jQueryUI/jquery.autocomplete.js')}}"></script>
<script>
    var countries = [
        { value: 'Andorra', data: 'AD' },
        // ...
        { value: 'Zimbabwe', data: 'ZZ' }

    ];

    $('#autocomplete-city').autocomplete({
        lookup: countries,
        onSelect: function (suggestion) {
            alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });
    $('#autocomplete-jobtitle').autocomplete({
        lookup: countries,
        onSelect: function (suggestion) {
            alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });
</script>