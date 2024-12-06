<?php

namespace App\Http\Controllers\Admin;

use App\Models\CruiseOrder;
use App\Models\Date;
use App\Models\Departure;
use App\Models\Destination;
use App\Models\Ship;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function editAll()
    {
        $dates = Date::all();
        $ships = Ship::all();
        $destinations = Destination::all();
        $departures = Departure::all();
        $cruises = CruiseOrder::orderBy("id")->paginate(10);

        return view('admin.edit-data', compact('cruises', 'dates', 'ships', 'destinations', 'departures'));
    }

    // Обновление даты
public function updateDate(Request $request, Date $date)
{
    $request->validate([
        'date' => 'required|date|unique:dates,date,' . $date->id,
    ]);

    $date->date = $request->date;
    $date->save();

    return redirect()->route('admin.editAll')->with('success', 'Дата успешно обновлена!');
}

// Обновление пункта отправления
public function updateDeparture(Request $request, Departure $departure)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:departures,name,' . $departure->id,
        'ship_id' => 'required|exists:ships,id',
    ]);

    $departure->name = $request->name;
    $departure->ship_id = $request->ship_id;
    $departure->save();

    return redirect()->route('admin.editAll')->with('success', 'Пункт отправления успешно обновлен!');
}

// Обновление направления
public function updateDestination(Request $request, Destination $destination)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:destinations,name,' . $destination->id,
        'ship_id' => 'required|exists:ships,id',
        'img' => 'nullable|image',
    ]);

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

    return redirect()->route('admin.editAll')->with('success', 'Направление успешно обновлено!');
}

// Обновление корабля
public function updateShip(Request $request, Ship $ship)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:ships,name,' . $ship->id,
        'description' => 'required|string|max:9999',
        'img' => 'nullable|image',
    ]);

    $ship->name = $request->name;
    $ship->description = $request->description;

    if ($request->hasFile('img')) {
        if ($ship->img && Storage::exists($ship->img)) {
            Storage::delete($ship->img);
        }
        $path = $request->file('img')->store('img/ships', 'public');
        $ship->img = $path;
    }

    $ship->save();

    return redirect()->route('admin.editAll')->with('success', 'Корабль успешно обновлен!');
}

public function deleteDate(Date $date)
{
    try {
        $date->delete();
        return redirect()->route('admin.editAll')->with('success', 'Дата успешно удалена!');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') {
            return back()->withErrors('Невозможно удалить дату, так как она используется в заказах круизов.');
        }
        return back()->withErrors('Произошла ошибка при удалении даты.');
    }
}

// Удаление пункта отправления
public function deleteDeparture(Departure $departure)
{
    try {
        $departure->delete();
        return redirect()->route('admin.editAll')->with('success', 'Пункт отправления успешно удален!');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') {
            return back()->withErrors('Невозможно удалить пункт отправления, так как он используется в других данных.');
        }
        return back()->withErrors('Произошла ошибка при удалении пункта отправления.');
    }
}

// Удаление направления
public function deleteDestination(Destination $destination)
{
    try {
        $destination->delete();
        return redirect()->route('admin.editAll')->with('success', 'Направление успешно удалено!');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') {
            return back()->withErrors('Невозможно удалить направление, так как оно используется в других данных.');
        }
        return back()->withErrors('Произошла ошибка при удалении направления.');
    }
}

// Удаление корабля
public function deleteShip(Ship $ship)
{
    try {
        // Удаляем изображение, если оно существует
        if ($ship->img && Storage::exists($ship->img)) {
            Storage::delete($ship->img);
        }
        
        $ship->delete();
        return redirect()->route('admin.editAll')->with('success', 'Корабль успешно удален!');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') {
            return back()->withErrors('Невозможно удалить корабль, так как он используется в других данных.');
        }
        return back()->withErrors('Произошла ошибка при удалении корабля.');
    }
}
}
