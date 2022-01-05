<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    public $sorting;
    public $productParPage;

    public function mount()
    {
        $this->sorting = 'default';
        $this->productParPage = 12;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('msg','Item added in Cart');
        session()->flash('msg-type','success');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::orderBy('created_at','DESC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price'){
            $products = Product::orderBy('regular_price','ASC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price-desc'){
            $products = Product::orderBy('regular_price','DESC')->paginate($this->productParPage);
        }else{
            $products = Product::paginate($this->productParPage);
        }

        $categories = Category::all();
        
        return view('livewire.shop-component',compact('products','categories'))->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'pagination-links';
    }
}
