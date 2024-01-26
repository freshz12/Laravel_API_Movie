@extends('layouts.app')

@section('title', $tvShow['name'])

@section('content')
    <section class="tvShow-info border-b border-gray-600">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] }} " alt="poster_path"
                class=" md:w-96 w-64">

            <div class="md:ml-24 text-black">
                <h2 class=" text-4xl text-black font-semibold">{{ $tvShow['name'] }}
                    ({{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('Y') }})</h2>
                <div class="flex flex-wrap items-center font-sans mt-2">
                    <span class="ml-1"><x-star-icon></x-star-icon></span>
                    <span class="ml-1 text-black">Rating</span>
                    <span class="ml-1 text-black">{{ $tvShow['vote_average'] * 10 }}%</span>
                </div>
                <div class="flex flex-wrap items-center mt-1 font-sans">
                    <span><x-date-icon></x-date-icon></span>
                    <span class="text-black">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
                </div>
                <div class="flex flex-wrap items-center mt-1 font-sans">
                    <span><x-genre-icon></x-genre-icon></span>
                    <span class="text-black">
                        @foreach ($tvShow['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>

                <div class="mt-6">
                    {{ $tvShow['overview'] }}
                </div>

                <div class="mt-8">
                    <h4 class=" font-semibold">Feaured Cast</h4>
                    <div class="flex mt-4">
                        @if (count($tvShow['credits']['crew']) > 0)
                            @foreach ($tvShow['credits']['crew'] as $crew)
                                @if ($loop->index < 2)
                                    <div class="mr-8">
                                        <div>{{ $crew['name'] }}</div>
                                        <div class="text-sm">as {{ $crew['job'] }}</div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            No cast information is available right now.
                        @endif
                    </div>
                </div>

                @if ($tvShow['videos']['results'])
                    <div x-data="{ isOpen: false }">
                        <div class="mt-12">
                            <button @click="isOpen = true"
                                class="px-5 py-3 rounded bg-yellow-700 hover:bg-yellow-800 transition ease-in-out duration-150 flex items-center space-x-2">
                                <span><x-play-icon></x-play-icon></span>
                                <span class="ml-1 text-white">Play Trailer</span>
                            </button>
                        </div>

                        {{-- model --}}
                        <div x-show.transition.opacity="isOpen" style="background: rgba(0, 0, 0, 0.5)"
                            class=" fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                            <div class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class=" bg-nav rounded" style="border-radius: 1%">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isOpen = false" class=" text-3xl leading-none hover:text-gray-300">
                                            &times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class=" responsive-container overflow-hidden relative"
                                            style="padding-top: 56.25%">
                                            <iframe width="560" height="315"
                                                src="https://www.youtube.com/embed/{{ $tvShow['videos']['results'][0]['key'] }}"
                                                frameborder="0"
                                                class="responsive-iframe absolute w-full h-full left-0 top-0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- model --}}
                    </div>
                @else
                    <div>
                        <div class="mt-12 text-white">
                            <button type="button"
                                class="px-5 py-3 rounded bg-yellow-700 hover:bg-yellow-800 transition ease-in-out duration-150 flex items-center space-x-2"
                                disabled>
                                <span><x-play-icon></x-play-icon></span>
                                <span class="ml-1">Trailer is not available</span>
                            </button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <section class="cast border-b border-gray-600">
        <div class="container mx-auto my-16 px-4">
            <h2 class=" uppercase text-nav tracking-wider text-lg font-semibold">Cast</h2>
            <div class=" grid grid-cols-1 text-black sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($tvShow['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-5">
                            <a href="{{ route('actor.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }} "alt="profile_path"
                                    class=" hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actor.show', $cast['id']) }}"
                                    class=" text-lg hover:text-yellow-800">{{ $cast['name'] }}</a>
                                <div class="flex items-center font-sans text-sm">
                                    as {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="images border-b border-gray-600">
        <div class="container mx-auto my-16 px-4">
            <h2 class=" uppercase text-nav tracking-wider text-lg font-semibold">Images</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Single Column -->
                @foreach ($tvShow['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-5" x-data="{ isOpen: false }">
                            <a href="#" @click.prevent="isOpen = true">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="file_path"
                                    class=" hover:opacity-75 transition ease-in-out duration-150">
                            </a>

                            {{-- model --}}
                            <div x-show.transition.opacity="isOpen" style="background: rgba(0, 0, 0, 0.5)"
                                class=" fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                                <div class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class=" bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button @click="isOpen = false" @keydown.escape.window="isOpen=false"
                                                class="text-lg font-bold text-white hover:text-white">
                                                <x-close-icon></x-close-icon>
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <img src="{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}"
                                                alt="file_path">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- model --}}

                        </div>
                    @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
