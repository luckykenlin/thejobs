@extends('layouts.app')
@section("title")
    <title> Job Create </title>
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
            <form role="form" class="editForm" action="{{url('admin/job')}}"
                  method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Job infomation</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- text input -->
                            <div class="form-group {{ $errors->has('job_name') ? ' has-error' : '' }}">
                                <label>job_title</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="job_name" name="job_name" required>
                                @if ($errors->has('job_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_place') ? ' has-error' : '' }}">
                                <label>location</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="job_place" name="job_place" required>
                                @if ($errors->has('job_place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_place') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_salary') ? ' has-error' : '' }}">
                                <label>salary</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="job_salary" name="job_salary" required>
                                @if ($errors->has('job_salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_salary') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('updated_at') ? ' has-error' : '' }}">
                                <label>public</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="" class="form-control pull-right"
                                           id="datepicker" name="updated_at" required>
                                    @if ($errors->has('updated_at'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('updated_at') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>phone</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask=""
                                           value="" id="phone" name="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- /.input group -->
                            </div>

                            <!-- textarea -->
                            <div class="form-group {{ $errors->has('job_desc') ? ' has-error' : '' }}">
                                <label>describe</label>
                                <textarea class="form-control" rows="3"
                                          id="job_desc" name="job_desc" required></textarea>
                                @if ($errors->has('job_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_desc') }}</strong>
                                    </span>
                                @endif
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

                            <div class="form-group {{ $errors->has('job_contact') ? ' has-error' : '' }}">
                                <label>contact</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="job_contact" name="job_contact" required>
                                @if ($errors->has('job_contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_contact') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_type') ? ' has-error' : '' }}">
                                <label>job_type</label>
                                <select class="form-control" id="job_type" name="job_type">
                                    <option value="{{\App\Contracts\Constant::FULL_TIME}}">
                                        Full time
                                    </option>
                                    <option value="{{\App\Contracts\Constant::PART_TIME}}">
                                        Part time
                                    </option>
                                </select>
                                @if ($errors->has('job_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_status') ? ' has-error' : '' }}">
                                <label>Pending_status</label>
                                <select class="form-control" id="job_status" name="job_status">
                                    <option value="1">
                                        Pended
                                    </option>
                                    <option value="0">
                                        Pendding
                                    </option>
                                </select>
                                @if ($errors->has('job_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_status') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_level') ? ' has-error' : '' }}">
                                <label>job_level</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="job_level" name="job_level" required>
                                @if ($errors->has('job_level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_level') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('job_category') ? ' has-error' : '' }}">
                                <label>job_category</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="restaurant" id="job_category" name="job_category" required>
                                @if ($errors->has('job_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- footer -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-flat btn-primary">Submit</button>
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
