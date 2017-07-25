@extends('layouts.app')

@section("title")

    <title> User </title>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            User List
            <small>用户列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User List</li>
        </ol>
    </section>
    <div class="content">
        <div class="user-table"></div>
    </div>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/administrator/user/list.js" }}"></script>
@endsection

