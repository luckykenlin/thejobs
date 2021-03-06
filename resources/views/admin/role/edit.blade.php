@extends('layouts.app')
@section("title")
    <title> edit permission </title>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Role
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url("admin/home") }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    {{-- Main Content--}}
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Role infomation</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" class="editForm" action="{{url('admin/role',$role->id)}}"
                              method="post" enctype="multipart/form-data">
                        {{ method_field("patch") }}
                        {{ csrf_field() }}
                        <!-- text input -->
                            <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                                <label>role name</label>
                                <input type="text" class="form-control" placeholder="Enter ... " id="role" name="role"
                                       value="{{$role->role}}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                                {{--@if($role->permission == create) checked @endif--}}
                                <div><label>

                                    </label></div>
                                <label style="width: 20%">Create
                                    <div aria-checked="false" aria-disabled="false" style="position: relative;"><input
                                                @foreach($role->permission as $item)
                                                @if($item == 'create')
                                                checked
                                                @endif
                                                @endforeach value="create" name="permission[]" type="checkbox"
                                                class="flat-red" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label style="width: 20%">Delete
                                    <div aria-checked="false" aria-disabled="false" style="position: relative;"><input
                                                @foreach($role->permission as $item)
                                                @if($item == 'delete')
                                                checked
                                                @endif
                                                @endforeach value="delete" name="permission[]" type="checkbox"
                                                class="flat-red" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label style="width: 20%">Update
                                    <div aria-checked="false" aria-disabled="false" style="position: relative;"><input
                                                @foreach($role->permission as $item)
                                                @if($item == 'update')
                                                checked
                                                @endif
                                                @endforeach value="update" name="permission[]" type="checkbox"
                                                class="flat-red" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label style="width: 20%">View
                                    <div aria-checked="false" aria-disabled="false" style="position: relative;"><input
                                                @foreach($role->permission as $item)
                                                @if($item == 'view')
                                                checked
                                                @endif
                                                @endforeach value="view" name="permission[]" type="checkbox"
                                                class="flat-red" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                            </div>
                            <!-- footer -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-flat btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
@endsection