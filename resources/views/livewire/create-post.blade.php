<div>
    <x-jet-danger-button class="h-10" wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>

        <x-slot name="title">
            <div class="flex justify-between w-full">
                <div class="info">
                    <h2 class="text-2xl font-bold">Crear post</h2>
                    <span class="text-sm ">Aquí es donde se crea los posts</span>
                </div>
                <div class="btn">
                    <i wire:click="$set('open', false)" class="far fa-times-circle text-2xl text-red-600 cursor-pointer"></i>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="my-4">

                <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Imagen cargando!</strong>
                    <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
                    
                  </div>
                @if ($image)
                    <img id="{{$identificador}}" class="w-full h-72 object-contain mb-4" src="{{$image->temporaryUrl()}}" alt="">
                @endif

                <x-jet-label value="Título del post"/>
                <x-jet-input wire:model='title' type="text" class="flex-1 my-2 w-full" placeholder="Buscar post" />
                <x-jet-input-error for="title"/>
                
                <x-jet-label value="Contenido del post"/>
                <textarea placeholder="Contenido del post" wire:model="content" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2 w-full" rows="6"></textarea>
                <x-jet-input-error for="content"/>

                <div>
                    <input type="file" wire:model="image">
                    <x-jet-input-error for="image"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="h-10" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button
            wire:loading.attr="disabled" wire:target="save, image"
            class="h-10 disabled:opacity-25" 
                wire:click="save"
            >
                Crear post
            </x-jet-danger-button>

        
        </x-slot>

    </x-jet-dialog-modal>
</div>
