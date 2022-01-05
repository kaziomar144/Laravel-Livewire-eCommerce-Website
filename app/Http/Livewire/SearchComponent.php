<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class SearchComponent extends Component
{
    public $sorting;
    public $productParPage;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting = 'default';
        $this->productParPage = 12;

        $this->fill(request()->only('search','product_cat','product_cat_id'));
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
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id','LIKE','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price'){
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id','LIKE','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->productParPage);
        }elseif($this->sorting == 'price-desc'){
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id','LIKE','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->productParPage);
        }else{
            $products = Product::where('name','LIKE','%'.$this->search.'%')->where('category_id','LIKE','%'.$this->product_cat_id.'%')->paginate($this->productParPage);
        }

        $categories = Category::all();
        
        return view('livewire.search-component',compact('products','categories'))->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'pagination-links';
    }
}
