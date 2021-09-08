<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeletePost extends Component
{
    public $post;
 
    public function mount($post){
        $this->post = $post;
    }

    protected $listeners = ['delete'];

    public function delete(Post $post){

        
        
        //Storage::delete([$post->image]);
        
        $post->delete();
        dd($post->title);
        $this->emitTo('list-posts','render-list');

    }

    public function render()
    {
        return view('livewire.delete-post');
    }
}
