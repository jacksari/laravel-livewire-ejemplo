<div>
    <i wire:key="{{$post->id}}" wire:click="$emit('deletePost', {{$post->id}})"
        class="mx-1 far fa-trash-alt font-bold text-white py-2 px-2 rounded-lg cursor-pointer bg-red-600 hover:bg-red-500">

    </i>
</div>

@push('js')
    
@endpush
