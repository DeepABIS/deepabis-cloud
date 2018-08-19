<?php

namespace App\Http\Controllers;

use App\Dataset;
use App\Http\Requests\StoreDataset;
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
        return view('console.datasets.create', compact('dataset'));
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
        $dataset->save();
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
        $dataset = Dataset::findOrFail($id);
        return view('console.datasets.edit', compact('dataset'));
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
