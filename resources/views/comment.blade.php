@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops! Something went wrong!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <ul>
                <li>

                    @if ($item->url)
                        <a href="{{ $item->url }}">{{ $item->title }}</a>
                        (<a href="//{!! parse_url($item->url, PHP_URL_HOST) !!}">{!! parse_url($item->url, PHP_URL_HOST) !!}</a>)   
                    @else
                        <a href="item/{{ $item->id }}">{{ $item->title }}</a>
                    @endif
                    <br>

                    <div class="extra">by <a href="/user/{{ $item->user->name }}">{{ $item->user->name }}</a></div>
                    <div class="extra">{{ $item->created_at->diffForHumans() }}</div>

                    |<div class="extra"><a href="#">hide</a></div> 
                    |<div class="extra"><a href="/item/{{ $item->id }}">discuss</a></div>
                </li>
                <li>
                    <div class="votearrow extra"></div>
                    {{ $item->text }}
                </li>
                <li>
                    <form action="/item/{{ $item->id }}/comment" method="post">
                        {!! csrf_field() !!}
                        <div><textarea rows="6" cols="60" id="text" name="text"></textarea></div>
                        <input type="hidden" id="parent" name="parent" value="{{ $item->id }}">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-default">Add comment</button>
                    <form><br><br>
                                        {{ $item->comments }}

                </li>

            </ul>
        </div>
    </div>
@endsection