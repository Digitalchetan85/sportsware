<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAtrributeComponent extends Component
{
   use WithPagination;

   public function deleteAttribute($attribute_id)
   {
    $pattribute = ProductAttribute::find($attribute_id);
    $pattribute->delete();
    session()->flash('success', 'Attribute Deleted successfully');
   }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-atrribute-component',compact('pattributes'))->layout('layouts.base');
    }
}
