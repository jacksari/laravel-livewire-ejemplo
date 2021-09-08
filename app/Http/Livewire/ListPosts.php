<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '5';
    public $readyToLoad = false;

    protected $listeners = ['render-list' => 'render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '5'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    public function render()
    {
        if($this->readyToLoad){
            $posts = Post::where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
        }else{
            $posts = [];
        }

        return view('livewire.list-posts', compact(['posts']));
    }

    public function order($sort){
        $this->sort = $sort;
        $this->direction == 'desc' ? $this->direction = 'asc' : $this->direction = 'desc';
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingCant(){
        $this->resetPage();
    }

    public function loadPost(){
        $this->readyToLoad = true;
    }

    public function delete(Post $post){

        //dd($post->id);
        
        Storage::delete([$post->image]);
        
        $post->delete();
        
        $this->emitTo('list-posts','render-list');

    }
}
