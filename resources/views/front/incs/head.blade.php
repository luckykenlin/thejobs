<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume!">
    <meta name="keywords" content="">
    <meta id="path" name="path" content="{{ url('/') }}">
    <meta id="ctx" name='ctx' content="{{ url('/') }}">
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <meta id="cdn_url" name="token" content="{{ url("/") }}">
    <meta id="version" name="version" content="{{ config("app.version") }}">
    <meta id="app_name" name="version" content="{{ config("app.name") }}">
    <title>TheJobs</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset("assets/css/app.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="{{asset('assets/img/favicon.ico')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>