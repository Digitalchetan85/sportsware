<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class HomeSlider extends Component
{
    use WithPagination;

    public function deleteSlider($id)
    {
        $product = Slider::find($id);
        $product->delete();
        session()->flash('success', 'Slide deleted successfully');
    }

    public function render()
    {
        $sliders = Slider::paginate(10);
        return view('livewire.admin.home-slider',compact('sliders'))->layout('layouts.base');
    }
}
