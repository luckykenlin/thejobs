@if(Session::has('flash_message'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i>{{session('flash_message')}}</h4>
        Info alert preview. This alert is dismissable.
    </div>
@endif