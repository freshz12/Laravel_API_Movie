<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = "";

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search != NULL)) {
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?api_key=61274af004d09cfcf8bce39a08dd8f1b&query=' . $this->search)->json()['results'];
        }

        // dump($searchResults);

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(8),
        ]);
    }
}
