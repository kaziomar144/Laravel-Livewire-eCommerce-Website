<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::whereSlug($this->category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug =$category->slug;
    }
    public function updated($filed)
    {
        $this->validateOnly($filed,[
            'name' => 'required|min:5|max:30',
            'slug' => 'required|unique:categoties',
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
            'name' => 'required|min:5|max:30',
            'slug' => 'required|unique:categoties',
        ]);
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('msg','Category has been updated successfully');
        session()->flash('msg-type','success');
    }

    public function render()
    {
     
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
