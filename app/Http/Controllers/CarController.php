<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function create()
    {
        return view('aanbieder.cars.create');
    }

    public function checkKenteken(Request $request)
    {
        $request->validate([
            'kenteken' => 'required|string|max:10',
        ]);

        $kenteken = strtoupper(str_replace('-', '', $request->kenteken));

        $response = Http::get('https://opendata.rdw.nl/resource/m9d7-ebf2.json', [
            'kenteken' => $kenteken,
        ]);

        $data = $response->json()[0] ?? null;

        return view('aanbieder.cars.step2', [
            'kenteken' => $kenteken,
            'data' => $data,
            'bouwjaar' => substr($data['datum_eerste_toelating'] ?? '', 0, 4),
            'kleur' => $data['eerste_kleur'] ?? null,
            'gewicht' => $data['massa_ledig_voertuig'] ?? null,
            'deuren' => $data['aantal_deuren'] ?? null,
            'stoelen' => $data['aantal_zitplaatsen'] ?? null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kenteken' => 'required|string|max:10',
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'bouwjaar' => 'required|integer',
            'prijs' => 'required|numeric|min:0',
            'kilometerstand' => 'required|integer|min:0',
            'stoelen' => 'nullable|integer|min:1',
            'deuren' => 'nullable|integer|min:1',
            'gewicht' => 'nullable|integer|min:0',
            'kleur' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        $image = $request->hasFile('image')
            ? $request->file('image')->store('cars', 'public')
            : null;

        auth()->user()->cars()->create([
            'license_plate'   => strtoupper(str_replace('-', '', $request->kenteken)),
            'make'            => $request->merk,
            'model'           => $request->model,
            'production_year' => $request->bouwjaar,
            'price'           => $request->prijs,
            'mileage'         => $request->kilometerstand,
            'seats'           => $request->stoelen,
            'doors'           => $request->deuren,
            'weight'          => $request->gewicht,
            'color'           => $request->kleur,
            'image'           => $image,
            'views'           => 0,
        ]);

    }

    public function show(Car $car)
    {
        $car->increment('views');

        return view('cars.show', compact('car'));
    }

    public function destroy(Car $car)
    {
        abort_unless($car->user_id === auth()->id(), 403);

        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return back();
    }

    public function edit(Car $car)
    {
        abort_unless($car->user_id === auth()->id(), 403);

        return view('aanbieder.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        abort_unless($car->user_id === auth()->id(), 403);

        $request->validate([
            'kenteken' => 'required|string|max:10',
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'bouwjaar' => 'required|integer',
            'prijs' => 'required|numeric|min:0',
            'kilometerstand' => 'required|integer|min:0',
            'stoelen' => 'nullable|integer|min:1',
            'deuren' => 'nullable|integer|min:1',
            'gewicht' => 'nullable|integer|min:0',
            'kleur' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        $image = $request->hasFile('image')
            ? $request->file('image')->store('cars', 'public')
            : $car->image;

        $car->update([
            'license_plate'   => strtoupper(str_replace('-', '', $request->kenteken)),
            'make'            => $request->merk,
            'model'           => $request->model,
            'production_year' => $request->bouwjaar,
            'price'           => $request->prijs,
            'mileage'         => $request->kilometerstand,
            'seats'           => $request->stoelen,
            'doors'           => $request->deuren,
            'weight'          => $request->gewicht,
            'color'           => $request->kleur,
            'image'           => $image,
        ]);

    }
}