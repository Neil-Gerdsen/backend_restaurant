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

    public function show(Gerecht $gerecht)
    {
        return view('gerechten.show', ['gerecht' => $gerecht]);
    }

    public function edit(Gerecht $gerecht)
    {
        return view('gerechten.edit', ['gerecht' => $gerecht]);
    }

    public function update(Request $request, Gerecht $gerecht)
    {
        $gerecht->update($request->all());
        return redirect()->route('gerechten.index')->with('success', 'Gerecht bijgewerkt!');
    }

    public function destroy(Gerecht $gerecht)
    {
        $gerecht->delete();
        return redirect()->route('gerechten.index')->with('success', 'Gerecht verwijderd!');
    }
}
