<?php

namespace App\Http\Controllers;

use App\Dataset;
use App\Http\Requests\StoreDataset;
use App\Species;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasets = Dataset::all();
        return view('console.datasets.index', compact('datasets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataset = new Dataset();
        $genera = Species::all()->groupBy('genus')->map(function ($group, $genus) {
            $children = $group->map(function ($species) {
                return ['id' => $species->id, 'label' => $species->name];
            });
            return ['id' => $group->map(function ($species){return $species->id;})->implode(','), 'label' => $genus, 'children' => $children];
        })->values();
        $selected = [];
        return view('console.datasets.create', compact('dataset', 'genera', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDataset $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataset $request)
    {
        $dataset = new Dataset($request->all());
        $dataset->user()->associate(\Auth::user());
        $dataset->save();
        $ids = collect($request->get('species'))->map(function ($field) {
            return explode(',', $field);
        })->flatten();
        $dataset->species()->sync($ids);
        return redirect(route('datasets.index'));
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
        /** @var Dataset $dataset */
        $dataset = Dataset::findOrFail($id);
        // Some Vue TreeSelect stuff
        $genera = Species::all()->groupBy('genus')->map(function ($group, $genus) {
            $children = $group->map(function ($species) {
                return ['id' => $species->id, 'label' => $species->name];
            });
            return ['id' => $group->map(function ($species){return $species->id;})->implode(','), 'label' => $genus, 'children' => $children];
        })->values();
        $selected = $dataset->species->map(function ($species) {return (int)$species->id;})->values();
        $grouped = $dataset->species->groupBy('genus');
        $selected = $selected->reject(function ($element) use ($grouped) {
            foreach ($grouped as $group) {
                if ($group->contains($element)) return false;
            }
            return true;
        });
        foreach ($grouped as $group) {
            if ($group->count() > 1)
            $selected = $selected->merge($group->map(function ($species) {return (int)$species->id;})->implode(','));
        }
        return view('console.datasets.edit', compact('dataset', 'genera', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreDataset $request
     * @param Dataset $dataset
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDataset $request, Dataset $dataset)
    {
        $dataset->update($request->all());
        $ids = collect($request->get('species'))->map(function ($field) {
            return explode(',', $field);
        })->flatten();
        $dataset->species()->sync($ids);
        return redirect(route('datasets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dataset $dataset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataset $dataset)
    {
        try {
            $dataset->delete();
        } catch (\Exception $e) {
        }
        return redirect(route('datasets.index'));
    }
}
