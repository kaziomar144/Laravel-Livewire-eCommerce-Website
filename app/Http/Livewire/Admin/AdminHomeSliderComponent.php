<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;


class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);
        
        $image_path = public_path('assets').'/images/sliders/'.$slider->image;
        // dd($image_path);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $slider->delete();
        session()->flash('msg','Slider has been deleted successfully');
        session()->flash('msg-type','danger');
        $this->dispatchBrowserEvent('toastr',['type' => 'Error', 'message' => 'Slider has been deleted successfully']);
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',compact('sliders'))->layout('layouts.base');
    }
}
