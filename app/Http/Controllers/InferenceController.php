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

        if (($socket = socket_create(AF_INET, SOCK_STREAM, 0)) === false) {
            return response('Could not create socket', 500);
        }

        if (($connection = socket_connect($socket, '127.0.0.1', 9000)) === false) {
            return response('Could not connect to server', 500);
        }

        $data = $file->hashName();
        socket_write($socket, $data, strlen($data));

        if (($response = socket_read($socket, 10*1024)) === false) {
            return response('Could not read input', 500);
        }

        socket_close($socket);

        $json = json_decode($response);
        $json->uuid = $request->get('uuid');

        return response()->json($json);
    }
}
