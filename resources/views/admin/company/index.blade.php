@extends('layouts.app')

@section("title")

    <title> Company </title>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Company List
            <small>企业列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company List</li>
        </ol>
    </section>
    <div class="content">
        <div class="company-table"></div>
    </div>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/administrator/company/list.js" }}"></script>
@endsection

