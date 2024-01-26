@extends('layouts.app')

@section('title', 'Popular Actors')
@section('actor-active', 'active')


@section('content')
    <div class="container mx-auto px-4 my-12">
        <section class="popular_actors" id="popular_actors">
            <h2 class=" uppercase text-nav tracking-wider text-lg font-semibold">Popular Actors</h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                <!-- Single Column -->
                @foreach ($popular_actors as $actor)
                    <div class="mt-5 border bg-nav">
                        <div class="mt-1 text-white">
                            <a href="{{ route('actor.show', $actor['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }}"
                                    alt="profile_path" class=" hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-5">
                                <a href="{{ route('actor.show', $actor['id']) }}"
                                    class=" text-lg hover:text-yellow-800">{{ $actor['name'] }}</a>
                                <div class="flex items-center font-sans text-sm">
                                    <span><x-star-icon></x-star-icon></span>
                                    <span class="ml-1">{{ $actor['popularity'] }} votes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- <div class="mt-12 justify-between flex">
@if ($page)
<a href="actors/page/{{$page}}">Prev</a>
@endif

@if ($next)
<a href="actors/page/{{$next}}">next</a>
@endif
</div> --}}

    </div>
@endsection
