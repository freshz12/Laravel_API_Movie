<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function index()
    {
        $popular_tv = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $top_rated_tv = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['results'];

        $genres_arr = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=61274af004d09cfcf8bce39a08dd8f1b')->json()['genres'];

        $genres = collect($genres_arr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('tv.index', [
            'popular_tv' => $popular_tv,
            'top_rated_tv' => $top_rated_tv,
            'genres' => $genres,
        ]);
    }

    public function show($id)
    {
        $tvShow = Http::get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=61274af004d09cfcf8bce39a08dd8f1b&append_to_response=credits,videos,images')->json();

        // dump($tvShow);

        return view('tv.show', [
            'tvShow' => $tvShow,
        ]);
    }
}
