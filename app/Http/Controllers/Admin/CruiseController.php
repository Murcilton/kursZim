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

    public function createData()
    {
        $availableDates = Date::all();
        $availableShips = Ship::all();
        $availableDest = Destination::all();
        $availableDep = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.create-data', compact('cruises', 'availableDates', 'availableShips', 'availableDest', 'availableDep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // protected $fillable = ['title', 'description', 'image', 'nights', 'date_id', 'nights', 'departure_id', 'destination_id', 'ship_id'];
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'nights' => 'required|numeric',
            'date_id' => 'required|exists:dates,id',
            'ship_id' => 'required|numeric',
            'hit' => 'required|boolean',
            'sale' => 'nullable|numeric|min:0|max:100',
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

    // Дата

    public function storeDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date|unique:dates,date',
        ]);

        $date = new Date();
        $date->date = $request->date;
        $date->save();

        return redirect()->route('admin.createData')->with('success', 'Дата успешно добавлена!');
    }

    // Отправление

    public function storeDep(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departures,name',
            'ship_id' => 'required|numeric',
        ]);

        $departure = new Departure();
        $departure->name = $request->name;
        $departure->ship_id = $request->ship_id;
        $departure->save();

        return redirect()->route('admin.createData')->with('success', 'Пункт отправления успешно добавлен!');
    }

    // Прибытие

    public function storeDest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:destinations,name',
            'ship_id' => 'required|numeric',
            'img' => 'nullable|image',
        ]);

        $destination = new Destination();
        $destination->name = $request->name;
        $destination->ship_id = $request->ship_id;

        if ($request->hasFile('img')) {
            if ($destination->img && Storage::exists($destination->img)) {
                Storage::delete($destination->img);
            }
            $path = $request->file('img')->store('img/destinations', 'public');
            $destination->img = $path;
        }

        $destination->save();

        return redirect()->route('admin.createData')->with('success', 'Пункт прибытия успешно добавлен!');
    }

    // Корабль

    public function storeShip(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ships,name',
            'description' => 'required|string|max:9999|unique:ships,name',
            'img' => 'nullable|image',
        ]);

        $ship = new Ship();
        $ship->name = $request->name;
        $ship->description = $request->description;

        $ship->fill($request->except('img'));
        $ship->slug = Str::slug($request->title);

        if ($request->hasFile('img')) {
            if ($ship->img && Storage::exists($ship->img)) {
                Storage::delete($ship->img);
            }
            $path = $request->file('img')->store('img/ships', 'public');
            $ship->img = $path;
        }

        $ship->save();

        return redirect()->route('admin.createData')->with('success', "Круизный лайнер {$ship->name} успешно добавлен!");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $availableDates = Date::all();
        $availableShips = Ship::all();
        $availableDest = Destination::all();
        $availableDep = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.create', compact('cruises', 'availableDates', 'availableShips', 'availableDest', 'availableDep'));
    }

// ============================================================ Update ========================================================================================================

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
            'sale' => 'nullable|numeric|min:0|max:100',
            'price' => 'nullable|numeric',
            'status' => 'required|string|max:255',
            'departure_id' => 'required|exists:departures,id',
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'nullable|image',
        ]);
        $cruise->update($request->all());

        if ($request->hasFile('img')) {
            if ($cruise->img && Storage::exists($cruise->img)) {
                Storage::delete($cruise->img);
            }
            $path = $request->file('img')->store('img/cruises', 'public');
            $cruise->img = $path;
        }
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
