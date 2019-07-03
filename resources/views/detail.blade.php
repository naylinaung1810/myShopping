@extends('fontEnd.layout.app')

@section('title')
    Cart Detail
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="border: 1px solid gainsboro;border-radius: 5px">
                <div id="show" class="row">
                    <img src="{{route('images',['img_name'=>$post->postImage[0]->image])}}" class="img-rounded img-responsive ml-5" style="width: 400px">
                </div>
                <div id="image" class="row pl-4" style="border: 1px solid grey;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;padding: 5px">
                    @foreach($post->postImage as $image)
                        <img src="{{route('images',['img_name'=>$image->image])}}" class="img-rounded img-responsive img-bordered" style="width: 200px">
                        @endforeach
                </div>
            </div>
            <div class="col-md-7">
                <a href="{{route('home.fe')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-angle-left"></i> Back</a>
                <ul class="list-group">
                    <li class="list-group-item"><div class="row"><div class="col-2">Name :</div><div class="col-10">{{$post->title}}</div></div></li>
                    <li class="list-group-item"><div class="row"><div class="col-2">Category :</div><div class="col-10">{{$post->category->name}}</div></div></li>
                    <li class="list-group-item"><div class="row"><div class="col-2">Price :</div><div class="col-10">{{$post->price}} MMK</div></div></li>
                    <li class="list-group-item"><div class="row"><div class="col-2">Description:</div><div class="col-10">{{$post->description}}</div></div></li>
                    <li class="list-group-item"><div class="row"><div class="col-2">Uploaded:</div><div class="col-10">{{$post->created_at->format('M-d-Y')}}</div></div></li>
                </ul>

            </div>
        </div>
    </div>
    @stop
@section('script')
    <script>
        $(function () {
            $('body').delegate('.container #image img','click',function (e) {
               //console.log($('#show img')[0].currentSrc)
                //console.log(e.target.src)
                $('#show').html('<img src="'+e.target.src+'" class="img-rounded img-responsive ml-5" style="width: 400px">');

            })
        })
    </script>
    @stop