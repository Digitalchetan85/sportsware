<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {   
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Item Added in Cart successfully');
        return redirect()->route('cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $related_products = Product::inRandomOrder()->limit(8)->get();
        $popular_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        // dd($related_products);
        $sale=Sale::find(1);
        return view('livewire.details-component', compact('product','related_products','popular_products','sale'))->layout('layouts.base');
    }
}
