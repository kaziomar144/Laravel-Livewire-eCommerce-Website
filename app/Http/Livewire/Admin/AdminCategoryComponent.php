<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('msg','Category has been delete successfully');
        session()->flash('msg-type','danger');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error','message' =>'Category has been delete successfully']);
    }
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component',compact('categories'))->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'pagination-links';
    }
}
