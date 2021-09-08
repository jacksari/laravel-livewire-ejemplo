<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{

    use WithFileUploads;
    public $post, $identificador, $image;
    public $open = false;
    

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];

    public function mount($post){
        $this->identificador = rand();
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.edit-post');
    }

    
    public function save(){
        
        // Validar post
        $this->validate();

        if($this->image){
            Storage::delete([$this->post->image]);
            $this->post->image =  $this->image->store('posts');
        }

        
        $this->post->save();

        $this->emitTo('list-posts','render-list');
        $this->emit('alert', 'El post se actualizó satisfactoriamente');
        $this->reset(['open','image']);

        $this->identificador = rand();
    }
}
