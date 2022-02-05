<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
        if(!empty($this->name)){
            $this->slug .= '$$$'.rand(10000000,99999999);
        }
    }
    public function resetForm()
    {
        $this->name = "";
        $this->slug = "";
    }
    public function updated($filed)
    {
        $this->validateOnly($filed,[
            'name' => 'required|min:5|max:30',
            'slug' => 'required|unique:categories',
        ]);
    }

    public function storeCategory()
    { 
         $this->validate([
            'name' => 'required|min:5|max:30',
            'slug' => 'required|unique:categories',
        ]);
        if ($this->category_id) {
            $category = new Subcategory();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->category_id = $this->category_id;
            $category->save();
            $this->dispatchBrowserEvent('toastr',['type' => 'Success','message' => 'Sub-category has been created successfully']);
        }else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            $this->dispatchBrowserEvent('toastr',['type' => 'Success','message' => 'Category has been created successfully']);
        }
        
        session()->flash('msg','Category has been created successfully');
        session()->flash('msg-type','success');
        // $this->dispatchBrowserEvent('toastr',['type' => 'Success','message' => 'Category has been created successfully']);
        $this->resetForm();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component',compact('categories'))->layout('layouts.base');
    }
}
