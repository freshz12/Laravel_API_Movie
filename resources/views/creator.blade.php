@extends('layouts.app')

@section('title', 'About Creator')
@section('creator-active', 'active')

@section('content')

    <div class="flex items-center mb-16 w-full justify-center">
        <div class=" w-full mx-8 sm:w-1/2 md:w-1/3 lg:w-1/3">
            <h2 class="text-center font-bold text-yellow-500 text-3xl mt-3 mb-4">Project Creator</h2>
            <div class=" bg-gray-700 shadow-xl rounded-lg pb-3">
                <div class="photo-wrapper flex justify-center">
                    <img src="img/avatar.png" alt="Richi">
                </div>

                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-200 font-medium leading-8">Richi Dharmaputra Ojong</h3>
                    <div class="text-center text-yellow-500 font-semibold">
                        <p>Web Developer</p>
                    </div>
                    <table class=" my-3 flex justify-center">
                        <tbody>
                            <tr class="my-2">
                                <td class="text-gray-200 font-semibold">Email Me :</td>
                                <td class="text-gray-400 pl-3">richi181147@gmail.com</td>
                            </tr>
                            <tr class="my-2">
                                <td class="text-gray-200 font-semibold">Contact :</td>
                                <td class="text-gray-400 pl-3">089678484808</td>
                            </tr>
                            {{-- <tr class="my-2">
                        <td class="text-gray-200 font-semibold">Address :</td> 
                        <td class="text-gray-400 pl-3">Indonesia</td>
                    </tr>
                    <tr class="my-2">
                        <td class="text-gray-200 font-semibold">Website :</td> 
                        <td class="text-gray-400 pl-3">#</td>
                    </tr> --}}


                        </tbody>
                    </table>

                    {{-- <div class="text-center mt-6 mb-2">
                    <a class="bg-gray-900 px-5 py-2 rounded italic hover:bg-black font-medium transition ease-in-out duration-150" href="#" target="_blank">Visit Website</a>
                </div> --}}

                </div>
            </div>
        </div>

    </div>
@endsection
