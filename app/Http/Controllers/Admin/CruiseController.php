<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CruiseController extends Controller
{
    public function index()
    {
        $title = "Admin Panel";
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.index', compact('title', 'cruises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        // $statuses = Status::all();

        return view('admin.create');
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
            'date_id' => 'required|numeric',
            'ship_id' => 'required|numeric',
            'hit' => 'required|boolean',
            'sale' => 'nullable|numeric',
            'price' => 'required|numeric',
            'status' => 'required|string|max:255',
            'departure_id' => 'required|exists:departure,id',
            'destination_id' => 'required|exists:destination,id',
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
            'hit' => 'required|boolean',
            'sale' => 'nullable|numeric',
            'price' => 'required|numeric',
            'status' => 'required|string|max:255',
            'departure_id' => 'required|exists:departure,id',
            'destination_id' => 'required|exists:destination,id',
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
