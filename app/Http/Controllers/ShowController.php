<?php

namespace App\Http\Controllers;

use App\Models\CruiseOrder;
use App\Models\Date;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show()
    {
        $availableDates = Date::all();
        $availableShips = Ship::all();
        $availableDest = Destination::all();
        $availableDep = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('cruises', compact('cruises', 'availableDates', 'availableShips', 'availableDest', 'availableDep'));
    }

    public function showShips() {
        $ships = Ship::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);
        return view('ships', compact('cruises', 'ships'));
    }
}
