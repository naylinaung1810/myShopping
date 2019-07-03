@extends('fontEnd.layout.app')

@section('title')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="position: fixed">
                @include('fontEnd.layout.menu')
            </div>

            <div class="col-md-10" style="margin-left: 195px">
                <div class="row">
                    <h4 class="ml-3 pt-3" style="font-size: 30px">{{$cat->name}}</h4>
                </div>
                <hr>
                <div class="row">
                    {{--<div class="col-md-12">--}}
                    @foreach($posts as $post)
                        <div class="col-md-3 mt-3">
                            <div class="card border-secondary">
                                <div class="card-header bg-secondary" style="height: 90px">
                                    <h4 class="text-center">{{$post->title}}</h4>
                                </div>
                                <div class="card-body" style="height: 335px">
                                    <img src="{{route('images',['img_name'=>$post->postImage[0]->image])}}" class="img-rounded img-responsive" style="width: 180px;height: 210px">
                                    <h5 class="text-center mt-3 text-info">{{$post->price}} MMK</h5>
                                    <div class="text-right mt-3 ">
                                        <button type="button" name="{{$post->id}}" id="addcart" class="btn btn-success" style="border-radius: 25px" data-toggle="tooltip" data-placement="left" title="Add to cart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" class="btn btn-primary pl-4 pr-4" data-placement="top" title="See Detail More.....">Detail..</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
@stop