<?php

namespace App\Http\Livewire\Cms;

use App\Models\Article as ModelsArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;
class Article extends Component
{
    use WithPagination;
    protected $listeners = ['destroy'=>'destroy', 'deleteItems'=>'deleteItems'];
    public $sort_field = 'updated_at'; 
    public $sort_direction = 'desc'; 
    public $per_page = 5;
    public $search = '';
    public $checkItem = [];
    public $chkAllBox = false;
    public function sortSwitch($field){
        if($field === $this->sort_field){
            if($this->sort_direction === 'desc'){
                $this->sort_direction = 'asc';
            }else{
                $this->sort_direction = 'desc';
            }
        }else{
            $this->sort_field = $field;
            $this->sort_direction = 'desc';
        }
    }
    public function chkAll(){
        $articles = ModelsArticle::where('title', 'like', "%$this->search%")->orWhere('content', 'like', "%$this->search%")->orderBy($this->sort_field, $this->sort_direction)->paginate($this->per_page);
        foreach($articles as $article){
            if($this->chkAllBox){
                $this->checkItem[$article->id] = true;
            }else{
                $this->checkItem[$article->id] = false;
            }
        }
        log::info($this->checkItem);
    }
  
    public function changeCheck(){
        log::info($this->checkItem);
    }
    public function destroy($id){
        $article = ModelsArticle::find($id);
        $article->delete();

        $this->dispatchBrowserEvent('deleteSuccess');
    }
    public function deleteItems(){
        $arr = [];
        foreach($this->checkItem as $key=>$item){
            if($item){
                array_push($arr, $key);
            }
        }
        ModelsArticle::whereIn('id', $arr)->delete();
        $this->chkAllBox = false;
        $this->checkItem = [];
        $this->dispatchBrowserEvent('deleteSuccess');
    }
    public function render()
    {  
        $articles = ModelsArticle::where('title', 'like', "%$this->search%")->orWhere('content', 'like', "%$this->search%")->orderBy($this->sort_field, $this->sort_direction)->paginate($this->per_page);
        return view('livewire.cms.article', ['articles'=>$articles])->layout('layouts.cms');
    }
    
}
