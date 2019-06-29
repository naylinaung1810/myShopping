@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            New Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Category</li>
        </ol>
    </section>
    @include('backEnd.layout.alert')

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="row" style="margin-left: 5px">
            <a class="btn btn-primary" href="{{route('categories')}}"><i class="fa fa-copy"></i> Categories</a>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <div class="box-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{route('new-category')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @if($errors->has('img')) has-error @endif">
                                <label>Image</label>
                                <input type="file" class="form-control" name="img">
                                @if($errors->has('img')) <span class="help-block">{{$errors->first('img')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('category')) has-error @endif">
                                <label>Category</label>
                                <input type="text" class="form-control" name="category">
                                @if($errors->has('category')) <span class="help-block">{{$errors->first('category')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop