<?php

namespace App\Http\Controllers;

use App\DatasetEntry;
use App\Species;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Species::all()->load('dataset');
        return view('console.dataset.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $species = Species::findOrFail($request->get('species'));
        $file = $request->file('file');
        $entry = new DatasetEntry();
        $entry->filename = $file->getClientOriginalName();
        $entry->path = \Storage::putFile('dataset', $file);
        $entry->species()->associate($species);
        $entry->save();

        return response(['uuid' => $request->get('uuid')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function show($id)
    {
        $entry = DatasetEntry::findOrFail($id);
        return \Storage::response($entry->path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $entry = DatasetEntry::findOrFail($id);
        } catch (\Exception $e) {
            return response(500);
        }
        \Storage::delete($entry->path);
        try {
            $entry->delete();
        } catch (\Exception $e) {
        }
    }
}
