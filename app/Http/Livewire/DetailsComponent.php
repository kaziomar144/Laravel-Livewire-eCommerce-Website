<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('msg','Item added in Cart');
        session()->flash('msg-type','success');
        $this->dispatchBrowserEvent('toastr',['type'=>'Success','message'=>'Item added in cart']);
        return redirect()->route('product.cart');
    }

    public function increaseQuantity()
    {
       $this->qty++;
    }

    public function decreseQuantity()
    {
        if ($this->qty > 1){
            $this->qty--;
        }
    }

    public function render()
    {
        $product = Product::whereSlug($this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(10)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',compact('product','popular_products','related_products','sale'))->layout('layouts.base');
    }
}
