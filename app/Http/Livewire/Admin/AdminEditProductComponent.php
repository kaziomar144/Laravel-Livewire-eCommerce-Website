<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_slug;
    public $product_id;
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
    public $newImage;
    public $product_image;
    public $product_category;

    public $product_images;
    public $newImages;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $product = Product::whereSlug($this->product_slug)->first();
        $this->product_id = $product->id;
        $this->product_name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->sku = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->qty = $product->quantity;
        $this->product_image = $product->image;
        $this->product_images = json_decode($product->images);
        $this->product_category = $product->category_id;
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
            'slug' => 'required',
            'short_description' => 'required|max:255',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sku' => 'required',
            'qty' => 'required|numeric',
            'product_category' => 'required',
        ]);
        if($this->newImage){
            $this->validateOnly($filed,[
                'newImage' => 'required|mimes:jpeg,png'
            ]);
        }
        
    }
    public function updateProduct()
    { 
         $this->validate([
            'product_name' => 'required',
            'slug' => 'required',
            'short_description' => 'required|max:255',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sku' => 'required',
            'qty' => 'required|numeric',
            'product_image' => 'required',
            'product_category' => 'required',
        ]);
        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpeg,png'
            ]);
        }
        $product = Product::find($this->product_id);
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
        if($this->newImage){
            unlink('assets/images/products/'.$product->image);
            $imageName= Carbon::now()->timestamp. '.' .$this->newImage->extension();
            $this->newImage->storeAs('products',$imageName);
            $product->image = $imageName;
        }    
        if($this->newImages){
            if($product->images){
                $images = json_decode($product->images);
                foreach ($images as $img) {
                    if($img){
                        unlink('assets/images/products/'.$img);
                    }
                }
            }
            $imagesName = [];
            foreach ($this->newImages as $key => $image) {
                $imgsName = Carbon::now()->timestamp . $key . '.' .$image->extension();
                $image->storeAs('products',$imgsName);
                $imagesName[] = $imgsName;
            }
            $imagesName = json_encode($imagesName);
            $product->images = $imagesName;
        }    
        $product->category_id = $this->product_category;
        $product->save();
        session()->flash('msg','Product has been updated successfully');
        session()->flash('msg-type','success');
        $this->dispatchBrowserEvent('toastr',['type' => 'Success', 'message' => 'Product has been updated successfully']);
        return redirect()->route('admin.products');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-product-component')->layout('layouts.base');
    }
}
