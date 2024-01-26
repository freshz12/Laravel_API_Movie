<div 
class="flex flex-col md:flex-row items-center" 
x-data="{ isOpen: false }" 
@click.away="isOpen = false"
>
    <div class="mt-3 md:mt-0 relative">
     <input 
     wire:model.debounce.500ms="search" 
     type="text" class=" bg-gray-c1 text-black rounded-full ml-8 w-60 px-4 py-1 focus:outline-none focus:ring-1 " 
     placeholder="Search here..."
     x-ref="search" 
     @keydown="isOpen = true"
     @keydown.escape.window="isOpen = false"
     @keydown.shift.tab="isOpen = false"
     >
     {{-- @focus="isOpen = true" --}}
     
     <div wire:loading class="spinner top-0 right-0 mt-4 mr-4"></div>

        @if (strlen($search) != '')
        <div class="mt-4 absolute z-10 w-64 bg-gray-700 ml-6  rounded" 
        x-show.transition.opacity="isOpen">
            @if ($searchResults->count() > 0)
                @foreach ($searchResults as $result)
                    <ul>
                        <li class=" border-b border-gray-600">
                            <a href="{{route('movies.show', $result['id'])}}" class=" px-3 py-2 block  hover:bg-gray-600 text-sm flex items-center"
                            @if ($loop->last) @keydown.tab="isOpen=false" @endif
                            >
                                @if ($result['poster_path'])
                                <img src="{{'https://image.tmdb.org/t/p/w92/' .$result['poster_path']}}" alt="poster" class="w-8">
                                @else
                                <img src="{{'https://via.placeholder.com/50x75'}}" alt="poster" class="w-8">
                                @endif
                                <span class="ml-3">{{$result['title']}}</span>
                            </a>
                        </li>
                    </ul>
                @endforeach   
            @else
                <ul><li class="px-3 py-2">No results found for "{{$search}}" </li></ul>
            @endif
        </div>
        @endif
    </div>
    
     <div class="md:ml-4 mt-3 md:mt-0">
             <a href="{{url('creator')}}">
                 <img src="/img/avatar.png" alt="creator" class="w-8 h-8 rounded-full">
             </a>
     </div>

</div>