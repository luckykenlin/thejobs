@foreach($companies as $company)
    <!-- Company item -->
    <div class="col-xs-12">
        <div class="item-block">
            <header>
                <a href="{{url('company/'.$company->id)}}"><img src="{{config('app.url')."/".$company->image}}" alt=""></a>
                <div class="hgroup">
                    <h4><a href="{{url('company/'.$company->id)}}">{{$company->name}}</a></h4>
                    <h5>{{$company->categories->name}}<a href="{{route('company.show',$company->id)}}#open-positions"><span
                                    class="label label-info">{{count($company->jobs)}} jobs</span></a></h5>
                </div>
                <div class="action-btn">
                    <a class="btn btn-xs btn-gray" href="{{url('company/'.$company->id).'/edit'}}">Edit</a>
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
<script src="{{asset('js/dataUtility.js')}}"></script>