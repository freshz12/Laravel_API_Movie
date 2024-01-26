@extends('layouts.app')

@section('title', 'About Project')
@section('about-active', 'active')


@section('content')

<div id="aboutProject">
    <div class="container mx-auto bg-gray-700 rounded p-8 w-full md:w-1/2 my-16">
        <div class="text-3xl text-center font-bold text-yellow-500">About Project</div>
            <div class="body mt-3 text-gray-400">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque iste facere veniam, aliquam id commodi dolor similique ad, inventore reprehenderit placeat repellendus autem corrupti ducimus 
            </div>

            <div class="my-6">
                <div class="text-gray-200 text-lg">
                    Frontend Language :
                    <span class="px-3 text-sm py-1 rounded bg-gray-800 ml-3">Tailwind CSS</span>
                    <span class="px-3 text-sm py-1 rounded bg-gray-800">Alpine Js</span>
                    <span class="px-3 text-sm py-1 rounded bg-gray-800">Html 5</span>
                </div>
            </div>

            <div class="my-6">
                <div class="text-gray-200 text-lg">
                    Backend Language :
                    <span class="px-3 text-sm py-1 rounded bg-gray-800 ml-5">Laravel</span>
                    <span class="px-3 text-sm py-1 rounded bg-gray-800">Livewire</span>
                </div>
            </div>

    </div>
</div>

@endsection