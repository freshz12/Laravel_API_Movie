@extends('layouts.app')

@section('title', 'Actor | ' . $actor['name'])

@section('content')
    <section class="actor-info">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row text-black">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }} " alt="profile_path"
                class=" md:w-96 w-64">

            <div class="md:ml-24">
                <h2 class=" text-4xl font-semibold">
                    {{ $actor['name'] }}
                </h2>
                <br>
                <div class="flex flex-wrap items-center font-sans">
                    <x-dob-icon></x-dob-icon>
                    <span>{{ \Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }}</span>
                </div>
                <div class="flex flex-wrap items-center font-sans mt-3">
                    <x-bop-icon></x-bop-icon>
                    <span>
                        {{ $actor['place_of_birth'] }}
                    </span>
                </div>

                <div class="mt-6">
                    @if (!empty($actor['biography']))
                        {{ $actor['biography'] }}
                    @else
                        This actor biography is not available.
                    @endif
                </div>


            </div>
        </div>
    </section>
@endsection
