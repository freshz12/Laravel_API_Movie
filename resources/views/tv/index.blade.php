@extends('layouts.app')

@section('title', 'TV Show | Developed By Richi')
@section('tv-active', 'active')


@section('content')
    <div class="container mx-auto px-4 mt-12 ">

        <section class="popular_tv" id="popular_tv">
            <h2 class=" uppercase text-nav tracking-wider font-semibold" style="font-size: 30px">Popular TV Shows</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($popular_tv as $tvShow)
                    <div class="mt-5 border bg-nav">
                        <a href="{{ route('tv.show', $tvShow['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] }}" alt="poster_path"
                                class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="text-center" style="height: 55px">
                            <a href="{{ route('tv.show', $tvShow['id']) }}" class=" text-lg hover:text-gray-200 text-white"
                                style="font-weight: bold; font-size: 18px">{{ $tvShow['name'] }}</a>
                        </div>
                        <div style="bottom: 0px; position: relative;">
                            <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                                <span><x-star-icon></x-star-icon></span>
                                <span class="text-white"
                                    class="ml-1">{{ number_format($tvShow['vote_average'], 1, '.', '') }}/10<br></span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-date-icon></x-date-icon></span>
                                <span
                                    class="text-white">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center text-gray-400 font-sans text-sm">
                                <span><x-genre-icon></x-genre-icon></span>
                                <span class="text-white">
                                    @foreach ($tvShow['genre_ids'] as $genre)
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

        <section class="top_rated_tv py-8 mt-10 border-t border-b border-gray-600" id="top_rated_tv">
            <h2 class=" uppercase text-nav tracking-wider font-semibold" style="font-size: 30px">Top Rated TV Shows</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($top_rated_tv as $tvShow)
                    <div class="mt-5 border bg-nav">
                        <a href="{{ route('tv.show', $tvShow['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] }}" alt="poster_path"
                                class=" hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="text-center" style="height: 55px">
                            <a href="{{ route('tv.show', $tvShow['id']) }}" class=" text-lg hover:text-gray-200 text-white"
                                style="font-weight: bold; font-size: 18px">{{ $tvShow['name'] }}</a>
                        </div>
                        <div class="flex items-center text-gray-400 font-sans text-sm" style="margin-left: 3px">
                            <span><x-star-icon></x-star-icon></span>
                            <span class="text-white"
                                class="ml-1">{{ number_format($tvShow['vote_average'], 1, '.', '') }}/10<br></span>
                        </div>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <span><x-date-icon></x-date-icon></span>
                            <span
                                class="text-white">{{ \Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center text-gray-400 font-sans text-sm">
                            <span><x-genre-icon></x-genre-icon></span>
                            <span class="text-white">
                                @foreach ($tvShow['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

    </div>
@endsection
