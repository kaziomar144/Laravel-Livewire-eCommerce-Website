<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::whereStatus(1)->get();
        $latest_products = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.home-component',compact('sliders','latest_products'))->layout('layouts.base');
    }
}
