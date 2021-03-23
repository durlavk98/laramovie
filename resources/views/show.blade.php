<x-main>
    <div class="movie-info norder-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img  src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="parasite" class="w-64 md:w-96">
            <div class="md:ml-24">
                <div class="text-4xl font-semibold">{{ $movie['title'] }} (2019)</div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <i class="fas fa-star text-yellow-600"></i>
                    <span class="ml-1">{{ $movie['vote_average']*10 }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <div class="text-white font-semibold">Features Cast</div>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @if(count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150">
                            <i class="fas fa-play"></i>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="conatiner mx-auto px-4 pt-16">
        <div class="casts">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Casts
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300'.$cast['profile_path'] }}" alt="actors" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <div>{{ $cast['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="imagess">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image )
                    @if ($loop->index < 9)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{ 'https:////image.tmdb.org/t/p/w300'.$image['file_path'] }}" alt="backdrop" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-main>