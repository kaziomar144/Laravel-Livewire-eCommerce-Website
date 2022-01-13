<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::whereStatus(1)->get();
        $latest_products = Product::orderBy('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        // dd($cats);
        $categories = Category::whereIn('id',$cats)->get();
        $no_fo_products = $category->no_of_products;

        $sale_products = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',compact('sliders','latest_products','categories','no_fo_products','sale_products'))->layout('layouts.base');
    }
}
