<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    @livewireStyles
    <style>
        html {
            scroll-behavior: smooth;
        }

        .active {
            color: rgba(245, 158, 11);
        }
    </style>
</head>

<body class=" font-sans bg-white text-gray-300">

    <!-- Navabar -->
    <nav class=" border-b bg-nav border-gray-600">
        <div class=" container mx-auto flex flex-col md:flex-row items-center justify-between p-4 ">
            <ul class="flex flex-col md:flex-row items-center">
                <li class=" hover:text-gray-200">
                    <a href="/" class="flex items-center justify-center space-x-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-film" viewBox="0 0 16 16">
                                <path
                                    d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z" />
                            </svg>
                        </div>
                        <div>
                            &nbsp;
                            <span class=" text-yellow-500">The Movie Database (TMDB)</span> API
                        </div>
                    </a>
                </li>
                <li class=" md:ml-16 mt-2 md:mt-0">
                    <a href="/" class=" hover:text-gray-200 @yield('movies-active')">Movies</a>
                </li>
                <li class=" md:ml-5 mt-2 md:mt-0">
                    <a href="{{ route('tv.index') }}" class=" hover:text-gray-200 @yield('tv-active')">TV Shows</a>
                </li>
                <li class=" md:ml-5 mt-2 md:mt-0">
                    <a href="{{ route('actors.index') }}" class=" hover:text-gray-200 @yield('actor-active')">Actors</a>
                </li>
                {{-- <li class=" md:ml-5 mt-2 md:mt-0">
               <a href="{{url('about-project')}}" class=" hover:text-gray-200 @yield('about-active')">About</a>
           </li> --}}
            </ul>

            @livewire('search-dropdown')

        </div>
    </nav>
    <!-- Navabar -->


    <main>
        @yield('content')
    </main>

    <footer class="footer justify-between flex my-3 mx-2 md:mx-16">
        <p>
            <span style="color: black">Developed by </span> : <span class=" text-yellow-500">Richi</span>
        </p>
        <p>
            <span style="color: black">Data provided by : </span> <a
                href="https://developer.themoviedb.org/reference/intro/getting-started"><span
                    class=" text-yellow-500">The Movie Database (TMDB)</span></a>
        </p>
    </footer>
    @livewireScripts
</body>

</html>
