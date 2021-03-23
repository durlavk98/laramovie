{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
<div class="pt-2 relative mx-auto text-gray-200 mt-3 md:mt-0">
    <input wire:model.debounce.500ms='search' class="bg-gray-700 h-10 px-5 pr-16 rounded-full text-sm focus:outline-none focus:ring"
    type="search" name="search" placeholder="Search" autocomplete="off">
    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
    <svg class="text-gray-400 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
        width="512px" height="512px">
        <path
        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
    </svg>
    </button>
    <div wire:loading class="spinner top-0 right-0 mr-12 mt-6"></div>
    @if (strlen($search)>2)
    <div class="absolute bg-gray-800 rounded w-64 mt-4 text-sm">
        @if ($searchResults->count() > 0)
            <ul>
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('movies.show', $result['id']) }}" 
                        class="block hover:gray-700 px-3 py-2 flex items-center">
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster" class="w-8">
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-3">No results for "{{$search}}"</div>
        @endif
    </div>
    @endif
</div>