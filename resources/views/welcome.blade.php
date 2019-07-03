@extends('fontEnd.layout.app')

@section('title')
    Welcome From my Shopping
    @stop

@section('content')
@include('fontEnd.layout.sider')

   <div class="container mt-3">
       <div class="row">
           <div class="col-12 pt-3 pb-3">
                   <h3 class="text-center text-bold" style="font-size: 40px"><i class="fa fa-folder"></i> Last Products</h3>
           </div>
       </div>
           <div class="row pb-3" style="">
               {{--<div class="col-md-12">--}}
               @foreach($posts as $post)
                   <div class="col-md-3 mt-3">
                       <div class="card border-secondary">
                           <div class="card-header bg-secondary" style="height: 90px">
                               <h4 class="text-center">{{$post->title}}</h4>
                           </div>
                           <div class="card-body" style="height: 335px">
                               <img src="{{route('images',['img_name'=>$post->postImage[0]->image])}}" class="img-rounded img-responsive" style="width: 210px;height: 210px">
                               <h5 class="text-center mt-3 text-info">{{$post->price}} MMK</h5>
                               <div class="text-right mt-3 ">
                                   <button type="button" name="{{$post->id}}" id="addcart" class="btn btn-success" style="border-radius: 25px" data-toggle="tooltip" data-placement="left" title="Add to cart">
                                       <i class="fa fa-shopping-cart"></i>
                                   </button>
                                   <a href="{{route('product.detail',['id'=>$post->id])}}" data-toggle="tooltip" class="btn btn-primary pl-4 pr-4" data-placement="top" title="See Detail More.....">Detail..</a>

                               </div>
                           </div>
                       </div>
                   </div>
               @endforeach

               {{--</div>--}}
           </div>
       <div class="row">
           <div class="col-12 text-center">
               <a class="btn btn-success pl-5 pr-5" href="{{route('home.fe')}}">More</a>
           </div>
       </div>
   </div>
    @stop

@section('script')

    @stop