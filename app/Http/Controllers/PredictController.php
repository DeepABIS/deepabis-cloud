<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function predict(Request $request)
    {
        $file = $request->file('file');
        \Storage::putFile('/predict/', $file);
    }
}
