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

    public $base_title;
    public $category_id;
    public $title;
    public $content;
    public $image;
    public $image_url = null;
    public $hidden = false;
    public $is_create = true;
    public $article_id = null;
    public function mount($id){
        if($id === 'create'){
            $this->base_title = '新增文章';
            $this->category_id = Category::orderBy('created_at', 'asc')->first()->id;
        }else{
            $isset = Article::where('id', $id)->count() > 0;
            if(!$isset) return;
            $this->base_title = '編輯文章';
            $this->article_id = $id;
            $article = Article::find($id);
            $this->category_id = $article->category_id;
            $this->title = $article->title;
            $this->content = $article->content;
            $this->image_url = $article->image;
            $this->hidden = $article->hidden;
        }
    }
    public function onSubmit(){
        if(!$this->article_id){
            $data = $this->validate([
                'title'=> ['required', 'max:2000'],
                'image'=> ['nullable', 'image'],
                'content'=> ['nullable', 'string', 'required'],
                'hidden'=> ['boolean'],
                'category_id'=>['required']
            ]);
            $data['created_by'] = Auth::id();
            $image = $this->image ?? null;
            if($this->image){
                $rand = Str::random();
                $fileName = $image->store('public/images/'.$rand);
                $data['image'] = URL::to('/storage/images/'.$rand.'/'.basename($fileName));
                $data['image_mime'] = $image->getMimeType();
                $data['image_size'] = $image->getSize();
            }
            Article::create($data);
    
            session()->flash('success', '新增成功！');
        }else{
            $data = $this->validate([
                'title'=> ['required', 'max:2000'],
                'image'=> ['nullable', 'image'],
                'content'=> ['nullable', 'string', 'required'],
                'hidden'=> ['boolean'],
                'category_id'=>['required']
            ]);
            $article = Article::find($this->article_id);
            $data['updated_by'] = Auth::id();
            
            $image = $this->image ?? null;
            
            if($this->image){
                $rand = Str::random();
                $fileName = $image->store('public/images/'.$rand);
                $data['image'] = URL::to('/storage/images/'.$rand.'/'.basename($fileName));
                $data['image_mime'] = $image->getMimeType();
                $data['image_size'] = $image->getSize();

                if($article->image){
                    Storage::deleteDirectory('/public/' . dirname($article->image));
                }
            }else{
                unset($data['image']);
            }
            $article->update($data);

            session()->flash('success', '更改成功！');
        }
        
        
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.cms.add-article', ['categories'=>$categories])->layout('layouts.cms');
    }
}
