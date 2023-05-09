<?php

namespace App\Http\Livewire\Cms\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddArticleCategory extends Component
{
    public $loading = false;
    public $name;
    public function onSubmit(){
        $data = $this->validate([
            'name' => 'required',
        ]);
        Category::create($data);
        session()->flash('successMsg', '新增成功！');
    }
    public function render()
    {
        return view('livewire.cms.category.add-article-category')->layout('layouts.cms');
    }
}
