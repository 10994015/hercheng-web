<?php

namespace App\Http\Livewire\Cms;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{
    public function render()
    {
        return view('livewire.cms.article')->layout('layouts.cms');
    }
    
}
