<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddHomeSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'image' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
    }

    public function addSlide() 
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'image' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        $slide = new Slider();
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        
        // $slide->image = $this->image;
        $imagename = 'Slide-'.Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders', $imagename);
        $slide->image = $imagename;

        $slide->link = $this->link;
        $slide->status = $this->status;
        $slide->save();

        session()->flash('success', 'Slide added successfully');
    }

    public function render()
    {
        return view('livewire.admin.add-home-slider')->layout('layouts.base');
    }
}
