@extends('layouts.app')

@section("title")

    <title> User </title>

@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header ui-sortable-handle">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">User List</h3>
        </div>
        <div class="content">
            <div class="user-table"></div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/administrator/user/list.js" }}"></script>
@endsection

