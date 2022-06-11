@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-6">
            <h3>Dashboard</h3>
        </div>
        <div class="col-md-2 col-sm-6">
            <a href={{route('add')}} class="btn btn-primary w-100">Add new</a>
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
                    {{-- use the data returned as servers to create table rows and the data --}}
                    @if($servers->count() < 1) <tr>
                        <td colspan="5">No servers added</td>
                        </tr> @else @foreach ($servers as $server) <tr>
                            <th scope="row">{{$server->id}}</th>
                            <td>{{$server->ip}}:{{$server->port}} <strong>({{$server->name}})</strong></td>
                            <td>{{$server->last_check}}</td>
                            <td>@if($server->status == 'online') <i class="fas fa-circle text-success"></i> @else <i
                                    class="fas fa-circle text-danger"></i> @endif</td>
                            <td><button class="btn-sm btn-warning" style="margin-right: 1px;">edit</button><button
                                    class="btn-sm btn-danger">X</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{$servers->links()}}
        </div>
    </div>
    @endsection