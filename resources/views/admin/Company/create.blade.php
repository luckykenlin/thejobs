@extends('layouts.app')
@section("title")
    <title> Company Create </title>
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
            <form role="form" class="editForm" action="{{url('admin/company')}}"
                  method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Company infomation</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <!-- text input -->
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>company name</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="name" name="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label>image</label>
                                <span class="help-block">A square logo</span>
                                <input type="file" class="form-control" placeholder="Enter ... "
                                       value="" id="image" name="image">
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label>Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach($categories->getDescendants() as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                <label>location</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="location" name="location" required>
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
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
                            <div class="form-group {{ $errors->has('short_desc') ? ' has-error' : '' }}">
                                <label>describe</label>
                                <textarea class="form-control" rows="3"
                                          id="short_desc" name="short_desc" required></textarea>
                                @if ($errors->has('short_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('short_desc') }}</strong>
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
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group {{ $errors->has('founded_on') ? ' has-error' : '' }}">
                                <label>founded_on</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="founded_on" name="founded_on" required>
                                @if ($errors->has('founded_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('founded_on') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('website_url') ? ' has-error' : '' }}">
                                <label>website url</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="website_url" name="website_url" required>
                                @if ($errors->has('website_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website_url') }}</strong>
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

                            <div class="form-group {{ $errors->has('employer_num') ? ' has-error' : '' }}">
                                <label>employer_num</label>
                                <select class="form-control" id="employer_num" name="employer_num">
                                    <option value="0 - 9">0 - 9</option>
                                    <option value="10 - 99" selected>10 - 99</option>
                                    <option value="100 - 999">100 - 999</option>
                                    <option value="1,000 - 9,999"> 1,000 - 9,999</option>
                                    <option value="10,000 - 99,999">10,000 - 99,999</option>
                                    <option value="100,000 - 999,999"> 100,000 - 999,999</option>
                                </select>
                                @if ($errors->has('employer_num'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employer_num') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('social_media') ? ' has-error' : '' }}">
                                <label>social_media</label>
                                <input type="text" class="form-control" placeholder="Enter ... "
                                       value="" id="social_media" name="social_media" required>
                                @if ($errors->has('social_media'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('social_media') }}</strong>
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
