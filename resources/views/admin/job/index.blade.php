@extends('layouts.app')

@section("title")

    <title> Job </title>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Job List
            <small>工作列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Job List</li>
        </ol>
    </section>
    <div class="content">
        <div class="job-table"></div>
    </div>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/administrator/job/list.js" }}"></script>
@endsection

