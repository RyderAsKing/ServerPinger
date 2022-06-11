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

    public function unlogged()
    {
        $servers = Server::paginate(10);
        return view('welcome', ['servers' => $servers]);
    }

    public function add()
    {
        // handle adding server
        return view('add');
    }

    public function store(Request $request)
    {
        // handle storing server
        $this->validate($request, [
            'name' => 'required|max:255',
            'ip' => 'required|ipv4|unique:servers',
            'port' => 'required|numeric',
        ]);

        Server::create($request->only(['name', 'ip', 'port']));
        return redirect()->route('home');
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
