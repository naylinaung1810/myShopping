@extends('backEnd.layout.app')

@section('title')

@stop

@section('content')
    @include('backEnd.layout.alert')

    <section class="content-header" style="background: gainsboro;padding-bottom: 15px;border-bottom: 1px solid">
        <h1>
            Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 10px">
        <div class="table-responsive">
            <table class="table table-hover border border-dark"  >
                <thead class="">
                <tr style="height: 50px;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Ordered Date</th>
                    <th>Deliver</th>
                    <th>Print</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                                <tr class="@if($order->status==true) bg-success  @else @endif" style="border-left: 2px solid grey">
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->city->name}}</td>
                                    <td>{{$order->address}}</td>
                                    <td class="@if($order->status==true)text-success @else text-danger @endif text-center">@if($order->status==true)
                                            <i class="fa fa-check-circle"></i> @else
                                            <i class="fa fa-times-circle"></i> @endif</td>
                                    <td>{{$order->created_at->diffForHumans()}}</td>
                                    <td class="text-center">@if($order->status==false)
                                        <a href="{{route('order.deliver',['id'=>$order->id])}}" ><i class="fa fa-car"></i> </a>
                                        @else
                                            {{$order->updated_at->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->status==true)
                                            <a href="{{route('order.vouncher',['id'=>$order->id])}}"><i class="fa fa-print text-success"></i> </a>
                                            @else
                                            <i class="fa fa-print text-danger"></i>
                                        @endif
                                    </td>
                                </tr>
                        <tr>
                            <td colspan="10">
                            <div id="collapse{{$order->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="well table-responsive">
                                    <table class="table" style="">
                                        @foreach($order->orderItem as $item)
                                            <tr style="border-bottom: 2px solid grey">
                                                <td class="col-2"><img src="{{route('images',['img_name'=>$item->post->postImage[0]->image])}}" class="img-rounded img-responsive" style="width: 150px"></td>
                                                <td>{{$item->post->title}}</td>
                                                <td>{{$item->post->price}} MMK</td>
                                                <td>{{$item->qty}}</td>
                                                <td>{{$item->amount}} MMK</td>
                                            </tr>

                                            @endforeach
                                    </table>
                                </div>
                            </div>
                            </td>
                        </tr>
                        {{--</div>--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@stop

@section('script')
    <script>
        $(function () {
            $('body').delegate('table tbody tr','click',function (e) {
                var id=e.target.parentNode.childNodes[1].textContent;
                $('#collapse'+id).collapse('toggle')

            })
        })
    </script>

    @stop