<ul>
    @foreach ($items as $item) 
    <li class="links">
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
    @endforeach
</ul>
{{ $items->links() }}