@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            New Posts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">New Posts</li>
        </ol>
    </section>
    @include('backEnd.layout.alert')

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="row" style="margin-left: 5px">
            <a class="btn btn-primary" href="{{route('posts')}}"><i class="fa fa-copy"></i> Posts</a>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <div class="box-header">
                        <h4>Add Post</h4>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{route('new-post')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group @if($errors->has('image')) has-error @endif">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image[]" multiple>
                                @if($errors->has('img')) <span class="help-block">{{$errors->first('image')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                                @if($errors->has('title')) <span class="help-block">{{$errors->first('title')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price">
                                @if($errors->has('price')) <span class="help-block">{{$errors->first('price')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group @if($errors->has('qty')) has-error @endif">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty">
                                @if($errors->has('qty')) <span class="help-block">{{$errors->first('qty')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                @if($errors->has('description')) <span class="help-block">{{$errors->first('description')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop