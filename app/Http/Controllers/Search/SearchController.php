<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Bar;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = Bar::query();

        $searchParam = $request->query('search');

        if ($searchQuery) {
            $barsQuery = Bar::search($searchParam);
        }

        $bars = $barsQuery->get();

        return view('search.index', compact('bars', 'searchParam'));
    }
}
