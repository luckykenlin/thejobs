<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset("assets/css/app.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">
</head>
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <input type="file" class="dropify" name="education[image][]"
                   data-default-file="{{config('app.url'.'/assets/img/logo-default.png')}}">
            <span class="help-block">Please choose a square logo</span>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
    $('.datepicker').datepicker();
</script>

