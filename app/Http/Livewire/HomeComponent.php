<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = Slider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        // dd($categories);
        $no_of_products = $category->no_of_products;
        $s_products = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        // dd($sale);
        return view('livewire.home-component', compact('sliders','lproducts','categories','no_of_products','s_products','sale'))->layout('layouts.base');
    }
}
