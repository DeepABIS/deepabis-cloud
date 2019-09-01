<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
        try {
            $bytes = $file->get();
        } catch (FileNotFoundException $e) {
            return response()->json(['error' => 'file not found']);
        }

        if (($socket = socket_create(AF_INET, SOCK_STREAM, 0)) === false) {
            return response('Could not create socket', 500);
        }

        if (($connection = socket_connect($socket, env('INFERENCE_HOST', 'localhost'), env('INFERENCE_PORT', 9042))) === false) {
            return response('Could not connect to server', 500);
        }

        socket_write($socket, pack('J', $file->getSize()), 8);

        $chunks = str_split($bytes, 1024);
        foreach ($chunks as $chunk) {
            socket_write($socket, $chunk);
        }

        if (($response = socket_read($socket, 10*1024)) === false) {
            return response('Could not read input', 500);
        }

        socket_close($socket);

        $json = json_decode($response);
        $json->uuid = $request->get('uuid');

        return response()->json($json);
    }
}
