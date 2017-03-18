@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Users</h1>
            <ul>
            @foreach ($users as $user) 
            <li class="users">
                <a href="/user/{{ $user->name }}">{{ $user->name }}</a>
             </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection