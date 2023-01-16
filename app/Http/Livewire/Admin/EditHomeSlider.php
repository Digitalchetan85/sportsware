<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHomeSlider extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;
    public $slide_id;
    public $newimage;

    public function mount($id)
    {
        $slide = Slider::where('id', $id)->first();
        // dd($slide);
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->price = $slide->price;
        $this->image = $slide->image;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->slide_id = $slide->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields, [
                'newimage' => 'required',
            ]);
        }
    }

    public function updateSlide() 
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'image' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required',
            ]);
        }

        $slide = Slider::find($this->slide_id);
        // dd($slide);
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        
        // $slide->image = $this->image;
        if($this->newimage)
        {
            // unlink('assets/images/sliders'.'/'.$slide->image);
            $imagename = 'slide-'.Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders', $imagename);
            $slide->image = $imagename;
        }

        $slide->link = $this->link;
        $slide->status = $this->status;
        $slide->save();

        session()->flash('success', 'Slide Updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.edit-home-slider')->layout('layouts.base');
    }
}
