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
            <form class="header-job-search" method="get" action="{{url('job')}}">
                <div class="input-keyword">
                    <input type="text"  id="autocomplete-jobtitle" name="searchColumn[job_name]" class="form-control" placeholder="Job title, skills, or company">
                </div>

                <div class="input-location">
                    <input type="text"  id="autocomplete-city" name="searchColumn[job_place]" class="form-control" placeholder="City, state or zip">
                </div>

                <div class="btn-search">
                    <button class="btn btn-primary" type="submit">Find jobs</button>
                    <a href="{{url('job')}}">Advanced Job Search</a>
                </div>
            </form>
        </div>
    </div>
</header>
<script src="{{asset('plugins/jQueryUI/jquery.autocomplete.js')}}"></script>
<script>
    $('#autocomplete-city').autocomplete({
        serviceUrl: '/info/address',
        onSelect: function (suggestion) {
        }
    });
    $('#autocomplete-jobtitle').autocomplete({
        serviceUrl: '/info/jobDetail',
        onSelect: function (suggestion) {
        }
    });
</script>