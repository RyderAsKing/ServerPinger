@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-6">
            <h3>Dashboard</h3>
        </div>
        <div class="col-md-2 col-sm-6">
            <a class="btn btn-primary w-100">Add new</a>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">IP</th>
                        <th scope="col">Last check</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>192.168.0.1:21 <strong>(rig-1)</strong></td>
                        <td>{{now()}}</td>
                        <td><i class="fas fa-circle text-success"></i></td>
                        <td><button class="btn-sm btn-warning" style="margin-right: 1px;">edit</button><button
                                class="btn-sm btn-danger">X</button>
                        </td>
                    </tr>
                    {{-- clone the above row 10 times with random status (success or danger) --}}
                    @for ($i = 2; $i <= 10; $i++) <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                            {{Str::random(10)}}
                        </td>
                        <td>{{now()}}</td>
                        <td>
                            @if (rand(0, 1) == 0)
                            <i class="fas fa-circle text-success"></i>
                            @else
                            <i class="fas fa-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <button class="btn-sm btn-warning" style="margin-right: 1px;">edit</button><button
                                class="btn-sm btn-danger">X</button>
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection