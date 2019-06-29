<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    public $items=null;
    public $totalQty=0;
    public $totalAmount=0;
    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalAmount=$oldCart->totalAmount;
        }
    }

    public function addCart($id,$post)
    {
        $storeItem=['item'=>null,'qty'=>0,'amount'=>0];
        if($this->items)
        {
            if(array_key_exists($id,$this->items))
            {
                $storeItem=$this->items[$id];
            }
        }
        //$storeItem['qty']+=$this->items[$id]['qty'];
        $storeItem['item']=$post;
        $storeItem['qty']++;
        $storeItem['amount']=$storeItem['qty']*$post->price;
        $this->items[$id]=$storeItem;
        $this->totalQty++;
        $this->totalAmount+=$post->price;
    }

    public function minusCart($id,$post)
    {
        $this->totalQty--;
        $this->items[$id]['qty']--;
        $this->items[$id]['amount']=$this->items[$id]['amount']-$post->price;
        $this->totalAmount=$this->totalAmount-$post->price;
        if($this->items[$id]['qty']<=0)
        {
            unset($this->items[$id]);
        }
    }

    public function plusCart($id,$post)
    {
        $this->totalQty++;
        $this->items[$id]['qty']++;
        $this->items[$id]['amount']=$this->items[$id]['amount']+$post->price;
        $this->totalAmount=$this->totalAmount+$post->price;
    }
}
