<?php

namespace App\Http\Controllers;

use App\Models\CruiseOrder;
use App\Models\Date;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Ship;
use Illuminate\Http\Request;

class CruiseController extends Controller
{
    public function showBookingForm()
{
    $destinations = Destination::all();
    $departures = Departure::all();
    $dates = Date::all();
    $ships = Ship::all(); 

    return view('home', compact('destinations', 'departures', 'dates', 'ships'));
}

    public function aboutUs() {
        return view('about-us');
    }

    public function searchCruise(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'departure_id' => 'nullable|exists:departures,id',
            'date_id' => 'nullable|exists:dates,id',
            'ship_id' => 'nullable|exists:ships,id',
        ]);
    
        $query = CruiseOrder::query();
    
        if ($validated['destination_id']) {
            $query->where('destination_id', $validated['destination_id']);
        }
    
        if ($validated['departure_id']) {
            $query->where('departure_id', $validated['departure_id']);
        }
    
        if ($validated['date_id']) {
            $query->where('date_id', $validated['date_id']);
        }

        $dep = Departure::all()->firstWhere('id', $request->departure_id)->name ?? null;
        $dest = Destination::all()->firstWhere('id', $request->destination_id)->name ?? null;;
        $date = Date::all()->firstWhere('id', $request->date_id)->date ?? null;;
    
        $cruises = $query->get();
    
        return view('cruise-results', compact('cruises', 'dest', 'date', 'dep'));
    }
}
