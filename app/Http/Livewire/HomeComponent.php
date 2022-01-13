<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
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
        $sale = Sale::find(1);
        // $sale_add = Carbon::parse($sale->created_at)->addDays(4);
        // if($sale_add >= Carbon::now()){
        //     echo 'yes';exit;
        // }else{
        //     echo 'no'; exit;
        // }
        return view('livewire.home-component',compact('sliders','latest_products','categories','no_fo_products','sale_products','sale'))->layout('layouts.base');
    }
}
