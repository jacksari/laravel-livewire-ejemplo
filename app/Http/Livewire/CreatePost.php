<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

    use WithFileUploads;

    public $open = false;

    public $title, $content, $image, $identificador;

    public function mount(){
        $this->identificador = rand();
    }

    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|min:100',
        'image' => 'required|image|max:2048'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function openModal(){
        $this->open = !$this->open;
    }

    public function save(){
        
        // Validar post
        $this->validate();

        $image = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->emitTo('list-posts','render-list');
        $this->emit('alert', 'El post se creó satisfactoriamente');
        $this->reset(['open','title','content','image']);

        $this->identificador = rand();
    }
}
