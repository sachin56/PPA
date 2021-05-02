<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserdashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.user.userdashboard-component')->layout('layouts.base');
    }
}
