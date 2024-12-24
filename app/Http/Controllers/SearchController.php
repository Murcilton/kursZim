<?php

namespace App\Http\Controllers;

use App\Models\CruiseOrder;
use App\Models\Ship;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Поиск лайнеров
        $ships = Ship::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        // Поиск круизов
        $cruises = CruiseOrder::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search-results', compact('ships', 'cruises', 'query'));
    }
}
