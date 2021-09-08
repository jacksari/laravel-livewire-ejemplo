<div wire:init="loadPost">
    <div class="bg-primary-500 p-5 rounded-lg">
        <h1 class="text-white text-2xl font-bold font-sans">Lista de posts</h1>
    </div>
    <div class="flex flex-col my-4 p-5">
        <label for="price" class="block text-sm font-medium text-gray-700">Post a buscar:</label>
        <div class="mt-1 relative rounded-md  flex items-center w-full justify-between">
            <div class="flex items-center">
                <span>Mostrar</span>
                <select wire:model='cant' class="mx-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
            <div class="flex items-center flex-1">
                <span class="mr-2">Entradas</span>
                <x-jet-input wire:model='search' type="text" class="flex-1 mr-4" placeholder="Buscar post" />
            </div>
            @livewire('create-post')
        </div>
    </div>

    @if (count($posts))
        <x-table>
            <table class="table-auto min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <th scope="col"
                        class="w-24 align-middle cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                        wire:click="order('id')">
                        Id
                        @if ($sort == 'id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-05"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-05"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-05"></i>
                        @endif


                    </th>
                    <th scope="col"
                        class="align-middle cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                        wire:click="order('title')">
                        Title
                        @if ($sort == 'title')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-05"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-05"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-05"></i>
                        @endif
                    </th>
                    <th scope="col"
                        class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                        wire:click="order('content')">
                        Content
                        @if ($sort == 'content')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-05"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-05"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-05"></i>
                        @endif
                    </th>
                    <th class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                        >
                        Image
                    </th>
                    <th class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                        wire:click="order('content')">
                        Config
                    </th>
                    
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 ">
                                {{ $post->id }}
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-900">{{ $post->title }}</div>

                            </td>
                            <td class="px-6 py-4 ">
                                <div class="text-sm text-gray-700">{{ $post->content }}</div>
                            </td>
                            <td class="px-6 py-4 ">
                                <img class="h-10 w-10 object-cover" src="http://127.0.0.1:8000/storage/{{$post->image}}" alt="{{ $post->title }}">
                            </td>
                            <td class=" px-6 py-4  whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center justify-around h-full">
                                    @livewire('edit-post', ['post' => $post], key($post->id))
                                    @livewire('delete-post', ['post' => $post], key($post->id.$post->title))
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table>

        <div class="px-6 py-3 ">
            {{$posts->links()}}
        </div>
    @else
        <div class="p-5">
            <h2 class="text-lg">No se encontró ningún post</h2>
        </div>
    @endif

    

</div>
