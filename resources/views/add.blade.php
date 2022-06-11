@extends('layouts.app')

@section('content')
<div class="container">
    {{-- create a form with fields name, IP (required), PORT (required) --}}
    <h3>Add a new server</h3>
    <form action="{{route('add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="ip">IP</label>
            <input type="text" class="form-control" id="ip" placeholder="Enter IP">
            @error('ip')
            <p>{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="port">port</label>
            <input type="text" class="form-control" id="port" placeholder="Enter port">
            @error('port')
            <p>{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="mt-2 btn btn-primary">Add now</button>
    </form>
</div>
@endsection