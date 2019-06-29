@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    @include('backEnd.layout.alert')

    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            Posts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="row" style="margin-left: 5px">
            <a class="btn btn-primary" href="{{route('new-post')}}"><i class="fa fa-plus"></i> Add</a>
        </div>

        <div class="row" style="margin-top: 5px">
            <div class="table-responsive">
                <table class="table" id="mytable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <td>Author</td>
                        <td>Category</td>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created_At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td class="col-md-2">
                                <a href="#" data-toggle="modal" data-target="#m{{$post->id}}">
                                    <img src="{{route('images',['img_name'=>$post->postImage[0]->image])}}" class="img-rounded img-responsive" >
                                </a>
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->price}} MMK</td>
                            <td>{{$post->qty}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <a id="dLabel" data-target="#" href="http://example.com/" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cogs"></i>
                                        <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="dropdown-item"><a href="{{route('post.edit',['id'=>$post->id])}}" class="text-primary" style="color: royalblue"><i class="fa fa-edit"></i> Edit</a></li>
                                        <li class="dropdown-item"><a href="#" class="text-danger" data-toggle="modal" data-target="#d{{$post->id}}" style="color: red"><i class="fa fa-trash"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </td>


                            {{--Modal for Detail--}}
                            <div class="modal fade" data-backdrop="static" data-keyboard="false" id="m{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4>Post Detail</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                            <li class="list-group-item"><div class="row">
                                                <div class="col-xs-3 text-center">Title :</div><div class="col-xs-9">{{$post->title}}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item"><div class="row">
                                                <div class="col-xs-3 text-center">Category :</div><div class="col-xs-9">{{$post->category->name}}</div>
                                            </div>
                                            </li>
                                            <li class="list-group-item"><div class="row">
                                                <div class="col-xs-3 text-center">Price :</div><div class="col-xs-9">{{$post->price}} MMK</div>
                                            </div>
                                            </li>
                                            <li class="list-group-item"><div class="row">
                                                <div class="col-xs-3 text-center">Poster :</div><div class="col-xs-9">{{$post->user->name}}
                                                    <a href="{{route('user.detail',['id'=>$post->user_id])}}" class="pull-right"><i class="fa fa-user-circle"></i> </a>
                                                    </div>
                                            </div>
                                            </li>
                                            <li class="list-group-item"><div class="row">
                                                <div class="col-xs-3 text-center">Created At :</div><div class="col-xs-9">{{$post->created_at}}</div>
                                            </div>
                                            </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        @foreach($post->postImage as $image)
                                                            <div class="col-xs-6 col-md-4">
                                                                <img src="{{route('images',['img_name'=>$image->image])}}" class="img-rounded img-responsive" >
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{--End Detail Modal--}}

                            {{--Delete modal--}}
                            <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="d{{$post->id}}" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <i class="fa fa-warning fa-2x text-warning"></i> <span class="text-danger" style="font-size: 20px">Delete this post</span>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group border-danger">
                                                <li class="list-group-item">
                                                    <span>Title : </span><span>{{$post->title}}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span>Poster : </span><span>{{$post->user->name}}</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span>Price : </span><span>{{$post->price}} MMK</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <span>Category : </span><span>{{$post->category->name}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="{{route('delete.post',['id'=>$post->id])}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End delete modal--}}

                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </section>
    @stop

@section('script')

    @stop