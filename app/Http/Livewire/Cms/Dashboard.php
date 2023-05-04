<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.cms.dashboard')->layout('layouts.cms');
    }
}
