@extends('layouts.app')

@section('title', 'Movie App | Developed By Richi')
@section('movies-active', 'active')


@section('content')
    <div class="container mx-auto px-4 mt-12 ">
        <section class="popular-movies" id="popular_movies">
            <h2 class="text-nav uppercase tracking-wider font-semibold" style="font-size: 30px">Popular Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($popular_movies as $movie)
                    <div class="mt-5 border bg-nav">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster_path"
                                class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="text-center" style="height: 55px">
                            <a href="{{ route('movies.show', $movie['id']) }}"
                                class=" text-lg hover:text-gray-200 text-white"
                                style="font-weight: bold; font-size: 18px">{{ $movie['title'] }}</a>
                        </div>
                        <div style="bottom: 0px; position: relative;">
                            <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                                <span><x-star-icon></x-star-icon></span>
                                <span class="text-white"
                                    class="ml-1">{{ number_format($movie['vote_average'], 1, '.', '') }}/10<br></span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-date-icon></x-date-icon></span>
                                <span
                                    class="text-white">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-genre-icon></x-genre-icon></span>
                                <span class="text-white">
                                    @foreach ($movie['genre_ids'] as $genre)
                                        {{ $genres->get($genre) }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="now-playing-movies pt-8 mt-10 border-t border-gray-600" id="nowPlaying">
            <h2 class=" uppercase text-nav tracking-wider font-semibold" style="font-size: 30px">Now Playing</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($now_playing_movies as $movie)
                    <div class="mt-5 border bg-nav">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster_path"
                                class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="text-center" style="height: 55px">
                            <a href="{{ route('movies.show', $movie['id']) }}"
                                class=" text-lg hover:text-gray-200 text-white"
                                style="font-weight: bold; font-size: 18px">{{ $movie['title'] }}</a>
                        </div>
                        <div style="bottom: 0px; position: relative;">
                            <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                                <span><x-star-icon></x-star-icon></span>
                                <span class="text-white"
                                    class="ml-1">{{ number_format($movie['vote_average'], 1, '.', '') }}/10<br></span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-date-icon></x-date-icon></span>
                                <span
                                    class="text-white">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-genre-icon></x-genre-icon></span>
                                <span class="text-white">
                                    @foreach ($movie['genre_ids'] as $genre)
                                        {{ $genres->get($genre) }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="upcoming-movies py-8 mt-10 border-t border-gray-600" id="upcoming">
            <h2 class=" uppercase text-nav tracking-wider font-semibold" style="font-size: 30px">Upcoming Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($up_coming_movies as $movie)
                    @if ($movie['release_date'] > \Carbon\Carbon::now())
                        <div class="mt-5 border bg-nav">
                            <a href="{{ route('movies.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
                                    alt="poster_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="text-center" style="height: 55px">
                                <a href="{{ route('movies.show', $movie['id']) }}"
                                    class=" text-lg hover:text-gray-200 text-white"
                                    style="font-weight: bold; font-size: 18px">{{ $movie['title'] }}</a>
                            </div>
                            <div style="bottom: 0px; position: relative;">
                                <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                                    <span><x-star-icon></x-star-icon></span>
                                    <span class="text-white"
                                        class="ml-1">{{ number_format($movie['vote_average'], 1, '.', '') }}/10<br></span>
                                </div>
                                <div class="flex items-center text-gray-400 font-sans text-sm">
                                    <span><x-date-icon></x-date-icon></span>
                                    <span
                                        class="text-white">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center text-gray-400 font-sans text-sm">
                                    <span><x-genre-icon></x-genre-icon></span>
                                    <span class="text-white">
                                        @foreach ($movie['genre_ids'] as $genre)
                                            {{ $genres->get($genre) }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        <section class="top_rated_movies py-8 mt-10 border-b border-t border-gray-600" id="top_rated_movies">
            <h2 class=" uppercase text-nav tracking-wider font-semibold" style="font-size: 30px">Top Rated Movies</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <!-- Single Column -->
                @foreach ($top_rated_movies as $movie)
                    <div class="mt-5 border bg-nav">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster_path"
                                class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="text-center" style="height: 55px">
                            <a href="{{ route('movies.show', $movie['id']) }}"
                                class=" text-lg hover:text-gray-200 text-white"
                                style="font-weight: bold; font-size: 18px">{{ $movie['title'] }}</a>
                        </div>
                        <div style="bottom: 0px; position: relative;">
                            <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                                <span><x-star-icon></x-star-icon></span>
                                <span class="text-white"
                                    class="ml-1">{{ number_format($movie['vote_average'], 1, '.', '') }}/10<br></span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-date-icon></x-date-icon></span>
                                <span
                                    class="text-white">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-genre-icon></x-genre-icon></span>
                                <span class="text-white">
                                    @foreach ($movie['genre_ids'] as $genre)
                                        {{ $genres->get($genre) }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
