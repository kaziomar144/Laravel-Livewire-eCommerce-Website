<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{

    public function removeFormWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatchBrowserEvent('toastr',['type' => 'Error','message' => 'Item remove in Wishlist']);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
          
        }
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
