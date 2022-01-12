<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $slider_id;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newImage;

    public function mount($slider_id)
    {
        $this->slider_id = $slider_id;
        $slider = HomeSlider::whereId($slider_id)->first();
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->image = $slider->image;
    }

    public function updateSlider()
    {
        $this->validate([
            'title' => 'required|max:100',
            'subtitle' => 'required',
            'price' => 'required',
            'link' => 'required',
            'image' => 'required',
        ]);
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        if($this->newImage){
            $imageName= Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
            $image_path = public_path('assets').'/images/sliders/'.$this->image;
            // dd($image_path);
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
        }
        $slider->save();
        session()->flash('msg','Slider has been Updated successfully');
        session()->flash('msg-type','success');
        return redirect()->route('admin.homeslider');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
