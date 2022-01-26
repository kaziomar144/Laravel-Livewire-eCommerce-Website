<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('msg','Product has been delete');
        session()->flash('msg-type','danger');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error', 'message' => 'Product has been delete']);
    }
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component',compact('products'))->layout('layouts.base');
    }

    public function paginationView()
    {
        return 'pagination-links';
    }
}
