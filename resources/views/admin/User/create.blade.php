@extends('layouts.app')
@section("title")
    <title> profile </title>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            User
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("home") }}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                        <h3 class="box-title">Personal infomation</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" class="editForm" id="myForm" action="{{url('admin/user')}}"
                              method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- text input -->
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>name</label>
                                <input type="text" class="form-control" placeholder="Enter ... " id="name" name="name"
                                       value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>email</label>
                                <input type="email" class="form-control" placeholder="Enter ... " id="email" name="email"
                                       value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>password</label>
                                <input type="password" class="form-control" placeholder="Enter ... "
                                       id="password" name="password" autocomplete="new-password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" placeholder="Enter ... "
                                       class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <label>role</label>
                                <select class="form-control" id="role_id" name="role_id">
                                    <option value="{{\App\Contracts\Constant::ROLE_SUPER_ADMIN}}">Administrator</option>
                                    <option value="{{\App\Contracts\Constant::ROLE_COMMON}}" selected>Common User</option>
                                </select>
                            </div>
                            <!-- footer -->
                            <div class="box-footer">
                                <button type="submit" id="btn1" data-stuff='[{"posturl":"{{url("admin/user")}}","title":"create", "type":"POST"}]' class="btn btn-flat btn-primary">Submit</button>
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
@section('js')
    <script src="{{ config("app.url") . "/js/sweetswal.js" }}"></script>
@endsection
