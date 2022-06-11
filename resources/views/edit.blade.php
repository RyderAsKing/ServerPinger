@extends('layouts.app')

@section('content')
<div class="container">
    {{-- create a form with fields name, IP (required), PORT (required) --}}
    <h3>Edit a server ({{$server->ip}})</h3>
    <form action="{{route('edit', $server->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                value={{$server->name}}>
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="ip">IP</label>
            <input type="text" class="form-control" id="ip" name="ip" placeholder="Enter IP" value={{$server->ip}}>
            @error('ip')
            <p>{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="port">port</label>
            <input type="text" class="form-control" id="port" name="port" placeholder="Enter port"
                value={{$server->port}}>
            @error('port')
            <p>{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="mt-2 btn btn-primary">Edit now</button>
    </form>
</div>
@endsection