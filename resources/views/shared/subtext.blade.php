<div class="extra">{{ $item->votes->count() }} points</div>
<div class="extra">by <a href="/user/{{ $item->user->name }}">{{ $item->user->name }}</a></div>
<div class="extra">{{ $item->created_at->diffForHumans() }}</div>
    @if ($item->votes->contains('user_id', Auth::id()))
    |<div class="extra"><a href="/unvote/{{ $item->id }}">unvote</a></div>
@endif       
|<div class="extra"><a href="#">hide</a></div> 
|<div class="extra"><a href="/item/{{ $item->id }}">
@if ($item->comments->count())
    {{ $item->getCommentsCount() }}
    @if ($item->comments->count()==1)
        comment
    @else
        comments
    @endif
@else
    discuss
@endif
</a></div>