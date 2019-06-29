@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    @include('backEnd.layout.alert')

    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            Post Edit
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    @include('backEnd.layout.alert')

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="row" style="margin-left: 5px">
            <a class="btn btn-primary" href="{{route('posts')}}"><i class="fa fa-angle-left"></i> Back</a>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading" style="border-bottom: 1px solid grey;padding-bottom: 20px;padding-top: 20px">
                        <i class="fa fa-edit fa-2x text-primary"></i> <span style="font-size: 20px">Edit Post of {{$post->title}}</span>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{route('post.edits')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{$post->id}}">

                            <div class="form-group @if($errors->has('image')) has-error @endif">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image[]" multiple>
                                @if($errors->has('img')) <span class="help-block">{{$errors->first('image')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                @if($errors->has('title')) <span class="help-block">{{$errors->first('title')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('price')) has-error @endif">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" value="{{$post->price}}">
                                @if($errors->has('price')) <span class="help-block">{{$errors->first('price')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $cat)
                                        <option @if($cat->id==$post->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group @if($errors->has('qty')) has-error @endif">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="qty" value="{{$post->qty}}">
                                @if($errors->has('qty')) <span class="help-block">{{$errors->first('qty')}}</span> @endif
                            </div>
                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$post->description}}</textarea>
                                @if($errors->has('description')) <span class="help-block">{{$errors->first('description')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right" style="padding-left: 25px;padding-right: 25px">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-6" id="img_div">--}}

            {{--</div>--}}
        </div>

    </section>
    @stop

@section('script')
    <script>
        $(document).ready(function () {
            setTimeout(function() { $("alert").hide(); }, 5000);
        })
    </script>
    @stop