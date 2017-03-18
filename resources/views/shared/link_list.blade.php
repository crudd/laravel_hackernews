<ul>
    @foreach ($links as $link) 
    <li class="links">
        @if (!$link->votes->contains('user_id', Auth::id()))
            <a href="/upvote/{{ $link->id }}"><div class="votearrow extra upvote" title="upvote"></div></a>
        @else
            <div class="votearrow extra"></div>
        @endif
        <a href="{{ $link->url }}">{{ $link->title }}</a>
        (<a href="//{!! parse_url($link->url, PHP_URL_HOST) !!}">{!! parse_url($link->url, PHP_URL_HOST) !!}</a>)<br>
        <div class="extra">{{ $link->votes->count() }} points</div>
        <div class="extra">by <a href="/user/{{ $link->user->name }}">{{ $link->user->name }}</a></div>
        <div class="extra">{{ $link->created_at->diffForHumans() }}</div>
         @if ($link->votes->contains('user_id', Auth::id()))
            |<div class="extra"><a href="/unvote/{{ $link->id }}">unvote</a></div>
        @endif       
        |<div class="extra"><a href="#">hide</a></div> 
        |<div class="extra">discuss</div>
    </li>
    @endforeach
</ul>
{{ $links->links() }}