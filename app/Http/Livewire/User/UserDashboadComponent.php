<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboadComponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboad-component')->layout('layouts.base');
    }
}
