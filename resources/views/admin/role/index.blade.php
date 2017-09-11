@extends('layouts.app')

@section("title")

    <title> Role </title>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Role List
            <small>用户组</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Role List</li>
        </ol>
    </section>
    <div class="content">
        <div class="role-table"></div>
    </div>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/administrator/role/list.js" }}"></script>
@endsection

