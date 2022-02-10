<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $scategory_id;
    public $scategory_slug;

    public function mount($category_slug,$scategory_slug=null)
    {
        if ($scategory_slug) {
            $this->scategory_slug = $scategory_slug;
            $scategory = Subcategory::whereSlug($this->scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id  = $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
        }else{
        $this->category_slug = $category_slug;
        $category = Category::whereSlug($this->category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug =$category->slug;
        }
    }
    public function updated($filed)
    {
        $this->validateOnly($filed,[
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->category_id
        ]);
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
        if(!empty($this->name)){
            $this->slug .= '$$$'.rand(10000000,99999999);
        }
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $this->category_id,
        ]);
        if($this->scategory_id){
            $scategory = Subcategory::find($this->scategory_id);
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
            $this->dispatchBrowserEvent('toastr',['type' => 'Success', 'message' => 'Sub-category has been updated successfully']);
        }else{
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
            $this->dispatchBrowserEvent('toastr',['type' => 'Success', 'message' => 'Category has been updated successfully']);
        }
        
        session()->flash('msg','Category has been updated successfully');
        session()->flash('msg-type','success');
        
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-category-component',compact('categories'))->layout('layouts.base');
    }
}
