<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

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
            'slug' => 'required',
        ]);
    }

    public function storeCategory()
    { 
         $this->validate([
            'name' => 'required|min:5|max:30',
            'slug' => 'required',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('msg','Category has been created successfully');
        session()->flash('msg-type','success');
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
