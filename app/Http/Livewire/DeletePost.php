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

    public function deletePost(){
        
        Storage::delete([$this->post->image]);
        $post = Post::find($this->post->id);
        $post->delete();
        $this->emitTo('list-posts','render-list');
        $this->emit('alert', 'El post se eliminó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.delete-post');
    }
}
