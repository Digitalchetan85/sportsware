<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAtrributeComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required'
        ]);
    }

    public function AddAttribute()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $pattribute = new ProductAttribute();
        $pattribute->name=$this->name;
        $pattribute->save();
        session()->flash('success', 'Attribute Added Successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-atrribute-component')->layout('layouts.base');
    }
}
