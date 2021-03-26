<x-main>
    <div class="movie-info norder-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img  src="{{ $actor['profile_path'] }}" alt="parasite" class="w-64 md:w-96">
                <ul class="flex items-center mt-4">
                    @if ($social['facebook'])
                        <li>
                            <a href="{{$social['facebook']}}" title="Facebook">
                                <i class="fab fa-facebook-square text-gray-500 pr-3 fa-2x"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['instagram'])
                        <li>
                            <a href="{{$social['instagram']}}" title="Instagram">
                                <i class="fab fa-instagram-square text-gray-500 px-3 fa-2x"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['twitter'])
                        <li>
                            <a href="{{$social['twitter']}}" title="Twitter">
                                <i class="fab fa-twitter-square text-gray-500 px-3 fa-2x"></i>
                            </a>
                        </li>
                    @endif
                    @if ($actor['homepage'])
                        <li>
                            <a href="{{ $actor['homepage'] }}" title="Website">
                                <i class="fas fa-globe text-gray-500 px-3 fa-2x"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="md:ml-24">
                <div class="text-4xl font-semibold">{{ $actor['name'] }} (2019)</div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <i class="fas fa-birthday-cake text-yellow-600"></i>
                    <span class="ml-1">{{ $actor['birthday'] }} ({{ $actor['age'] }}) in {{ $actor['place_of_birth'] }}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>
                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}" }}">
                                <img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                                <a href="{{ $movie['linkToPage'] }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                    {{$movie['title']}}
                                </a>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="conatiner mx-auto px-4 py-16">
        <div class="credits">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">
                Credits
            </h2>
            <ul class="list-disc leading-loose pt-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-main>