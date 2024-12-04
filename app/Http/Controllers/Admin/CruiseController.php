<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseOrder;
use App\Models\Date;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CruiseController extends Controller
{
    public function index()
    {
        $title = "Admin Panel";
        $availableDates = Date::all();
        $availableShips = Ship::all();
        $availableDest = Destination::all();
        $availableDep = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.index', compact('title', 'cruises', 'availableDates', 'availableShips', 'availableDest', 'availableDep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availableDates = Date::all();
        $availableShips = Ship::all();
        $availableDest = Destination::all();
        $availableDep = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.create', compact('cruises', 'availableDates', 'availableShips', 'availableDest', 'availableDep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // protected $fillable = ['title', 'description', 'image', 'nights', 'date_id', 'nights', 'departure_id', 'destination_id', 'ship_id'];
        // Валидация входящих данных
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'nights' => 'required|numeric',
            'date_id' => 'required|exists:dates,id',
            'ship_id' => 'required|numeric',
            'hit' => 'required|boolean',
            'sale' => 'nullable|numeric',
            'price' => 'required|numeric',
            'status' => 'required|string|max:255',
            'departure_id' => 'required|exists:departures,id',
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'nullable|image', 
        ]);

        $cruise = new CruiseOrder();
        $cruise->fill($request->except('img'));
        $cruise->slug = Str::slug($request->title);


        if ($request->hasFile('img')) {
            if ($cruise->img && Storage::exists($cruise->img)) {
                Storage::delete($cruise->img);
            }
            $path = $request->file('img')->store('img/cruises', 'public');
            $cruise->img = $path;
        }

        $cruise->save();

        return redirect()->route('admin.create')->with('success', 'Круиз успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $categories = Category::all();
        // $statuses = Status::all();

        return view('admin.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CruiseOrder $cruise)
    {
        // dd($request->all());
        $cruise = CruiseOrder::find($cruise->id);

        // Валидация входящих данных
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'nights' => 'required|numeric',
            'date_id' => 'required|numeric',
            'ship_id' => 'required|numeric',
            'hit' => 'nullable|boolean',
            'sale' => 'nullable|boolean',
            'price' => 'nullable|numeric',
            'status' => 'required|string|max:255',
            'departure_id' => 'required|exists:departures,id',
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'nullable|image', 
        ]);
        // if(isset($cruise)) {
        //     $cruise->update($request->all());
        // }
        $cruise->update($request->all());

        if ($request->hasFile('img')) {
            if ($cruise->img && Storage::exists($cruise->img)) {
                Storage::delete($cruise->img);
            }
            $path = $request->file('img')->store('img/cruises', 'public');
            $cruise->img = $path;
        }
        // if(isset($cruise)) {
        //     $cruise->save();
        // }
        $cruise->save();


        return redirect()->back()->with('success', 'Круиз успешно обновлён!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CruiseOrder $cruise)
    {
        $cruise->delete();
        return redirect()->back()->with('success', 'Deleted.');
    }
}
