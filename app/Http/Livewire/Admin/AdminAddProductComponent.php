<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddProductComponent extends Component
{
    public $product_name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $qty;
    public $product_image;
    public $product_category;

    use WithFileUploads;
    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = '0';
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->product_name);
        if(!empty($this->product_name)){
            $this->slug .= '$$$'.rand(10000000,99999999);
        }
    }
    public function updated($filed)
    {
        $this->validateOnly($filed,[
            'product_name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required|max:150',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'sku' => 'required',
            'qty' => 'required|numeric',
            'product_image' => 'required|mimes:jpeg,png',
            'product_category' => 'required',
        ]);
    }
    public function storeProduct()
    { 
         $this->validate([
            'product_name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required|max:150',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'sku' => 'required',
            'qty' => 'required|numeric',
            'product_image' => 'required|mimes:jpeg,png',
            'product_category' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->product_name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = 'DIGI'.$this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->qty;
        $imageName= Carbon::now()->timestamp. '.' .$this->product_image->extension();
        $this->product_image->storeAs('products',$imageName);
        $product->image = $imageName;
        $product->category_id = $this->product_category;
        $product->save();
        session()->flash('msg','Product has been added successfully');
        session()->flash('msg-type','success');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-product-component')->layout('layouts.base');
    }
}
