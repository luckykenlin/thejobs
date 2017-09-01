<div class="row">
    <div class="col-xs-12">
        <h5>We found <strong>{{$messages->total()}}</strong> matches, you're watching <i>{{$messages->firstItem()}}</i> to <i>{{$messages->lastItem()}}</i></h5>
    </div>
@foreach($messages as $key => $message)
        <!-- Message detail -->
            <div class="col-xs-12">
                <div class="item-block">
                    <header>
                        <div class="hgroup">
                            <h4><a href="http://www.easyjob.com/company/1">{{$message->subject}}</a></h4>
                            <h4><a href="http://www.easyjob.com/company/1">{{$message->name}}</a></h4>
                            <h5><a href="http://www.easyjob.com/company/1">{{$message->email}}</a></h5>
                             <p>{{$message->message}}</p>
                        </div>
                        <div class="action-btn">
                            <h5>{{$message->messageable_type}}<a href="http://www.easyjob.com/admin/company/1#open-positions"></h5>
                            <a class="btn btn-xs btn-danger" href="{{route('message.delete',$message->id)}}">Delete</a>
                        </div>
                    </header>
                </div>
            </div>
        <!-- END Resume detail -->
@endforeach
    <script src="{{asset('js/dataUtility.js')}}"></script>



<!-- Page navigation -->
    <nav class="text-center">
        {{$messages->fragment('scroll-mian')->links()}}
    </nav>
    <!-- END Page navigation -->

</div>