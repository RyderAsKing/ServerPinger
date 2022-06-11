<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    //
    public function index()
    {
        $servers = Server::all();
        return view('server.index', ['servers' => $servers]);
    }

    public function add()
    {
        // handle adding server
    }

    public function edit()
    {
        //handle editing server
    }

    public function delete()
    {
        // handle deleting server
    }
}