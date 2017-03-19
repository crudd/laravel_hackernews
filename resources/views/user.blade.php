@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @if (!$user)
            No such user
        @else
            <ul>
            <li>User: {{ $user->name }}</li>
            <li>Created: {{ $user->created_at->diffForHumans() }}</li>
            <li>Karma: {{ $user->karma }}</li>
            <li>About: {{ $user->about }}</li>
            <li><a href="/user/{{ $user->name }}/submissions">submissions</a></li>
            <li>comments</li>
            <li>favorites</li>
            </ul>
        @endif
        </div>
    </div>
@endsection