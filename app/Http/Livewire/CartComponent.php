<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function destroy($rowId) 
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('msg','Item has been removed');
        session()->flash('msg-type','success');
        // return redirect()->route('product.cart');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('msg','All item has been removed');
        session()->flash('msg-type','success');
    }

    public function render()
    {
        $sale = Sale::find(1);
        return view('livewire.cart-component',compact('sale'))->layout('layouts.base');
    }
}
