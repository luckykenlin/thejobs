@extends('layouts.app')
@section("title")
    <title> profile </title>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Profile
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("home") }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    {{-- Main Content--}}
    <section class="content">
        <div class="row">
            <form role="form" class="editForm" id="myForm"
                  action="{{url('admin/user',$user->id)}}"
                  method="post" enctype="multipart/form-data">
            {{ method_field("patch") }}
            {{ csrf_field() }}
            <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal infomation</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- text input -->
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>name</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="{{$user->name}}" id="name" name="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label>image</label>
                                <img class="profile-user-img img-responsive img-circle" src="{{asset($user->image)}}"
                                     alt="User profile picture">
                                <input type="file" class="form-control" placeholder="Enter ... "
                                       value="" id="image" name="image">
                            </div>
                            <div class="form-group {{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label>sex</label>
                                <select class="form-control" id="sex" name="sex">
                                    <option value="1"
                                            @if($user->sex == \App\Contracts\Constant::MALE) selected @endif>
                                        Male
                                    </option>
                                    <option value="0"
                                            @if($user->sex == \App\Contracts\Constant::FEMALE) selected @endif>
                                        Female
                                    </option>
                                </select>
                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>address</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="{{$user->address}}" id="address" name="address" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label>role</label>
                                <select class="form-control" id="role_id" name="role_id">
                                    @foreach(\App\Models\Role::all() as $role)
                                        <option value="{{$role->id}}"
                                                @if($role->role == $user->role->role) selected @endif>{{$role->role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">About me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>phone</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask=""
                                           value="{{$user->phone}}" id="phone" name="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label>birthday</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{$user->birthday}}" class="form-control pull-right"
                                           id="datepicker" name="birthday" required>
                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group {{ $errors->has('marital') ? ' has-error' : '' }}">
                                <label>marital</label>
                                <select class="form-control" id="marital" name="marital">
                                    <option value="1"
                                            @if($user->marital == \App\Contracts\Constant::MARRIED) selected @endif>
                                        Married
                                    </option>
                                    <option value="0"
                                            @if($user->marital == \App\Contracts\Constant::SINGLE) selected @endif>
                                        Single
                                    </option>
                                </select>
                                @if ($errors->has('marital'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marital') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('nationality') ? ' has-error' : '' }}">
                                <label>nationality </label>
                                <select class="form-control input-medium bfh-countries" name="nationality"
                                        data-country="{{$user->nationality}}"></select>
                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Register By</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name=""
                                       disabled="disabled"
                                       required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- textarea -->
                            <div class="form-group {{ $errors->has('describe') ? ' has-error' : '' }}">
                                <label>describe</label>
                                <textarea class="form-control" rows="3"
                                          id="describe" name="describe" required>{{ $user->describe}}</textarea>
                                @if ($errors->has('describe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('describe') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- footer -->
                            <div class="box-footer">
                                <button  class="btn btn-flat btn-primary">Submit</button>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </form>
        </div>

        <!-- /.row -->
    </section>
@endsection
@section('js')
    <script src="{{ config("app.url") . "/js/sweetswal.js" }}"></script>
@endsection
