<?php

namespace App\Http\Livewire\Cms;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class AddArticle extends Component
{
    use WithFileUploads;

    public $baseTitle;
    public $category_id;
    public $title;
    public $content;
    public $image;
    public $hidden = false;
    public function mount($id){
        if($id === 'create'){
            $this->baseTitle = '新增文章';
            $this->category_id = Category::orderBy('created_at', 'desc')->first()->id;
        }else{
            $isset = Article::where('id', $id)->count() > 0;
            if($isset){
            }else{
            }

            $this->baseTitle = '編輯文章';
        }
    }
    public function onSubmit(){
        $data = $this->validate([
            'title'=> ['required', 'max:2000'],
            'image'=> ['nullable', 'image'],
            'content'=> ['nullable', 'string', 'required'],
            'hidden'=> ['boolean'],
            'category_id'=>['required']
        ]);
        $image = $this->image ?? NULL;
        $image['created_by'] = Auth::id();
        if($image){
            $rand = Str::random();
            $fileName = $image->store('public/images');
            $data['image'] = URL::to('/public/storage/'.$rand.basename($fileName));
            $data['image_mime'] = $image->getMimeType();
            $data['image_size'] = $image->getSize();
        }
        Article::create($data);

        session()->flash('success', '新增成功！');
        
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.cms.add-article', ['categories'=>$categories])->layout('layouts.cms');
    }
}
