<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory as ModelsHomeCategory;
use Livewire\Component;

class HomeCategory extends Component
{
    public $sel_categories = [];
    public $no_of_products;

    public function mount()
    {
        $category = ModelsHomeCategory::find(1);
        $this->sel_categories = explode(',', $category->sel_categories);
        $this->no_of_products = $category->no_of_products;
    }

    public function updateHomeCategory()
    {
        // dd($this->sel_categories);
        $category = ModelsHomeCategory::find(1);
        $category->sel_categories = implode(',', $this->sel_categories);
        $category->no_of_products = $this->no_of_products;
        $category->save();

        session()->flash('success', 'Category updated successfully');
    }

    public function render()
    {
        $category = Category::all();
        return view('livewire.admin.home-category', compact('category'))->layout('layouts.base');
    }
}
