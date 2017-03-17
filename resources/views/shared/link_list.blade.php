<ul>
    @foreach ($links as $link) 
    <li class="links">
        <a href="/upvote/{{ $link->id }}"><div class="votearrow extra" title="upvote"></div></a>
        <a href="{{ $link->url }}">{{ $link->title }}</a>
        (<a href="{!! parse_url($link->url, PHP_URL_HOST) !!}">{!! parse_url($link->url, PHP_URL_HOST) !!}</a>)<br>
        <div class="extra">{{ $link->votes->count() }} points</div>
        <div class="extra">by <a href="/user/{{ $link->user->name }}">{{ $link->user->name }}</a></div>
        <div class="extra">{{ $link->created_at->diffForHumans() }}</div><div class="extra">
        <a href="#">hide</a></div>
        <div class="extra">discuss</div>
    </li>
    @endforeach
</ul>
{{ $links->links() }}