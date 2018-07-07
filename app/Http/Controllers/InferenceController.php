<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Symfony\Component\Process\Process;

class InferenceController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function inference(Request $request)
    {
        $file = $request->file('file');
        Storage::putFile('/predict/', $file);
    }

    public function pythontest(Request $request)
    {
        $path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        $process = new Process(config('python.path').'/python inference.py');
        $process->setWorkingDirectory($path . '/python');
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > ' . $buffer;
            } else {
                echo 'OUT > ' . $buffer;
            }
        });
    }
}
