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
                        <a href="/item/{{ $item->id }}">{{ $item->title }}</a>
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
                    @include('shared.commentForm')
                </li>
            </ul>
            @include('comments', ['comments' => $item->comments])
        </div>
    </div>
@endsection