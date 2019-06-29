<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You For Shopping</title>
    <link href="{{asset('bst4/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="panel" style="border: 1px solid grey;padding: 10px">
                <h3 class="text-center" style="font-size: 35px">Bar Nyar Online Store</h3>
                <br>
                <div class="row">
                    <div class="col-7">
                        <table style="border: none">
                            <tr>
                                <td>OrderID :</td>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <td>Name :</td>
                                <td>{{$order->name}}<p>({{$order->phone}})</p></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td>({{$order->city->name}})<p>{{$order->address}}</p></td>
                            </tr>
                            <tr>
                                <td>Ordered By :</td>
                                <td>{{$order->created_at->format('d(D)/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Deliver By :</td>
                                <td>
                                    @if($order->status==true)
                                        {{$order->updated_at->format('d(D)/m/Y')}}
                                        @else
                                        <span class="text-danger">No Delivery</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-5">
                        <table class="mt-auto" style="border: none">
                            <tr>
                                <td>Phone :</td>
                                <td>09783010084</td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td>Thaton</td>
                            </tr>

                        </table>
                    </div>
                </div>
                <table class="table border table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    @foreach($order_items as $item)
                        <tr>
                            <td>{{$item->post->title}}</td>
                            <td>{{$item->post->price}} MMK</td>
                            <td class="text-center">{{$item->qty}}</td>
                            <td>{{$item->amount}} MMK</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-center">Total Amount</td>
                        <td>{{$totalAmount}} MMK</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">Cost 5%</td>
                        <td>{{$totalAmount*0.05}} MMK</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">Total Amount</td>
                        <td>{{$totalAmount+$totalAmount*0.05}} MMK</td>
                    </tr>
                </table>
                <h4 class="text-center">Thank you for selling</h4>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('bst4/js/jquery.js')}}"></script>
<script src="{{asset('bst4/js/popper.js')}}"></script>
<script src="{{asset('bst4/js/bootstrap.js')}}"></script>
</body>
</html>