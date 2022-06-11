<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    //
    public function index()
    {
        $servers = Server::paginate(10);
        return view('home', ['servers' => $servers]);
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
