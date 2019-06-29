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
            <a class="btn btn-primary" href="{{route('new-category')}}"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="row" style="margin-top: 5px">
            {{--<div class="box">--}}
                <table class="table text-center table-striped">
                    <thead style="background: gainsboro">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Action</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>
                    @foreach($category as $cat)
                        <tr class="" style="">
                            <td>{{$cat->id}}</td>
                            <td class="col-xs-2">
                                <img src="{{route('image',['img_name'=>$cat->image])}}" class="img-rounded img-responsive" >
                            </td>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                <a href="#" data-toggle="modal" data-target="#rm{{$cat->id}}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                            </td>
                            <td>{{$cat->created_at}}</td>
                            <div class="modal fade" id="rm{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <i class="fa fa-warning fa-2x text-warning"></i> Are you sure this category to <span class="text-danger text-bold">delete</span>?
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-6 text-center">
                                                    Category Name :
                                                </div>
                                                <div class="col-xs-6 text-danger">{{$cat->name}}</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="{{route('category.remove',['id'=>$cat->id])}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        @endforeach

                </table>
            {{--</div>--}}
        </div>
    </section>
    @stop