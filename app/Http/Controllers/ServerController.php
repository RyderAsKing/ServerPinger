<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Whoops\Run;

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

    public function edit($id)
    {
        //handle editing server
        $server = Server::findOrFail($id);
        return view('edit', ['server' => $server]);
    }

    public function update($id, Request $request)
    {
        // handle updating server
        $this->validate($request, [
            'name' => 'required|max:255',
            'ip' => 'required|ipv4|unique:servers,ip,' . $id,
            'port' => 'required|numeric',
        ]);

        $server = Server::findOrFail($id);

        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->port = $request->port;
        $server->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        // handle deleting server
        Server::destroy($id);
        return redirect()->back();
    }
}
