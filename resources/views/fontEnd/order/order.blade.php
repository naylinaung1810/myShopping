@extends('fontEnd.layout.app')

@section('title')
    Cart Detail
    @stop

@section('content')

    <div class="container-fluid">
        <div class="row ml-2">
            <div class="col-md-8" style="border-right: 1px solid grey">
                <div class="row">
                    <div class="col-12">
                        <span class="ml-3" style="font-size: 30px"><i class="fa fa-folder"></i> Cart Detail</span>
                        <div class="float-right">
                            <a href="{{route('home.fe')}}" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Continue</a>
                            <a href="{{route('order.delete')}}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover" >
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>

                    @foreach(Session::get('cart')->items as $item)
                        <tr>
                            <td class=""><img src="{{route('images',['img_name'=>$item['item']->postImage[0]->image])}}" style="width: 100px" class="img-rounded img-responsive"></td>
                            <td>{{$item['item']['title']}}</td>
                            <td>{{$item['item']['price']}} MMK</td>
                            <td>
                                <a name="{{$item['item']['id']}}" id="minus" class="text-primary"><i class="fa fa-minus-circle"></i> </a>
                                <span id="qty{{$item['item']['id']}}">{{$item['qty']}}</span>
                                <a name="{{$item['item']['id']}}" id="plus" class="text-primary"><i class="fa fa-plus-circle"></i> </a>
                            </td>
                            <td>{{$item['amount']}} MMk</td>
                        </tr>
                        @endforeach
                    <tr>
                        <td colspan="4" class="text-center " style="font-size: 20px">Grand Amount</td>
                        <td>{{Session::get('cart')->totalAmount}} MMK</td>
                    </tr>

                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-credit-card"></i> Check Out</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('checkout')}}">
                            @csrf
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" name="user" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group flex-nowrap mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group flex-nowrap mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group flex-nowrap mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-city"></i></div>
                                </div>
                                <input list="city" name="city" placeholder="City" class="form-control" aria-describedby="addon-wrapping">
                                <datalist id="city">
                                    @foreach($city as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="form-group mt-2">
                                <textarea class="form-control" name="address" placeholder="Address...."></textarea>
                            </div>

                            <div class="form-group mt-2">
                                <button class="btn btn-outline-success btn-block" type="submit">Check Out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop

@section('script')
    <script>
        $(function () {

            count();
            function count()
            {
                $.ajax({
                    url:'/get/cart/count',
                    type: 'GET',
                    success: function( data ){
                        $('#cart').html(data['count']);
                    }
                });
            }
            ///////////////////////////////////////////////////////
            //For Decrease.....................................
            $('body').delegate('#minus','click',function (e) {
               $.ajax({
                    url:'/cart/minus',
                    type:"GET",
                    data: {
                        id:this.name
                    },
                    success:function (data) {
                        e.target.parentElement.parentElement.childNodes[3].textContent=data['qty'];
                        e.target.parentElement.parentElement.parentElement.childNodes[9].textContent=data['amount']+" MMk";
                        e.target.parentElement.parentElement.parentElement.parentElement.lastElementChild.childNodes[3].textContent=data['totalAmount']+" MMK";
                        if(data['qty']==0)
                        {
                            e.target.parentElement.parentElement.parentElement.remove();
                        }
                        count()
                    }

                })
            })
            ///////////////////////////////////////////////////////////////
           //For Increase ............................
            $('body').delegate('#plus','click',function (e) {
                $.ajax({
                    url:'/cart/plus',
                    type:"GET",
                    data: {
                        id:this.name
                    },
                    success:function (data) {
                        e.target.parentElement.parentElement.childNodes[3].textContent=data['qty'];
                        e.target.parentElement.parentElement.parentElement.childNodes[9].textContent=data['amount']+" MMk";
                        e.target.parentElement.parentElement.parentElement.parentElement.lastElementChild.childNodes[3].textContent=data['totalAmount']+" MMK";
                        if(data['qty']==0)
                        {
                            e.target.parentElement.parentElement.parentElement.remove();
                        }
                        count()
                    }

                })
            })
            ///////////////////////////////////////////////////////////////
        })
    </script>
            @stop