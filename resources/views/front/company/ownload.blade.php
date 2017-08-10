<div class="col-xs-12 text-right">
    <br>
    <a class="btn btn-primary btn-sm" href="{{url('company/create')}}">Add new company</a>
</div>

@foreach($companies as $company)
    <!-- Company item -->
    <div class="col-xs-12">
        <div class="item-block">
            <header>
                <a href="{{route('company.show',$company->id)}}"><img src="assets/img/logo-google.jpg" alt=""></a>
                <div class="hgroup">
                    <h4><a href="{{route('company.show',$company->id)}}">{{$company->name}}</a></h4>
                    <h5>{{$company->categories->name}}<a href="{{route('company.show',$company->id)}}#open-positions"><span
                                    class="label label-info">{{count($company->jobs)}} jobs</span></a></h5>
                </div>
                <div class="action-btn">
                    <a class="btn btn-xs btn-gray" href="{{route('company.edit',$company->id)}}">Edit</a>
                    <a class="btn btn-xs btn-danger" href="{{route('company.delete', $company->id)}}">Delete</a>
                </div>
            </header>
        </div>
    </div>
    <!-- END Company item -->
@endforeach

<!-- Page navigation -->
<nav class="text-center">
    {{$companies->links()}}
</nav>
<!-- END Page navigation -->
<script src="{{asset('js/datadelete.js')}}"></script>