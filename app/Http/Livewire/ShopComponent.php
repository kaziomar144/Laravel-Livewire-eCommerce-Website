<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    public $sorting;
    public $productParPage;
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = 'default';
        $this->productParPage = 12;

        $this->min_price = Product::min('regular_price');
        $this->max_price = Product::max('regular_price');
        // $this->min_price = 1;
        // $this->max_price = 1000;
       
        
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('msg','Item added in Cart');
        session()->flash('msg-type','success');
        return redirect()->route('product.cart');
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('msg','Item added in Wishlist');
        session()->flash('msg-type','success');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeFormWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
          
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price'){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price-desc'){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->productParPage);
        }else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->productParPage);
        }

        $categories = Category::all();
        $sale = Sale::findOrFail(1);
        return view('livewire.shop-component',compact('products','categories','sale'))->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'pagination-links';
    }
}
