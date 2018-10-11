<?php

namespace App\Http\Controllers;

use App\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Species::with(['samples', 'user'])->get();
        return view('console.species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = new Species();
        $genera = Species::distinct()->get(['genus']);
        return view('console.species.create', compact('species', 'genera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $species = new Species($request->all());
        $species->user()->associate(\Auth::user());
        $species->save();
        return redirect(route('species.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $species = Species::findOrFail($id);
        $genera = Species::distinct()->get(['genus']);
        return view('console.species.edit', compact('species', 'genera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Species $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Species $species)
    {
        $species->update($request->all());
        return redirect(route('species.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Species $species
     * @return void
     */
    public function destroy(Species $species)
    {
        try {
            $species->delete();
        } catch (\Exception $e) {
        }
        return redirect(route('species.index'));
    }
}
