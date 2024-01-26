<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function index()
    {
        // $popular_movies = Http ::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/popular')
        //     ->json()['results'];

        $popular_movies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];
        // dd($popular_movies);

        $now_playing_movies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $up_coming_movies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $top_rated_movies = Http::get('https://api.themoviedb.org/3/movie/top_rated?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $genres_arr = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['genres'];

        $genres = collect($genres_arr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($top_rated_movies);

        return view('index', [
            'popular_movies' => $popular_movies,
            'now_playing_movies' => $now_playing_movies,
            'up_coming_movies' => $up_coming_movies,
            'top_rated_movies' => $top_rated_movies,
            'genres' => $genres,
        ]);
    }

    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=61274af004d09cfcf8bce39a08dd8f1b&append_to_response=credits,videos,images')->json();

        // dump($movie);

        return view('show', [
            'movie' => $movie,
        ]);
    }
}
