<?php

namespace App\Http\Livewire\Cms;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddArticle extends Component
{
    public $baseTitle;
    public function mount($id){
        Log::info($id);
        if($id === 'create'){
            $this->baseTitle = '新增文章';
        }else{
            $this->baseTitle = '編輯文章';
        }
    }
    public function render()
    {
        return view('livewire.cms.add-article')->layout('layouts.cms');
    }
}
