<?php

namespace App\Http\Controllers;

use App\Models\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
    public function index()
    {
        $gerechten = Gerecht::all();
        return view('gerechten.index', ['gerechten' => $gerechten]);
    }

    public function create()
    {
        return view('gerechten.create');
    }

    public function store(Request $request)
    {
        Gerecht::create($request->all());
        return redirect()->route('gerechten.index')->with('success', 'Gerecht aangemaakt!');
    }

    public function show(Gerecht $gerechten)
    {
        return view('gerechten.show', ['gerecht' => $gerechten]);
    }

    public function edit(Gerecht $gerechten)
    {
        return view('gerechten.edit', ['gerecht' => $gerechten]);
    }

    public function update(Request $request, Gerecht $gerechten)
    {
        $gerechten->update($request->all());
        return redirect()->route('gerechten.index')->with('success', 'Gerecht bijgewerkt!');
    }

    public function destroy(Gerecht $gerechten)
    {
        $gerechten->delete();
        return redirect()->route('gerechten.index')->with('success', 'Gerecht verwijderd!');
    }
}
