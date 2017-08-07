@extends('layouts.app')

@section("title")

    <title> Category </title>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Category
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row margin-bottom">
            @foreach($children as $child)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>###</h3>

                            <p>{{$child->name}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="btn-3d">
                            <button type="button" class="btn btn-warning col-md-6"
                                    onclick="window.location.href='{{url('admin/category/'.$child->id)}}'">Show
                            </button>
                            <button type="button" class="btn btn-warning col-md-6"   onclick="window.location.href='{{route('category.delete',$child->id)}}'">Delete</button>
                        </div>
                    </div>
                    <div id="create" class="collapse">

                    </div>
                </div>
                <!-- ./col -->
            @endforeach
        </div>

        <div class="row">
            <div class=" col-lg-4"></div>
            <div class=" col-lg-4">
                <button type="button" class="btn btn-block btn-warning btn-lg" data-toggle="collapse"
                        data-target="#creation">Create
                </button>
                <div id="creation" class="collapse">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal infomation</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" class="editForm" action="{{url('admin/category')}}"
                                  method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- text input -->
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input hidden name="id" value="{{$id}}">
                                    <label>name</label>
                                    <input type="text" class="form-control" placeholder="Enter ... " id="name"
                                           name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-flat btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>

    </section>
@endsection
