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
                    @if (!$item->votes->contains('user_id', Auth::id()))
                        <a href="/upvote/{{ $item->id }}"><div class="votearrow extra upvote" title="upvote"></div></a>
                    @else
                        <div class="votearrow extra"></div>
                    @endif
                    @if ($item->url)
                        <a href="{{ $item->url }}">{{ $item->title }}</a>
                        (<a href="//{!! parse_url($item->url, PHP_URL_HOST) !!}">{!! parse_url($item->url, PHP_URL_HOST) !!}</a>)   
                    @else
                        <a href="item/{{ $item->id }}">{{ $item->title }}</a>
                    @endif
                    <br>
                    <div class="extra">{{ $item->votes->count() }} points</div>
                    <div class="extra">by <a href="/user/{{ $item->user->name }}">{{ $item->user->name }}</a></div>
                    <div class="extra">{{ $item->created_at->diffForHumans() }}</div>
                    @if ($item->votes->contains('user_id', Auth::id()))
                        |<div class="extra"><a href="/unvote/{{ $item->id }}">unvote</a></div>
                    @endif       
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
                </li>
                <li>
                    @foreach ($item->comments as $comment)
                        <div class=""><a href="/user/{{ $comment->user_id }}">{{ $comment->user->name }}</a> {{ $comment->created_at->diffForHumans() }}</div>
                        <div>{{ $comment->text }}</div>
                        <a href="/item/{{ $comment->id }}">reply</a>
                    @endforeach
                    
                    {{ $item->comments }}
                </li>

            </ul>
        </div>
    </div>
@endsection