<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\City;
use App\Order;
use App\Orderitem;
use App\Post;
use App\Postimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   // public $count;
    public function getHome()
    {
        //$post_img=Postimage::get();
        $category=Category::get();
        $posts=Post::orderBy('id','desc')->get();
        return view('products')->with(['posts'=>$posts,'category'=>$category]);
    }

    public function deleteOrder()
    {
        if(Session::has('cart'))
        {
            Session::forget('cart');
            return redirect()->route('home.fe');
        }
    }

    public function getProductDetail($id)
    {
        $posts=Post::whereId($id)->first();
        return view('detail')->with(['post'=>$posts]);
    }

    public function getProduct($id)
    {
        $category=Category::get();
        $cat=Category::whereId($id)->first();
        $posts=Post::where('category_id',$id)->orderBy('id','desc')->get();
        return view('productCat')->with(['posts'=>$posts,'category'=>$category,'cat'=>$cat]);
    }

    public function getWelcome()
    {
        $post_img=Postimage::get();
        $category=Category::get();
        $posts=Post::orderBy('id','desc')->limit(8)->get();
        return view('welcome')->with(['category'=>$category,'posts'=>$posts,'images'=>$post_img]);
    }

    public function getAddCart(Request $request)
    {

        $id=$request['id'];
        $post=Post::whereId($id)->first();
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addCart($id,$post);
        Session::put('cart',$cart);
        return response()->json(['message'=>"ok"]);
    }

    public function getCart()
    {
        if(Session::has('cart'))
        {
            $city=City::get();
            //dd(Session::get('cart'));
            return view('fontEnd.order.order')->with(['city'=>$city]);
        }else
            return redirect()->back();

    }

    public function getCartCount()
    {
        if(Session::has('cart'))
        {
            $count= Session::get('cart')->totalQty;
        }else
        {
            $count=0;
        }

        return response()->json(['count'=>$count]);
    }

    public function getMinusCart(Request $request)
    {


        $id=$request['id'];
        $post=Post::whereId($id)->first();
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        if($cart->totalAmount<=0)
        {
            Session::forget('cart');
            $tmount=0;
        }else
        {
            $cart->minusCart($id,$post);
            Session::put('cart',$cart);
            $tmount=Session::get('cart')->totalAmount;
        }
        if(array_key_exists($id,Session::get('cart')->items))
        {
            $qty=Session::get('cart')->items[$id]['qty'];
            $amount=Session::get('cart')->items[$id]['amount'];
        }else
        {
            $amount=0;
            $qty=0;
        }
     return response()->json(['qty'=>$qty,'amount'=>$amount,'totalAmount'=>$tmount]);

    }

    public function getPlusCart(Request $request)
    {
        $id=$request['id'];
        $post=Post::whereId($id)->first();
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->plusCart($id,$post);
        Session::put('cart',$cart);

        $tmount=Session::get('cart')->totalAmount;
        $qty=Session::get('cart')->items[$id]['qty'];
        $amount=Session::get('cart')->items[$id]['amount'];

        return response()->json(['qty'=>$qty,'amount'=>$amount,'totalAmount'=>$tmount]);
    }

    public function getQty(Request $request)
    {
        $id=$request['id'];
        if(Session::has('cart'))
        {
            $count= Session::get('cart')->items[$id]['qty'];
        }else
        {
            $count=0;
        }

        return response()->json(['count'=>$count]);
    }

    public function postCheckOut(Request $request)
    {
        $this->validate($request,[
            'user'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'address'=>'required',
        ]);
        $name=$request['user'];
        $email=$request['email'];
        $phone=$request['phone'];
        $city=$request['city'];
        $address=$request['address'];

        if(Session::has('cart'))
        {
            $order=new Order();
            $order->name=$name;
            $order->phone=$phone;
            $order->email=$email;
            $order->status=false;
            $order->city_id=$city;
            $order->address=$address;
            $order->save();
            foreach (Session::get('cart')->items as $item)
            {
                $order_item=new Orderitem();
                $order_item->order_id=$order->id;
                $order_item->post_id=$item['item']['id'];
                $order_item->qty=$item['qty'];
                $order_item->amount=$item['amount'];
                $order_item->save();

            }
            Session::forget('cart');
            return redirect()->route('/')->with('info','Check out success');
        }else
        {
            return redirect()->back()->with('error','First choose order item');
        }

    }

    public function getOrderDetail($id)
    {
        $totalAmount=0;
        $order=Order::whereId($id)->first();
        $order_item=$order->orderItem;
        foreach ($order_item as $item)
        {
            $totalAmount+=$item->amount;
        }
        return view('fontEnd.order.vouncher')->with(['order'=>$order,'order_items'=>$order_item,'totalAmount'=>$totalAmount]);
        //dd($res);
    }

}
