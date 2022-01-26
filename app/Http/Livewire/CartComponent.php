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
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
         $this->emitTo('cart-count-component','refreshComponent');
    }

    public function destroy($rowId) 
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Item has been removed']);
        session()->flash('msg','Item has been removed');
        session()->flash('msg-type','success');
        // return redirect()->route('product.cart');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'All item has been removed']);
        session()->flash('msg','All item has been removed');
        session()->flash('msg-type','success');
    }

    //save for later function
    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message'=>'Item has been saved for later']);

    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->dispatchBrowserEvent('toastr',['type' => 'Success','message'=>'Item has been moved to cart']);
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message'=>'Item has been removed from save for later']);
    }

    public function render()
    {
        $sale = Sale::find(1);
        return view('livewire.cart-component',compact('sale'))->layout('layouts.base');
    }
}
